<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @include('partials.page-meta', ['pageTitle' => 'Entrar'])

    <style>

        @import url('https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@400;500;600;700&family=Barlow:wght@400;500;600&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            background: #f6f6f6;
            color: #111;
            font-family: 'Barlow', sans-serif;
        }


        /* HEADER */

        .auth-header {
            height: 82px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 0 55px;

            background: #fff;
            border-bottom: 1px solid #e7e7e7;
        }

        .auth-logo img {
            width: 105px;
            display: block;
        }

        .back-store {
            min-height: 40px;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            padding: 0 20px;

            border: 1px solid #ddd;
            border-radius: 999px;

            color: #111;
            text-decoration: none;

            font-size: 11px;
            font-weight: 600;

            transition: .2s;
        }

        .back-store:hover {
            background: #111;
            color: #fff;
            border-color: #111;
        }


        /* PÁGINA */

        .auth-page {
            min-height: calc(100vh - 82px);

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 45px 20px;
        }

        .auth-container {
            width: 100%;
            max-width: 470px;
        }


        /* TÍTULO */

        .page-label {
            display: block;

            margin-bottom: 7px;

            color: #999;

            font-size: 10px;
            font-weight: 600;

            letter-spacing: .16em;

            text-transform: uppercase;
        }

        h1 {
            margin: 0;

            font-family: 'Barlow Condensed', sans-serif;

            font-size: 50px;
            font-weight: 600;

            line-height: 1;
        }

        .subtitle {
            margin: 10px 0 27px;

            color: #777;

            font-size: 13px;

            line-height: 1.5;
        }


        /* CARD */

        .auth-card {
            padding: 30px;

            background: #fff;

            border: 1px solid #e2e2e2;
            border-radius: 10px;

            box-shadow: 0 8px 30px rgba(0,0,0,.035);
        }


        /* CAMPOS */

        .field {
            margin-bottom: 19px;
        }

        .field label {
            display: block;

            margin-bottom: 7px;

            color: #333;

            font-size: 10px;
            font-weight: 600;

            letter-spacing: .07em;

            text-transform: uppercase;
        }

        .field input {
            width: 100%;
            height: 50px;

            padding: 0 15px;

            background: #fafafa;

            border: 1px solid #ddd;
            border-radius: 7px;

            outline: none;

            color: #111;

            font-family: 'Barlow', sans-serif;
            font-size: 14px;

            transition: .2s;
        }

        .field input:focus {
            background: #fff;
            border-color: #111;

            box-shadow: 0 0 0 3px rgba(0,0,0,.035);
        }


        /* ERRO */

        .error {
            margin-top: 6px;

            color: #a72e2e;

            font-size: 11px;
        }


        /* OPÇÕES */

        .options {
            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 15px;

            margin: 2px 0 23px;
        }

        .remember {
            display: inline-flex;
            align-items: center;

            gap: 7px;

            color: #666;

            font-size: 11px;
        }

        .remember input {
            accent-color: #111;
        }

        .forgot {
            color: #555;

            text-decoration: none;

            font-size: 11px;
        }

        .forgot:hover {
            color: #111;
            text-decoration: underline;
        }


        /* BOTÃO */

        .login-button {
            width: 100%;
            height: 48px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #111;

            color: #fff;

            border: 1px solid #111;
            border-radius: 999px;

            font-family: 'Barlow', sans-serif;

            font-size: 10px;
            font-weight: 600;

            letter-spacing: .08em;

            cursor: pointer;

            transition: .2s;
        }

        .login-button:hover {
            background: #fff;
            color: #111;
        }


        /* CADASTRO */

        .register-box {
            margin-top: 25px;

            padding-top: 22px;

            border-top: 1px solid #eee;

            text-align: center;
        }

        .register-box p {
            margin-bottom: 11px;

            color: #777;

            font-size: 11px;
        }

        .register-link {
            min-height: 40px;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            padding: 0 19px;

            border: 1px solid #ddd;
            border-radius: 999px;

            color: #111;

            text-decoration: none;

            font-size: 10px;
            font-weight: 600;

            transition: .2s;
        }

        .register-link:hover {
            background: #111;
            color: #fff;
            border-color: #111;
        }


        /* STATUS */

        .status {
            margin-bottom: 18px;

            padding: 12px 14px;

            background: #edf8ef;

            color: #286c39;

            border: 1px solid #d5ead9;
            border-radius: 7px;

            font-size: 11px;
        }


        /* RESPONSIVO */

        @media(max-width: 550px) {

            .auth-header {
                height: 72px;
                padding: 0 16px;
            }

            .auth-logo img {
                width: 90px;
            }

            .auth-page {
                min-height: calc(100vh - 72px);

                align-items: flex-start;

                padding-top: 35px;
            }

            h1 {
                font-size: 43px;
            }

            .auth-card {
                padding: 23px 18px;
            }

            .options {
                align-items: flex-start;
                flex-direction: column;
            }

        }

    </style>

</head>

<body>


<header class="auth-header">

    <a
        href="{{ route('home') }}"
        class="auth-logo"
    >
        <img
            src="{{ asset('imagens/ChatGPT Image 28 de abr. de 2026, 12_48_49.png') }}"
            alt="AURA Running"
        >
    </a>


    <a
        href="{{ route('home') }}"
        class="back-store"
    >
        Voltar para loja
    </a>

</header>



<main class="auth-page">

    <div class="auth-container">


        <span class="page-label">
            AURA Running
        </span>


        <h1>
            Entrar
        </h1>


        <p class="subtitle">
            Entre na sua conta para acessar seus pedidos,
            favoritos e preferências.
        </p>



        @if(session('status'))

            <div class="status">
                {{ session('status') }}
            </div>

        @endif



        <div class="auth-card">


            <form
                method="POST"
                action="{{ route('login') }}"
            >

                @csrf


                {{-- E-MAIL --}}

                <div class="field">

                    <label for="email">
                        E-mail
                    </label>

                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        autocomplete="username"
                        placeholder="seuemail@exemplo.com"
                    >

                    @error('email')

                        <div class="error">
                            {{ $message }}
                        </div>

                    @enderror

                </div>



                {{-- SENHA --}}

                <div class="field">

                    <label for="password">
                        Senha
                    </label>

                    <input
                        id="password"
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password"
                        placeholder="Digite sua senha"
                    >

                    @error('password')

                        <div class="error">
                            {{ $message }}
                        </div>

                    @enderror

                </div>



                <div class="options">


                    <label
                        for="remember_me"
                        class="remember"
                    >

                        <input
                            id="remember_me"
                            type="checkbox"
                            name="remember"
                        >

                        <span>
                            Lembrar de mim
                        </span>

                    </label>



                    @if(Route::has('password.request'))

                        <a
                            href="{{ route('password.request') }}"
                            class="forgot"
                        >
                            Esqueci minha senha
                        </a>

                    @endif


                </div>



                <button
                    type="submit"
                    class="login-button"
                >
                    ENTRAR
                </button>


            </form>



            <div class="register-box">

                <p>
                    Ainda não tem uma conta?
                </p>

                <a
                    href="{{ route('register') }}"
                    class="register-link"
                >
                    CRIAR CONTA
                </a>

            </div>


        </div>


    </div>

</main>


</body>

</html>