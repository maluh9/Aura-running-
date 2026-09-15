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
        ['pageTitle' => $team->name]
    )


    <style>

        @import url('https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@400;500;600;700&family=Barlow:wght@400;500;600&display=swap');


        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        body {
            background: #fff;
            color: #111;

            font-family: 'Barlow', sans-serif;
        }



        /* =========================================
           PÁGINA
        ========================================= */

        .team-page {
            width: 100%;
            max-width: 1380px;

            margin: 0 auto;

            padding: 40px 50px 60px;

            display: grid;

            grid-template-columns:
                minmax(420px, 1fr)
                minmax(430px, 1fr);

            gap: 85px;

            align-items: center;

            min-height: calc(100vh - 100px);
        }



        /* =========================================
           IMAGEM
        ========================================= */

        .team-image-area {
            width: 100%;

            display: flex;
            align-items: center;
            justify-content: center;
        }


        .team-image {
            width: 100%;
            max-width: 560px;

            display: block;

            background: transparent;
        }


        .team-image img {
            width: 100%;
            height: auto;

            display: block;

            object-fit: contain;
        }



        /* =========================================
           INFORMAÇÕES
        ========================================= */

        .team-info {
            width: 100%;
            max-width: 680px;
        }


        .team-category {
            display: block;

            margin-bottom: 14px;

            color: #8d7962;

            font-family: 'Barlow Condensed', sans-serif;

            font-size: 15px;
            font-weight: 500;

            letter-spacing: .12em;

            text-transform: uppercase;
        }


        .team-title {
            margin-bottom: 20px;

            font-family: 'Barlow Condensed', sans-serif;

            font-size: clamp(58px, 5vw, 78px);
            font-weight: 600;

            line-height: .9;

            letter-spacing: -.025em;

            text-transform: uppercase;
        }


        .team-description {
            max-width: 610px;

            margin-bottom: 25px;

            color: #666;

            font-size: 17px;

            line-height: 1.55;
        }



        /* =========================================
           PREÇO
        ========================================= */

        .team-price {
            margin-bottom: 27px;

            font-family: 'Barlow Condensed', sans-serif;

            font-size: 34px;
            font-weight: 600;
        }



        /* =========================================
           TAMANHOS
        ========================================= */

        .sizes-section {
            margin-bottom: 27px;
        }


        .sizes-title {
            display: block;

            margin-bottom: 12px;

            color: #111;

            font-size: 14px;
            font-weight: 600;
        }


        .sizes {
            display: flex;
            align-items: center;
            flex-wrap: wrap;

            gap: 10px;
        }


        .size-option {
            width: 58px;
            height: 51px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #fff;
            color: #111;

            border: 1px solid #d6d6d6;

            font-family: 'Barlow Condensed', sans-serif;

            font-size: 17px;
            font-weight: 500;

            cursor: pointer;

            transition: .18s ease;
        }


        .size-option:hover {
            border-color: #111;
        }


        .size-option.active {
            background: #111;
            color: #fff;

            border-color: #111;
        }



        /* =========================================
           ESTOQUE
        ========================================= */

        .stock-info {
            margin-bottom: 18px;

            color: #777;

            font-size: 12px;
        }


        .stock-info strong {
            color: #111;
        }


        .out-of-stock {
            margin-bottom: 20px;

            color: #a72e2e;

            font-size: 11px;
            font-weight: 600;

            letter-spacing: .07em;

            text-transform: uppercase;
        }



        /* =========================================
           BOTÃO CARRINHO
        ========================================= */

        .cart-form {
            width: 100%;

            margin-bottom: 12px;
        }


        .add-cart-button {
            width: 100%;
            min-height: 59px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #111;
            color: #fff;

            border: 1px solid #111;

            font-family: 'Barlow Condensed', sans-serif;

            font-size: 17px;
            font-weight: 600;

            letter-spacing: .06em;

            text-transform: uppercase;

            cursor: pointer;

            transition: .2s ease;
        }


        .add-cart-button:hover {
            background: #fff;
            color: #111;
        }


        .add-cart-button:disabled {
            background: #ddd;
            color: #888;

            border-color: #ddd;

            cursor: not-allowed;
        }



        /* =========================================
           MENSAGEM TAMANHO
        ========================================= */

        .size-error {
            display: none;

            margin: -8px 0 15px;

            color: #a72e2e;

            font-size: 11px;
        }


        .size-error.show {
            display: block;
        }



        /* =========================================
           VOLTAR
        ========================================= */

        .back-button {
            width: 100%;
            min-height: 55px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #fff;
            color: #111;

            border: 1px solid #111;

            text-decoration: none;

            font-family: 'Barlow Condensed', sans-serif;

            font-size: 16px;
            font-weight: 600;

            letter-spacing: .06em;

            text-transform: uppercase;

            transition: .2s ease;
        }


        .back-button:hover {
            background: #111;
            color: #fff;
        }



        /* =========================================
           RESPONSIVO
        ========================================= */

        @media(max-width: 950px) {

            .team-page {
                grid-template-columns: 1fr;

                gap: 40px;

                padding: 30px 25px 60px;
            }


            .team-image {
                max-width: 650px;
            }


            .team-info {
                max-width: 650px;

                margin: 0 auto;
            }

        }


        @media(max-width: 600px) {

            .team-page {
                padding: 20px 16px 50px;
            }


            .team-title {
                font-size: 55px;
            }


            .team-description {
                font-size: 14px;
            }


            .size-option {
                width: 52px;
                height: 48px;
            }

        }

    </style>

