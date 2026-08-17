<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Meus Pedidos | AURA Running</title>

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

        header {
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 50px;
            border-bottom: 1px solid #eee;
        }

        .logo {
            text-decoration: none;
            color: #111;
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
            opacity: .5;
        }

        .header-icons {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .header-icons a {
            text-decoration: none;
            color: #111;
        }

        .user-profile {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #111;
            color: white !important;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: bold;
        }

        .cart-icon {
            font-size: 20px;
        }

        .page {
            padding: 60px 50px;
            max-width: 1200px;
            margin: auto;
        }

        .back {
            display: inline-block;
            margin-bottom: 30px;
            color: #555;
            text-decoration: none;
            font-size: 14px;
        }

        .back:hover {
            color: #111;
        }

        h1 {
            font-size: 40px;
            margin-bottom: 10px;
        }

        .subtitle {
            color: #666;
            margin-bottom: 40px;
        }

        .empty {
            border: 1px solid #eee;
            padding: 60px 30px;
            text-align: center;
        }

        .empty h2 {
            margin-bottom: 12px;
        }

        .empty p {
            color: #666;
            margin-bottom: 25px;
        }

        .shop-button {
            display: inline-block;
            background: #111;
            color: white;
            text-decoration: none;
            padding: 15px 25px;
            font-size: 13px;
            font-weight: bold;
        }

        .orders {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .order {
            border: 1px solid #e5e5e5;
            padding: 25px;
        }

        .order-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .order-number {
            font-weight: bold;
        }

        .status {
            padding: 7px 12px;
            background: #f1f1f1;
            font-size: 12px;
            text-transform: uppercase;
        }

        .items {
            display: flex;
            flex-direction: column;
            gap: 15px;
            border-top: 1px solid #eee;
            padding-top: 20px;
        }

        .item {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .item img {
            width: 90px;
            height: 90px;
            object-fit: contain;
            background: #f5f5f5;
        }

        .item-info {
            flex: 1;
        }

        .item-info h3 {
            font-size: 16px;
            margin-bottom: 7px;
        }

        .item-info p {
            color: #666;
            font-size: 13px;
            margin-bottom: 5px;
        }

        .order-bottom {
            border-top: 1px solid #eee;
            margin-top: 20px;
            padding-top: 20px;

            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .total {
            font-weight: bold;
            font-size: 18px;
        }

        .details {
            background: #111;
            color: white;
            text-decoration: none;
            padding: 13px 20px;
            font-size: 13px;
            font-weight: bold;
        }

        @media (max-width: 800px) {

            header {
                padding: 0 20px;
            }

            nav {
                display: none;
            }

            .page {
                padding: 40px 20px;
            }

            h1 {
                font-size: 32px;
            }

            .order-top,
            .order-bottom {
                align-items: flex-start;
                gap: 15px;
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

<header>

    <a href="{{ url('/') }}" class="logo">
        AURA
    </a>

    <nav>
        <a href="{{ url('/') }}">TÊNIS</a>
        <a href="{{ url('/') }}">ROUPAS</a>
        <a href="{{ url('/') }}">ACESSÓRIOS</a>
    </nav>

    <div class="header-icons">

        <a href="{{ route('account.index') }}" class="user-profile">
            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
        </a>

        <a href="{{ route('cart.index') }}" class="cart-icon">
            🛒
        </a>

    </div>

</header>

<main class="page">

    <a href="{{ route('account.index') }}" class="back">
        ← Voltar para minha conta
    </a>

    <h1>Meus pedidos</h1>

    <p class="subtitle">
        Acompanhe suas compras e veja o status de cada pedido.
    </p>

    @if ($orders->isEmpty())

        <div class="empty">

            <h2>Você ainda não fez nenhum pedido.</h2>

            <p>
                Quando você realizar uma compra, ela aparecerá aqui.
            </p>

            <a href="{{ url('/') }}" class="shop-button">
                EXPLORAR PRODUTOS
            </a>

        </div>

    @else

        <div class="orders">

            @foreach ($orders as $order)

                <div class="order">

                    <div class="order-top">

                        <div>
                            <span>Pedido</span>

                            <div class="order-number">
                                #{{ $order->order_number }}
                            </div>
                        </div>

                        <span class="status">
                            {{ str_replace('_', ' ', $order->status) }}
                        </span>

                    </div>

                    <div class="items">

                        @foreach ($order->items as $item)

                            <div class="item">

                                <img
                                    src="{{ asset('storage/' . $item->product->image) }}"
                                    alt="{{ $item->product->name }}"
                                >

                                <div class="item-info">

                                    <h3>
                                        {{ $item->product->name }}
                                    </h3>

                                    <p>
                                        Tamanho: {{ $item->size }}
                                    </p>

                                    <p>
                                        Quantidade: {{ $item->quantity }}
                                    </p>

                                </div>

                                <strong>
                                    R$ {{ number_format($item->price * $item->quantity, 2, ',', '.') }}
                                </strong>

                            </div>

                        @endforeach

                    </div>

                    <div class="order-bottom">

                        <span class="total">
                            Total:
                            R$ {{ number_format($order->total, 2, ',', '.') }}
                        </span>

                        <a
                            href="{{ route('orders.show', $order->id) }}"
                            class="details"
                        >
                            VER PEDIDO
                        </a>

                    </div>

                </div>

            @endforeach

        </div>

    @endif

</main>

</body>
</html>

