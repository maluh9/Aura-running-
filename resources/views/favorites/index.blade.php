<!DOCTYPE html>

<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>Meus Favoritos | AURA Running</title>

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
    }

    .header-icons a {
        color: #111;
        text-decoration: none;
        font-size: 20px;
    }

    .header-icons a:hover {
        opacity: 0.5;
    }

    .page {
        padding: 60px 50px;
    }

    .page h1 {
        font-size: 38px;
        margin-bottom: 10px;
    }

    .subtitle {
        color: #666;
        margin-bottom: 40px;
    }

    .favorites-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 25px;
    }

    .product-card {
        position: relative;
    }

    .product-image {
        width: 100%;
        height: 360px;
        background: #f5f5f5;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 18px;
    }

    .product-image img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .product-name {
        font-size: 16px;
        font-weight: bold;
        margin-bottom: 8px;
    }

    .product-price {
        font-size: 15px;
        margin-bottom: 15px;
    }

    .product-actions {
        display: flex;
        gap: 10px;
    }

    .view-product {
        flex: 1;
        padding: 13px;
        background: #111;
        color: white;
        text-align: center;
        text-decoration: none;
        font-size: 13px;
        font-weight: bold;
    }

    .remove-button {
        width: 45px;
        border: 1px solid #111;
        background: white;
        cursor: pointer;
        font-size: 18px;
    }

    .remove-button:hover {
        background: #f5f5f5;
    }

    .empty {
        text-align: center;
        padding: 100px 20px;
    }

    .empty h2 {
        font-size: 25px;
        margin-bottom: 15px;
    }

    .empty p {
        color: #666;
        margin-bottom: 25px;
    }

    .empty a {
        display: inline-block;
        padding: 15px 30px;
        background: #111;
        color: white;
        text-decoration: none;
        font-weight: bold;
    }

    @media (max-width: 900px) {

        header {
            padding: 0 20px;
        }

        nav {
            display: none;
        }

        .page {
            padding: 40px 20px;
        }

        .favorites-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 550px) {

        .favorites-grid {
            grid-template-columns: 1fr;
        }
    }
</style>


</head>

<body>

<header>


<div class="logo">
    AURA
</div>

<nav>
    <a href="/">TÊNIS</a>
    <a href="/">ROUPAS</a>
    <a href="/">ACESSÓRIOS</a>
</nav>

<div class="header-icons">

    <a href="{{ route('favorites.index') }}" title="Favoritos">
        ♥
    </a>

    <a href="{{ route('cart.index') }}" title="Carrinho">
        🛒
    </a>

</div>


</header>

<main class="page">


<h1>Meus Favoritos</h1>

<p class="subtitle">
    Produtos que você salvou para depois.
</p>


@if($favorites->count())

    <div class="favorites-grid">

        @foreach($favorites as $favorite)

            <div class="product-card">

                <div class="product-image">

                    <img
                        src="{{ asset('storage/' . $favorite->product->image) }}"
                        alt="{{ $favorite->product->name }}"
                    >

                </div>

                <div class="product-name">
                    {{ $favorite->product->name }}
                </div>

                <div class="product-price">
                    R$ {{ number_format($favorite->product->price, 2, ',', '.') }}
                </div>

                <div class="product-actions">

                    <a
                        href="{{ route('products.show', $favorite->product->slug) }}"
                        class="view-product"
                    >
                        VER PRODUTO
                    </a>

                    <form
                        action="{{ route('favorites.toggle', $favorite->product->id) }}"
                        method="POST"
                    >
                        @csrf

                        <button
                            type="submit"
                            class="remove-button"
                            title="Remover dos favoritos"
                        >
                            ♥
                        </button>

                    </form>

                </div>

            </div>

        @endforeach

    </div>

@else

    <div class="empty">

        <h2>Você ainda não tem favoritos.</h2>

        <p>
            Salve seus produtos favoritos para encontrá-los facilmente depois.
        </p>

        <a href="/">
            EXPLORAR PRODUTOS
        </a>

    </div>

@endif


</main>

</body>
</html>
