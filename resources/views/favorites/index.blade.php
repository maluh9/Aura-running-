<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @include('partials.page-meta', ['pageTitle' => 'Favoritos'])


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
           PÁGINA
        ========================================= */

        .page {
            width: 100%;

            max-width: 1380px;

            margin: 0 auto;

            padding: 65px 50px 100px;
        }



        /* =========================================
           CABEÇALHO DA PÁGINA
        ========================================= */

        .page-header {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;

            gap: 30px;

            margin-bottom: 42px;
        }


        .page-label {
            display: block;

            margin-bottom: 8px;

            color: #999;

            font-size: 11px;
            font-weight: 600;

            letter-spacing: .15em;

            text-transform: uppercase;
        }


        .page h1 {
            font-family: 'Barlow Condensed', sans-serif;

            font-size: 56px;
            font-weight: 600;

            line-height: .95;

            letter-spacing: -.02em;
        }


        .subtitle {
            max-width: 520px;

            margin-top: 13px;

            color: #777;

            font-size: 15px;

            line-height: 1.5;
        }


        .favorites-count {
            min-height: 40px;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            padding: 0 18px;

            background: #fff;

            border: 1px solid #dedede;
            border-radius: 999px;

            color: #555;

            font-size: 11px;
            font-weight: 600;

            letter-spacing: .05em;

            text-transform: uppercase;

            white-space: nowrap;
        }



        /* =========================================
           GRID
        ========================================= */

        .favorites-grid {
            display: grid;

            grid-template-columns: repeat(4, minmax(0, 1fr));

            gap: 30px 18px;
        }



        /* =========================================
           CARD PRODUTO
        ========================================= */

        .product-card {
            min-width: 0;
        }


        .product-image-wrapper {
            position: relative;

            overflow: hidden;

            width: 100%;
            aspect-ratio: 3 / 4;

            margin-bottom: 17px;

            background: #eeeeee;

            border-radius: 7px;
        }


        .product-image-link {
            width: 100%;
            height: 100%;

            display: block;
        }


        .product-image {
            width: 100%;
            height: 100%;

            display: flex;
            align-items: center;
            justify-content: center;
        }


        .product-image img {
            width: 100%;
            height: 100%;

            display: block;

            object-fit: cover;

            transition: transform .35s ease;
        }


        .product-card:hover .product-image img {
            transform: scale(1.035);
        }



        /* =========================================
           CORAÇÃO
        ========================================= */

        .favorite-form {
            position: absolute;

            top: 14px;
            right: 14px;

            z-index: 5;
        }


        .remove-button {
            width: 42px;
            height: 42px;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 0;

            background: rgba(255,255,255,.94);

            color: #111;

            border: 1px solid rgba(0,0,0,.10);
            border-radius: 50%;

            font-size: 20px;

            cursor: pointer;

            box-shadow: 0 4px 14px rgba(0,0,0,.07);

            transition: .2s ease;
        }


        .remove-button:hover {
            background: #111;

            color: #fff;

            border-color: #111;

            transform: scale(1.05);
        }



        /* =========================================
           INFORMAÇÕES
        ========================================= */

        .product-info {
            padding: 0 2px;
        }


        .product-label {
            display: block;

            margin-bottom: 6px;

            color: #999;

            font-size: 9px;
            font-weight: 600;

            letter-spacing: .11em;

            text-transform: uppercase;
        }


        .product-name {
            margin-bottom: 5px;

            font-family: 'Barlow Condensed', sans-serif;

            font-size: 21px;
            font-weight: 600;

            line-height: 1.1;
        }


        .product-price {
            margin-bottom: 16px;

            color: #333;

            font-size: 14px;
            font-weight: 500;
        }



        /* =========================================
           BOTÃO VER PRODUTO
        ========================================= */

        .view-product {
            width: 100%;
            min-height: 43px;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 0 18px;

            background: #111;

            color: #fff;

            border: 1px solid #111;
            border-radius: 999px;

            text-align: center;

            text-decoration: none;

            font-size: 11px;
            font-weight: 600;

            letter-spacing: .05em;

            transition: .2s ease;
        }


        .view-product:hover {
            background: #fff;

            color: #111;

            transform: translateY(-1px);

            box-shadow: 0 6px 16px rgba(0,0,0,.07);
        }



        /* =========================================
           SEM FAVORITOS
        ========================================= */

        .empty {
            min-height: 430px;

            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;

            padding: 70px 30px;

            background: #fff;

            border: 1px solid #e4e4e4;
            border-radius: 9px;

            text-align: center;
        }


        .empty-heart {
            width: 62px;
            height: 62px;

            display: flex;
            align-items: center;
            justify-content: center;

            margin-bottom: 22px;

            background: #111;

            color: #fff;

            border-radius: 50%;

            font-size: 25px;
        }


        .empty h2 {
            margin-bottom: 8px;

            font-family: 'Barlow Condensed', sans-serif;

            font-size: 30px;
            font-weight: 600;
        }


        .empty p {
            max-width: 430px;

            margin-bottom: 27px;

            color: #777;

            font-size: 14px;

            line-height: 1.5;
        }


        .empty a {
            min-height: 46px;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            padding: 0 26px;

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


        .empty a:hover {
            background: #fff;

            color: #111;

            transform: translateY(-1px);

            box-shadow: 0 6px 16px rgba(0,0,0,.07);
        }



        /* =========================================
           RESPONSIVO
        ========================================= */

        @media (max-width: 1100px) {

            .favorites-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }

        }


        @media (max-width: 800px) {

            .page {
                padding: 45px 22px 75px;
            }


            .page-header {
                flex-direction: column;
                align-items: flex-start;

                gap: 20px;
            }


            .page h1 {
                font-size: 45px;
            }


            .favorites-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));

                gap: 28px 14px;
            }

        }


        @media (max-width: 520px) {

            .page {
                padding-left: 16px;
                padding-right: 16px;
            }


            .page h1 {
                font-size: 41px;
            }


            .favorites-grid {
                grid-template-columns: 1fr;
            }


            .product-image-wrapper {
                aspect-ratio: 4 / 5;
            }

        }

    </style>

