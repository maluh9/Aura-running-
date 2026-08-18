<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Admin') | AURA Running</title>

    <link rel="icon" type="image/png" href="{{ asset('favicon.ico') }}">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>

        @import url('https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@400;500;600;700&family=Barlow:wght@400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Barlow', sans-serif;
            background: #f4f4f4;
            color: #111;
        }

        /* =========================================
           ESTRUTURA
        ========================================= */

        .admin-container {
            min-height: 100vh;
            display: flex;
        }


        /* =========================================
           MENU LATERAL
        ========================================= */

        .sidebar {
            width: 270px;
            height: 100vh;

            position: fixed;
            top: 0;
            left: 0;

            background: #111;

            display: flex;
            flex-direction: column;

            color: white;
        }


        /* LOGO */

        .sidebar-logo {
            height: 110px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-bottom: 1px solid rgba(255,255,255,.12);
        }

        .sidebar-logo img {
            width: 150px;
            max-height: 70px;
            object-fit: contain;
        }


        /* MENU */

        .sidebar-menu {
            flex: 1;
            padding: 34px 18px;
        }

        .menu-label {
            color: #686868;

            font-family: 'Barlow Condensed', sans-serif;

            font-size: 12px;
            font-weight: 600;

            text-transform: uppercase;
            letter-spacing: .16em;

            padding-left: 15px;

            margin-bottom: 14px;
        }


        .sidebar-menu a {

            display: flex;
            align-items: center;

            gap: 14px;

            padding: 14px 16px;

            margin-bottom: 5px;

            text-decoration: none;

            color: rgba(255,255,255,.72);

            font-family: 'Barlow Condensed', sans-serif;

            font-size: 16px;
            font-weight: 500;

            text-transform: uppercase;
            letter-spacing: .08em;

            border-radius: 6px;

            transition: .2s ease;
        }


        .sidebar-menu a:hover {

            color: white;

            background: rgba(255,255,255,.10);
        }


        .sidebar-menu a.ativo {

            background: white;

            color: #111;
        }


        .sidebar-menu i {

            width: 21px;

            text-align: center;

            font-size: 16px;
        }


        /* =========================================
           USUÁRIO
        ========================================= */

        .sidebar-user {

            padding: 22px;

            border-top: 1px solid rgba(255,255,255,.12);
        }


        .user-area {

            display: flex;

            align-items: center;

            gap: 12px;

            margin-bottom: 17px;
        }


        .user-avatar {

            width: 42px;

            height: 42px;

            border-radius: 50%;

            background: white;

            color: #111;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 18px;

            font-weight: 700;
        }


        .user-name {

            font-size: 15px;

            font-weight: 600;
        }


        .user-role {

            color: #777;

            font-size: 12px;

            margin-top: 2px;
        }


        .btn-sair {

            width: 100%;

            height: 40px;

            border-radius: 999px;

            border: 1px solid rgba(255,255,255,.25);

            background: transparent;

            color: white;

            cursor: pointer;

            font-family: 'Barlow', sans-serif;

            font-size: 14px;

            transition: .2s ease;
        }


        .btn-sair:hover {

            background: white;

            color: #111;
        }


        /* =========================================
           CONTEÚDO
        ========================================= */

        .main {

            margin-left: 270px;

            width: calc(100% - 270px);

            min-height: 100vh;
        }


        /* =========================================
           TOPO
        ========================================= */

        .topbar {

            height: 110px;

            background: white;

            border-bottom: 1px solid #e8e8e8;

            padding: 0 45px;

            display: flex;

            align-items: center;

            justify-content: space-between;
        }


        .topbar-esquerda h1 {

            font-family: 'Barlow Condensed', sans-serif;

            font-size: 29px;

            font-weight: 600;

            text-transform: uppercase;

            letter-spacing: .05em;
        }


        .topbar-esquerda p {

            color: #8a8a8a;

            font-size: 13px;

            margin-top: 5px;
        }


        .btn-loja {

            width: 44px;

            height: 44px;

            border-radius: 50%;

            border: 1px solid #ddd;

            display: flex;

            align-items: center;

            justify-content: center;

            text-decoration: none;

            color: #111;

            background: white;

            transition: .2s;
        }


        .btn-loja:hover {

            background: #111;

            color: white;

            border-color: #111;
        }


        /* =========================================
           CONTEÚDO DAS PÁGINAS
        ========================================= */

        .content {

            padding: 45px;
        }


        /* =========================================
           CABEÇALHO DASHBOARD
        ========================================= */

        .dashboard-header {

            margin-bottom: 38px;
        }


        .dashboard-header h2 {

            font-family: 'Barlow Condensed', sans-serif;

            font-size: 52px;

            font-weight: 600;

            line-height: 1;
        }


        .dashboard-header p {

            color: #777;

            font-size: 16px;

            margin-top: 10px;
        }


        /* =========================================
           CARDS
        ========================================= */

        .stats-grid {

            display: grid;

            grid-template-columns: repeat(4, 1fr);

            gap: 18px;

            margin-bottom: 25px;
        }


        .stat-card {

            background: white;

            border: 1px solid #e5e5e5;

            border-radius: 7px;

            min-height: 170px;

            padding: 25px;

            transition: .2s ease;
        }


        .stat-card:hover {

            transform: translateY(-3px);

            box-shadow: 0 10px 30px rgba(0,0,0,.05);
        }


        .stat-icon {

            width: 43px;

            height: 43px;

            background: #111;

            color: white;

            border-radius: 50%;

            display: flex;

            align-items: center;

            justify-content: center;

            margin-bottom: 25px;
        }


        .stat-label {

            color: #777;

            font-size: 14px;

            margin-bottom: 3px;
        }


        .stat-number {

            font-family: 'Barlow Condensed', sans-serif;

            font-size: 38px;

            font-weight: 600;
        }


        /* =========================================
           PARTE INFERIOR
        ========================================= */

        .dashboard-grid {

            display: grid;

            grid-template-columns: 2fr 1fr;

            gap: 18px;
        }


        .dashboard-box {

            background: white;

            border: 1px solid #e5e5e5;

            border-radius: 7px;

            min-height: 260px;

            padding: 26px;
        }


        .dashboard-box-header {

            display: flex;

            justify-content: space-between;

            align-items: center;

            padding-bottom: 20px;

            border-bottom: 1px solid #eee;

            margin-bottom: 20px;
        }


        .dashboard-box-header h3 {

            font-family: 'Barlow Condensed', sans-serif;

            text-transform: uppercase;

            font-size: 21px;

            letter-spacing: .05em;
        }


        .dashboard-box-header a {

            color: #111;

            font-size: 13px;

            text-decoration: none;

            border-bottom: 1px solid #111;
        }


        .dashboard-empty {

            color: #999;

            font-size: 14px;

            padding-top: 15px;
        }


        /* =========================================
   TABELA DE PEDIDOS
========================================= */

