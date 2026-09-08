<!DOCTYPE html>

<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    @include('partials.page-meta', ['pageTitle' => 'Perfil'])


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


        /* =========================================
           BOTÃO MINHA CONTA
        ========================================= */

        .back {
            min-height: 42px;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            padding: 0 20px;

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


        .back:hover {
            background: #111;

            color: #fff;

            border-color: #111;

            transform: translateY(-1px);

            box-shadow: 0 7px 20px rgba(0,0,0,.10);
        }



        /* =========================================
           PÁGINA
        ========================================= */

        .page {
            width: 100%;

            max-width: 980px;

            margin: 0 auto;

            padding: 60px 30px 90px;
        }


        .page-header {
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


        h1 {
            font-family: 'Barlow Condensed', sans-serif;

            font-size: 54px;
            font-weight: 600;

            line-height: .95;

            letter-spacing: -.02em;
        }


        .page-subtitle {
            max-width: 530px;

            margin-top: 14px;

            color: #777;

            font-size: 15px;

            line-height: 1.5;
        }



        /* =========================================
           MENSAGENS
        ========================================= */

        .success,
        .error {
            margin-bottom: 24px;

            padding: 16px 18px;

            background: #fff;

            border-radius: 7px;

            font-size: 13px;
        }


        .success {
            color: #28733c;

            border: 1px solid #d7eadb;
            border-left: 4px solid #28733c;
        }


        .error {
            color: #a72e2e;

            border: 1px solid #eed5d5;
            border-left: 4px solid #a72e2e;
        }


        .error div + div {
            margin-top: 5px;
        }



        /* =========================================
           GRID
        ========================================= */

        .profile-grid {
            display: grid;

            grid-template-columns: minmax(0, 1.6fr) minmax(280px, .8fr);

            gap: 24px;

            align-items: start;
        }



        /* =========================================
           CARDS
        ========================================= */

        .card {
            background: #fff;

            border: 1px solid #e3e3e3;
            border-radius: 9px;

            overflow: hidden;
        }


        .card-header {
            padding: 22px 25px;

            background: #fafafa;

            border-bottom: 1px solid #e9e9e9;
        }


        .card-label {
            display: block;

            margin-bottom: 4px;

            color: #999;

            font-size: 10px;
            font-weight: 600;

            letter-spacing: .12em;

            text-transform: uppercase;
        }


        .card-header h2 {
            font-family: 'Barlow Condensed', sans-serif;

            font-size: 24px;
            font-weight: 600;
        }


        .card-header p {
            margin-top: 5px;

            color: #888;

            font-size: 12px;

            line-height: 1.45;
        }


        .card-body {
            padding: 27px 25px;
        }



        /* =========================================
           CAMPOS
        ========================================= */

        .field {
            margin-bottom: 22px;
        }


        .field:last-of-type {
            margin-bottom: 27px;
        }


        .field label {
            display: block;

            margin-bottom: 8px;

            color: #444;

            font-size: 11px;
            font-weight: 600;

            letter-spacing: .05em;

            text-transform: uppercase;
        }


        .field input {
            width: 100%;
            height: 52px;

            padding: 0 16px;

            background: #fafafa;

            border: 1px solid #ddd;
            border-radius: 5px;

            color: #111;

            font-family: 'Barlow', sans-serif;

            font-size: 14px;

            outline: none;

            transition: .2s ease;
        }


        .field input:hover {
            border-color: #bdbdbd;
        }


        .field input:focus {
            background: #fff;

            border-color: #111;

            box-shadow: 0 0 0 1px #111;
        }



        /* =========================================
           BOTÃO SALVAR
        ========================================= */

        .save-button {
            min-height: 46px;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            padding: 0 25px;

            background: #111;

            color: #fff;

            border: 1px solid #111;
            border-radius: 999px;

            font-family: 'Barlow', sans-serif;

            font-size: 11px;
            font-weight: 600;

            letter-spacing: .06em;

            cursor: pointer;

            transition: .2s ease;
        }


        .save-button:hover {
            background: #fff;

            color: #111;

            transform: translateY(-1px);

            box-shadow: 0 6px 16px rgba(0,0,0,.08);
        }



        /* =========================================
           CARD DE SENHA
        ========================================= */

        .security-icon {
            width: 46px;
            height: 46px;

            display: flex;
            align-items: center;
            justify-content: center;

            margin-bottom: 20px;

            background: #111;

            color: #fff;

            border-radius: 50%;

            font-family: 'Barlow Condensed', sans-serif;

            font-size: 18px;
            font-weight: 600;
        }


        .security-title {
            margin-bottom: 7px;

            font-family: 'Barlow Condensed', sans-serif;

            font-size: 22px;
            font-weight: 600;
        }


        .security-text {
            margin-bottom: 23px;

            color: #777;

            font-size: 13px;

            line-height: 1.5;
        }


        .password-link {
            width: 100%;
            min-height: 44px;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            background: #fff;

            color: #111;

            border: 1px solid #111;
            border-radius: 999px;

            text-decoration: none;

            font-size: 11px;
            font-weight: 600;

            letter-spacing: .05em;

            transition: .2s ease;
        }


        .password-link:hover {
            background: #111;

            color: #fff;

            transform: translateY(-1px);
        }



        /* =========================================
           BLOCO DA CONTA
        ========================================= */

        .account-info {
            margin-top: 24px;

            padding-top: 20px;

            border-top: 1px solid #eee;
        }


        .account-info span {
            display: block;

            margin-bottom: 5px;

            color: #999;

            font-size: 10px;
            font-weight: 600;

            letter-spacing: .08em;

            text-transform: uppercase;
        }


        .account-info strong {
            color: #333;

            font-size: 13px;
            font-weight: 500;

            word-break: break-word;
        }



        /* =========================================
           RESPONSIVO
        ========================================= */

        @media (max-width: 800px) {

            header {
                padding: 0 22px;
            }


            .page {
                padding: 45px 22px 70px;
            }


            h1 {
                font-size: 43px;
            }


            .profile-grid {
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


            .back {
                min-height: 38px;

                padding: 0 15px;

                font-size: 11px;
            }


            .page {
                padding: 35px 16px 60px;
            }


            .card-header,
            .card-body {
                padding-left: 20px;
                padding-right: 20px;
            }


            .save-button {
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
        href="{{ route('account.index') }}"
        class="back"
    >

        Minha conta

    </a>


</header>



<main class="page">


    {{-- =========================================
         CABEÇALHO
    ========================================= --}}

    <div class="page-header">


        <div class="page-label">

            Sua conta

        </div>


        <h1>

            Meus dados

        </h1>


        <p class="page-subtitle">

            Gerencie suas informações pessoais e mantenha
            os dados da sua conta atualizados.

        </p>


    </div>



    {{-- =========================================
         SUCESSO
    ========================================= --}}

    @if (session('status') === 'profile-updated')


        <div class="success">

            Seus dados foram atualizados com sucesso.

        </div>


    @endif



    {{-- =========================================
         ERROS
    ========================================= --}}

    @if ($errors->any())


        <div class="error">


            @foreach ($errors->all() as $error)


                <div>

                    {{ $error }}

                </div>


            @endforeach


        </div>


    @endif



    {{-- =========================================
         CONTEÚDO
    ========================================= --}}

    <div class="profile-grid">



        {{-- =========================================
             DADOS PESSOAIS
        ========================================= --}}

        <div class="card">


            <div class="card-header">


                <span class="card-label">

                    Perfil

                </span>


                <h2>

                    Informações pessoais

                </h2>


                <p>

                    Essas informações serão utilizadas
                    para identificar sua conta na AURA.

                </p>


            </div>



            <div class="card-body">


                <form
                    method="POST"
                    action="{{ route('profile.update') }}"
                    enctype="multipart/form-data"
                >


                    @csrf

                    @method('PATCH')



                    {{-- NOME --}}

                    <div class="field">


                        <label for="name">

                            Nome

                        </label>


                        <input
                            id="name"
                            type="text"
                            name="name"
                            value="{{ old('name', $user->name) }}"
                            autocomplete="name"
                            required
                        >


                    </div>



                    {{-- EMAIL --}}

                    <div class="field">


                        <label for="email">

                            E-mail

                        </label>


                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email', $user->email) }}"
                            autocomplete="email"
                            required
                        >


                    </div>



                    <button
                        type="submit"
                        class="save-button"
                    >

                        SALVAR ALTERAÇÕES

                    </button>


                </form>


            </div>


        </div>



        {{-- =========================================
             SEGURANÇA / SENHA
        ========================================= --}}

        <div class="card">


            <div class="card-header">


                <span class="card-label">

                    Segurança

                </span>


                <h2>

                    Sua conta

                </h2>


            </div>



            <div class="card-body">


                <div class="security-icon">

                    A

                </div>


                <div class="security-title">

                    Senha

                </div>


                <p class="security-text">

                    Mantenha sua conta protegida utilizando
                    uma senha segura e atualizada.

                </p>


                <a
                    href="{{ route('profile.password') }}"
                    class="password-link"
                >

                    ALTERAR SENHA

                </a>



                <div class="account-info">


                    <span>

                        Conta conectada

                    </span>


                    <strong>

                        {{ $user->email }}

                    </strong>


                </div>


            </div>


        </div>


    </div>


</main>


</body>

</html>