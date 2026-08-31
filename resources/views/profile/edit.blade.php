<!DOCTYPE html>

<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


@include('partials.page-meta', ['pageTitle' => 'Perfil'])

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
        max-width: 900px;
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
        margin-bottom: 25px;
    }

    .card h2 {
        font-size: 21px;
        margin-bottom: 25px;
    }

    /* FOTO */

    .photo-area {
        display: flex;
        align-items: center;
        gap: 25px;
        margin-bottom: 30px;
    }

    .profile-photo {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
        background: #111;
    }

    .photo-placeholder {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background: #111;
        color: white;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 32px;
        font-weight: bold;
    }

    .photo-info p {
        color: #666;
        font-size: 13px;
        margin-bottom: 12px;
    }

    .file-input {
        font-size: 13px;
    }

    /* CAMPOS */

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

    /* SENHA */

    .password-link {
        display: inline-block;

        background: white;
        color: #111;

        border: 1px solid #111;

        padding: 14px 25px;

        text-decoration: none;

        font-size: 13px;
        font-weight: bold;
    }

    .password-link:hover {
        background: #111;
        color: white;
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

        .photo-area {
            align-items: flex-start;
        }

    }
</style>


</head>

<body>

<header>


<a href="{{ url('/') }}" class="logo">
    AURA
</a>

<a href="{{ route('account.index') }}" class="back">
    ← Voltar para minha conta
</a>

```blade
</header>

<main class="page">


<h1>Meus dados</h1>

<p class="subtitle">
    Gerencie suas informações pessoais e sua conta.
</p>


{{-- MENSAGEM DE SUCESSO --}}

@if (session('status') === 'profile-updated')

    <div class="success">
        Seus dados foram atualizados com sucesso!
    </div>

@endif


{{-- ERROS --}}

@if ($errors->any())

    <div class="error">

        @foreach ($errors->all() as $error)

            <div>{{ $error }}</div>

        @endforeach

    </div>

@endif


{{-- DADOS PESSOAIS --}}

<div class="card">

    <h2>Informações pessoais</h2>


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


{{-- SENHA --}}

<div class="card">

    <h2>Senha</h2>

    <p class="subtitle">
        Altere sua senha para manter sua conta segura.
    </p>

   <a
    href="{{ route('profile.password') }}"
    class="password-link"
>
    ALTERAR SENHA
</a>

</div>


</main>

</body>

</html>
