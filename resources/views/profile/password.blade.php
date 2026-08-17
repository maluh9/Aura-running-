
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Alterar Senha | AURA Running</title>

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
            color: #111;
            text-decoration: none;
            font-size: 25px;
            font-weight: 800;
            letter-spacing: 3px;
        }

        .back {
            color: #111;
            text-decoration: none;
            font-size: 14px;
        }

        .page {
            max-width: 700px;
            margin: 60px auto;
            padding: 0 25px;
        }

        h1 {
            font-size: 38px;
            margin-bottom: 10px;
        }

        .subtitle {
            color: #666;
            margin-bottom: 40px;
        }

        .card {
            background: white;
            padding: 35px;
        }

        .field {
            margin-bottom: 22px;
        }

        .field label {
            display: block;
            font-size: 13px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .field input {
            width: 100%;
            padding: 14px;

            border: 1px solid #ddd;

            font-size: 14px;
            outline: none;
        }

        .field input:focus {
            border-color: #111;
        }

        .save-button {
            background: #111;
            color: white;

            border: none;

            padding: 15px 30px;

            font-size: 13px;
            font-weight: bold;

            cursor: pointer;
        }

        .save-button:hover {
            background: #333;
        }

        .success {
            background: #eaf7ea;
            color: #246b24;

            padding: 15px;
            margin-bottom: 25px;

            font-size: 14px;
        }

        .error {
            background: #fff0f0;
            color: #b00000;

            padding: 15px;
            margin-bottom: 25px;

            font-size: 14px;
        }

        @media (max-width: 700px) {

            header {
                padding: 0 20px;
            }

            .page {
                margin: 40px auto;
            }

            .card {
                padding: 25px;
            }

            h1 {
                font-size: 30px;
            }
        }
    </style>
</head>

<body>

<header>

    <a href="{{ url('/') }}" class="logo">
        AURA
    </a>

    <a href="{{ route('profile.edit') }}" class="back">
        ← Voltar para meus dados
    </a>

</header>


<main class="page">

    <h1>
        Alterar senha
    </h1>

    <p class="subtitle">
        Atualize sua senha para manter sua conta segura.
    </p>


    @if (session('status'))

        <div class="success">
            Senha alterada com sucesso!
        </div>

    @endif


    @if ($errors->any())

        <div class="error">

            @foreach ($errors->all() as $error)

                <div>{{ $error }}</div>

            @endforeach

        </div>

    @endif


    <div class="card">

        <form
            method="POST"
            action="{{ route('password.update') }}"
        >

            @csrf
            @method('PUT')


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


            <button
                type="submit"
                class="save-button"
            >
                ALTERAR SENHA
            </button>

        </form>

    </div>

</main>

</body>

</html>

