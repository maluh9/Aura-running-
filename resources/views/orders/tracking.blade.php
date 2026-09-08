<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    @include('partials.page-meta', ['pageTitle' => 'Acompanhar entrega'])

    <style>

        @import url('https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@400;500;600;700&family=Barlow:wght@400;500;600&display=swap');


        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        body {
            font-family: 'Barlow', sans-serif;

            background: #f6f6f6;

            color: #111;
        }


        /* =========================================
           HEADER
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


        .logo {
            display: flex;
            align-items: center;

            text-decoration: none;
        }


        .logo img {
            width: 105px;
            height: auto;

            display: block;
        }


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

            transition: .2s ease;
        }


        .account-button:hover {
            background: #111;
            color: #fff;

            border-color: #111;

            transform: translateY(-1px);
        }


        /* =========================================
           PÁGINA
        ========================================= */

        .page {
            width: 100%;

            max-width: 1260px;

            margin: 0 auto;

            padding: 38px 30px 70px;
        }


        .page-label {
            margin-bottom: 5px;

            color: #999;

            font-size: 10px;
            font-weight: 600;

            letter-spacing: .15em;

            text-transform: uppercase;
        }


        h1 {
            font-family: 'Barlow Condensed', sans-serif;

            font-size: 52px;
            font-weight: 600;

            line-height: .95;

            letter-spacing: -.02em;
        }


        .subtitle {
            max-width: 620px;

            margin-top: 10px;
            margin-bottom: 30px;

            color: #777;

            font-size: 15px;

            line-height: 1.5;
        }


        /* =========================================
           PEDIDOS
        ========================================= */

        .tracking-list {
            display: flex;
            flex-direction: column;

            gap: 22px;
        }


        .tracking-card {
            background: #fff;

            border: 1px solid #e3e3e3;

            border-radius: 10px;

            overflow: hidden;
        }


        .tracking-header {
            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 20px;

            padding: 20px 24px;

            background: #fafafa;

            border-bottom: 1px solid #ececec;
        }


        .tracking-header small {
            display: block;

            margin-bottom: 4px;

            color: #999;

            font-size: 10px;
            font-weight: 600;

            letter-spacing: .10em;

            text-transform: uppercase;
        }


        .tracking-header strong {
            font-family: 'Barlow Condensed', sans-serif;

            font-size: 20px;
            font-weight: 600;
        }


        .paid-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;

            min-height: 31px;

            padding: 0 13px;

            background: #edf7ef;

            color: #28733c;

            border-radius: 999px;

            font-size: 10px;
            font-weight: 600;

            text-transform: uppercase;

            letter-spacing: .06em;
        }


        /* =========================================
           PROGRESSO
        ========================================= */

        .tracking-body {
            padding: 28px 24px;
        }


        .progress-wrapper {
            width: 100%;

            margin-bottom: 28px;
        }


        .progress {
            display: grid;

            grid-template-columns: repeat(4, 1fr);

            position: relative;

            padding-top: 6px;
        }


        .progress::before {
            content: '';

            position: absolute;

            top: 21px;
            left: 12.5%;
            right: 12.5%;

            height: 2px;

            background: #e2e2e2;

            z-index: 0;
        }


        .step {
            position: relative;

            z-index: 1;

            display: flex;
            flex-direction: column;
            align-items: center;

            text-align: center;
        }


        .step-circle {
            width: 32px;
            height: 32px;

            display: flex;
            align-items: center;
            justify-content: center;

            margin-bottom: 9px;

            background: #fff;

            border: 2px solid #d7d7d7;

            border-radius: 50%;

            color: #aaa;

            font-family: 'Barlow Condensed', sans-serif;

            font-size: 14px;
            font-weight: 600;
        }


        .step.active .step-circle,
        .step.completed .step-circle {
            background: #111;

            color: #fff;

            border-color: #111;
        }


        .step span {
            color: #999;

            font-size: 11px;

            line-height: 1.3;
        }


        .step.active span,
        .step.completed span {
            color: #111;

            font-weight: 600;
        }


        /* =========================================
           DETALHES
        ========================================= */

        .tracking-info-grid {
            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 16px;

            margin-bottom: 25px;
        }


        .info-box {
            padding: 16px 18px;

            background: #fafafa;

            border: 1px solid #ededed;

            border-radius: 7px;
        }


        .info-box small {
            display: block;

            margin-bottom: 5px;

            color: #999;

            font-size: 10px;
            font-weight: 600;

            letter-spacing: .08em;

            text-transform: uppercase;
        }


        .info-box strong {
            font-size: 14px;
            font-weight: 500;

            word-break: break-word;
        }


        /* =========================================
           PRODUTOS
        ========================================= */

        .products-title {
            margin-bottom: 12px;

            font-family: 'Barlow Condensed', sans-serif;

            font-size: 20px;
            font-weight: 600;
        }


        .tracking-products {
            border-top: 1px solid #eee;
        }


        .tracking-product {
            display: flex;
            align-items: center;

            gap: 15px;

            padding: 14px 0;

            border-bottom: 1px solid #eee;
        }


        .tracking-product:last-child {
            border-bottom: none;
        }


        .tracking-product-image {
            width: 62px;
            height: 62px;

            flex-shrink: 0;

            background: #f3f3f3;

            overflow: hidden;

            border-radius: 5px;
        }


        .tracking-product-image img {
            width: 100%;
            height: 100%;

            object-fit: contain;
        }


        .tracking-product-info {
            flex: 1;
        }


        .tracking-product-info strong {
            display: block;

            margin-bottom: 4px;

            font-family: 'Barlow Condensed', sans-serif;

            font-size: 17px;
            font-weight: 600;
        }


        .tracking-product-info span {
            color: #888;

            font-size: 12px;
        }


        /* =========================================
           VAZIO
        ========================================= */

        .empty {
            padding: 65px 30px;

            background: #fff;

            border: 1px solid #e3e3e3;

            border-radius: 10px;

            text-align: center;
        }


        .empty-icon {
            width: 54px;
            height: 54px;

            margin: 0 auto 16px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #111;
            color: #fff;

            border-radius: 50%;

            font-size: 23px;
        }


        .empty h2 {
            margin-bottom: 7px;

            font-family: 'Barlow Condensed', sans-serif;

            font-size: 26px;
            font-weight: 600;
        }


        .empty p {
            color: #777;

            font-size: 14px;
        }


        /* =========================================
           RESPONSIVO
        ========================================= */

        @media(max-width: 750px) {

            header {
                height: 72px;

                padding: 0 16px;
            }


            .logo img {
                width: 88px;
            }


            .account-button {
                min-height: 38px;

                padding: 0 14px;

                font-size: 10px;
            }


            .page {
                padding: 28px 16px 50px;
            }


            h1 {
                font-size: 42px;
            }


            .tracking-header {
                align-items: flex-start;

                flex-direction: column;
            }


            .progress {
                overflow-x: auto;
            }


            .step span {
                font-size: 9px;
            }


            .tracking-info-grid {
                grid-template-columns: 1fr;
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

        Acompanhar entrega

    </h1>


    <p class="subtitle">

        Consulte o andamento das compras com pagamento confirmado
        e acompanhe cada etapa até a entrega.

    </p>



    @if($orders->isEmpty())


        <div class="empty">


            <div class="empty-icon">
                ✓
            </div>


            <h2>

                Nenhuma entrega em andamento

            </h2>


            <p>

                Assim que o pagamento de um pedido for confirmado,
                você poderá acompanhar a entrega por aqui.

            </p>


        </div>


    @else


        <div class="tracking-list">


            @foreach($orders as $order)


                @php

                    /*
                    |--------------------------------------------------------------------------
                    | NÍVEL DO PROGRESSO
                    |--------------------------------------------------------------------------
                    */

                    $progressLevel = match($order->status) {

                        'pedido_realizado' => 1,

                        'em_preparacao' => 2,

                        'enviado' => 3,

                        'entregue' => 4,

                        default => 1,

                    };

                @endphp



                <article class="tracking-card">


                    {{-- CABEÇALHO DO PEDIDO --}}

                    <div class="tracking-header">


                        <div>

                            <small>
                                Pedido
                            </small>

                            <strong>

                                #{{ $order->order_number }}

                            </strong>

                        </div>


                        <span class="paid-badge">

                            Pagamento confirmado

                        </span>


                    </div>



                    <div class="tracking-body">


                        {{-- PROGRESSO --}}

                        <div class="progress-wrapper">


                            <div class="progress">


                                <div
                                    class="step {{ $progressLevel >= 1 ? 'completed' : '' }}"
                                >

                                    <div class="step-circle">
                                        1
                                    </div>

                                    <span>
                                        Pedido<br>
                                        realizado
                                    </span>

                                </div>



                                <div
                                    class="step {{ $progressLevel >= 2 ? 'completed' : '' }}"
                                >

                                    <div class="step-circle">
                                        2
                                    </div>

                                    <span>
                                        Em<br>
                                        preparação
                                    </span>

                                </div>



                                <div
                                    class="step {{ $progressLevel >= 3 ? 'completed' : '' }}"
                                >

                                    <div class="step-circle">
                                        3
                                    </div>

                                    <span>
                                        Pedido<br>
                                        enviado
                                    </span>

                                </div>



                                <div
                                    class="step {{ $progressLevel >= 4 ? 'completed' : '' }}"
                                >

                                    <div class="step-circle">
                                        4
                                    </div>

                                    <span>
                                        Pedido<br>
                                        entregue
                                    </span>

                                </div>


                            </div>


                        </div>



                        {{-- DETALHES --}}

                        <div class="tracking-info-grid">


                            <div class="info-box">

                                <small>
                                    Situação atual
                                </small>

                                <strong>

                                    {{ ucwords(
                                        str_replace(
                                            '_',
                                            ' ',
                                            $order->status
                                        )
                                    ) }}

                                </strong>

                            </div>



                            <div class="info-box">

                                <small>
                                    Código de rastreio
                                </small>

                                <strong>

                                    {{ $order->tracking_code
                                        ?: 'Aguardando código de rastreio'
                                    }}

                                </strong>

                            </div>


                        </div>



                        {{-- PRODUTOS --}}

                        <div class="products-title">

                            Produtos deste pedido

                        </div>


                        <div class="tracking-products">


                            @foreach($order->items as $item)


                                <div class="tracking-product">


                                    <div class="tracking-product-image">


                                        @if($item->product)


                                            <img
                                                src="{{ $item->product->image_url }}"
                                                alt="{{ $item->product->name }}"
                                            >


                                        @endif


                                    </div>



                                    <div class="tracking-product-info">


                                        <strong>

                                            {{ optional($item->product)->name
                                                ?? 'Produto'
                                            }}

                                        </strong>


                                        <span>

                                            Quantidade:
                                            {{ $item->quantity }}

                                            @if($item->size)

                                                • Tamanho:
                                                {{ $item->size }}

                                            @endif

                                        </span>


                                    </div>


                                </div>


                            @endforeach


                        </div>


                    </div>


                </article>


            @endforeach


        </div>


    @endif


</main>


</body>

</html>