.admin-table {
    width: 100%;
    border-collapse: collapse;
}

.admin-table th {
    text-align: left;
    padding: 12px 10px;

    color: #888;

    font-size: 12px;
    font-weight: 600;

    text-transform: uppercase;
    letter-spacing: .08em;

    border-bottom: 1px solid #eeeeee;
}

.admin-table td {
    padding: 16px 10px;

    font-size: 14px;

    border-bottom: 1px solid #f0f0f0;
}

.admin-table tbody tr:hover {
    background: #fafafa;
}

.status-badge {
    display: inline-block;

    background: #f1f1f1;

    padding: 6px 11px;

    border-radius: 999px;

    font-size: 12px;
    font-weight: 600;
}


/* =========================================
   ESTOQUE BAIXO
========================================= */

.stock-item {
    display: flex;
    align-items: center;
    justify-content: space-between;

    padding: 15px 0;

    border-bottom: 1px solid #eeeeee;
}

.stock-item:last-child {
    border-bottom: none;
}

.stock-item strong {
    font-size: 14px;
}

.stock-item p {
    margin-top: 4px;

    color: #999;

    font-size: 12px;
}

.stock-number {
    width: 38px;
    height: 38px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #111;
    color: #fff;

    border-radius: 50%;

    font-weight: 600;
}


        /* =========================================
           RESPONSIVO
        ========================================= */

     @media (max-width: 1100px) {

    .stats-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .dashboard-grid {
        grid-template-columns: 1fr;
    }

}

</style>

@yield('page-styles')

</head>



<body>


<div class="admin-container">


    <!-- =========================
         MENU LATERAL
    ========================== -->

    <aside class="sidebar">


        <div class="sidebar-logo">

            <img
                src="{{ asset('imagens/ChatGPT Image 28 de abr. de 2026, 08_44_05.png') }}"
                alt="Aura Running"
            >

        </div>


        <nav class="sidebar-menu">


            <div class="menu-label">

                Gerenciamento

            </div>


           <a
    href="{{ route('admin.dashboard') }}"
    class="{{ request()->routeIs('admin.dashboard') ? 'ativo' : '' }}"
>

    <i class="fa-solid fa-chart-line"></i>

    Dashboard

</a>


<a
    href="{{ route('admin.products.index') }}"
    class="{{ request()->routeIs('admin.products.*') ? 'ativo' : '' }}"
>

    <i class="fa-solid fa-box"></i>

    Produtos

</a>


            <a
    href="{{ route('admin.stock.index') }}"
    class="{{ request()->routeIs('admin.stock.*') ? 'ativo' : '' }}"
>

    <i class="fa-solid fa-boxes-stacked"></i>

    Estoque

</a>


            <a
    href="{{ route('admin.categories.index') }}"
    class="{{ request()->routeIs('admin.categories.*') ? 'ativo' : '' }}"
>

    <i class="fa-solid fa-tags"></i>

    Categorias

</a>

            <a href="#">

                <i class="fa-solid fa-bag-shopping"></i>

                Pedidos

            </a>


            <a href="#">

                <i class="fa-solid fa-users"></i>

                Clientes

            </a>


        </nav>


        <!-- USUÁRIO -->

        <div class="sidebar-user">


            <div class="user-area">


                <div class="user-avatar">

                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

                </div>


                <div>

                    <div class="user-name">

                        {{ auth()->user()->name }}

                    </div>


                    <div class="user-role">

                        Administrador

                    </div>

                </div>


            </div>


            <form method="POST" action="{{ url('/logout') }}">

                @csrf

                <button type="submit" class="btn-sair">

                    Sair

                </button>

            </form>


        </div>


    </aside>



    <!-- =========================
         PRINCIPAL
    ========================== -->

    <main class="main">


        <header class="topbar">


            <div class="topbar-esquerda">

                <h1>

                    @yield('page-title', 'Dashboard')

                </h1>


                <p>

                    AURA Running • Administração

                </p>

            </div>


            <a href="{{ url('/') }}" class="btn-loja" title="Visualizar loja">

                <i class="fa-solid fa-arrow-up-right-from-square"></i>

            </a>


        </header>



        <div class="content">

            @yield('content')

        </div>


    </main>


</div>


</body>

</html>