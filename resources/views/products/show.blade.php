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
        ['pageTitle' => $product->name]
    )


    <style>

        @import url('https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@400;500;600;700&family=Barlow:wght@400;500;600&display=swap');


        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        html,
        body {
            width: 100%;
            min-height: 100%;
        }


        body {
            font-family: 'Barlow', sans-serif;

            color: #111;

            background: #fff;

            overflow-x: hidden;
        }



        /* ========================================
           ÁREA PRINCIPAL
        ======================================== */

        .product-page {

            width: 100%;

            max-width: 1480px;

            height: calc(100vh - 96px);

            margin: 0 auto;

            padding: 28px 50px;

            display: grid;

            grid-template-columns:
                minmax(0, 1fr)
                minmax(440px, 0.88fr);

            align-items: center;

            gap: 58px;
        }



        /* ========================================
           IMAGEM
        ======================================== */

        .product-image-wrapper {

            position: relative;

            width: 100%;
            height: 100%;

            max-height: 560px;

            display: flex;

            align-items: center;
            justify-content: center;

            background: transparent;

            overflow: hidden;
        }


        .product-image-wrapper img {

            display: block;

            width: 100%;
            height: 100%;

            max-width: 720px;
            max-height: 560px;

            object-fit: contain;

            border-radius: 5px;

            transition:
                transform .3s ease,
                opacity .3s ease;
        }


        .product-image-wrapper:hover img {

            transform: scale(1.015);
        }



        /* ========================================
           SEM ESTOQUE NA IMAGEM
        ======================================== */

        .product-image-wrapper.out-of-stock img {

            opacity: .68;
        }


        .stock-badge {

            position: absolute;

            top: 18px;
            left: 18px;

            z-index: 5;

            padding: 8px 14px;

            background: #111;

            color: #fff;

            font-family:
                'Barlow Condensed',
                sans-serif;

            font-size: 13px;

            font-weight: 600;

            letter-spacing: .12em;

            text-transform: uppercase;

            border-radius: 3px;
        }



        /* ========================================
           INFORMAÇÕES
        ======================================== */

        .product-info {

            width: 100%;

            display: flex;

            flex-direction: column;

            justify-content: center;
        }


        .category {

            margin-bottom: 10px;

            color: #777;

            font-family:
                'Barlow Condensed',
                sans-serif;

            font-size: 13px;

            font-weight: 500;

            letter-spacing: .12em;

            text-transform: uppercase;
        }


        .product-info h1 {

            margin-bottom: 18px;

            font-family:
                'Barlow Condensed',
                sans-serif;

            font-size:
                clamp(
                    42px,
                    3.4vw,
                    56px
                );

            font-weight: 600;

            line-height: .95;

            letter-spacing: -0.02em;

            text-transform: uppercase;
        }


        .description {

            max-width: 620px;

            margin-bottom: 22px;

            color: #555;

            font-size: 16px;

            line-height: 1.5;
        }


        .price {

            margin-bottom: 24px;

            font-size: 27px;

            font-weight: 600;
        }



        /* ========================================
           AVISO SEM ESTOQUE
        ======================================== */

        .stock-alert {

            margin-bottom: 20px;

            padding: 14px 16px;

            background: #f5f5f5;

            border-left:
                3px solid #111;
        }


        .stock-alert strong {

            display: block;

            margin-bottom: 4px;

            font-family:
                'Barlow Condensed',
                sans-serif;

            font-size: 15px;

            font-weight: 600;

            letter-spacing: .08em;

            text-transform: uppercase;
        }


        .stock-alert span {

            color: #666;

            font-size: 13px;
        }



        /* ========================================
           FORMULÁRIO
        ======================================== */

        .cart-form {

            width: 100%;
        }



        /* ========================================
           TAMANHOS
        ======================================== */

        .sizes-title {

            margin-bottom: 10px;

            font-size: 14px;

            font-weight: 600;
        }


        .sizes {

            display: flex;

            flex-wrap: wrap;

            gap: 9px;

            margin-bottom: 18px;
        }


        .size {

            width: auto;

            min-width: 50px;

            height: 46px;

            padding: 0 12px;

            display: flex;

            align-items: center;
            justify-content: center;

            background: #fff;

            border:
                1px solid #ccc;

            font-family:
                'Barlow Condensed',
                sans-serif;

            font-size: 16px;

            cursor: pointer;

            transition: .2s ease;
        }


        .size:hover {

            border-color: #111;
        }


        .size input {

            display: none;
        }


        .size:has(input:checked) {

            background: #111;

            color: #fff;

            border-color: #111;
        }



        /* ========================================
           ESTOQUE DISPONÍVEL
        ======================================== */

        .stock-info {

            margin:
                0
                0
                18px;

            color: #888;

            font-size: 13px;
        }


        .stock-info strong {

            color: #111;

            font-weight: 600;
        }



        /* ========================================
           BOTÃO CARRINHO
        ======================================== */

        .cart-button {

            width: 100%;

            min-height: 54px;

            display: flex;

            align-items: center;
            justify-content: center;

            padding: 14px 20px;

            border:
                1px solid #111;

            background: #111;

            color: #fff;

            font-family:
                'Barlow Condensed',
                sans-serif;

            font-size: 17px;

            font-weight: 600;

            letter-spacing: .05em;

            text-transform: uppercase;

            text-decoration: none;

            cursor: pointer;

            transition: .2s ease;
        }


        .cart-button:hover {

            background: #333;

            border-color: #333;
        }


        .cart-button.disabled,
        .cart-button:disabled {

            background: #d7d7d7;

            color: #777;

            border-color: #d7d7d7;

            cursor: not-allowed;
        }


        .cart-button.disabled:hover,
        .cart-button:disabled:hover {

            background: #d7d7d7;

            border-color: #d7d7d7;
        }



        /* ========================================
           FAVORITOS
        ======================================== */

        .favorite {

            width: 100%;

            min-height: 50px;

            margin-top: 12px;

            display: flex;

            align-items: center;
            justify-content: center;

            padding: 12px 18px;

            border:
                1px solid #111;

            background: #fff;

            color: #111;

            font-family:
                'Barlow Condensed',
                sans-serif;

            font-size: 16px;

            font-weight: 500;

            letter-spacing: .04em;

            text-decoration: none;

            cursor: pointer;

            transition: .2s ease;
        }


        .favorite:hover {

            background: #f4f4f4;
        }



        /* ========================================
           DESKTOP
        ======================================== */

        @media (
            min-width: 1001px
        ) and (
            min-height: 700px
        ) {

            body {

                overflow-y: hidden;
            }

        }



        /* ========================================
           NOTEBOOK
        ======================================== */

        @media (
            max-width: 1250px
        ) and (
            min-width: 1001px
        ) {

            .product-page {

                padding:
                    24px
                    34px;

                gap: 38px;

                grid-template-columns:
                    minmax(0, 1fr)
                    minmax(390px, .88fr);
            }


            .product-image-wrapper,
            .product-image-wrapper img {

                max-height: 500px;
            }


            .product-info h1 {

                font-size: 46px;
            }


            .description {

                margin-bottom: 18px;
            }


            .price {

                margin-bottom: 20px;
            }

        }



        /* ========================================
           TABLET
        ======================================== */

        @media (
            max-width: 1000px
        ) {

            body {

                overflow-y: auto;
            }


            .product-page {

                height: auto;

                grid-template-columns:
                    1fr;

                gap: 30px;

                padding:
                    32px
                    25px
                    60px;
            }


            .product-image-wrapper {

                height: auto;

                max-height: none;
            }


            .product-image-wrapper img {

                width: 100%;

                height: auto;

                max-width: 720px;

                max-height: 500px;
            }

        }



        /* ========================================
           CELULAR
        ======================================== */

        @media (
            max-width: 600px
        ) {

            .product-page {

                padding:
                    20px
                    16px
                    45px;

                gap: 24px;
            }


            .product-image-wrapper img {

                max-height: 350px;
            }


            .product-info h1 {

                font-size: 42px;
            }


            .description {

                font-size: 15px;
            }


            .size {

                min-width: 46px;

                height: 44px;

                padding: 0 10px;
            }

        }

    </style>

