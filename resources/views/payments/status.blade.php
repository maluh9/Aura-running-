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
        ['pageTitle' => 'Status do pagamento']
    )

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
            min-height: 42px;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            padding: 0 21px;

            border: 1px solid #ddd;
            border-radius: 999px;

            color: #111;

            text-decoration: none;

            font-size: 12px;
            font-weight: 600;
        }


        .page {
            width: 100%;
            max-width: 820px;

            margin: 0 auto;

            padding: 45px 20px 70px;
        }


        .card {
            padding: 35px;

            background: #fff;

            border: 1px solid #e4e4e4;

            border-radius: 10px;
        }


        .label {
            color: #999;

            font-size: 10px;
            font-weight: 600;

            text-transform: uppercase;

            letter-spacing: .12em;
        }


        h1 {
            margin: 7px 0 12px;

            font-family: 'Barlow Condensed', sans-serif;

            font-size: 44px;
        }


        .status-text {
            color: #777;

            line-height: 1.5;
        }


        .status-badge {
            display: inline-flex;

            margin-top: 15px;

            padding: 8px 13px;

            border-radius: 999px;

            background: #f0f0f0;

            font-size: 11px;
            font-weight: 600;

            text-transform: uppercase;
        }


        .paid {
            background: #eaf7ed;

            color: #28733c;
        }


        .rejected {
            background: #fdeaea;

            color: #a72e2e;
        }


        .payment-data {
            margin-top: 28px;

            padding-top: 25px;

            border-top: 1px solid #eee;
        }


        .pix {
            text-align: center;
        }


        .pix img {
            width: 230px;

            max-width: 100%;

            margin: 15px auto;

            display: block;
        }


        .pix-code {
            width: 100%;

            min-height: 90px;

            padding: 12px;

            resize: none;

            border: 1px solid #ddd;

            font-family: monospace;

            font-size: 11px;
        }


        .button {
            min-height: 44px;

            margin-top: 15px;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            padding: 0 20px;

            border: 1px solid #111;
            border-radius: 999px;

            background: #111;

            color: #fff;

            text-decoration: none;

            font-size: 11px;
            font-weight: 600;

            cursor: pointer;
        }


        .secondary {
            background: #fff;

            color: #111;
        }


        @media(max-width: 550px) {

            header {
                padding: 0 16px;
            }


            .logo img {
                width: 88px;
            }


            .card {
                padding: 24px 18px;
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
        Minha conta
    </a>

</header>



<main class="page">


    <div class="card">


        <span class="label">
            Pedido
        </span>


        <h1>
            #{{ $order->order_number }}
        </h1>


        @if($order->payment_status === 'pago')


            <p class="status-text">

                Seu pagamento foi aprovado.

            </p>


            <span class="status-badge paid">

                Pagamento aprovado

            </span>


        @elseif($order->payment_status === 'recusado')


            <p class="status-text">

                O pagamento não foi aprovado.
                Você pode tentar novamente.

            </p>


            <span class="status-badge rejected">

                Pagamento recusado

            </span>


        @else


            <p class="status-text">

                Estamos aguardando a confirmação
                do pagamento.

            </p>


            <span class="status-badge">

                Aguardando pagamento

            </span>


        @endif



        <div class="payment-data">


            {{-- PIX --}}

            @if(
                $order->payment_method === 'pix'
                && $order->payment_status !== 'pago'
            )


                <div class="pix">


                    <h2>
                        Pague com Pix
                    </h2>


                    @if($order->pix_qr_code_base64)

                        <img
                            src="data:image/png;base64,{{ $order->pix_qr_code_base64 }}"
                            alt="QR Code Pix"
                        >

                    @endif


                    @if($order->pix_copy_paste)

                        <textarea
                            id="pix-code"
                            class="pix-code"
                            readonly
                        >{{ $order->pix_copy_paste }}</textarea>


                        <button
                            class="button"
                            type="button"
                            onclick="
                                navigator.clipboard.writeText(
                                    document.getElementById('pix-code').value
                                );
                                this.textContent = 'Código copiado';
                            "
                        >
                            Copiar código Pix
                        </button>

                    @endif


                </div>


            @endif



            {{-- BOLETO --}}

            @if(
                $order->payment_ticket_url
                && $order->payment_status !== 'pago'
            )


                <h2>
                    Boleto bancário
                </h2>


                <p class="status-text">

                    Seu boleto foi gerado.
                    O pagamento pode levar algum tempo
                    para ser confirmado.

                </p>


                <a
                    href="{{ $order->payment_ticket_url }}"
                    target="_blank"
                    rel="noopener"
                    class="button"
                >
                    Abrir boleto
                </a>


            @endif



            {{-- RECUSADO / TENTAR DE NOVO --}}

            @if($order->payment_status === 'recusado')


                <a
                    href="{{ route('payments.checkout', $order) }}"
                    class="button"
                >
                    Tentar outro pagamento
                </a>


            @endif



            {{-- ATUALIZAR --}}

            @if($order->payment_status !== 'pago')


                <form
                    method="POST"
                    action="{{ route('payments.refresh', $order) }}"
                >

                    @csrf


                    <button
                        type="submit"
                        class="button secondary"
                    >
                        Atualizar status
                    </button>


                </form>


            @else


                <a
                    href="{{ route('orders.tracking') }}"
                    class="button"
                >
                    Acompanhar entrega
                </a>


            @endif


        </div>


    </div>


</main>


</body>

</html>