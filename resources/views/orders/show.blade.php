<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    @include(
        'partials.page-meta',
        ['pageTitle' => 'Pedido ' . $order->order_number]
    )


    <style>

        @import url('https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@400;500;600;700&family=Barlow:wght@400;500;600&display=swap');


        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        body {
            background: #f6f6f6;
            color: #111;

            font-family: 'Barlow', sans-serif;
        }



        /* ==============================
           HEADER
        ============================== */

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
            object-fit: contain;
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
        }



        /* ==============================
           PÁGINA
        ============================== */

        .page {
            width: 100%;
            max-width: 1180px;

            margin: 0 auto;

            padding: 45px 30px 80px;
        }


        .back {
            display: inline-flex;

            margin-bottom: 26px;

            color: #666;

            text-decoration: none;

            font-size: 12px;
            font-weight: 500;
        }


        .back:hover {
            color: #111;
        }



        /* ==============================
           TÍTULO
        ============================== */

        .page-label {
            display: block;

            margin-bottom: 7px;

            color: #999;

            font-size: 10px;
            font-weight: 600;

            letter-spacing: .14em;

            text-transform: uppercase;
        }


        .title-row {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;

            gap: 20px;

            margin-bottom: 30px;
        }


        h1 {
            font-family: 'Barlow Condensed', sans-serif;

            font-size: 48px;
            font-weight: 600;

            line-height: 1;
        }


        .date {
            margin-top: 10px;

            color: #777;

            font-size: 13px;
        }



        /* ==============================
           STATUS
        ============================== */

        .status-badge {
            min-height: 36px;

            display: inline-flex;
            align-items: center;

            padding: 0 16px;

            background: #111;
            color: #fff;

            border-radius: 999px;

            font-size: 10px;
            font-weight: 600;

            letter-spacing: .05em;

            text-transform: uppercase;
        }


        .status-badge.cancelado {
            background: #a72e2e;
        }


        .status-badge.entregue {
            background: #26733c;
        }



        /* ==============================
           GRID PRINCIPAL
        ============================== */

        .content-grid {
            display: grid;

            grid-template-columns:
                minmax(0, 1fr)
                320px;

            gap: 24px;

            align-items: start;
        }



        /* ==============================
           CARDS
        ============================== */

        .card {
            overflow: hidden;

            background: #fff;

            border: 1px solid #e3e3e3;
            border-radius: 9px;
        }


        .card + .card {
            margin-top: 20px;
        }


        .card-header {
            padding: 20px 24px;

            background: #fafafa;

            border-bottom: 1px solid #e8e8e8;
        }


        .card-header small {
            display: block;

            margin-bottom: 4px;

            color: #999;

            font-size: 9px;
            font-weight: 600;

            letter-spacing: .11em;

            text-transform: uppercase;
        }


        .card-header h2 {
            font-family: 'Barlow Condensed', sans-serif;

            font-size: 25px;
            font-weight: 600;
        }


        .card-body {
            padding: 24px;
        }



        /* ==============================
           PROGRESSO
        ============================== */

        .progress {
            display: grid;

            grid-template-columns: repeat(4, 1fr);

            position: relative;

            gap: 8px;
        }


        .progress::before {
            content: '';

            position: absolute;

            top: 17px;
            left: 12.5%;
            right: 12.5%;

            height: 2px;

            background: #e4e4e4;

            z-index: 0;
        }


        .step {
            position: relative;
            z-index: 1;

            text-align: center;
        }


        .step-circle {
            width: 36px;
            height: 36px;

            display: flex;
            align-items: center;
            justify-content: center;

            margin: 0 auto 10px;

            background: #eee;
            color: #777;

            border-radius: 50%;

            font-size: 11px;
            font-weight: 600;
        }


        .step.active .step-circle {
            background: #111;
            color: #fff;
        }


        .step.done .step-circle {
            background: #111;
            color: #fff;
        }


        .step span {
            display: block;

            color: #777;

            font-size: 10px;

            line-height: 1.3;
        }


        .step.active span,
        .step.done span {
            color: #111;

            font-weight: 600;
        }



        /* ==============================
           PRODUTOS
        ============================== */

        .order-item {
            display: grid;

            grid-template-columns: 105px 1fr auto;

            gap: 18px;

            align-items: center;

            padding: 20px 0;

            border-bottom: 1px solid #eee;
        }


        .order-item:first-child {
            padding-top: 0;
        }


        .order-item:last-child {
            padding-bottom: 0;

            border-bottom: none;
        }


        .item-image {
            width: 105px;
            height: 105px;

            display: flex;
            align-items: center;
            justify-content: center;

            overflow: hidden;

            background: #f1f1f1;

            border-radius: 7px;
        }


        .item-image img {
            width: 100%;
            height: 100%;

            display: block;

            object-fit: contain;
        }


        .no-image {
            color: #999;

            font-size: 10px;

            text-align: center;
        }


        .item-info h3 {
            margin-bottom: 7px;

            font-family: 'Barlow Condensed', sans-serif;

            font-size: 21px;
            font-weight: 600;
        }


        .item-info p {
            margin-top: 4px;

            color: #777;

            font-size: 12px;
        }


        .item-price {
            text-align: right;

            font-family: 'Barlow Condensed', sans-serif;

            font-size: 19px;
            font-weight: 600;

            white-space: nowrap;
        }



        /* ==============================
           RESUMO
        ============================== */

        .summary {
            position: sticky;

            top: 20px;
        }


        .summary-line {
            display: flex;
            justify-content: space-between;

            gap: 15px;

            padding: 13px 0;

            border-bottom: 1px solid #eee;

            font-size: 12px;
        }


        .summary-line span:first-child {
            color: #777;
        }


        .summary-line strong {
            text-align: right;

            font-weight: 600;
        }


        .summary-total {
            display: flex;
            justify-content: space-between;

            gap: 15px;

            padding-top: 20px;

            font-family: 'Barlow Condensed', sans-serif;

            font-size: 23px;
            font-weight: 600;
        }



        /* ==============================
           RASTREAMENTO
        ============================== */

        .tracking-box {
            margin-top: 18px;

            padding: 16px;

            background: #fafafa;

            border: 1px solid #ededed;
            border-radius: 7px;
        }


        .tracking-box small {
            display: block;

            margin-bottom: 5px;

            color: #999;

            font-size: 9px;
            font-weight: 600;

            letter-spacing: .09em;

            text-transform: uppercase;
        }


        .tracking-box strong {
            font-size: 13px;
        }



        /* ==============================
           CANCELADO
        ============================== */

        .cancel-box {
            margin-bottom: 20px;

            padding: 18px 20px;

            background: #fff2f2;

            color: #8f2a2a;

            border: 1px solid #efd2d2;
            border-radius: 8px;
        }


        .cancel-box strong {
            display: block;

            margin-bottom: 5px;
        }


        .cancel-box p {
            font-size: 12px;

            line-height: 1.5;
        }



        /* ==============================
           BOTÕES
        ============================== */

        .actions {
            margin-top: 20px;

            display: flex;
            flex-direction: column;

            gap: 10px;
        }


        .button {
            min-height: 43px;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 0 18px;

            background: #111;
            color: #fff;

            border: 1px solid #111;
            border-radius: 999px;

            text-decoration: none;

            font-size: 10px;
            font-weight: 600;
        }


        .button.secondary {
            background: #fff;
            color: #111;
        }


        .button:hover {
            opacity: .8;
        }



        /* ==============================
           RESPONSIVO
        ============================== */

        @media(max-width: 850px) {

            header {
                padding: 0 22px;
            }


            .content-grid {
                grid-template-columns: 1fr;
            }


            .summary {
                position: static;
            }


            .title-row {
                align-items: flex-start;
                flex-direction: column;
            }

        }


        @media(max-width: 600px) {

            header {
                height: 72px;

                padding: 0 16px;
            }


            .logo img {
                width: 90px;
            }


            .page {
                padding: 32px 16px 60px;
            }


            h1 {
                font-size: 38px;
            }


            .progress {
                grid-template-columns: 1fr 1fr;

                gap: 25px 10px;
            }


            .progress::before {
                display: none;
            }


            .order-item {
                grid-template-columns: 80px 1fr;
            }


            .item-image {
                width: 80px;
                height: 80px;
            }


            .item-price {
                grid-column: 2;

                text-align: left;
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



@php

    $statusLabels = [
        'pedido_realizado' => 'Pedido realizado',
        'em_preparacao' => 'Em preparação',
        'enviado' => 'Enviado',
        'entregue' => 'Entregue',
        'cancelado' => 'Cancelado',
    ];


    $paymentLabels = [
        'pendente' => 'Pendente',
        'pago' => 'Pago',
        'recusado' => 'Recusado',
        'cancelado' => 'Cancelado',
        'reembolsado' => 'Reembolsado',
    ];


    $steps = [
        'pedido_realizado',
        'em_preparacao',
        'enviado',
        'entregue',
    ];


    $currentStep = array_search(
        $order->status,
        $steps
    );


    if ($currentStep === false) {
        $currentStep = 0;
    }

@endphp



<main class="page">


    <a
        href="{{ route('orders.index') }}"
        class="back"
    >
        ← Voltar para meus pedidos
    </a>



    <div class="title-row">


        <div>

            <span class="page-label">
                Detalhes do pedido
            </span>


            <h1>
                Pedido #{{ $order->order_number }}
            </h1>


            <p class="date">

                Realizado em

                {{ $order->created_at->format('d/m/Y') }}

                às

                {{ $order->created_at->format('H:i') }}

            </p>

        </div>


        <span
            class="status-badge {{ $order->status }}"
        >

            {{ $statusLabels[$order->status]
                ?? ucfirst(
                    str_replace('_', ' ', $order->status)
                )
            }}

        </span>


    </div>



    @if($order->status === 'cancelado')

        <div class="cancel-box">

            <strong>
                Este pedido foi cancelado.
            </strong>


            @if($order->cancellation_reason)

                <p>
                    Motivo:
                    {{ $order->cancellation_reason }}
                </p>

            @endif


            @if($order->cancellation_note)

                <p>
                    {{ $order->cancellation_note }}
                </p>

            @endif

        </div>

    @endif



    <div class="content-grid">


        <section>


            {{-- ACOMPANHAMENTO --}}

            @if($order->status !== 'cancelado')

                <div class="card">


                    <div class="card-header">

                        <small>
                            Acompanhamento
                        </small>

                        <h2>
                            Status do pedido
                        </h2>

                    </div>


                    <div class="card-body">


                        <div class="progress">


                            @foreach($steps as $index => $step)

                                <div
                                    class="step
                                    {{ $index < $currentStep ? 'done' : '' }}
                                    {{ $index === $currentStep ? 'active' : '' }}"
                                >

                                    <div class="step-circle">
                                        {{ $index + 1 }}
                                    </div>


                                    <span>
                                        {{ $statusLabels[$step] }}
                                    </span>

                                </div>

                            @endforeach


                        </div>


                    </div>

                </div>

            @endif



            {{-- PRODUTOS --}}

            <div class="card">


                <div class="card-header">

                    <small>
                        Itens da compra
                    </small>

                    <h2>
                        Produtos
                    </h2>

                </div>


                <div class="card-body">


                    @foreach($order->items as $item)


                        <div class="order-item">


                            <div class="item-image">


                                @if(
                                    $item->product
                                    && $item->product->image_url
                                )

                                    <img
                                        src="{{ $item->product->image_url }}"
                                        alt="{{ $item->product->name }}"
                                    >

                                @else

                                    <span class="no-image">
                                        Imagem indisponível
                                    </span>

                                @endif


                            </div>



                            <div class="item-info">


                                <h3>

                                    {{ $item->product->name
                                        ?? 'Produto indisponível'
                                    }}

                                </h3>


                                <p>
                                    Tamanho:
                                    <strong>
                                        {{ $item->size }}
                                    </strong>
                                </p>


                                <p>
                                    Quantidade:
                                    <strong>
                                        {{ $item->quantity }}
                                    </strong>
                                </p>


                                <p>

                                    Valor unitário:

                                    R$
                                    {{ number_format(
                                        $item->price,
                                        2,
                                        ',',
                                        '.'
                                    ) }}

                                </p>


                            </div>



                            <div class="item-price">

                                R$

                                {{ number_format(
                                    $item->price
                                    * $item->quantity,
                                    2,
                                    ',',
                                    '.'
                                ) }}

                            </div>


                        </div>


                    @endforeach


                </div>

            </div>


        </section>



        {{-- RESUMO --}}

        <aside>


            <div class="card summary">


                <div class="card-header">

                    <small>
                        Compra
                    </small>

                    <h2>
                        Resumo do pedido
                    </h2>

                </div>


                <div class="card-body">


                    <div class="summary-line">

                        <span>
                            Número
                        </span>

                        <strong>
                            #{{ $order->order_number }}
                        </strong>

                    </div>



                    <div class="summary-line">

                        <span>
                            Status
                        </span>

                        <strong>

                            {{ $statusLabels[$order->status]
                                ?? ucfirst(
                                    str_replace(
                                        '_',
                                        ' ',
                                        $order->status
                                    )
                                )
                            }}

                        </strong>

                    </div>



                    <div class="summary-line">

                        <span>
                            Pagamento
                        </span>

                        <strong>

                            {{ $paymentLabels[$order->payment_status]
                                ?? ucfirst(
                                    $order->payment_status
                                )
                            }}

                        </strong>

                    </div>



                    <div class="summary-line">

                        <span>
                            Itens
                        </span>

                        <strong>

                            {{ $order->items->sum('quantity') }}

                        </strong>

                    </div>



                    @if($order->tracking_code)

                        <div class="tracking-box">

                            <small>
                                Código de rastreamento
                            </small>

                            <strong>
                                {{ $order->tracking_code }}
                            </strong>

                        </div>

                    @endif



                    <div class="summary-total">

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



                    <div class="actions">


                        <a
                            href="{{ route('orders.index') }}"
                            class="button"
                        >
                            MEUS PEDIDOS
                        </a>


                        @if($order->status !== 'cancelado')

                            <a
                                href="{{ route('orders.tracking') }}"
                                class="button secondary"
                            >
                                ACOMPANHAR ENTREGA
                            </a>

                        @endif


                    </div>


                </div>

            </div>


        </aside>


    </div>


</main>


</body>

</html>