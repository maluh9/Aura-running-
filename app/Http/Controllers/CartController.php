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
            ->whereHas('category', function ($query) {
                $query->where('active', true);
            })
            ->findOrFail($productId);


        $validated = $request->validate([
            'size' => [
                'required',
                'string',
                'max:20',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | SEM ESTOQUE
        |--------------------------------------------------------------------------
        */

        if ($product->stock < 1) {

            if ($request->expectsJson()) {

                return response()->json([
                    'success' => false,
                    'message' =>
                        'Este produto está sem estoque no momento.',
                ], 422);
            }


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
                'user_id' =>
                    $request->user()->id,
            ],
            [
                'session_id' =>
                    $request->session()->getId(),
            ]
        );



        /*
        |--------------------------------------------------------------------------
        | MESMO PRODUTO + MESMO TAMANHO
        |--------------------------------------------------------------------------
        */

        $item = CartItem::where(
            'cart_id',
            $cart->id
        )
            ->where(
                'product_id',
                $product->id
            )
            ->where(
                'size',
                $validated['size']
            )
            ->first();



        /*
        |--------------------------------------------------------------------------
        | PRODUTO JÁ ESTÁ NO CARRINHO
        |--------------------------------------------------------------------------
        */

        if ($item) {

            if (
                $item->quantity
                >=
                $product->stock
            ) {

                if ($request->expectsJson()) {

                    return response()->json([
                        'success' => false,
                        'message' =>
                            'Quantidade máxima disponível atingida.',
                    ], 422);
                }


                return back()->with(
                    'error',
                    'Quantidade máxima disponível atingida.'
                );
            }


            $item->increment(
                'quantity'
            );

        } else {

            CartItem::create([
                'cart_id' =>
                    $cart->id,

                'product_id' =>
                    $product->id,

                'size' =>
                    $validated['size'],

                'quantity' =>
                    1,

                'price' =>
                    $product->price,
            ]);
        }



        /*
        |--------------------------------------------------------------------------
        | QUANTIDADE TOTAL DO CARRINHO
        |--------------------------------------------------------------------------
        */

        $cartCount = (int) CartItem::where(
            'cart_id',
            $cart->id
        )->sum('quantity');



        /*
        |--------------------------------------------------------------------------
        | RESPOSTA AJAX
        |--------------------------------------------------------------------------
        */

        if ($request->expectsJson()) {

            return response()->json([
                'success' => true,

                'message' =>
                    'Produto adicionado ao carrinho.',

                'cart_count' =>
                    $cartCount,
            ]);
        }



        /*
        |--------------------------------------------------------------------------
        | FALLBACK SEM JAVASCRIPT
        |--------------------------------------------------------------------------
        */

        return back()->with(
            'success',
            'Produto adicionado ao carrinho.'
        );
    }



    /*
    |--------------------------------------------------------------------------
    | QUANTIDADE ATUAL DO CARRINHO
    |--------------------------------------------------------------------------
    |
    | Essa função será usada pela Home e pelas outras páginas para buscar
    | a quantidade REAL que está salva no MySQL.
    |
    */

    public function count(Request $request)
    {
        $cartCount = (int) CartItem::whereHas(
            'cart',
            function ($query) use ($request) {

                $query->where(
                    'user_id',
                    $request->user()->id
                );

            }
        )->sum('quantity');


        return response()->json([
            'success' => true,
            'cart_count' => $cartCount,
        ]);
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
            ->with(
                'items.product.category'
            )
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

    public function update(
        Request $request,
        int $itemId
    ) {

        $item = CartItem::whereHas(
            'cart',
            function ($query) use ($request) {

                $query->where(
                    'user_id',
                    $request->user()->id
                );

            }
        )
            ->with(
                'product.category'
            )
            ->findOrFail($itemId);



        /*
        |--------------------------------------------------------------------------
        | PRODUTO DISPONÍVEL?
        |--------------------------------------------------------------------------
        */

        if (
            !$item->product
            ||
            !$item->product->active
            ||
            !$item->product->category
            ||
            !$item->product->category->active
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

        if (
            $item->product->stock
            < 1
        ) {

            return back()->with(
                'error',
                'Este produto está sem estoque no momento.'
            );
        }


        if (
            (int) $validated['quantity']
            >
            $item->product->stock
        ) {

            return back()->with(
                'error',
                'Há apenas '
                . $item->product->stock
                . ' unidade(s) disponível(is) em estoque.'
            );
        }


        $quantity =
            (int) $validated['quantity'];


        $item->update([
            'quantity' =>
                $quantity,
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

    public function remove(
        Request $request,
        int $itemId
    ) {

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