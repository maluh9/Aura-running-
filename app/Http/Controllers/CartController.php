<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | ADICIONAR AO CARRINHO
    |--------------------------------------------------------------------------
    */

    public function add(Request $request, int $productId)
    {
        $product = Product::where('active', true)

            // A categoria também precisa estar ativa
            ->whereHas('category', function ($query) {
                $query->where('active', true);
            })

            ->findOrFail($productId);


        $validated = $request->validate([
            'size' => ['required', 'string', 'max:20'],
        ]);


        // Produto sem estoque
        if ($product->stock < 1) {

            return back()->with(
                'error',
                'Este produto está sem estoque no momento.'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | LOCALIZA OU CRIA O CARRINHO
        |--------------------------------------------------------------------------
        */

        $cart = Cart::firstOrCreate(
            [
                'user_id' => $request->user()->id,
            ],
            [
                'session_id' => $request->session()->getId(),
            ]
        );


        /*
        |--------------------------------------------------------------------------
        | VERIFICA SE O MESMO PRODUTO/TAMANHO JÁ ESTÁ NO CARRINHO
        |--------------------------------------------------------------------------
        */

        $item = CartItem::where('cart_id', $cart->id)
            ->where('product_id', $product->id)
            ->where('size', $validated['size'])
            ->first();


        if ($item) {

            // Não deixa ultrapassar o estoque
            if ($item->quantity >= $product->stock) {

                return back()->with(
                    'error',
                    'Quantidade máxima disponível atingida.'
                );
            }


            $item->increment('quantity');

        } else {

            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                'size' => $validated['size'],
                'quantity' => 1,
                'price' => $product->price,
            ]);
        }


        return redirect()
            ->route('cart.index')
            ->with(
                'success',
                'Produto adicionado ao carrinho.'
            );
    }



    /*
    |--------------------------------------------------------------------------
    | EXIBIR CARRINHO
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        $cart = Cart::where(
            'user_id',
            $request->user()->id
        )
            ->with('items.product.category')
            ->first();


        return view(
            'cart.index',
            compact('cart')
        );
    }



    /*
    |--------------------------------------------------------------------------
    | ATUALIZAR QUANTIDADE
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, int $itemId)
    {
        $item = CartItem::whereHas(
            'cart',
            function ($query) use ($request) {

                $query->where(
                    'user_id',
                    $request->user()->id
                );

            }
        )
            ->with('product.category')
            ->findOrFail($itemId);


        /*
        |--------------------------------------------------------------------------
        | VERIFICA SE O PRODUTO AINDA PODE SER COMPRADO
        |--------------------------------------------------------------------------
        */

        if (
            !$item->product
            || !$item->product->active
            || !$item->product->category
            || !$item->product->category->active
        ) {

            return redirect()
                ->route('cart.index')
                ->with(
                    'error',
                    'Este produto não está mais disponível para compra.'
                );
        }


        $validated = $request->validate([
            'quantity' => [
                'required',
                'integer',
                'min:1',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | ESTOQUE
        |--------------------------------------------------------------------------
        */

        if ($item->product->stock < 1) {

            return back()->with(
                'error',
                'Este produto está sem estoque no momento.'
            );
        }


        $quantity = min(
            (int) $validated['quantity'],
            $item->product->stock
        );


        $item->update([
            'quantity' => $quantity,
        ]);


        return redirect()
            ->route('cart.index')
            ->with(
                'success',
                'Quantidade atualizada.'
            );
    }



    /*
    |--------------------------------------------------------------------------
    | REMOVER PRODUTO
    |--------------------------------------------------------------------------
    */

    public function remove(Request $request, int $itemId)
    {
        $item = CartItem::whereHas(
            'cart',
            function ($query) use ($request) {

                $query->where(
                    'user_id',
                    $request->user()->id
                );

            }
        )
            ->findOrFail($itemId);


        $item->delete();


        return redirect()
            ->route('cart.index')
            ->with(
                'success',
                'Produto removido do carrinho.'
            );
    }
}