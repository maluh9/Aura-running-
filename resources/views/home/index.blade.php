<!DOCTYPE html>

<html lang="pt-BR">

<head>
    <meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>AURA Running</title>

<style>

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, Helvetica, sans-serif;
        background: #ffffff;
        color: #111111;
    }

    /* =========================
       HEADER
    ========================= */

    header {
        width: 100%;
        height: 80px;

        display: flex;
        align-items: center;
        justify-content: space-between;

        padding: 0 50px;

        border-bottom: 1px solid #eeeeee;

        background: #ffffff;
    }

    /* AURA CLICÁVEL */

    .logo {
        font-size: 25px;
        font-weight: 800;
        letter-spacing: 3px;

        text-decoration: none;
        color: #111111;

        transition: 0.2s;
    }

    .logo:hover {
        opacity: 0.6;
    }

    /* MENU */

    nav {
        display: flex;
        gap: 35px;
    }

    nav a {
        text-decoration: none;
        color: #111111;

        font-size: 14px;
        font-weight: 500;
    }

    nav a:hover {
        opacity: 0.5;
    }

    /* ÍCONES */

    .header-icons {
        display: flex;
        align-items: center;
        gap: 20px;

        font-size: 20px;
    }

    .header-icons a {
        text-decoration: none;
        color: #111111;
    }

    /* PERFIL */

    .user-profile {
        width: 38px;
        height: 38px;

        border-radius: 50%;

        background: #111111;
        color: white !important;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 14px;
        font-weight: bold;

        transition: 0.3s;
    }

    .user-profile:hover {
        transform: scale(1.05);
    }

    /* LOGIN */

    .login-link {
        font-size: 13px;
        font-weight: 600;
    }

    /* FAVORITOS DO HEADER */

    .favorite-header {
        font-size: 23px;
        line-height: 1;

        transition: 0.2s;
    }

    .favorite-header:hover {
        transform: scale(1.1);
    }

    /* CARRINHO */

    .cart-icon {
        font-size: 20px;
    }


    /* =========================
       HERO
    ========================= */

    .hero {
        height: calc(100vh - 80px);

        display: flex;
        flex-direction: column;

        justify-content: center;
        align-items: center;

        text-align: center;

        background: #f3f3f3;
    }

    .hero h1 {
        font-size: 70px;
        font-weight: 800;

        letter-spacing: 5px;

        margin-bottom: 15px;
    }

    .hero p {
        font-size: 18px;

        margin-bottom: 30px;

        color: #555555;
    }

    .hero-button {
        display: inline-block;

        padding: 16px 35px;

        background: #111111;
        color: white;

        text-decoration: none;

        font-size: 14px;
        font-weight: bold;

        transition: 0.3s;
    }

    .hero-button:hover {
        background: #333333;
    }


    /* =========================
       PRODUTOS
    ========================= */

    .products-section {
        padding: 80px 50px;
    }

    .section-title {
        font-size: 35px;

        margin-bottom: 40px;
    }

    .products {
        display: grid;

        grid-template-columns: repeat(3, 1fr);

        gap: 25px;
    }

    .product {
        position: relative;

        background: #f5f5f5;

        min-height: 450px;

        padding: 25px;

        display: flex;
        flex-direction: column;

        justify-content: flex-end;

        transition: transform 0.3s ease;
    }

    .product:hover {
        transform: translateY(-5px);
    }

    .product-link {
        text-decoration: none;
        color: inherit;

        display: block;
    }

    /* IMAGEM */

    .product-image {
        width: 100%;
        height: 320px;

        display: flex;
        align-items: center;
        justify-content: center;

        margin-bottom: 20px;

        overflow: hidden;
    }

    .product-image img {
        width: 100%;
        height: 100%;

        object-fit: contain;

        display: block;
    }

    /* NOME */

    .product h3 {
        font-size: 20px;

        margin-bottom: 8px;
    }

    /* CATEGORIA */

    .product p {
        color: #555555;

        margin-bottom: 10px;
    }

    /* PREÇO */

    .price {
        font-weight: bold;

        font-size: 18px;
    }


    /* =========================
       FAVORITO DO PRODUTO
    ========================= */

    .favorite-button {
        position: absolute;

        top: 18px;
        right: 18px;

        width: 40px;
        height: 40px;

        border: none;
        border-radius: 50%;

        background: white;
        color: #111111;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 21px;

        cursor: pointer;

        z-index: 5;

        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);

        transition: 0.2s;
    }

    .favorite-button:hover {
        transform: scale(1.08);
    }


    /* =========================
       RESPONSIVO
    ========================= */

    @media (max-width: 800px) {

        header {
            padding: 0 20px;
        }

        nav {
            display: none;
        }

        .hero h1 {
            font-size: 45px;
        }

        .products {
            grid-template-columns: 1fr;
        }

        .products-section {
            padding: 50px 20px;
        }

    }


