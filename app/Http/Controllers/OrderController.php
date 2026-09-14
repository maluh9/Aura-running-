<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use RuntimeException;

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

        return view(
            'orders.index',
            compact('orders')
        );
    }


    /**
     * Mostra os detalhes de um pedido.
     */
    public function show($id): View
    {
        $order = Order::with('items.product')
            ->where('user_id', Auth::id())
            ->findOrFail($id);

        return view(
            'orders.show',
            compact('order')
        );
    }

 /**
 * Acompanha as entregas do usuário.
 */
public function tracking(): View
{
    $orders = Order::with('items.product')
        ->where('user_id', Auth::id())
        ->where('payment_status', 'pago')
        ->where('status', '!=', 'cancelado')
        ->latest()
        ->get();

    return view(
        'orders.tracking',
        compact('orders')
    );
}

    /**
     * Finaliza a compra.
     */
    public function checkout(): RedirectResponse
    {
        $userId = Auth::id();


        /*
        |--------------------------------------------------------------------------
        | CARRINHO
        |--------------------------------------------------------------------------
        */

        $cart = Cart::where('user_id', $userId)
            ->with('items')
            ->first();


        if (
            !$cart
            || $cart->items->isEmpty()
        ) {

            return redirect()
                ->route('cart.index')
                ->with(
                    'error',
                    'Seu carrinho está vazio.'
                );
        }


        try {

            /*
            |--------------------------------------------------------------------------
            | TRANSAÇÃO
            |--------------------------------------------------------------------------
            |
            | Tudo acontece junto:
            |
            | 1. verifica produtos;
            | 2. verifica categorias;
            | 3. verifica estoque;
            | 4. calcula o total;
            | 5. cria o pedido;
            | 6. cria os itens;
            | 7. desconta o estoque;
            | 8. limpa o carrinho.
            |
            | Se alguma etapa falhar, nada é salvo pela metade.
            |
            */

            $order = DB::transaction(
                function () use ($cart, $userId) {


                    $orderItems = [];

                    $total = 0;



                    /*
                    |--------------------------------------------------------------------------
                    | VERIFICA TODOS OS PRODUTOS
                    |--------------------------------------------------------------------------
                    */

                    foreach ($cart->items as $item) {


                        /*
                        | lockForUpdate impede duas compras simultâneas
                        | de venderem o mesmo estoque.
                        */

                        $product = Product::with('category')
                            ->whereKey($item->product_id)
                            ->lockForUpdate()
                            ->first();


                        /*
                        |--------------------------------------------------------------------------
                        | PRODUTO EXISTE?
                        |--------------------------------------------------------------------------
                        */

                        if (!$product) {

                            throw new RuntimeException(
                                'Um dos produtos do seu carrinho não está mais disponível.'
                            );
                        }


                        /*
                        |--------------------------------------------------------------------------
                        | PRODUTO ATIVO?
                        |--------------------------------------------------------------------------
                        */

                        if (!$product->active) {

                            throw new RuntimeException(
                                "O produto {$product->name} não está mais disponível para compra."
                            );
                        }


                        /*
                        |--------------------------------------------------------------------------
                        | CATEGORIA ATIVA?
                        |--------------------------------------------------------------------------
                        */

                        if (
                            !$product->category
                            || !$product->category->active
                        ) {

                            throw new RuntimeException(
                                "O produto {$product->name} não está disponível no momento."
                            );
                        }


                        /*
                        |--------------------------------------------------------------------------
                        | ESTOQUE
                        |--------------------------------------------------------------------------
                        */

                        if ($product->stock < 1) {

                            throw new RuntimeException(
                                "O produto {$product->name} está sem estoque."
                            );
                        }


                        if (
                            $item->quantity
                            > $product->stock
                        ) {

                            throw new RuntimeException(
                                "A quantidade solicitada de {$product->name} não está disponível em estoque."
                            );
                        }


                        /*
                        |--------------------------------------------------------------------------
                        | PREÇO ATUAL
                        |--------------------------------------------------------------------------
                        |
                        | Usamos o preço atual do produto no momento
                        | em que o pedido é finalizado.
                        |
                        */

                        $price = $product->price;


                        $subtotal =
                            $price
                            * $item->quantity;


                        $total += $subtotal;


                        /*
                        | Guardamos temporariamente os dados.
                        | O pedido será criado depois de todos
                        | os produtos serem validados.
                        */

                        $orderItems[] = [
                            'product' => $product,
                            'size' => $item->size,
                            'quantity' => $item->quantity,
                            'price' => $price,
                        ];
                    }



                    /*
                    |--------------------------------------------------------------------------
                    | CRIA O PEDIDO
                    |--------------------------------------------------------------------------
                    */

                    $order = Order::create([

                        'user_id' => $userId,

                        'order_number' =>
                            'AURA-'
                            . strtoupper(uniqid()),

                        'total' => $total,

                        'status' =>
                            'pedido_realizado',

                        'payment_status' =>
                            'pendente',

                    ]);



                    /*
                    |--------------------------------------------------------------------------
                    | CRIA OS ITENS + DESCONTA ESTOQUE
                    |--------------------------------------------------------------------------
                    */

                    foreach (
                        $orderItems as $orderItem
                    ) {


                        $product =
                            $orderItem['product'];


                        OrderItem::create([

                            'order_id' =>
                                $order->id,

                            'product_id' =>
                                $product->id,

                            'size' =>
                                $orderItem['size'],

                            'quantity' =>
                                $orderItem['quantity'],

                            'price' =>
                                $orderItem['price'],

                        ]);


                        /*
                        | Desconta do estoque.
                        */

                        $product->decrement(
                            'stock',
                            $orderItem['quantity']
                        );

                    }



                    /*
                    |--------------------------------------------------------------------------
                    | LIMPA O CARRINHO
                    |--------------------------------------------------------------------------
                    |
                    | Só limpa se o pedido inteiro tiver sido criado.
                    |
                    */

                    $cart->items()->delete();


                    return $order;
                }
            );


        } catch (RuntimeException $exception) {


            /*
            |--------------------------------------------------------------------------
            | ERRO DE DISPONIBILIDADE
            |--------------------------------------------------------------------------
            */

            return redirect()
                ->route('cart.index')
                ->with(
                    'error',
                    $exception->getMessage()
                );
        }



        /*
        |--------------------------------------------------------------------------
        | SUCESSO
        |--------------------------------------------------------------------------
        */

        return redirect()
    ->route('payments.checkout', $order)
    ->with(
        'success',
        'Pedido criado. Agora escolha a forma de pagamento.'
    );
    }
}