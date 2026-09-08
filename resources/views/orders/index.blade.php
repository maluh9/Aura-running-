<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @include('partials.page-meta', ['pageTitle' => 'Pedidos'])

    <style>

        @import url('https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@400;500;600;700&family=Barlow:wght@400;500;600&display=swap');


        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        body {
            font-family: 'Barlow', sans-serif;
            background: #f7f7f7;
            color: #111;
        }


/* =========================================
   HEADER - ÁREA MINHA CONTA
========================================= */

header {
    width: 100%;
    height: 82px;

    display: flex;
    align-items: center;
    justify-content: space-between;

    padding: 0 55px;

    background: #fff;

    border-bottom: 1px solid #e8e8e8;
}


/* LOGO */

.logo {
    display: flex;
    align-items: center;

    text-decoration: none;
}

.logo img {
    width: 105px;
    height: auto;

    display: block;

    object-fit: contain;
}


/* BOTÃO VOLTAR */

.account-button {
    min-height: 42px;

    display: inline-flex;
    align-items: center;
    justify-content: center;

    padding: 0 21px;

    background: #fff;
    color: #111;

    border: 1px solid #dcdcdc;
    border-radius: 999px;

    text-decoration: none;

    font-size: 12px;
    font-weight: 600;

    letter-spacing: .03em;

    transition: .2s ease;
}

.account-button:hover {
    background: #111;
    color: #fff;

    border-color: #111;

    transform: translateY(-1px);

    box-shadow: 0 7px 20px rgba(0,0,0,.10);
}


@media (max-width: 550px) {

    header {
        height: 72px;

        padding: 0 16px;
    }

    .logo img {
        width: 88px;
    }

    .account-button {
        min-height: 38px;

        padding: 0 15px;

        font-size: 10px;
    }
}



        /* =========================================
           CONTEÚDO
        ========================================= */

        .page {
            width: 100%;

            max-width: 1240px;

            margin: 0 auto;

            padding: 55px 45px 90px;
        }


        .page-top {
            margin-bottom: 38px;
        }




        /* =========================================
           BOTÃO MINHA CONTA
        ========================================= */

        .account-button {
    min-height: 42px;

    display: inline-flex;
    align-items: center;
    justify-content: center;

    padding: 0 22px;

    background: #fff;
    color: #111;

    border: 1px solid #dcdcdc;
    border-radius: 999px;

    text-decoration: none;

    font-size: 12px;
    font-weight: 600;

    letter-spacing: .03em;

    transition: .2s ease;
}

