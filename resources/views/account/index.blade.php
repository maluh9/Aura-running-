<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @include('partials.page-meta', ['pageTitle' => 'Minha Conta'])


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
           HEADER
        ========================================= */

        header {
            height: 82px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 0 55px;

            background: #fff;

            border-bottom: 1px solid #e8e8e8;
        }


        .logo {
            color: #111;

            text-decoration: none;

            font-family: 'Barlow Condensed', sans-serif;

            font-size: 31px;
            font-weight: 700;

            letter-spacing: .20em;
        }


        .store-button {
            min-height: 42px;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            padding: 0 21px;

            background: #fff;

            color: #111;

            border: 1px solid #dcdcdc;
            border-radius: 999px;

            text-decoration: none;

            font-size: 12px;
            font-weight: 600;

            letter-spacing: .03em;

            transition: .2s ease;
        }


        .store-button:hover {
            background: #111;

            color: #fff;

            border-color: #111;

            transform: translateY(-1px);

            box-shadow: 0 7px 20px rgba(0,0,0,.10);
        }



        /* =========================================
           PÁGINA
        ========================================= */

        .account {
            width: 100%;

            max-width: 1180px;

            margin: 0 auto;

            padding: 60px 35px 90px;
        }



        /* =========================================
           CABEÇALHO
        ========================================= */

        .account-header {
            margin-bottom: 38px;
        }


        .page-label {
            margin-bottom: 8px;

            color: #999;

            font-size: 11px;
            font-weight: 600;

            letter-spacing: .15em;

            text-transform: uppercase;
        }


        .account h1 {
            font-family: 'Barlow Condensed', sans-serif;

            font-size: 54px;
            font-weight: 600;

            line-height: .95;

            letter-spacing: -.02em;
        }


        .welcome {
            margin-top: 13px;

            color: #777;

            font-size: 15px;

            line-height: 1.5;
        }


        .welcome strong {
            color: #111;

            font-weight: 600;
        }



        /* =========================================
           GRID
        ========================================= */

        .account-content {
            display: grid;

            grid-template-columns: 290px minmax(0, 1fr);

            gap: 24px;

            align-items: start;
        }



        /* =========================================
           MENU LATERAL
        ========================================= */

        .account-sidebar {
            overflow: hidden;

            background: #fff;

            border: 1px solid #e3e3e3;
            border-radius: 9px;
        }



        /* USUÁRIO */

        .sidebar-user {
            padding: 25px 22px;

            background: #fafafa;

            border-bottom: 1px solid #e8e8e8;
        }


        .user-avatar {
            width: 54px;
            height: 54px;

            display: flex;
            align-items: center;
            justify-content: center;

            margin-bottom: 15px;

            background: #111;

            color: #fff;

            border-radius: 50%;

            font-family: 'Barlow Condensed', sans-serif;

            font-size: 22px;
            font-weight: 600;

            text-transform: uppercase;
        }


        .sidebar-user small {
            display: block;

            margin-bottom: 3px;

            color: #999;

            font-size: 10px;
            font-weight: 600;

            letter-spacing: .10em;

            text-transform: uppercase;
        }


        .sidebar-user strong {
            display: block;

            font-family: 'Barlow Condensed', sans-serif;

            font-size: 20px;
            font-weight: 600;

            line-height: 1.1;
        }


        .sidebar-user p {
            margin-top: 5px;

            color: #888;

            font-size: 11px;

            word-break: break-word;
        }



        /* MENU */

        .menu {
            padding: 10px;
        }


        .menu a,
        .menu button {
            width: 100%;

            min-height: 48px;

            display: flex;
            align-items: center;

            padding: 0 15px;

            background: transparent;

            color: #333;

            border: none;
            border-radius: 6px;

            text-decoration: none;

            font-family: 'Barlow', sans-serif;

            font-size: 13px;
            font-weight: 500;

            text-align: left;

            cursor: pointer;

            transition: .18s ease;
        }


        .menu a:hover,
        .menu button:hover {
            background: #f3f3f3;

            color: #111;
        }


        .menu a.active {
            background: #111;

            color: #fff;
        }


        .menu-divider {
            height: 1px;

            margin: 9px 5px;

            background: #eee;
        }


        .menu form {
            margin: 0;
        }


        .menu .logout {
            color: #a72e2e;
        }


        .menu .logout:hover {
            background: #fff1f1;

            color: #922828;
        }



        /* =========================================
           CONTEÚDO PRINCIPAL
        ========================================= */

        .profile {
            overflow: hidden;

            background: #fff;

            border: 1px solid #e3e3e3;
            border-radius: 9px;
        }


        .profile-header {
            padding: 23px 26px;

            background: #fafafa;

            border-bottom: 1px solid #e9e9e9;
        }


        .profile-label {
            display: block;

            margin-bottom: 4px;

            color: #999;

            font-size: 10px;
            font-weight: 600;

            letter-spacing: .12em;

            text-transform: uppercase;
        }


        .profile-header h2 {
            font-family: 'Barlow Condensed', sans-serif;

            font-size: 27px;
            font-weight: 600;
        }


        .profile-header p {
            margin-top: 5px;

            color: #888;

            font-size: 12px;
        }


        .profile-body {
            padding: 28px 26px;
        }



        /* =========================================
           RESUMO DO PERFIL
        ========================================= */

        .profile-summary {
            display: flex;
            align-items: center;

            gap: 20px;

            margin-bottom: 30px;

            padding-bottom: 27px;

            border-bottom: 1px solid #eee;
        }


        .profile-avatar {
            width: 68px;
            height: 68px;

            flex-shrink: 0;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #111;

            color: #fff;

            border-radius: 50%;

            font-family: 'Barlow Condensed', sans-serif;

            font-size: 27px;
            font-weight: 600;

            text-transform: uppercase;
        }


        .profile-summary-text small {
            display: block;

            margin-bottom: 4px;

            color: #999;

            font-size: 10px;
            font-weight: 600;

            letter-spacing: .08em;

            text-transform: uppercase;
        }


        .profile-summary-text strong {
            display: block;

            font-family: 'Barlow Condensed', sans-serif;

            font-size: 24px;
            font-weight: 600;
        }


        .profile-summary-text p {
            margin-top: 4px;

            color: #888;

            font-size: 12px;
        }



        /* =========================================
           INFORMAÇÕES
        ========================================= */

        .profile-info {
            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 16px;

            margin-bottom: 28px;
        }


        .info {
            min-height: 95px;

            padding: 18px;

            background: #fafafa;

            border: 1px solid #ededed;
            border-radius: 7px;
        }


        .info small {
            display: block;

            margin-bottom: 7px;

            color: #999;

            font-size: 10px;
            font-weight: 600;

            letter-spacing: .09em;

            text-transform: uppercase;
        }


        .info strong {
            color: #222;

            font-size: 14px;
            font-weight: 500;

            word-break: break-word;
        }



        /* =========================================
           AÇÕES RÁPIDAS
        ========================================= */

        .quick-title {
            margin-bottom: 14px;

            font-family: 'Barlow Condensed', sans-serif;

            font-size: 21px;
            font-weight: 600;
        }


        .quick-actions {
            display: grid;

            grid-template-columns: repeat(3, 1fr);

            gap: 12px;
        }


        .quick-action {
            min-height: 92px;

            display: flex;
            flex-direction: column;
            justify-content: center;

            padding: 15px;

            background: #fff;

            color: #111;

            border: 1px solid #e4e4e4;
            border-radius: 7px;

            text-decoration: none;

            transition: .2s ease;
        }


        .quick-action small {
            margin-bottom: 5px;

            color: #999;

            font-size: 9px;
            font-weight: 600;

            letter-spacing: .09em;

            text-transform: uppercase;
        }


        .quick-action strong {
            font-family: 'Barlow Condensed', sans-serif;

            font-size: 17px;
            font-weight: 600;
        }


        .quick-action:hover {
            background: #111;

            color: #fff;

            border-color: #111;

            transform: translateY(-2px);

            box-shadow: 0 7px 18px rgba(0,0,0,.08);
        }


        .quick-action:hover small {
            color: #aaa;
        }



        /* =========================================
           BOTÃO EDITAR
        ========================================= */

        .profile-actions {
            display: flex;

            margin-top: 28px;
        }


        .edit-button {
            min-height: 44px;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            padding: 0 23px;

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


        .edit-button:hover {
            background: #fff;

            color: #111;

            transform: translateY(-1px);

            box-shadow: 0 6px 15px rgba(0,0,0,.08);
        }



        /* =========================================
           ADMIN
        ========================================= */

        .admin-shortcut {
            margin-top: 24px;

            padding: 20px 22px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 20px;

            background: #111;

            color: #fff;

            border-radius: 9px;
        }


        .admin-shortcut small {
            display: block;

            margin-bottom: 3px;

            color: #999;

            font-size: 9px;
            font-weight: 600;

            letter-spacing: .10em;

            text-transform: uppercase;
        }


        .admin-shortcut strong {
            font-family: 'Barlow Condensed', sans-serif;

            font-size: 20px;
            font-weight: 600;
        }


        .admin-button {
            min-height: 40px;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            padding: 0 18px;

            background: #fff;

            color: #111;

            border-radius: 999px;

            text-decoration: none;

            font-size: 11px;
            font-weight: 600;

            white-space: nowrap;

            transition: .2s ease;
        }


        .admin-button:hover {
            background: #e9e9e9;

            transform: translateY(-1px);
        }



        /* =========================================
           RESPONSIVO
        ========================================= */

        @media (max-width: 850px) {

            header {
                padding: 0 22px;
            }


            .account {
                padding: 45px 22px 70px;
            }


            .account h1 {
                font-size: 44px;
            }


            .account-content {
                grid-template-columns: 1fr;
            }


            .quick-actions {
                grid-template-columns: 1fr;
            }

        }


        @media (max-width: 550px) {

            header {
                height: 72px;

                padding: 0 16px;
            }


            .logo {
                font-size: 26px;
            }


            .store-button {
                min-height: 38px;

                padding: 0 15px;

                font-size: 10px;
            }


            .account {
                padding: 35px 16px 60px;
            }


            .profile-info {
                grid-template-columns: 1fr;
            }


            .profile-summary {
                align-items: flex-start;
            }


            .profile-header,
            .profile-body {
                padding-left: 20px;
                padding-right: 20px;
            }


            .admin-shortcut {
                flex-direction: column;

                align-items: flex-start;
            }


            .admin-button {
                width: 100%;
            }

        }

    </style>

</head>


<body>


<header>


    <a
        href="{{ route('home') }}"
        class="logo"
    >

        AURA

    </a>


    <a
        href="{{ route('home') }}"
        class="store-button"
    >

        Voltar para loja

    </a>


</header>



<main class="account">


    {{-- =========================================
         CABEÇALHO
    ========================================= --}}

    <div class="account-header">


        <div class="page-label">

            Sua conta

        </div>


        <h1>

            Minha conta

        </h1>


        <p class="welcome">

            Olá,
            <strong>{{ auth()->user()->name }}</strong>.

            Gerencie seus dados, pedidos e preferências.

        </p>


    </div>



    <div class="account-content">



        {{-- =========================================
             MENU
        ========================================= --}}

        <aside class="account-sidebar">


            <div class="sidebar-user">


                <div class="user-avatar">

                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

                </div>


                <small>

                    Conta AURA

                </small>


                <strong>

                    {{ auth()->user()->name }}

                </strong>


                <p>

                    {{ auth()->user()->email }}

                </p>


            </div>



            <div class="menu">


                <a
                    href="{{ route('profile.edit') }}"
                    class="{{ request()->routeIs('profile.*') ? 'active' : '' }}"
                >

                    Meus dados

                </a>


                <a
                    href="{{ route('orders.index') }}"
                    class="{{ request()->routeIs('orders.*') ? 'active' : '' }}"
                >

                    Meus pedidos

                </a>


                <a href="{{ route('orders.index') }}">

                    Acompanhar entrega

                </a>


                <a href="#">

                    Pagamentos

                </a>


                <a
                    href="{{ route('favorites.index') }}"
                    class="{{ request()->routeIs('favorites.*') ? 'active' : '' }}"
                >

                    Favoritos

                </a>


                <a href="{{ route('profile.password') }}">

                    Alterar senha

                </a>


                <div class="menu-divider"></div>


                <form
                    method="POST"
                    action="{{ route('logout') }}"
                >

                    @csrf


                    <button
                        type="submit"
                        class="logout"
                    >

                        Sair da conta

                    </button>


                </form>


            </div>


        </aside>



        {{-- =========================================
             PERFIL
        ========================================= --}}

        <section>


            <div class="profile">


                <div class="profile-header">


                    <span class="profile-label">

                        Visão geral

                    </span>


                    <h2>

                        Minha conta

                    </h2>


                    <p>

                        Confira as principais informações da sua conta AURA.

                    </p>


                </div>



                <div class="profile-body">



                    {{-- USUÁRIO --}}

                    <div class="profile-summary">


                        <div class="profile-avatar">

                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

                        </div>


                        <div class="profile-summary-text">


                            <small>

                                Perfil

                            </small>


                            <strong>

                                {{ auth()->user()->name }}

                            </strong>


                            <p>

                                {{ auth()->user()->email }}

                            </p>


                        </div>


                    </div>



                    {{-- INFORMAÇÕES --}}

                    <div class="profile-info">


                        <div class="info">


                            <small>

                                Nome

                            </small>


                            <strong>

                                {{ auth()->user()->name }}

                            </strong>


                        </div>



                        <div class="info">


                            <small>

                                E-mail

                            </small>


                            <strong>

                                {{ auth()->user()->email }}

                            </strong>


                        </div>


                    </div>



                    {{-- AÇÕES RÁPIDAS --}}

                    <h3 class="quick-title">

                        Acesso rápido

                    </h3>


                    <div class="quick-actions">


                        <a
                            href="{{ route('orders.index') }}"
                            class="quick-action"
                        >

                            <small>

                                Compras

                            </small>

                            <strong>

                                Meus pedidos

                            </strong>

                        </a>



                        <a
                            href="{{ route('favorites.index') }}"
                            class="quick-action"
                        >

                            <small>

                                Produtos

                            </small>

                            <strong>

                                Meus favoritos

                            </strong>

                        </a>



                        <a
                            href="{{ route('profile.password') }}"
                            class="quick-action"
                        >

                            <small>

                                Segurança

                            </small>

                            <strong>

                                Alterar senha

                            </strong>

                        </a>


                    </div>



                    <div class="profile-actions">


                        <a
                            href="{{ route('profile.edit') }}"
                            class="edit-button"
                        >

                            EDITAR MEUS DADOS

                        </a>


                    </div>


                </div>


            </div>



            {{-- =========================================
                 ATALHO ADMIN
                 SOMENTE PARA ADMINISTRADOR
            ========================================= --}}

            @if(auth()->user()->is_admin)


                <div class="admin-shortcut">


                    <div>


                        <small>

                            Acesso administrativo

                        </small>


                        <strong>

                            Painel AURA

                        </strong>


                    </div>


                    <a
                        href="{{ route('admin.dashboard') }}"
                        class="admin-button"
                    >

                        MODO ADMIN

                    </a>


                </div>


            @endif


        </section>


    </div>


</main>


</body>

</html>