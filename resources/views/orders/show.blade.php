<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pedido #{{ $order->order_number }} | AURA Running</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #fff;
            color: #111;
        }

        /* HEADER */

        header {
            height: 80px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 0 50px;

            border-bottom: 1px solid #eee;
        }

        .logo {
            color: #111;
            text-decoration: none;

            font-size: 25px;
            font-weight: 800;

            letter-spacing: 3px;
        }

        nav {
            display: flex;
            gap: 35px;
        }

        nav a {
            color: #111;
            text-decoration: none;

            font-size: 14px;
        }

        nav a:hover {
            opacity: .5;
        }

        .header-icons {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .header-icons a {
            text-decoration: none;
            color: #111;
        }

        .user-profile {
            width: 38px;
            height: 38px;

            border-radius: 50%;

            background: #111;
            color: white !important;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 14px;
            font-weight: bold;
        }

        .cart-icon {
            font-size: 20px;
        }


        /* PÁGINA */

        .page {
            max-width: 1100px;

            margin: auto;

            padding: 60px 40px;
        }

        .back {
            display: inline-block;

            margin-bottom: 30px;

            color: #555;

            text-decoration: none;

            font-size: 14px;
        }

        .back:hover {
            color: #111;
        }

        h1 {
            font-size: 38px;

            margin-bottom: 10px;
        }

        .order-date {
            color: #666;

            margin-bottom: 45px;
        }


        /* STATUS */

        .tracking {
            border: 1px solid #eee;

            padding: 30px;

            margin-bottom: 35px;
        }

        .tracking h2 {
            font-size: 20px;

            margin-bottom: 30px;
        }

        .steps {
            display: grid;

            grid-template-columns: repeat(4, 1fr);

            gap: 15px;
        }

        .step {
            text-align: center;

            position: relative;
        }

        .circle {
            width: 38px;
            height: 38px;

            margin: 0 auto 12px;

            border-radius: 50%;

            background: #eee;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 14px;
            font-weight: bold;
        }

        .step.active .circle {
            background: #111;

            color: white;
        }

        .step span {
            font-size: 12px;

            color: #777;
        }

        .step.active span {
            color: #111;

            font-weight: bold;
        }


        /* PRODUTOS */

        .box {
            border: 1px solid #eee;

            padding: 30px;

            margin-bottom: 25px;
        }

        .box h2 {
            font-size: 20px;

            margin-bottom: 25px;
        }

        .item {
            display: flex;

            align-items: center;

            gap: 20px;

            padding: 20px 0;

            border-bottom: 1px solid #eee;
        }

        .item:last-child {
            border-bottom: none;
        }

        .item img {
            width: 100px;
            height: 100px;

            object-fit: contain;

            background: #f5f5f5;
        }

        .item-info {
            flex: 1;
        }

        .item-info h3 {
            font-size: 17px;

            margin-bottom: 8px;
        }

        .item-info p {
            color: #666;

            font-size: 13px;

            margin-bottom: 5px;
        }

        .item-price {
            font-weight: bold;
        }


        /* TOTAL */

        .summary {
            display: flex;

            flex-direction: column;

            gap: 12px;
        }

        .summary-line {
            display: flex;

            justify-content: space-between;

            font-size: 14px;
        }

        .summary-line.total {
            border-top: 1px solid #eee;

            padding-top: 18px;

            margin-top: 8px;

            font-size: 19px;

            font-weight: bold;
        }


        /* PAGAMENTO */

        .payment {
            color: #555;

            font-size: 14px;
        }


        /* RASTREAMENTO */

        .tracking-code {
            background: #f5f5f5;

            padding: 15px;

            margin-top: 15px;

            font-weight: bold;

            letter-spacing: 1px;
        }


        /* RESPONSIVO */

        @media (max-width: 800px) {

            header {
                padding: 0 20px;
            }

            nav {
                display: none;
            }

            .page {
                padding: 40px 20px;
            }

            h1 {
                font-size: 30px;
            }

            .steps {
                grid-template-columns: 1fr 1fr;

                row-gap: 25px;
            }

            .item {
                align-items: flex-start;
            }

            .item img {
                width: 75px;
                height: 75px;
            }

        }

    </style>

</head>


<body>


<!-- HEADER -->

<header>

    <a href="{{ url('/') }}" class="logo">
        AURA
    </a>


    <nav>

        <a href="{{ url('/') }}">
            TÊNIS
        </a>

        <a href="{{ url('/') }}">
            ROUPAS
        </a>

        <a href="{{ url('/') }}">
            ACESSÓRIOS
        </a>

    </nav>


    <div class="header-icons">

        <a
            href="{{ route('account.index') }}"
            class="user-profile"
        >

            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

        </a>


        <a
            href="{{ route('cart.index') }}"
            class="cart-icon"
        >

            🛒

        </a>

    </div>

</header>



<!-- CONTEÚDO -->

<main class="page">


    <a
        href="{{ route('orders.index') }}"
        class="back"
    >

        ← Voltar para meus pedidos

    </a>


    <h1>

        Pedido #{{ $order->order_number }}

    </h1>


    <p class="order-date">

        Pedido realizado em
        {{ $order->created_at->format('d/m/Y H:i') }}

    </p>



    <!-- ACOMPANHAMENTO -->

    <div class="tracking">

        <h2>
            Acompanhe seu pedido
        </h2>


        @php

            $statuses = [
                'pedido_realizado',
                'pagamento_aprovado',
                'preparando_pedido',
                'enviado',
                'entregue'
            ];

            $currentStatus = array_search(
                $order->status,
                $statuses
            );

            if ($currentStatus === false) {
                $currentStatus = 0;
            }

        @endphp


        <div class="steps">

            @foreach ($statuses as $index => $status)

                <div
                    class="step {{ $index <= $currentStatus ? 'active' : '' }}"
                >

                    <div class="circle">

                        {{ $index + 1 }}

                    </div>


                    <span>

                        {{ str_replace('_', ' ', $status) }}

                    </span>

                </div>

            @endforeach

        </div>

    </div>



    <!-- PRODUTOS -->

    <div class="box">

        <h2>
            Produtos
        </h2>


        @foreach ($order->items as $item)

            <div class="item">


                <img
                    src="{{ asset('storage/' . $item->product->image) }}"
                    alt="{{ $item->product->name }}"
                >


                <div class="item-info">

                    <h3>

                        {{ $item->product->name }}

                    </h3>


                    <p>

                        Tamanho:
                        {{ $item->size }}

                    </p>


                    <p>

                        Quantidade:
                        {{ $item->quantity }}

                    </p>

                </div>


                <div class="item-price">

                    R$
                    {{ number_format(
                        $item->price * $item->quantity,
                        2,
                        ',',
                        '.'
                    ) }}

                </div>


            </div>

        @endforeach

    </div>



    <!-- PAGAMENTO -->

    <div class="box">

        <h2>
            Pagamento
        </h2>


        <p class="payment">

            Status:

            <strong>

                {{ str_replace(
                    '_',
                    ' ',
                    $order->payment_status
                ) }}

            </strong>

        </p>

    </div>



    <!-- RASTREAMENTO -->

    <div class="box">

        <h2>
            Entrega
        </h2>


        @if ($order->tracking_code)

            <p>
                Código de rastreamento:
            </p>


            <div class="tracking-code">

                {{ $order->tracking_code }}

            </div>

        @else

            <p class="payment">

                O código de rastreamento estará disponível
                quando o pedido for enviado.

            </p>

        @endif

    </div>



    <!-- RESUMO -->

    <div class="box">

        <h2>
            Resumo do pedido
        </h2>


        <div class="summary">

            <div class="summary-line">

                <span>
                    Produtos
                </span>

                <span>
                    R$
                    {{ number_format(
                        $order->total,
                        2,
                        ',',
                        '.'
                    ) }}
                </span>

            </div>


            <div class="summary-line">

                <span>
                    Frete
                </span>

                <span>
                    Grátis
                </span>

            </div>


            <div class="summary-line total">

                <span>
                    Total
                </span>

                <span>

                    R$
                    {{ number_format(
                        $order->total,
                        2,
                        ',',
                        '.'
                    ) }}

                </span>

            </div>

        </div>

    </div>


</main>


</body>

</html>