.account-button:hover {
    background: #111;
    color: #fff;

    border-color: #111;

    transform: translateY(-1px);

    box-shadow: 0 7px 20px rgba(0,0,0,.10);
}



        /* =========================================
           TÍTULO
        ========================================= */

        .page-label {
            margin-bottom: 8px;

            color: #999;

            font-size: 11px;
            font-weight: 600;

            letter-spacing: .15em;

            text-transform: uppercase;
        }


        h1 {
            font-family: 'Barlow Condensed', sans-serif;

            font-size: 54px;
            font-weight: 600;

            line-height: .95;

            letter-spacing: -.02em;
        }


        .subtitle {
            max-width: 550px;

            margin-top: 13px;

            color: #777;

            font-size: 15px;

            line-height: 1.5;
        }



        /* =========================================
           SEM PEDIDOS
        ========================================= */

        .empty {
            padding: 80px 30px;

            background: #fff;

            border: 1px solid #e5e5e5;
            border-radius: 8px;

            text-align: center;
        }


        .empty-mark {
            width: 52px;
            height: 52px;

            display: flex;
            align-items: center;
            justify-content: center;

            margin: 0 auto 20px;

            border-radius: 50%;

            background: #111;

            color: #fff;

            font-family: 'Barlow Condensed', sans-serif;

            font-size: 25px;
            font-weight: 600;
        }


        .empty h2 {
            margin-bottom: 8px;

            font-family: 'Barlow Condensed', sans-serif;

            font-size: 28px;
            font-weight: 600;
        }


        .empty p {
            margin-bottom: 25px;

            color: #777;

            font-size: 14px;
        }


        .shop-button {
            min-height: 46px;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            padding: 0 25px;

            background: #111;

            color: #fff;

            border-radius: 999px;

            text-decoration: none;

            font-size: 12px;
            font-weight: 600;

            letter-spacing: .04em;

            transition: .2s ease;
        }


        .shop-button:hover {
            background: #333;

            transform: translateY(-1px);
        }



        /* =========================================
           LISTA DE PEDIDOS
        ========================================= */

        .orders {
            display: flex;
            flex-direction: column;

            gap: 24px;
        }


        .order {
            overflow: hidden;

            background: #fff;

            border: 1px solid #e3e3e3;
            border-radius: 9px;

            transition: .2s ease;
        }


        .order:hover {
            box-shadow: 0 12px 35px rgba(0,0,0,.045);

            transform: translateY(-1px);
        }



        /* =========================================
           CABEÇALHO DO PEDIDO
        ========================================= */

        .order-top {
            min-height: 88px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 19px 25px;

            background: #fafafa;

            border-bottom: 1px solid #eaeaea;
        }


        .order-top-left {
            display: flex;
            flex-direction: column;
        }


        .order-label {
            margin-bottom: 3px;

            color: #999;

            font-size: 10px;
            font-weight: 600;

            letter-spacing: .14em;

            text-transform: uppercase;
        }


        .order-number {
            font-family: 'Barlow Condensed', sans-serif;

            font-size: 20px;
            font-weight: 600;

            letter-spacing: .02em;
        }


        .order-date {
            margin-top: 4px;

            color: #999;

            font-size: 11px;
        }



        /* =========================================
           STATUS
        ========================================= */

        .status {
            min-height: 30px;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            padding: 0 12px;

            border-radius: 999px;

            background: #eeeeee;

            color: #333;

            font-size: 10px;
            font-weight: 600;

            letter-spacing: .05em;

            text-transform: uppercase;

            white-space: nowrap;
        }


        .status-cancelled {
            background: #fdecec;

            color: #9f2e2e;
        }



        /* =========================================
           CANCELAMENTO
        ========================================= */

        .cancel-info {
            display: flex;
            align-items: flex-start;

            gap: 12px;

            margin: 16px 25px 0;

            padding: 13px 15px;

            background: #fff8f8;

            border: 1px solid #eedada;
            border-radius: 6px;
        }


        .cancel-icon {
            width: 28px;
            height: 28px;

            flex-shrink: 0;

            display: flex;
            align-items: center;
            justify-content: center;

            margin-top: 1px;

            border-radius: 50%;

            background: #a72e2e;

            color: #fff;

            font-size: 16px;
            font-weight: 600;
        }


        .cancel-text {
            flex: 1;
        }


        .cancel-text strong {
            display: block;

            margin-bottom: 3px;

            color: #922828;

            font-size: 13px;
            font-weight: 600;
        }


        .cancel-text p {
            color: #666;

            font-size: 12px;

            line-height: 1.5;
        }


        .cancel-date {
            display: block;

            margin-top: 5px;

            color: #999;

            font-size: 10px;
        }



        /* =========================================
           PRODUTOS
        ========================================= */

        .items {
            display: flex;
            flex-direction: column;

            padding: 7px 25px;
        }


        .item {
            display: grid;

            grid-template-columns:
                76px
                minmax(210px, 1fr)
                115px
                75px
                125px;

            align-items: center;

            gap: 18px;

            padding: 16px 0;

            border-bottom: 1px solid #eee;
        }


        .item:last-child {
            border-bottom: none;
        }


        .item-image {
            width: 76px;
            height: 76px;

            display: flex;
            align-items: center;
            justify-content: center;

            overflow: hidden;

            background: #f5f5f5;

            border-radius: 6px;
        }


        .item-image img {
            width: 100%;
            height: 100%;

            object-fit: contain;
        }


        .no-image {
            padding: 8px;

            color: #aaa;

            font-size: 10px;

            text-align: center;
        }


        .item-info h3 {
            margin-bottom: 5px;

            font-family: 'Barlow Condensed', sans-serif;

            font-size: 18px;
            font-weight: 600;
        }


        .item-info p {
            color: #999;

            font-size: 11px;
        }


        .item-size,
        .item-quantity {
            color: #777;

            font-size: 12px;

            text-align: center;
        }


        .item-price {
            font-family: 'Barlow Condensed', sans-serif;

            font-size: 17px;
            font-weight: 600;

            text-align: right;

            white-space: nowrap;
        }



        /* =========================================
           RODAPÉ DO PEDIDO
        ========================================= */

        .order-bottom {
            min-height: 78px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 16px 25px;

            background: #fafafa;

            border-top: 1px solid #eaeaea;
        }


        .order-total-label {
            display: block;

            color: #999;

            font-size: 10px;
            font-weight: 600;

            letter-spacing: .09em;

            text-transform: uppercase;
        }


        .total {
            display: block;

            margin-top: 2px;

            font-family: 'Barlow Condensed', sans-serif;

            font-size: 24px;
            font-weight: 600;
        }



        /* =========================================
           BOTÃO VER PEDIDO
        ========================================= */

        .details {
            min-width: 125px;
            min-height: 43px;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            padding: 0 22px;

            background: #111;

            color: #fff;

            border: 1px solid #111;
            border-radius: 999px;

            text-decoration: none;

            font-size: 11px;
            font-weight: 600;

            letter-spacing: .05em;

            transition: .2s ease;
        }


        .details:hover {
            background: #fff;

            color: #111;

            transform: translateY(-1px);

            box-shadow: 0 6px 15px rgba(0,0,0,.08);
        }



        /* =========================================
           RESPONSIVO
        ========================================= */

        @media (max-width: 900px) {

            header {
                padding: 0 22px;
            }


            nav {
                display: none;
            }


            .page {
                padding: 45px 22px 70px;
            }


            h1 {
                font-size: 43px;
            }


            .item {
                grid-template-columns: 65px 1fr;
            }


            .item-size,
            .item-quantity,
            .item-price {
                grid-column: 2;

                text-align: left;
            }

        }


        @media (max-width: 600px) {

            header {
                height: 72px;
            }


            .logo {
                font-size: 26px;
            }


            .page {
                padding-top: 35px;
            }


            .order-top,
            .order-bottom {
                flex-direction: column;

                align-items: flex-start;

                gap: 13px;
            }


            .details {
                width: 100%;
            }


            .cancel-info {
                margin-left: 15px;
                margin-right: 15px;
            }


            .items {
                padding-left: 15px;
                padding-right: 15px;
            }


            .back {
                min-height: 41px;

                padding: 0 18px;
            }

        }

    </style>