</head>


<body>


    {{-- HEADER PADRÃO DA LOJA --}}

    @include('partials.store-header')



    <main class="page">


        {{-- =========================================
             CABEÇALHO
        ========================================= --}}

        <div class="page-header">


            <div>


                <span class="page-label">

                    Sua seleção

                </span>


                <h1>

                    Meus favoritos

                </h1>


                <p class="subtitle">

                    Os produtos que você marcou para encontrar
                    facilmente sempre que quiser.

                </p>


            </div>



            @if($favorites->count())


                <div class="favorites-count">

                    {{ $favorites->count() }}

                    {{ $favorites->count() === 1
                        ? 'produto salvo'
                        : 'produtos salvos' }}

                </div>


            @endif


        </div>



        {{-- =========================================
             FAVORITOS
        ========================================= --}}

        @if($favorites->count())


            <div class="favorites-grid">


                @foreach($favorites as $favorite)


                    <article class="product-card">



                        {{-- IMAGEM --}}

                        <div class="product-image-wrapper">


                            <a
                                href="{{ route('products.show', $favorite->product->slug) }}"
                                class="product-image-link"
                            >


                                <div class="product-image">


                                    <img
                                        src="{{ $favorite->product->image_url }}"
                                        alt="{{ $favorite->product->name }}"
                                    >


                                </div>


                            </a>



                            {{-- REMOVER FAVORITO --}}

                            <form
                                action="{{ route('favorites.toggle', $favorite->product->id) }}"
                                method="POST"
                                class="favorite-form"
                            >

                                @csrf


                                <button
                                    type="submit"
                                    class="remove-button"
                                    title="Remover dos favoritos"
                                    aria-label="Remover {{ $favorite->product->name }} dos favoritos"
                                >

                                    ♥

                                </button>


                            </form>


                        </div>



                        {{-- INFORMAÇÕES --}}

                        <div class="product-info">


                            <span class="product-label">

                                Favorito

                            </span>


                            <div class="product-name">

                                {{ $favorite->product->name }}

                            </div>


                            <div class="product-price">

                                R$ {{ number_format(
                                    $favorite->product->price,
                                    2,
                                    ',',
                                    '.'
                                ) }}

                            </div>



                            <a
                                href="{{ route('products.show', $favorite->product->slug) }}"
                                class="view-product"
                            >

                                VER PRODUTO

                            </a>


                        </div>


                    </article>


                @endforeach


            </div>


        @else


            {{-- =========================================
                 FAVORITOS VAZIOS
            ========================================= --}}

            <div class="empty">


                <div class="empty-heart">

                    ♡

                </div>


                <h2>

                    Sua lista de favoritos está vazia

                </h2>


                <p>

                    Salve os produtos que mais combinam com você
                    e encontre tudo rapidamente por aqui.

                </p>


                <a href="{{ route('home') }}">

                    EXPLORAR PRODUTOS

                </a>


            </div>


        @endif


    </main>


</body>

</html>