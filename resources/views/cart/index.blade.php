<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    @include('partials.page-meta', ['pageTitle' => 'Carrinho'])


    <style>

        @import url('https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@400;500;600;700&family=Barlow:wght@400;500;600&display=swap');


        * {
            box-sizing: border-box;
        }


        body {
            margin: 0;

            background: #f6f6f6;

            color: #111;

            font-family: 'Barlow', sans-serif;
        }



        /* =========================================
           PÁGINA DO CARRINHO
        ========================================= */

        .aura-cart-page {
            width: 100%;
            max-width: 1180px;

            margin: 0 auto;

            padding: 48px 30px 80px;
        }


        .aura-cart-label {
            display: block;

            margin-bottom: 7px;

            color: #999;

            font-size: 10px;
            font-weight: 600;

            letter-spacing: .14em;

            text-transform: uppercase;
        }


        .aura-cart-title {
            margin: 0 0 10px;

            font-family: 'Barlow Condensed', sans-serif;

            font-size: 52px;
            font-weight: 600;

            line-height: 1;
        }


        .aura-cart-subtitle {
            margin: 0 0 34px;

            color: #777;

            font-size: 14px;
        }



        /* =========================================
           MENSAGENS
        ========================================= */

        .aura-alert {
            margin-bottom: 20px;

            padding: 14px 17px;

            border-radius: 7px;

            font-size: 12px;
        }


        .aura-alert-success {
            background: #edf8ef;

            color: #286c39;

            border: 1px solid #d5ead9;
        }


        .aura-alert-error {
            background: #fff1f1;

            color: #9b2d2d;

            border: 1px solid #efd2d2;
        }



        /* =========================================
           ITEM
        ========================================= */

        .aura-cart-item {
            display: grid;

            grid-template-columns: 150px minmax(0, 1fr) auto;

            gap: 24px;

            align-items: center;

            margin-bottom: 14px;

            padding: 20px;

            background: #fff;

            border: 1px solid #e3e3e3;
            border-radius: 9px;
        }


        .aura-cart-image {
            width: 150px;
            height: 150px;

            display: flex;
            align-items: center;
            justify-content: center;

            overflow: hidden;

            background: #f1f1f1;

            border-radius: 7px;
        }


        .aura-cart-image img {
            width: 100%;
            height: 100%;

            display: block;

            object-fit: contain;
        }


        .aura-cart-no-image {
            color: #999;

            font-size: 10px;

            text-align: center;
        }



        /* =========================================
           INFORMAÇÕES
        ========================================= */

        .aura-cart-info h2 {
            margin: 0 0 10px;

            font-family: 'Barlow Condensed', sans-serif;

            font-size: 25px;
            font-weight: 600;
        }


        .aura-cart-info p {
            margin: 5px 0;

            color: #777;

            font-size: 12px;
        }


        .aura-cart-info p strong {
            color: #222;
        }


        .aura-cart-unavailable {
            margin-top: 10px !important;

            color: #a72e2e !important;

            font-size: 10px !important;
            font-weight: 700;

            letter-spacing: .08em;

            text-transform: uppercase;
        }



        /* =========================================
           CONTROLES
        ========================================= */

        .aura-cart-controls {
            display: flex;
            align-items: center;
            flex-wrap: wrap;

            gap: 9px;

            margin-top: 15px;
        }


        .aura-cart-update-form {
            display: flex;
            align-items: center;

            gap: 8px;

            margin: 0;
        }


        .aura-cart-quantity {
            width: 65px;
            height: 39px;

            padding: 0 8px;

            background: #fff;

            border: 1px solid #d5d5d5;
            border-radius: 5px;

            color: #111;

            font-family: 'Barlow', sans-serif;

            text-align: center;
        }


        .aura-cart-small-button {
            height: 39px;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            padding: 0 14px;

            background: #fff;

            color: #111;

            border: 1px solid #111;
            border-radius: 999px;

            font-family: 'Barlow', sans-serif;

            font-size: 10px;
            font-weight: 600;

            cursor: pointer;

            white-space: nowrap;
        }


        .aura-cart-small-button:hover {
            background: #111;

            color: #fff;
        }


        .aura-cart-remove {
            color: #a72e2e;

            border-color: #d7b0b0;
        }


        .aura-cart-remove:hover {
            background: #a72e2e;

            color: #fff;

            border-color: #a72e2e;
        }


        .aura-cart-small-button:disabled,
        .aura-cart-quantity:disabled {
            opacity: .45;

            cursor: not-allowed;
        }



        /* =========================================
           PREÇO
        ========================================= */

        .aura-cart-price {
            min-width: 130px;

            font-family: 'Barlow Condensed', sans-serif;

            font-size: 21px;
            font-weight: 600;

            text-align: right;

            white-space: nowrap;
        }



        /* =========================================
           RESUMO
        ========================================= */

        .aura-cart-summary {
            width: 100%;
            max-width: 410px;

            margin: 30px 0 0 auto;

            padding: 25px;

            background: #fff;

            border: 1px solid #e3e3e3;
            border-radius: 9px;
        }


        .aura-cart-summary-label {
            display: block;

            margin-bottom: 4px;

            color: #999;

            font-size: 9px;
            font-weight: 600;

            letter-spacing: .1em;

            text-transform: uppercase;
        }


        .aura-cart-summary h2 {
            margin: 0 0 20px;

            font-family: 'Barlow Condensed', sans-serif;

            font-size: 25px;
            font-weight: 600;
        }


        .aura-cart-summary-line {
            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 20px;

            padding: 14px 0;

            border-top: 1px solid #eee;
        }


        .aura-cart-summary-line span:first-child {
            color: #777;

            font-size: 12px;
        }


        .aura-cart-total {
            font-family: 'Barlow Condensed', sans-serif;

            font-size: 25px;
            font-weight: 600;
        }



        /* =========================================
           FINALIZAR
        ========================================= */

        .aura-cart-checkout-form {
            margin: 20px 0 0;
        }


        .aura-cart-checkout {
            width: 100%;
            min-height: 48px;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 0 22px;

            background: #111;

            color: #fff;

            border: 1px solid #111;
            border-radius: 999px;

            font-family: 'Barlow', sans-serif;

            font-size: 11px;
            font-weight: 600;

            letter-spacing: .04em;

            cursor: pointer;

            transition: .2s ease;
        }


        .aura-cart-checkout:hover {
            background: #fff;

            color: #111;
        }



        /* =========================================
           CARRINHO VAZIO
        ========================================= */

        .aura-cart-empty {
            min-height: 430px;

            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;

            padding: 60px 25px;

            background: #fff;

            border: 1px solid #e3e3e3;
            border-radius: 9px;

            text-align: center;
        }


        .aura-cart-empty-icon {
            width: 60px;
            height: 60px;

            display: flex;
            align-items: center;
            justify-content: center;

            margin-bottom: 20px;

            background: #111;

            color: #fff;

            border-radius: 50%;

            font-size: 23px;
        }


        .aura-cart-empty h2 {
            margin: 0 0 8px;

            font-family: 'Barlow Condensed', sans-serif;

            font-size: 31px;
            font-weight: 600;
        }


        .aura-cart-empty p {
            max-width: 400px;

            margin: 0 0 25px;

            color: #777;

            font-size: 14px;

            line-height: 1.5;
        }


        .aura-cart-continue {
            min-height: 45px;

            display: inline-flex !important;
            align-items: center;
            justify-content: center;

            padding: 0 24px !important;

            background: #111 !important;

            color: #fff !important;

            border: 1px solid #111 !important;
            border-radius: 999px;

            text-decoration: none !important;

            font-family: 'Barlow', sans-serif !important;

            font-size: 11px !important;
            font-weight: 600 !important;

            line-height: 1 !important;

            letter-spacing: .04em;

            white-space: nowrap;
        }


        .aura-cart-continue:hover {
            background: #fff !important;

            color: #111 !important;
        }



        /* =========================================
           RESPONSIVO
        ========================================= */

        @media(max-width: 750px) {

            .aura-cart-page {
                padding: 35px 18px 60px;
            }


            .aura-cart-title {
                font-size: 43px;
            }


            .aura-cart-item {
                grid-template-columns: 105px 1fr;
            }


            .aura-cart-image {
                width: 105px;
                height: 105px;
            }


            .aura-cart-price {
                grid-column: 2;

                min-width: 0;

                text-align: left;
            }


            .aura-cart-summary {
                max-width: none;
            }

        }


        @media(max-width: 480px) {

            .aura-cart-item {
                grid-template-columns: 1fr;
            }


            .aura-cart-image {
                width: 100%;
                height: 220px;
            }


            .aura-cart-price {
                grid-column: auto;
            }


            .aura-cart-update-form {
                flex-wrap: wrap;
            }

        }

    </style>