</head>


<body>


<header>

    <a
        href="{{ route('home') }}"
        class="logo"
    >
        <img
            src="{{ asset('imagens/ChatGPT Image 28 de abr. de 2026, 12_48_49.png') }}"
            alt="AURA Running"
        >
    </a>


    <a
        href="{{ route('account.index') }}"
        class="account-button"
    >
        Minha conta
    </a>

</header>



<main class="page">

        <div class="page-label">

            Sua conta

        </div>


        <h1>

            Meus pedidos

        </h1>


        <p class="subtitle">

            Acompanhe suas compras, consulte os produtos adquiridos
            e veja a situação de cada pedido.

        </p>


    </div>



    @if ($orders->isEmpty())


        <div class="empty">


            <div class="empty-mark">

                A

            </div>


            <h2>

                Você ainda não fez nenhum pedido

            </h2>


            <p>

                Quando você realizar uma compra, ela aparecerá aqui.

            </p>


            <a
                href="{{ route('home') }}"
                class="shop-button"
            >

                EXPLORAR PRODUTOS

            </a>


        </div>


    @else


        <div class="orders">


            @foreach ($orders as $order)


                <div class="order">



                    {{-- =========================================
                         CABEÇALHO DO PEDIDO
                    ========================================= --}}

                    <div class="order-top">


                        <div class="order-top-left">


                            <span class="order-label">

                                Pedido

                            </span>


                            <div class="order-number">

                                #{{ $order->order_number }}

                            </div>


                            <span class="order-date">

                                {{ $order->created_at->format('d/m/Y \à\s H:i') }}

                            </span>


                        </div>


                        <span
                            class="status {{ $order->status === 'cancelado' ? 'status-cancelled' : '' }}"
                        >

                            {{ strtoupper(str_replace('_', ' ', $order->status)) }}

                        </span>


                    </div>



                    {{-- =========================================
                         CANCELAMENTO
                         SOMENTE NO PEDIDO CANCELADO
                    ========================================= --}}

                    @if($order->status === 'cancelado')


                        <div class="cancel-info">


                            <div class="cancel-icon">

                                ×

                            </div>


                            <div class="cancel-text">


                                <strong>

                                    Pedido cancelado ·

                                    {{ match($order->cancellation_reason) {

                                        'solicitacao_cliente'
                                            => 'Solicitação do cliente',

                                        'produto_indisponivel'
                                            => 'Produto indisponível',

                                        'problema_pagamento'
                                            => 'Problema no pagamento',

                                        'problema_endereco'
                                            => 'Problema no endereço',

                                        'outro'
                                            => 'Outro',

                                        default
                                            => 'Motivo não informado'

                                    } }}

                                </strong>


                                @if($order->cancellation_note)


                                    <p>

                                        {{ $order->cancellation_note }}

                                    </p>


                                @endif


                                @if($order->canceled_at)


                                    <span class="cancel-date">

                                        Cancelado em

                                        {{ \Carbon\Carbon::parse($order->canceled_at)
                                            ->format('d/m/Y \à\s H:i') }}

                                    </span>


                                @endif


                            </div>


                        </div>


                    @endif



                    {{-- =========================================
                         PRODUTOS
                    ========================================= --}}

                    <div class="items">


                        @foreach ($order->items as $item)


                            <div class="item">



                                {{-- IMAGEM --}}

                                <div class="item-image">


                                    @if(
                                        $item->product &&
                                        $item->product->image_url
                                    )


                                        <img
                                            src="{{ $item->product->image_url }}"
                                            alt="{{ $item->product->name }}"
                                        >


                                    @else


                                        <span class="no-image">

                                            Sem imagem

                                        </span>


                                    @endif


                                </div>



                                {{-- PRODUTO --}}

                                <div class="item-info">


                                    <h3>

                                        {{ optional($item->product)->name
                                            ?? 'Produto indisponível' }}

                                    </h3>


                                    <p>

                                        Valor unitário:

                                        R$ {{ number_format(
                                            $item->price,
                                            2,
                                            ',',
                                            '.'
                                        ) }}

                                    </p>


                                </div>



                                {{-- TAMANHO --}}

                                <div class="item-size">


                                    @if($item->size)

                                        Tamanho {{ $item->size }}

                                    @else

                                        —

                                    @endif


                                </div>



                                {{-- QUANTIDADE --}}

                                <div class="item-quantity">

                                    {{ $item->quantity }} un.

                                </div>



                                {{-- VALOR --}}

                                <strong class="item-price">

                                    R$ {{ number_format(
                                        $item->price * $item->quantity,
                                        2,
                                        ',',
                                        '.'
                                    ) }}

                                </strong>


                            </div>


                        @endforeach


                    </div>



                    {{-- =========================================
                         TOTAL E BOTÃO
                    ========================================= --}}

                    <div class="order-bottom">


                        <div>


                            <span class="order-total-label">

                                Total do pedido

                            </span>


                            <strong class="total">

                                R$ {{ number_format(
                                    $order->total,
                                    2,
                                    ',',
                                    '.'
                                ) }}

                            </strong>


                        </div>


                        <a
                            href="{{ route('orders.show', $order->id) }}"
                            class="details"
                        >

                            VER PEDIDO

                        </a>


                    </div>


                </div>


            @endforeach


        </div>


    @endif


</main>


</body>

</html>