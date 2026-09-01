<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $query = Order::with('user');

        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('order_number', 'like', "%{$search}%")
                    ->orWhereHas('user', function ($userQuery) use ($search) {

                        $userQuery->where('name', 'like', "%{$search}%")
                            ->orWhere('email', 'like', "%{$search}%");

                    });

            });
        }


        if ($request->filled('status')) {

            $query->where('status', $request->status);

        }


        $orders = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();


        $totalOrders = Order::count();

        $pendingOrders = Order::where('status', 'pedido_realizado')
            ->count();

        $totalSales = Order::where('payment_status', 'pago')->sum('total');


        return view('admin.orders.index', compact(
            'orders',
            'totalOrders',
            'pendingOrders',
            'totalSales'
        ));
    }

    public function show(Order $order)
    {
        $order->load([
            'user',
            'items.product'
    ]);

        return view('admin.orders.show', compact('order'));
}

public function updateStatus(Request $request, Order $order)
{
    $validated = $request->validate([
        'status' => [
            'required',
            'in:pedido_realizado,em_preparacao,enviado,entregue'
        ],
    ]);

    if ($order->status === 'cancelado') {

        return back()->with(
            'error',
            'Um pedido cancelado não pode ter o status alterado.'
        );

    }

    $order->status = $validated['status'];

    $order->save();

    return back()->with(
        'success',
        'Status do pedido atualizado com sucesso.'
    );
}


public function updatePayment(Request $request, Order $order)
{
    $validated = $request->validate([
        'payment_status' => [
            'required',
            'in:pendente,pago,cancelado,reembolsado'
        ],
    ]);

    $order->payment_status = $validated['payment_status'];

    $order->save();

    return back()->with(
        'success',
        'Status do pagamento atualizado com sucesso.'
    );
}


public function updateTracking(Request $request, Order $order)
{
    $validated = $request->validate([
        'tracking_code' => [
            'nullable',
            'string',
            'max:255'
        ],
    ]);

    $order->tracking_code = $validated['tracking_code'];

    $order->save();

    return back()->with(
        'success',
        'Código de rastreamento atualizado com sucesso.'
    );
}


public function cancel(Request $request, Order $order)
{
    $validated = $request->validate([
        'cancellation_reason' => [
            'required',
            'in:solicitacao_cliente,produto_indisponivel,problema_pagamento,problema_endereco,outro'
        ],

        'cancellation_note' => [
            'nullable',
            'string',
            'max:1000'
        ],
    ]);


    if ($order->status === 'cancelado') {

        return back()->with(
            'error',
            'Este pedido já foi cancelado.'
        );

    }


    DB::transaction(function () use ($order, $validated) {

        $order->load('items.product');


        /*
        |--------------------------------------------------------------------------
        | DEVOLVE OS PRODUTOS AO ESTOQUE
        |--------------------------------------------------------------------------
        */

        foreach ($order->items as $item) {

            if ($item->product) {

                $item->product->increment(
                    'stock',
                    $item->quantity
                );

            }

        }


        /*
        |--------------------------------------------------------------------------
        | CANCELA O PEDIDO
        |--------------------------------------------------------------------------
        */

        $order->status = 'cancelado';

        $order->cancellation_reason =
            $validated['cancellation_reason'];

        $order->cancellation_note =
            $validated['cancellation_note'] ?? null;

        $order->canceled_at = now();

        $order->save();

    });


    return back()->with(
        'success',
        'Pedido cancelado com sucesso e estoque devolvido.'
    );
}
}