</head>


<body>


{{-- HEADER PADRÃO AURA --}}

@include('partials.store-header')



<main class="aura-cart-page">


    <span class="aura-cart-label">
        Sua seleção
    </span>


    <h1 class="aura-cart-title">
        Seu carrinho
    </h1>


    <p class="aura-cart-subtitle">
        Confira seus produtos antes de finalizar o pedido.
    </p>



    {{-- MENSAGENS --}}

    @if(session('success'))

        <div class="aura-alert aura-alert-success">
            {{ session('success') }}
        </div>

    @endif


    @if(session('error'))

        <div class="aura-alert aura-alert-error">
            {{ session('error') }}
        </div>

    @endif



    @if($cart && $cart->items->count() > 0)


        @foreach($cart->items as $item)


            @php

                $productAvailable =
                    $item->product
                    && $item->product->active
                    && $item->product->category
                    && $item->product->category->active
                    && $item->product->stock > 0;

            @endphp



            <article class="aura-cart-item">


                {{-- IMAGEM --}}

                <div class="aura-cart-image">


                    @if(
                        $item->product
                        && $item->product->image_url
                    )

                        <img
                            src="{{ $item->product->image_url }}"
                            alt="{{ $item->product->name }}"
                        >

                    @else

                        <span class="aura-cart-no-image">
                            Imagem indisponível
                        </span>

                    @endif


                </div>



                {{-- INFORMAÇÕES --}}

                <div class="aura-cart-info">


                    <h2>

                        {{ $item->product->name
                            ?? 'Produto indisponível'
                        }}

                    </h2>



                    @if($item->product)


                        <p>

                            Categoria:

                            <strong>

                                {{ $item->product->category->name
                                    ?? 'Indisponível'
                                }}

                            </strong>

                        </p>


                        <p>

                            Tamanho:

                            <strong>
                                {{ $item->size }}
                            </strong>

                        </p>


                        <p>

                            Estoque disponível:

                            <strong>
                                {{ $item->product->stock }}
                            </strong>

                        </p>


                        @if(!$productAvailable)

                            <p class="aura-cart-unavailable">

                                {{ $item->product->stock < 1
                                    ? 'Sem estoque'
                                    : 'Produto indisponível'
                                }}

                            </p>

                        @endif


                    @endif



                    <div class="aura-cart-controls">


                        {{-- ATUALIZAR --}}

                        <form
                            action="{{ route('cart.update', $item->id) }}"
                            method="POST"
                            class="aura-cart-update-form"
                        >

                            @csrf


                            <input
                                type="number"
                                name="quantity"

                                min="1"

                                max="{{ max(
                                    1,
                                    $item->product->stock ?? 1
                                ) }}"

                                value="{{ $item->quantity }}"

                                class="aura-cart-quantity"

                                aria-label="Quantidade"

                                @disabled(!$productAvailable)
                            >


                            <button
                                type="submit"
                                class="aura-cart-small-button"

                                @disabled(!$productAvailable)
                            >
                                ATUALIZAR
                            </button>


                        </form>



                        {{-- REMOVER --}}

                        <form
                            action="{{ route('cart.remove', $item->id) }}"
                            method="POST"
                            style="margin:0;"
                        >

                            @csrf
                            @method('DELETE')


                            <button
                                type="submit"
                                class="aura-cart-small-button aura-cart-remove"
                            >
                                REMOVER
                            </button>


                        </form>


                    </div>


                </div>



                {{-- PREÇO --}}

                <div class="aura-cart-price">


                    @if($item->product)

                        R$

                        {{ number_format(
                            $item->product->price
                            * $item->quantity,
                            2,
                            ',',
                            '.'
                        ) }}

                    @else

                        Indisponível

                    @endif


                </div>


            </article>


        @endforeach



        {{-- RESUMO --}}

        @php

            $total = $cart->items->sum(function ($item) {

                if (!$item->product) {
                    return 0;
                }

                return
                    $item->product->price
                    * $item->quantity;

            });

        @endphp



        <aside class="aura-cart-summary">


            <span class="aura-cart-summary-label">
                Compra
            </span>


            <h2>
                Resumo do pedido
            </h2>


            <div class="aura-cart-summary-line">

                <span>
                    Itens
                </span>

                <strong>

                    {{ $cart->items->sum('quantity') }}

                </strong>

            </div>


            <div class="aura-cart-summary-line">

                <span>
                    Total
                </span>


                <span class="aura-cart-total">

                    R$

                    {{ number_format(
                        $total,
                        2,
                        ',',
                        '.'
                    ) }}

                </span>

            </div>



            <form
                action="{{ route('orders.checkout') }}"
                method="POST"
                class="aura-cart-checkout-form"
            >

                @csrf


                <button
                    type="submit"
                    class="aura-cart-checkout"
                >
                    FINALIZAR PEDIDO
                </button>


            </form>


        </aside>



    @else


        {{-- CARRINHO VAZIO --}}

        <section class="aura-cart-empty">


            <div class="aura-cart-empty-icon">
                ♡
            </div>


            <h2>
                Seu carrinho está vazio
            </h2>


            <p>
                Adicione produtos da AURA Running para começar sua compra.
            </p>


            <a
                href="{{ route('home') }}"
                class="aura-cart-continue"
            >
                CONTINUAR COMPRANDO
            </a>


        </section>


    @endif


</main>


</body>

</html>