</head>


<body>


    {{-- =========================================
         HEADER
    ========================================= --}}

    @include('partials.store-header')



    <main class="product-page">


        {{-- =========================================
             IMAGEM
        ========================================= --}}

        <div
            class="
                product-image-wrapper
                {{
                    $product->stock <= 0
                        ? 'out-of-stock'
                        : ''
                }}
            "
        >


            @if(
                $product->stock <= 0
            )


                <span class="stock-badge">

                    Sem estoque

                </span>


            @endif



            <img
                src="{{ $product->image_url }}"
                alt="{{ $product->name }}"
            >


        </div>



        {{-- =========================================
             INFORMAÇÕES
        ========================================= --}}

        <div class="product-info">


            <span class="category">

                {{ $product->category->name }}

            </span>



            <h1>

                {{ $product->name }}

            </h1>



            <p class="description">

                {{ $product->description }}

            </p>



            <div class="price">

                R$

                {{ number_format(
                    $product->price,
                    2,
                    ',',
                    '.'
                ) }}

            </div>



            {{-- =========================================
                 SEM ESTOQUE
            ========================================= --}}

            @if(
                $product->stock <= 0
            )


                <div class="stock-alert">


                    <strong>

                        Sem estoque

                    </strong>


                    <span>

                        Este produto está
                        temporariamente
                        indisponível.

                    </span>


                </div>


            @endif



            {{-- =========================================
                 TAMANHOS / VARIAÇÕES
            ========================================= --}}

            @php


                /*
                |--------------------------------------------------------------------------
                | TÊNIS E SLIDE
                |--------------------------------------------------------------------------
                */

                if (
                    $product->category->slug
                        === 'tenis'
                    ||
                    $product->slug
                        === 'aura-recovery-slide'
                ) {

                    $sizes = [
                        '35',
                        '36',
                        '37',
                        '38',
                        '39',
                        '40',
                        '41',
                        '42',
                    ];

                    $sizeTitle =
                        'Escolha a numeração';


                /*
                |--------------------------------------------------------------------------
                | RELÓGIOS
                |--------------------------------------------------------------------------
                */

                } elseif (
                    str_contains(
                        $product->slug,
                        'watch'
                    )
                ) {

                    $sizes = [
                        '38 mm',
                        '40 mm',
                        '42 mm',
                        '44 mm',
                    ];

                    $sizeTitle =
                        'Escolha o tamanho';


                /*
                |--------------------------------------------------------------------------
                | GARRAFA
                |--------------------------------------------------------------------------
                */

                } elseif (
                    $product->slug
                        === 'aura-sport-bottle'
                ) {

                    $sizes = [
                        '500 ml',
                        '1 L',
                    ];

                    $sizeTitle =
                        'Escolha a capacidade';


                /*
                |--------------------------------------------------------------------------
                | BONÉ
                |--------------------------------------------------------------------------
                */

                } elseif (
                    $product->slug
                        === 'aura-running-cap'
                ) {

                    $sizes = [
                        'P/M',
                        'M/G',
                        'G/GG',
                    ];

                    $sizeTitle =
                        'Escolha o tamanho';


                /*
                |--------------------------------------------------------------------------
                | ROUPAS E COPA
                |--------------------------------------------------------------------------
                */

                } elseif (
                    $product->category->slug
                        === 'roupas'
                    ||
                    $product->category->slug
                        === 'copa'
                ) {

                    $sizes = [
                        'P',
                        'M',
                        'G',
                        'GG',
                    ];

                    $sizeTitle =
                        'Escolha o tamanho';


                /*
                |--------------------------------------------------------------------------
                | OUTROS
                |--------------------------------------------------------------------------
                */

                } else {

                    $sizes = [
                        'Único',
                    ];

                    $sizeTitle =
                        'Escolha a opção';

                }


            @endphp



            {{-- =========================================
                 PRODUTO DISPONÍVEL
            ========================================= --}}

            @if(
                $product->stock > 0
            )


                @auth


                    <form
                        action="{{
                            route(
                                'cart.add',
                                $product->id
                            )
                        }}"
                        method="POST"
                        class="cart-form"
                    >


                        @csrf



                        {{-- TÍTULO DA VARIAÇÃO --}}

                        <div class="sizes-title">

                            {{ $sizeTitle }}

                        </div>



                        {{-- OPÇÕES --}}

                        <div class="sizes">


                           @foreach($sizes as $size)


                                <label class="size">


                                    <input
                                        type="radio"
                                        name="size"
                                        value="{{ $size }}"
                                        required
                                    >


                                    {{ $size }}


                                </label>


                            @endforeach


                        </div>



                        {{-- =========================================
                             ESTOQUE
                        ========================================= --}}

                        <div class="stock-info">

                            Disponível em estoque:

                            <strong>

                                {{ $product->stock }}

                            </strong>

                        </div>



                        {{-- =========================================
                             CARRINHO
                        ========================================= --}}

                        <button
                            type="submit"
                            class="cart-button"
                        >

                            Adicionar ao carrinho

                        </button>


                    </form>



                @else


                    {{-- =========================================
                         ESTOQUE PARA VISITANTE
                    ========================================= --}}

                    <div class="stock-info">

                        Disponível em estoque:

                        <strong>

                            {{ $product->stock }}

                        </strong>

                    </div>



                    <a
                        href="{{
                            route('login')
                        }}"
                        class="cart-button"
                    >

                        Entre para adicionar
                        ao carrinho

                    </a>


                @endauth



            {{-- =========================================
                 PRODUTO SEM ESTOQUE
            ========================================= --}}

            @else


                <button
                    type="button"
                    class="
                        cart-button
                        disabled
                    "
                    disabled
                >

                    Produto indisponível

                </button>


            @endif



            {{-- =========================================
                 FAVORITOS
            ========================================= --}}

            @auth


                <form
                    action="{{
                        route(
                            'favorites.toggle',
                            $product->id
                        )
                    }}"
                    method="POST"
                >


                    @csrf



                    <button
                        type="submit"
                        class="favorite"
                    >


                        {{
                            $isFavorite

                                ? '♥ REMOVER DOS FAVORITOS'

                                : '♡ ADICIONAR AOS FAVORITOS'
                        }}


                    </button>


                </form>



            @else


                <a
                    href="{{
                        route('login')
                    }}"
                    class="favorite"
                >

                    ♡ ENTRE PARA FAVORITAR

                </a>


            @endauth


        </div>


    </main>


</body>

</html>