</head>


<body>


{{-- HEADER AURA --}}

@include('partials.store-header')



@php

    /*
    |--------------------------------------------------------------------------
    | PRODUTO PRINCIPAL DA SELEÇÃO
    |--------------------------------------------------------------------------
    |
    | Para adicionar ao carrinho precisamos de um Product.
    | Usamos o primeiro produto ativo associado à seleção.
    |
    */

    $mainProduct = $team->products->first();

@endphp



<main class="team-page">


    {{-- =========================================
         IMAGEM
    ========================================= --}}

    <section class="team-image-area">


        <div class="team-image">


            @if($team->hero_image_url)

                <img
                    src="{{ $team->hero_image_url }}"
                    alt="{{ $team->name }}"
                >

            @endif


        </div>


    </section>



    {{-- =========================================
         INFORMAÇÕES
    ========================================= --}}

    <section class="team-info">


        <span class="team-category">
            Copa do Mundo
        </span>


        <h1 class="team-title">
            {{ $team->name }}
        </h1>



        @if($team->description)

            <p class="team-description">
                {{ $team->description }}
            </p>

        @endif



        {{-- =========================================
             PREÇO
        ========================================= --}}

        @if($mainProduct)

            <div class="team-price">

                R$

                {{ number_format(
                    $mainProduct->price,
                    2,
                    ',',
                    '.'
                ) }}

            </div>

        @endif



        {{-- =========================================
             TAMANHOS
        ========================================= --}}

        <div class="sizes-section">


            <span class="sizes-title">
                Escolha o tamanho
            </span>


            <div class="sizes">


                <button
                    type="button"
                    class="size-option"
                    data-size="P"
                >
                    P
                </button>


                <button
                    type="button"
                    class="size-option"
                    data-size="M"
                >
                    M
                </button>


                <button
                    type="button"
                    class="size-option"
                    data-size="G"
                >
                    G
                </button>


                <button
                    type="button"
                    class="size-option"
                    data-size="GG"
                >
                    GG
                </button>


            </div>


        </div>



        {{-- ERRO DE TAMANHO --}}

        <div
            class="size-error"
            id="sizeError"
        >
            Selecione um tamanho antes de adicionar ao carrinho.
        </div>



        {{-- =========================================
             PRODUTO / ESTOQUE
        ========================================= --}}

        @if($mainProduct)


            @if($mainProduct->stock > 0)

                <div class="stock-info">

                    Disponível em estoque:

                    <strong>
                        {{ $mainProduct->stock }}
                    </strong>

                </div>


            @else

                <div class="out-of-stock">
                    Produto sem estoque
                </div>

            @endif



            {{-- =========================================
                 ADICIONAR AO CARRINHO
            ========================================= --}}

            @auth


                <form
                    action="{{ route(
                        'cart.add',
                        $mainProduct->id
                    ) }}"
                    method="POST"
                    class="cart-form"
                    id="cartForm"
                >

                    @csrf


                    <input
                        type="hidden"
                        name="size"
                        id="selectedSize"
                        value=""
                    >


                    <button
                        type="submit"
                        class="add-cart-button"

                        @disabled($mainProduct->stock < 1)
                    >

                        @if($mainProduct->stock < 1)

                            SEM ESTOQUE

                        @else

                            ADICIONAR AO CARRINHO

                        @endif

                    </button>


                </form>


            @else


                <a
                    href="{{ route('login') }}"
                    class="add-cart-button"
                    style="
                        text-decoration:none;
                        margin-bottom:12px;
                    "
                >
                    ENTRE PARA COMPRAR
                </a>


            @endauth


        @endif



        {{-- =========================================
             VOLTAR
        ========================================= --}}

        <a
            href="{{ route('home') }}#copa"
            class="back-button"
        >
            VOLTAR PARA AS SELEÇÕES
        </a>


    </section>


</main>



<script>

    /*
    |--------------------------------------------------------------------------
    | SELEÇÃO DE TAMANHO
    |--------------------------------------------------------------------------
    */

    const sizeButtons =
        document.querySelectorAll('.size-option');

    const selectedSize =
        document.getElementById('selectedSize');

    const cartForm =
        document.getElementById('cartForm');

    const sizeError =
        document.getElementById('sizeError');


    sizeButtons.forEach(function (button) {

        button.addEventListener(
            'click',
            function () {


                sizeButtons.forEach(
                    function (item) {

                        item.classList.remove(
                            'active'
                        );

                    }
                );


                button.classList.add(
                    'active'
                );


                if (selectedSize) {

                    selectedSize.value =
                        button.dataset.size;

                }


                if (sizeError) {

                    sizeError.classList.remove(
                        'show'
                    );

                }

            }
        );

    });



    /*
    |--------------------------------------------------------------------------
    | NÃO ENVIA SEM TAMANHO
    |--------------------------------------------------------------------------
    */

    if (cartForm) {

        cartForm.addEventListener(
            'submit',
            function (event) {


                if (
                    !selectedSize
                    || !selectedSize.value
                ) {

                    event.preventDefault();


                    if (sizeError) {

                        sizeError.classList.add(
                            'show'
                        );

                    }

                }

            }
        );

    }

</script>


</body>

</html>