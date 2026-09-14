<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PaymentController extends Controller
{
    /**
     * Lista os pagamentos do usuário.
     */
    public function index(): View
    {
        $orders = Order::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('payments.index', compact('orders'));
    }


    /**
     * Tela para pagar um pedido.
     */
    public function checkout(Order $order): View|RedirectResponse
    {
        $this->ensureOwner($order);

        if ($order->status === 'cancelado') {
            return redirect()
                ->route('orders.index')
                ->with('error', 'Este pedido foi cancelado.');
        }

        if ($order->payment_status === 'pago') {
            return redirect()
                ->route('payments.status', $order);
        }

        $publicKey = config('services.mercadopago.public_key');

        return view(
            'payments.checkout',
            compact('order', 'publicKey')
        );
    }


    /**
     * Processa Pix, boleto ou cartão.
     */
    public function process(
        Request $request,
        Order $order
    ): JsonResponse {

        $this->ensureOwner($order);

        if ($order->status === 'cancelado') {
            return response()->json([
                'message' => 'Este pedido foi cancelado.',
            ], 422);
        }

        if ($order->payment_status === 'pago') {
            return response()->json([
                'success' => true,
                'redirect_url' => route(
                    'payments.status',
                    $order
                ),
            ]);
        }

        $validated = $request->validate([
            'formData' => ['required', 'array'],
            'formData.payment_method_id' => [
                'required',
                'string',
            ],
        ]);

        $accessToken = config(
            'services.mercadopago.access_token'
        );

        if (!$accessToken) {
            return response()->json([
                'message' =>
                    'As credenciais do Mercado Pago ainda não foram configuradas.',
            ], 500);
        }

        $formData = $validated['formData'];


        /*
        |--------------------------------------------------------------------------
        | CAMPOS VINDOS DO PAYMENT BRICK
        |--------------------------------------------------------------------------
        |
        | Nunca usamos o valor enviado pelo navegador.
        | O valor verdadeiro vem do banco de dados.
        |
        */

        $payload = Arr::only(
            $formData,
            [
                'token',
                'issuer_id',
                'payment_method_id',
                'installments',
                'payer',
            ]
        );


        // Valor sempre vindo do pedido
        $payload['transaction_amount'] =
            (float) $order->total;


        $payload['description'] =
            'Pedido ' .
            $order->order_number .
            ' - AURA Running';


        $payload['external_reference'] =
            $order->order_number;


        /*
        |--------------------------------------------------------------------------
        | E-MAIL DO CLIENTE
        |--------------------------------------------------------------------------
        */

        if (!isset($payload['payer'])) {
            $payload['payer'] = [];
        }

        if (
            empty($payload['payer']['email'])
            && Auth::user()
        ) {
            $payload['payer']['email'] =
                Auth::user()->email;
        }


        /*
        |--------------------------------------------------------------------------
        | REMOVE CAMPOS VAZIOS
        |--------------------------------------------------------------------------
        */

        foreach ($payload as $key => $value) {

            if ($value === null || $value === '') {
                unset($payload[$key]);
            }
        }


        /*
        |--------------------------------------------------------------------------
        | MERCADO PAGO
        |--------------------------------------------------------------------------
        */

        $response = Http::withToken($accessToken)
            ->acceptJson()
            ->withHeaders([
                'X-Idempotency-Key' =>
                    (string) Str::uuid(),
            ])
            ->post(
                'https://api.mercadopago.com/v1/payments',
                $payload
            );


        if (!$response->successful()) {

            $data = $response->json();

            return response()->json([
                'message' =>
                    $data['message']
                    ?? 'Não foi possível processar o pagamento.',

                'details' => $data,
            ], 422);
        }


        $data = $response->json();

        $this->syncPaymentData(
            $order,
            $data
        );


        return response()->json([
            'success' => true,

            'payment_status' =>
                $order->fresh()->payment_status,

            'redirect_url' =>
                route(
                    'payments.status',
                    $order
                ),
        ]);
    }


    /**
     * Tela com resultado/status.
     */
    public function status(
        Order $order
    ): View {

        $this->ensureOwner($order);

        /*
        |--------------------------------------------------------------
        | Se já existe payment_id, consulta novamente o Mercado Pago.
        |--------------------------------------------------------------
        */

        if ($order->payment_id) {
            $this->refreshFromMercadoPago($order);
        }

        $order->refresh();

        return view(
            'payments.status',
            compact('order')
        );
    }


    /**
     * Botão "Atualizar status".
     */
    public function refresh(
        Order $order
    ): RedirectResponse {

        $this->ensureOwner($order);

        if ($order->payment_id) {
            $this->refreshFromMercadoPago($order);
        }

        return redirect()
            ->route('payments.status', $order)
            ->with(
                'success',
                'Status do pagamento atualizado.'
            );
    }


    /**
     * Consulta o Mercado Pago.
     */
    private function refreshFromMercadoPago(
        Order $order
    ): void {

        $accessToken = config(
            'services.mercadopago.access_token'
        );

        if (!$accessToken || !$order->payment_id) {
            return;
        }

        $response = Http::withToken($accessToken)
            ->acceptJson()
            ->get(
                'https://api.mercadopago.com/v1/payments/' .
                $order->payment_id
            );


        if ($response->successful()) {

            $this->syncPaymentData(
                $order,
                $response->json()
            );
        }
    }


    /**
     * Salva os dados recebidos do Mercado Pago.
     */
    private function syncPaymentData(
        Order $order,
        array $data
    ): void {

        $mercadoPagoStatus =
            $data['status'] ?? 'pending';


        $paymentStatus =
            match ($mercadoPagoStatus) {

                'approved' =>
                    'pago',

                'rejected' =>
                    'recusado',

                'cancelled' =>
                    'cancelado',

                'refunded',
                'charged_back' =>
                    'reembolsado',

                default =>
                    'pendente',
            };


        $transactionData = data_get(
            $data,
            'point_of_interaction.transaction_data',
            []
        );


        $ticketUrl =
            data_get(
                $data,
                'transaction_details.external_resource_url'
            )
            ?? data_get(
                $data,
                'point_of_interaction.transaction_data.ticket_url'
            );


        $paidAt = null;

        if (
            $paymentStatus === 'pago'
            && !empty($data['date_approved'])
        ) {

            $paidAt = Carbon::parse(
                $data['date_approved']
            );
        }

        elseif ($paymentStatus === 'pago') {
            $paidAt = now();
        }


        $expiresAt = null;

        if (!empty($data['date_of_expiration'])) {

            $expiresAt = Carbon::parse(
                $data['date_of_expiration']
            );
        }


        $order->update([

            'payment_id' =>
                isset($data['id'])
                    ? (string) $data['id']
                    : $order->payment_id,

            'payment_method' =>
                $data['payment_method_id']
                ?? $order->payment_method,

            'payment_type' =>
                $data['payment_type_id']
                ?? $order->payment_type,

            'payment_status' =>
                $paymentStatus,

            'payment_status_detail' =>
                $data['status_detail']
                ?? null,

            'pix_copy_paste' =>
                $transactionData['qr_code']
                ?? null,

            'pix_qr_code_base64' =>
                $transactionData['qr_code_base64']
                ?? null,

            'payment_ticket_url' =>
                $ticketUrl,

            'payment_expires_at' =>
                $expiresAt,

            'paid_at' =>
                $paidAt,
        ]);
    }


    /**
     * Garante que o pedido é do cliente logado.
     */
    private function ensureOwner(
        Order $order
    ): void {

        abort_unless(
            $order->user_id === Auth::id(),
            404
        );
    }
}