<!DOCTYPE html>

<html lang="pt-BR">

<head>


<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Carrinho | AURA Running</title>

<style>

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, Helvetica, sans-serif;
        background: #fff;
        color: #111;
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
        gap: 20px;
        font-size: 20px;
    }

    /* CARRINHO */

    .cart-container {
        max-width: 1200px;

        margin: 0 auto;

        padding: 70px 40px;
    }

    .cart-title {
        font-size: 40px;
        margin-bottom: 50px;
    }

    /* ITEM */

    .cart-item {

        display: grid;

        grid-template-columns: 180px 1fr auto;

        gap: 30px;

        align-items: center;

        padding: 25px 0;

        border-bottom: 1px solid #ddd;
    }

    .cart-image {

        width: 180px;
        height: 180px;

        background: #f5f5f5;

        display: flex;

        align-items: center;
        justify-content: center;
    }

    .cart-image img {

        width: 100%;
        height: 100%;

        object-fit: contain;

    }

    .cart-info h2 {

        font-size: 22px;

        margin-bottom: 10px;

    }

    .cart-info p {

        color: #666;

        margin-bottom: 8px;

    }

    .cart-price {

        font-size: 18px;

        font-weight: bold;

    }

    /* RESUMO */

    .cart-summary {

        margin-top: 50px;

        margin-left: auto;

        max-width: 400px;

        border-top: 1px solid #111;

        padding-top: 25px;

    }

    .summary-line {

        display: flex;

        justify-content: space-between;

        margin-bottom: 20px;

        font-size: 18px;

    }

    .total {

        font-size: 24px;

        font-weight: bold;

    }

    .checkout-button {

        width: 100%;

        padding: 18px;

        margin-top: 20px;

        border: none;

        background: #111;

        color: white;

        font-size: 15px;

        font-weight: bold;

        cursor: pointer;

    }

    .checkout-button:hover {

        background: #333;

    }

    /* CARRINHO VAZIO */

    .empty-cart {

        text-align: center;

        padding: 100px 20px;

    }

    .empty-cart h2 {

        font-size: 30px;

        margin-bottom: 15px;

    }

    .empty-cart p {

        color: #666;

        margin-bottom: 30px;

    }

    .continue-button {

        display: inline-block;

        padding: 15px 30px;

        background: #111;

        color: white;

        text-decoration: none;

        font-weight: bold;

    }

    /* RESPONSIVO */

    @media (max-width: 800px) {

        header {

            padding: 0 20px;

        }

        nav {

            display: none;

        }

        .cart-container {

            padding: 40px 20px;

        }

        .cart-title {

            font-size: 32px;

        }

        .cart-item {

            grid-template-columns: 120px 1fr;

            gap: 20px;

        }

        .cart-image {

            width: 120px;

            height: 120px;

        }

    }

</style>


</head>

<body>


<!-- HEADER -->

<header>

    <div class="logo">
        AURA
    </div>

    <nav>

        <a href="/">
            TÊNIS
        </a>

        <a href="/">
            ROUPAS
        </a>

        <a href="/">
            ACESSÓRIOS
        </a>

    </nav>

    <div class="header-icons">

        <span>♡</span>

        <span>🛒</span>

    </div>

</header>


<!-- CARRINHO -->

<main class="cart-container">

    <h1 class="cart-title">
        Seu carrinho
    </h1>


    @if ($cart && $cart->items->count() > 0)


        @foreach ($cart->items as $item)

            <div class="cart-item">


                <!-- IMAGEM -->

                <div class="cart-image">

                    <img
                        src="{{ asset('storage/' . $item->product->image) }}"
                        alt="{{ $item->product->name }}"
                    >

                </div>


                <!-- INFORMAÇÕES -->

                <div class="cart-info">

                    <h2>
                        {{ $item->product->name }}
                    </h2>

                    <p>
                        Categoria:
                        {{ $item->product->category->name }}
                    </p>

                    <p>
                        Tamanho:
                        {{ $item->size }}
                    </p>

                    <p>
                        Quantidade:
                        {{ $item->quantity }}
                    </p>

                </div>


                <!-- PREÇO -->

                <div class="cart-price">

                    R$
                    {{ number_format($item->product->price * $item->quantity, 2, ',', '.') }}

                </div>


            </div>

        @endforeach


        <!-- RESUMO -->

        <div class="cart-summary">

            <div class="summary-line">

                <span>
                    Total
                </span>

                <span class="total">

                    R$

                    {{ number_format(
                        $cart->items->sum(function ($item) {
                            return $item->product->price * $item->quantity;
                        }),
                        2,
                        ',',
                        '.'
                    ) }}

                </span>

            </div>


           <form
    action="{{ route('orders.checkout') }}"
    method="POST"
>
    @csrf

    <button
        type="submit"
        class="checkout-button"
    >
        IR PARA PAGAMENTO
    </button>

</form>

        </div>


    @else


        <!-- CARRINHO VAZIO -->

        <div class="empty-cart">

            <h2>
                Seu carrinho está vazio
            </h2>

            <p>
                Adicione produtos da AURA Running para começar.
            </p>

            <a
                href="/"
                class="continue-button"
            >
                CONTINUAR COMPRANDO
            </a>

        </div>


    @endif

</main>


</body>

</html>
