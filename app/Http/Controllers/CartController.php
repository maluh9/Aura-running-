<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add(Request $request, $productId)
    {
        // Só usuário logado pode adicionar ao carrinho
        if (!Auth::check()) {
            return redirect()
                ->route('login')
                ->with('error', 'Você precisa estar logado para adicionar produtos ao carrinho.');
        }

        $product = Product::findOrFail($productId);

        $request->validate([
            'size' => 'required|string',
        ]);

        // Procura o carrinho do usuário
        $cart = Cart::firstOrCreate([
            'user_id' => Auth::id(),
        ], [
            'session_id' => $request->session()->getId(),
        ]);

        // Procura se o mesmo produto e tamanho já estão no carrinho
        $item = CartItem::where('cart_id', $cart->id)
            ->where('product_id', $product->id)
            ->where('size', $request->size)
            ->first();

        if ($item) {

            $item->increment('quantity');

        } else {

            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                'size' => $request->size,
                'quantity' => 1,
                'price' => $product->price,
            ]);
        }

        return redirect()
            ->route('cart.index')
            ->with('success', 'Produto adicionado ao carrinho!');
    }

    public function index()
    {
        // Só usuário logado pode acessar o carrinho
        if (!Auth::check()) {
            return redirect()
                ->route('login')
                ->with('error', 'Faça login para acessar seu carrinho.');
        }

        $cart = Cart::with('items.product.category')
            ->where('user_id', Auth::id())
            ->first();

        return view('cart.index', compact('cart'));
    }

    public function update(Request $request, $itemId)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $item = CartItem::whereHas('cart', function ($query) {
            $query->where('user_id', Auth::id());
        })->findOrFail($itemId);

        $quantity = (int) $request->quantity;

        if ($quantity < 1) {
            $quantity = 1;
        }

        $item->update([
            'quantity' => $quantity,
        ]);

        return redirect()
            ->route('cart.index')
            ->with('success', 'Quantidade atualizada!');
    }

    public function remove($itemId)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $item = CartItem::whereHas('cart', function ($query) {
            $query->where('user_id', Auth::id());
        })->findOrFail($itemId);

        $item->delete();

        return redirect()
            ->route('cart.index')
            ->with('success', 'Produto removido do carrinho!');
    }
}