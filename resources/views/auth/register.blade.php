<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    @include('partials.page-meta', ['pageTitle' => 'Criar conta'])

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
            height: auto;

            display: block;
        }

        .back-store {
            min-height: 40px;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            padding: 0 20px;

            background: #fff;

            color: #111;

            border: 1px solid #ddd;
            border-radius: 999px;

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

            padding: 38px 20px 50px;
        }

        .auth-container {
            width: 100%;
            max-width: 500px;
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
            margin: 10px 0 25px;

            color: #777;

            font-size: 13px;

            line-height: 1.5;
        }


        /* CARD */

        .auth-card {
            padding: 28px 30px;

            background: #fff;

            border: 1px solid #e2e2e2;
            border-radius: 10px;

            box-shadow: 0 8px 30px rgba(0,0,0,.035);
        }


        /* CAMPOS */

        .field {
            margin-bottom: 17px;
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
            height: 49px;

            padding: 0 15px;

            background: #fafafa;

            color: #111;

            border: 1px solid #ddd;
            border-radius: 7px;

            outline: none;

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

            line-height: 1.4;
        }


        /* BOTÃO */

        .register-button {
            width: 100%;
            height: 48px;

            margin-top: 5px;

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

        .register-button:hover {
            background: #fff;

            color: #111;
        }


        /* LOGIN */

        .login-box {
            margin-top: 24px;

            padding-top: 21px;

            border-top: 1px solid #eee;

            text-align: center;
        }

        .login-box p {
            margin-bottom: 11px;

            color: #777;

            font-size: 11px;
        }

        .login-link {
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

        .login-link:hover {
            background: #111;

            color: #fff;

            border-color: #111;
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

                padding-top: 30px;
            }

            h1 {
                font-size: 43px;
            }

            .auth-card {
                padding: 23px 18px;
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
            Criar conta
        </h1>


        <p class="subtitle">
            Cadastre-se para salvar favoritos,
            montar seu carrinho e acompanhar seus pedidos.
        </p>



        <div class="auth-card">


            <form
                method="POST"
                action="{{ route('register') }}"
            >

                @csrf



                {{-- NOME --}}

                <div class="field">


                    <label for="name">
                        Nome completo
                    </label>


                    <input
                        id="name"
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        required
                        autofocus
                        autocomplete="name"
                        placeholder="Digite seu nome"
                    >


                    @error('name')

                        <div class="error">
                            {{ $message }}
                        </div>

                    @enderror


                </div>



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
                        autocomplete="new-password"
                        placeholder="Crie uma senha"
                    >


                    @error('password')

                        <div class="error">
                            {{ $message }}
                        </div>

                    @enderror


                </div>



                {{-- CONFIRMAR SENHA --}}

                <div class="field">


                    <label for="password_confirmation">
                        Confirmar senha
                    </label>


                    <input
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        required
                        autocomplete="new-password"
                        placeholder="Digite a senha novamente"
                    >


                    @error('password_confirmation')

                        <div class="error">
                            {{ $message }}
                        </div>

                    @enderror


                </div>



                <button
                    type="submit"
                    class="register-button"
                >
                    CRIAR CONTA
                </button>


            </form>



            <div class="login-box">


                <p>
                    Já possui uma conta?
                </p>


                <a
                    href="{{ route('login') }}"
                    class="login-link"
                >
                    ENTRAR
                </a>


            </div>


        </div>


    </div>


</main>


</body>

</html>