</style>


</head>

<body>


<!-- =========================
     HEADER
========================= -->

<header>

    <!-- AURA VOLTA PARA A HOME -->

    <a
        href="{{ url('/') }}"
        class="logo"
    >
        AURA
    </a>


    <!-- MENU -->

    <nav>

        <a href="#">
            TÊNIS
        </a>

        <a href="#">
            ROUPAS
        </a>

        <a href="#">
            ACESSÓRIOS
        </a>

    </nav>


    <!-- ÍCONES -->

    <div class="header-icons">


        <!-- USUÁRIO -->

@auth

 <a
    href="{{ route('account.index') }}"
    class="user-profile"
    title="Minha conta"
>
    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
</a>
@else

    <a
        href="{{ route('login') }}"
        class="login-link"
    >
        ENTRAR
    </a>

@endauth


        <!-- FAVORITOS -->

        <a
            href="{{ route('favorites.index') }}"
            class="favorite-header"
            title="Favoritos"
        >
            ♡
        </a>


        <!-- CARRINHO -->

        <a
            href="{{ route('cart.index') }}"
            class="cart-icon"
            title="Carrinho"
        >
            🛒
        </a>


    </div>

</header>


<!-- =========================
     HERO
========================= -->

<section class="hero">

    <h1>
        AURA RUNNING
    </h1>

    <p>
        MOVE WITH YOUR AURA
    </p>

    <a
        href="#produtos"
        class="hero-button"
    >
        EXPLORAR PRODUTOS
    </a>

</section>


<!-- =========================
     PRODUTOS
========================= -->

<section
    class="products-section"
    id="produtos"
>

    <h2 class="section-title">
        Destaques
    </h2>


    <div class="products">


        @foreach ($products as $product)


            <div class="product">


                <!-- FAVORITO -->

                @auth

                    <form
                        action="{{ route('favorites.toggle', $product->id) }}"
                        method="POST"
                    >

                        @csrf

                        <button
                            type="submit"
                            class="favorite-button"
                            title="Adicionar aos favoritos"
                        >
                            ♡
                        </button>

                    </form>

                @else

                    <a
                        href="{{ route('login') }}"
                        class="favorite-button"
                        title="Entre para favoritar"
                    >
                        ♡
                    </a>

                @endauth


                <!-- PRODUTO -->

                <a
                    href="{{ route('products.show', $product->slug) }}"
                    class="product-link"
                >


                    <!-- IMAGEM -->

                    <div class="product-image">

                        <img
                            src="{{ asset('storage/' . $product->image) }}"
                            alt="{{ $product->name }}"
                        >

                    </div>


                    <!-- NOME -->

                    <h3>
                        {{ $product->name }}
                    </h3>


                    <!-- CATEGORIA -->

                    <p>
                        {{ $product->category->name }}
                    </p>


                    <!-- PREÇO -->

                    <span class="price">

                        R$
                        {{ number_format($product->price, 2, ',', '.') }}

                    </span>


                </a>


            </div>


        @endforeach


    </div>

</section>


</body>

</html>
