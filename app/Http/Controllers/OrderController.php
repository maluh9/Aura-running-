<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class OrderController extends Controller
{
    /**
     * Lista os pedidos do usuário.
     */
    public function index(): View
    {
        $orders = Order::with('items.product')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('orders.index', compact('orders'));
    }


    /**
     * Mostra os detalhes de um pedido.
     */
    public function show($id): View
    {
        $order = Order::with('items.product')
            ->where('user_id', Auth::id())
            ->findOrFail($id);

        return view('orders.show', compact('order'));
    }


    /**
     * Finaliza a compra.
     */
    public function checkout(): RedirectResponse
    {
        $cart = Cart::with('items.product')
            ->where('user_id', Auth::id())
            ->first();

        // Verifica se existe carrinho
        if (!$cart || $cart->items->count() === 0) {
            return redirect()
                ->route('cart.index')
                ->with('error', 'Seu carrinho está vazio.');
        }

        // Calcula o total
        $total = $cart->items->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        // Cria o pedido e seus itens
        $order = DB::transaction(function () use ($cart, $total) {

            $order = Order::create([
                'user_id' => Auth::id(),
                'order_number' => 'AURA-' . strtoupper(uniqid()),
                'total' => $total,
                'status' => 'pedido_realizado',
                'payment_status' => 'pendente',
            ]);

            foreach ($cart->items as $item) {

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'size' => $item->size,
                    'quantity' => $item->quantity,
                    'price' => $item->price,
                ]);
            }

            return $order;
        });

        // Limpa o carrinho depois de criar o pedido
        $cart->items()->delete();

        return redirect()
            ->route('orders.show', $order->id)
            ->with('success', 'Pedido realizado com sucesso!');
    }
}

