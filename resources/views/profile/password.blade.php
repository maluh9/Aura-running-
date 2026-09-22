<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    @include(
        'partials.page-meta',
        ['pageTitle' => 'Alterar Senha']
    )


    <style>

        @import url('https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@400;500;600;700&family=Barlow:wght@400;500;600&display=swap');


        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        body {
            font-family: 'Barlow', sans-serif;

            background: #f7f7f7;

            color: #111;
        }



        /* =========================================
           PÁGINA
        ========================================= */

        .page {
            width: 100%;
            max-width: 760px;

            margin: 0 auto;

            padding: 48px 30px 70px;
        }



        /* =========================================
           VOLTAR
        ========================================= */

        .back-wrapper {
            margin-bottom: 28px;
        }


        .back {
            display: inline-flex;

            align-items: center;

            gap: 8px;

            color: #111;

            text-decoration: none;

            font-size: 14px;
            font-weight: 500;
        }


        .back:hover {
            text-decoration: underline;
        }



        /* =========================================
           TÍTULO
        ========================================= */

        .page-title {
            margin-bottom: 8px;

            font-family: 'Barlow Condensed', sans-serif;

            font-size: 54px;
            font-weight: 600;

            line-height: 1;

            text-transform: uppercase;

            letter-spacing: -.02em;
        }


        .subtitle {
            margin-bottom: 34px;

            color: #666;

            font-size: 16px;

            line-height: 1.5;
        }



        /* =========================================
           CARD
        ========================================= */

        .card {
            background: #fff;

            padding: 34px;

            border: 1px solid #eee;
        }



        /* =========================================
           CAMPOS
        ========================================= */

        .field {
            margin-bottom: 22px;
        }


        .field label {
            display: block;

            margin-bottom: 8px;

            font-size: 13px;
            font-weight: 600;
        }


        .field input {
            width: 100%;

            min-height: 50px;

            padding: 0 14px;

            background: #fff;

            border: 1px solid #ddd;

            font-family: 'Barlow', sans-serif;

            font-size: 15px;

            outline: none;

            transition: .2s ease;
        }


        .field input:focus {
            border-color: #111;
        }



        /* =========================================
           BOTÃO
        ========================================= */

        .save-button {
            min-height: 50px;

            display: inline-flex;

            align-items: center;
            justify-content: center;

            padding: 0 30px;

            background: #111;

            color: #fff;

            border: 1px solid #111;

            font-family: 'Barlow Condensed', sans-serif;

            font-size: 16px;
            font-weight: 600;

            letter-spacing: .05em;

            text-transform: uppercase;

            cursor: pointer;

            transition: .2s ease;
        }


        .save-button:hover {
            background: #fff;

            color: #111;
        }



        /* =========================================
           MENSAGENS
        ========================================= */

        .success {
            margin-bottom: 24px;

            padding: 15px 17px;

            background: #eaf7ea;

            color: #246b24;

            border: 1px solid #cce8cc;

            font-size: 14px;
        }


        .error {
            margin-bottom: 24px;

            padding: 15px 17px;

            background: #fff0f0;

            color: #b00000;

            border: 1px solid #f0caca;

            font-size: 14px;
        }


        .error div + div {
            margin-top: 5px;
        }



        /* =========================================
           RESPONSIVO
        ========================================= */

        @media (max-width: 700px) {

            .page {
                padding:
                    32px
                    18px
                    50px;
            }


            .page-title {
                font-size: 44px;
            }


            .card {
                padding: 24px;
            }


            .save-button {
                width: 100%;
            }

        }


        /* =========================================
   CABEÇALHO DA CONTA
========================================= */

.account-header {
    width: 100%;
    height: 88px;

    padding: 0 58px;

    display: flex;
    align-items: center;
    justify-content: space-between;

    background: #fff;

    border-bottom: 1px solid #e8e8e8;
}

.account-logo-link {
    display: flex;
    align-items: center;

    text-decoration: none;
}

.account-logo {
    width: 105px;
    height: auto;

    display: block;
}

.account-button {
    min-height: 44px;

    padding: 0 23px;

    display: inline-flex;
    align-items: center;
    justify-content: center;

    background: #fff;

    color: #111;

    border: 1px solid #dedede;
    border-radius: 999px;

    font-family: 'Barlow', sans-serif;

    font-size: 13px;
    font-weight: 600;

    text-decoration: none;

    transition: .2s ease;
}

.account-button:hover {
    background: #111;

    color: #fff;

    border-color: #111;
}


@media (max-width: 700px) {

    .account-header {
        height: 78px;

        padding: 0 20px;
    }

    .account-logo {
        width: 90px;
    }

    .account-button {
        min-height: 40px;

        padding: 0 18px;
    }
}
    </style>

</head>


<body>


    <header class="account-header">

    <a
        href="{{ route('home') }}"
        class="account-logo-link"
    >
        <img
            src="{{ asset('imagens/ChatGPT Image 28 de abr. de 2026, 12_48_49.png') }}"
            alt="AURA"
            class="account-logo"
        >
    </a>


    <a
        href="{{ route('account.index') }}"
        class="account-button"
    >
        Minha conta
    </a>

</header>



    <main class="page">



</div>



        {{-- =========================================
             TÍTULO
        ========================================= --}}

        <h1 class="page-title">
            Alterar senha
        </h1>


        <p class="subtitle">
            Atualize sua senha para manter sua conta segura.
        </p>



        {{-- =========================================
             SUCESSO
        ========================================= --}}

        @if(session('status'))

            <div class="success">
                Senha alterada com sucesso!
            </div>

        @endif



        {{-- =========================================
             ERROS
        ========================================= --}}

        @if($errors->any())

            <div class="error">

                @foreach($errors->all() as $error)

                    <div>
                        {{ $error }}
                    </div>

                @endforeach

            </div>

        @endif



        {{-- =========================================
             FORMULÁRIO
        ========================================= --}}

        <div class="card">


            <form
                method="POST"
                action="{{ route('password.update') }}"
            >

                @csrf
                @method('PUT')



                {{-- SENHA ATUAL --}}

                <div class="field">

                    <label for="current_password">
                        Senha atual
                    </label>

                    <input
                        id="current_password"
                        type="password"
                        name="current_password"
                        required
                        autocomplete="current-password"
                    >

                </div>



                {{-- NOVA SENHA --}}

                <div class="field">

                    <label for="password">
                        Nova senha
                    </label>

                    <input
                        id="password"
                        type="password"
                        name="password"
                        required
                        autocomplete="new-password"
                    >

                </div>



                {{-- CONFIRMAR SENHA --}}

                <div class="field">

                    <label for="password_confirmation">
                        Confirmar nova senha
                    </label>

                    <input
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        required
                        autocomplete="new-password"
                    >

                </div>



                {{-- BOTÃO --}}

                <button
                    type="submit"
                    class="save-button"
                >
                    Alterar senha
                </button>


            </form>


        </div>


    </main>


</body>

</html>