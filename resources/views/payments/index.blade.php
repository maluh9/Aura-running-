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
        ['pageTitle' => 'Pagamentos']
    )

    <style>

        @import url('https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@400;500;600;700&family=Barlow:wght@400;500;600&display=swap');


        * {
            box-sizing: border-box;
        }


        body {
            margin: 0;

            background: #f6f6f6;

            font-family: 'Barlow', sans-serif;

            color: #111;
        }


        header {
            height: 82px;

            padding: 0 55px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            background: #fff;

            border-bottom: 1px solid #e8e8e8;
        }


        .logo img {
            width: 105px;

            display: block;
        }


        .back {
            padding: 13px 21px;

            border: 1px solid #ddd;
            border-radius: 999px;

            color: #111;

            text-decoration: none;

            font-size: 12px;
            font-weight: 600;
        }


        .page {
            max-width: 1100px;

            margin: 0 auto;

            padding: 38px 25px 65px;
        }


        .label {
            color: #999;

            font-size: 10px;
            font-weight: 600;

            text-transform: uppercase;

            letter-spacing: .14em;
        }


        h1 {
            margin: 5px 0 10px;

            font-family: 'Barlow Condensed', sans-serif;

            font-size: 52px;
        }


        .subtitle {
            margin-bottom: 30px;

            color: #777;
        }


        .payments {
            display: flex;
            flex-direction: column;

            gap: 14px;
        }


        .payment {
            padding: 20px 22px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 20px;

            background: #fff;

            border: 1px solid #e4e4e4;

            border-radius: 8px;
        }


        .payment small {
            display: block;

            color: #999;

            font-size: 10px;
        }


        .payment strong {
            display: block;

            margin-top: 4px;

            font-family: 'Barlow Condensed', sans-serif;

            font-size: 20px;
        }


        .actions {
            text-align: right;
        }


        .status {
            display: block;

            margin-bottom: 8px;

            font-size: 11px;

            text-transform: uppercase;
        }


        .button {
            display: inline-flex;

            padding: 11px 17px;

            background: #111;

            color: #fff;

            border-radius: 999px;

            text-decoration: none;

            font-size: 10px;
            font-weight: 600;
        }


        @media(max-width: 650px) {

            header {
                padding: 0 16px;
            }


            .payment {
                align-items: flex-start;

                flex-direction: column;
            }


            .actions {
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
            alt="AURA"
        >

    </a>


    <a
        href="{{ route('account.index') }}"
        class="back"
    >
        Voltar para minha conta
    </a>

</header>



<main class="page">


    <span class="label">
        Sua conta
    </span>


    <h1>
        Pagamentos
    </h1>


    <p class="subtitle">

        Consulte seus pagamentos e conclua
        pedidos que ainda estão pendentes.

    </p>



    <div class="payments">


        @forelse($orders as $order)


            <article class="payment">


                <div>

                    <small>
                        Pedido
                    </small>


                    <strong>
                        #{{ $order->order_number }}
                    </strong>


                    <small>

                        R$
                        {{ number_format(
                            $order->total,
                            2,
                            ',',
                            '.'
                        ) }}

                    </small>

                </div>



                <div class="actions">


                    <span class="status">

                        {{ strtoupper(
                            $order->payment_status
                            ?? 'pendente'
                        ) }}

                    </span>


                    @if($order->payment_status === 'pago')


                        <a
                            href="{{ route('payments.status', $order) }}"
                            class="button"
                        >
                            Ver pagamento
                        </a>


                    @elseif($order->payment_id)


                        <a
                            href="{{ route('payments.status', $order) }}"
                            class="button"
                        >
                            Ver / continuar pagamento
                        </a>


                    @else


                        <a
                            href="{{ route('payments.checkout', $order) }}"
                            class="button"
                        >
                            Pagar agora
                        </a>


                    @endif


                </div>


            </article>


        @empty


            <p>
                Nenhum pagamento encontrado.
            </p>


        @endforelse


    </div>


</main>


</body>

</html>