<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @include('partials.page-meta', ['pageTitle' => 'Minha Conta'])

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f7f7f7;
            color: #111;
        }

        header {
            height: 80px;
            background: white;
            border-bottom: 1px solid #eee;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 0 50px;
        }

        .logo {
            font-size: 25px;
            font-weight: 800;
            letter-spacing: 3px;
        }

        header a {
            text-decoration: none;
            color: #111;
        }

        .back {
            font-size: 14px;
        }

        .account {
            max-width: 1100px;
            margin: 60px auto;
            padding: 0 25px;
        }

        .account h1 {
            font-size: 38px;
            margin-bottom: 10px;
        }

        .welcome {
            color: #666;
            margin-bottom: 40px;
        }

        .account-content {
            display: grid;
            grid-template-columns: 250px 1fr;
            gap: 25px;
        }

        .menu {
            background: white;
            padding: 15px;
            height: fit-content;
        }

        .menu a,
        .menu button {
            width: 100%;
            display: block;

            padding: 15px;

            border: none;
            background: white;

            text-align: left;

            color: #111;
            text-decoration: none;

            cursor: pointer;

            font-size: 14px;
        }

        .menu a:hover,
        .menu button:hover {
            background: #f3f3f3;
        }

        .profile {
            background: white;
            padding: 35px;
        }

        .profile h2 {
            margin-bottom: 25px;
        }

        .profile-info {
            display: grid;
            gap: 20px;
        }

        .info {
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }

        .info small {
            display: block;
            color: #777;
            margin-bottom: 5px;
        }

        .logout {
            color: #c00 !important;
        }

        @media (max-width: 700px) {

            header {
                padding: 0 20px;
            }

            .account-content {
                grid-template-columns: 1fr;
            }

        }

    </style>

</head>

<body>

<header>

    <a href="/" class="logo">
        AURA
    </a>

    <a href="/" class="back">
        ← Voltar para a loja
    </a>

</header>


<main class="account">

    <h1>Minha conta</h1>

    <p class="welcome">
        Olá, {{ auth()->user()->name }}!
    </p>


    <div class="account-content">

       <!-- MENU -->

<div class="menu">

    <a href="{{ route('profile.edit') }}">
        Meus dados
    </a>

    <a href="{{ route('orders.index') }}">
        Meus pedidos
    </a>

    <a href="{{ route('orders.index') }}">
        Acompanhar entrega
    </a>

    <a href="#">
        Pagamentos
    </a>

    <a href="{{ route('favorites.index') }}">
        Favoritos
    </a>

    <form method="POST" action="{{ route('logout') }}">

        @csrf

        <button type="submit" class="logout">
            Sair
        </button>

    </form>

</div>


        <!-- INFORMAÇÕES -->

        <div class="profile">

            <h2>Meus dados</h2>

            <div class="profile-info">

                <div class="info">

                    <small>Nome</small>

                    {{ auth()->user()->name }}

                </div>

                <div class="info">

                    <small>E-mail</small>

                    {{ auth()->user()->email }}

                </div>

            </div>

        </div>

    </div>

</main>

</body>

</html>
