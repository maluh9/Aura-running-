<!DOCTYPE html>

<html lang="pt-BR">

<head>


<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

@include('partials.page-meta', ['pageTitle' => $product->name])

<style>

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, Helvetica, sans-serif;
        color: #111;
        background: #fff;
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
        opacity: 0.5;
    }

   .header-icons {
    display: flex;
    align-items: center;
    gap: 20px;
    font-size: 20px;
}

.header-icons a {
    color: #111;
    text-decoration: none;
    font-size: 20px;
    display: flex;
    align-items: center;
}

.header-icons a:hover {
    color: #111;
    opacity: 0.5;
    text-decoration: none;
}

    /* PRODUTO */

    .product-page {
        display: grid;
        grid-template-columns: 1.2fr 1fr;
        min-height: calc(100vh - 80px);
    }

    .product-image {
        background: #f5f5f5;

        display: flex;
        align-items: center;
        justify-content: center;

        padding: 60px;
    }

    .product-image img {
        width: 100%;
        max-width: 650px;
        height: 600px;
        object-fit: contain;
    }

    .product-info {
        padding: 80px 70px;

        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .category {
        font-size: 13px;
        color: #666;

        text-transform: uppercase;

        margin-bottom: 15px;
    }

    .product-info h1 {
        font-size: 45px;
        margin-bottom: 20px;
    }

    .description {
        color: #555;
        line-height: 1.6;
        margin-bottom: 25px;
    }

    .price {
        font-size: 25px;
        font-weight: bold;
        margin-bottom: 30px;
    }

    /* FORMULÁRIO */

    .cart-form {
        width: 100%;
    }

    /* TAMANHOS */

    .sizes-title {
        font-size: 14px;
        font-weight: bold;
        margin-bottom: 12px;
    }

    .sizes {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;

        margin-bottom: 30px;
    }

    .size {
        width: 50px;
        height: 45px;

        border: 1px solid #ccc;
        background: white;

        cursor: pointer;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 14px;
    }

    .size:hover {
        border-color: #111;
    }

    /* ESCONDE O RADIO */

    .size input {
        display: none;
    }

    /* TAMANHO SELECIONADO */

    .size:has(input:checked) {
        background: #111;
        color: white;
        border-color: #111;
    }

    /* BOTÃO CARRINHO */

    .cart-button {
        width: 100%;

        padding: 18px;

        border: none;

        background: #111;
        color: white;

        font-size: 15px;
        font-weight: bold;

        cursor: pointer;

        transition: 0.3s;
    }

    .cart-button:hover {
        background: #333;
    }

    /* FAVORITO */

    .favorite {
        width: 100%;

        margin-top: 15px;

        padding: 15px;

        border: 1px solid #111;

        background: white;

        cursor: pointer;

        font-size: 15px;
    }

    .favorite:hover {
        background: #f5f5f5;
    }

    /* RESPONSIVO */

    @media (max-width: 900px) {

        header {
            padding: 0 20px;
        }

        nav {
            display: none;
        }

        .product-page {
            grid-template-columns: 1fr;
        }

        .product-image {
            padding: 30px;
        }

        .product-image img {
            height: 400px;
        }

        .product-info {
            padding: 40px 25px;
        }


        .header-icons a {
            color: #111;
            text-decoration: none;
            font-size: 20px;
        }

        .header-icons a:hover {
            opacity: 0.5;
        }
    }

</style>


</head>

<body>


<!-- HEADER -->

@include('partials.store-header')

<!-- PRODUTO -->

<main class="product-page">


    <!-- IMAGEM -->

    <div class="product-image">

        <img
            src="{{ $product->image_url }}"
            alt="{{ $product->name }}"
        >

    </div>


    <!-- INFORMAÇÕES -->

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

            R$ {{ number_format($product->price, 2, ',', '.') }}

        </div>


@php
    $sizes = match($product->category->slug) {
        'tenis' => [
            '35', '36', '37', '38',
            '39', '40', '41', '42'
        ],

        'roupas' => [
            'P', 'M', 'G', 'GG'
        ],

        default => [
            'Único'
        ],
    };
@endphp

@auth
    <form
        action="{{ route('cart.add', $product->id) }}"
        method="POST"
        class="cart-form"
    >
        @csrf

        <div class="sizes-title">
            Escolha o tamanho
        </div>

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

        <button
            type="submit"
            class="cart-button"
        >
            ADICIONAR AO CARRINHO
        </button>
    </form>
@else
    <a
        href="{{ route('login') }}"
        class="cart-button"
        style="
            display: block;
            text-align: center;
            text-decoration: none;
        "
    >
        ENTRE PARA ADICIONAR AO CARRINHO
    </a>
@endauth

@auth
    <form
        action="{{ route('favorites.toggle', $product->id) }}"
        method="POST"
    >
        @csrf

        <button
            type="submit"
            class="favorite"
        >
            {{ $isFavorite
                ? '♥ REMOVER DOS FAVORITOS'
                : '♡ ADICIONAR AOS FAVORITOS' }}
        </button>
    </form>
@else
    <a
        href="{{ route('login') }}"
        class="favorite"
        style="
            display: block;
            text-align: center;
            text-decoration: none;
            color: #111;
        "
    >
        ♡ ENTRE PARA FAVORITAR
    </a>
@endauth



    </div>

</main>


</body>

</html>
