<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <meta
        name="csrf-token"
        content="{{ csrf_token() }}"
    >

    @include(
        'partials.page-meta',
        ['pageTitle' => 'Pagamento']
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

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 0 55px;

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

            padding: 0 22px;

            border: 1px solid #ddd;
            border-radius: 999px;

            color: #111;

            text-decoration: none;

            font-size: 12px;
            font-weight: 600;
        }


        .back:hover {
            background: #111;

            color: #fff;
        }


        .page {
            width: 100%;
            max-width: 1180px;

            margin: 0 auto;

            padding: 38px 25px 65px;
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
            margin: 0;

            font-family: 'Barlow Condensed', sans-serif;

            font-size: 52px;
            font-weight: 600;
        }


        .subtitle {
            margin: 8px 0 30px;

            color: #777;
        }


        .checkout-grid {
            display: grid;

            grid-template-columns:
                minmax(0, 1fr)
                340px;

            gap: 25px;

            align-items: start;
        }


        .payment-box,
        .summary {
            background: #fff;

            border: 1px solid #e4e4e4;

            border-radius: 10px;
        }


        .payment-box {
            padding: 24px;
        }


        .summary {
            padding: 24px;

            position: sticky;

            top: 20px;
        }


        .summary-label {
            display: block;

            margin-bottom: 7px;

            color: #999;

            font-size: 10px;
            font-weight: 600;

            letter-spacing: .10em;

            text-transform: uppercase;
        }


        .summary h2 {
            margin: 0 0 22px;

            font-family: 'Barlow Condensed', sans-serif;

            font-size: 25px;
        }


        .summary-row {
            display: flex;

            justify-content: space-between;

            padding: 12px 0;

            border-bottom: 1px solid #eee;

            font-size: 13px;
        }


        .summary-total {
            display: flex;

            justify-content: space-between;

            padding-top: 20px;

            font-family: 'Barlow Condensed', sans-serif;

            font-size: 22px;
            font-weight: 600;
        }


        .credentials-error {
            padding: 18px;

            background: #fff2f2;

            border: 1px solid #efd2d2;

            color: #9b2d2d;
        }


        #payment-error {
            display: none;

            margin-bottom: 15px;

            padding: 13px 15px;

            background: #fff2f2;

            color: #9b2d2d;

            border: 1px solid #efd2d2;

            border-radius: 6px;

            font-size: 13px;
        }


        @media(max-width: 850px) {

            .checkout-grid {
                grid-template-columns: 1fr;
            }


            .summary {
                position: static;
            }

        }


        @media(max-width: 550px) {

            header {
                height: 72px;

                padding: 0 16px;
            }


            .logo img {
                width: 88px;
            }


            .back {
                padding: 0 14px;

                font-size: 10px;
            }


            .page {
                padding: 28px 16px 50px;
            }


            h1 {
                font-size: 43px;
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
        href="{{ route('cart.index') }}"
        class="back"
    >
        Voltar ao carrinho
    </a>

</header>



<main class="page">


    <div class="page-label">
        Finalizar compra
    </div>


    <h1>
        Pagamento
    </h1>


    <p class="subtitle">
        Escolha Pix, boleto ou cartão para concluir seu pedido.
    </p>



    <div class="checkout-grid">


        <section class="payment-box">


            <div id="payment-error"></div>


            @if(!$publicKey)

                <div class="credentials-error">

                    As credenciais do Mercado Pago ainda
                    não foram configuradas no arquivo .env.

                </div>

            @else

                <div id="paymentBrick_container"></div>

            @endif


        </section>



        <aside class="summary">


            <span class="summary-label">
                Resumo
            </span>


            <h2>
                Pedido #{{ $order->order_number }}
            </h2>


            <div class="summary-row">

                <span>Status</span>

                <strong>
                    Aguardando pagamento
                </strong>

            </div>


            <div class="summary-row">

                <span>Forma</span>

                <strong>
                    Escolha ao lado
                </strong>

            </div>


            <div class="summary-total">

                <span>Total</span>

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


        </aside>


    </div>


</main>



@if($publicKey)

<script src="https://sdk.mercadopago.com/js/v2"></script>


<script>

    const mp = new MercadoPago(
        @json($publicKey),
        {
            locale: 'pt-BR'
        }
    );


    const bricksBuilder = mp.bricks();


    const renderPaymentBrick = async () => {

        const settings = {

            initialization: {

                amount:
                    {{ (float) $order->total }}

            },


            customization: {

                paymentMethods: {

                    creditCard: 'all',

                    debitCard: 'all',

                    bankTransfer: ['pix'],

                    ticket: ['bolbradesco']

                }

            },


            callbacks: {


                onReady: () => {

                    console.log(
                        'Payment Brick carregado.'
                    );

                },


                onSubmit: ({
                    selectedPaymentMethod,
                    formData
                }) => {

                    return new Promise(
                        (resolve, reject) => {

                            const errorBox =
                                document.getElementById(
                                    'payment-error'
                                );


                            errorBox.style.display =
                                'none';


                            fetch(
                                @json(
                                    route(
                                        'payments.process',
                                        $order
                                    )
                                ),
                                {

                                    method: 'POST',

                                    headers: {

                                        'Content-Type':
                                            'application/json',

                                        'Accept':
                                            'application/json',

                                        'X-CSRF-TOKEN':
                                            document
                                                .querySelector(
                                                    'meta[name="csrf-token"]'
                                                )
                                                .content

                                    },

                                    body: JSON.stringify({

                                        formData:
                                            formData

                                    })

                                }
                            )

                            .then(async response => {

                                const data =
                                    await response.json();


                                if (!response.ok) {

                                    throw new Error(
                                        data.message
                                        || 'Não foi possível processar o pagamento.'
                                    );

                                }


                                return data;

                            })

                            .then(data => {

                                resolve();


                                window.location.href =
                                    data.redirect_url;

                            })

                            .catch(error => {

                                errorBox.textContent =
                                    error.message;


                                errorBox.style.display =
                                    'block';


                                reject();

                            });

                        }
                    );

                },


                onError: error => {

                    console.error(error);

                }

            }

        };


        window.paymentBrickController =
            await bricksBuilder.create(
                'payment',
                'paymentBrick_container',
                settings
            );

    };


    renderPaymentBrick();


    window.addEventListener(
        'beforeunload',
        () => {

            if (
                window.paymentBrickController
            ) {

                window
                    .paymentBrickController
                    .unmount();

            }

        }
    );

</script>

@endif


</body>

</html>