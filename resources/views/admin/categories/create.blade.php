@extends('admin.layout')

@section('title', 'Nova Categoria')

@section('page-title', 'Nova Categoria')


@section('page-styles')

<style>

.category-form-header {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;

    margin-bottom: 32px;
}

.category-form-header h2 {
    font-family: 'Barlow Condensed', sans-serif;

    font-size: 50px;
    font-weight: 600;

    line-height: 1;
}

.category-form-header p {
    color: #777;

    margin-top: 10px;
}

.btn-back {
    display: inline-flex;
    align-items: center;

    gap: 8px;

    padding: 12px 18px;

    border: 1px solid #ddd;
    border-radius: 999px;

    background: #fff;
    color: #111;

    text-decoration: none;

    font-size: 14px;
    font-weight: 600;
}

.btn-back:hover {
    background: #111;

    color: #fff;
}

.category-form-card {
    max-width: 800px;

    background: #fff;

    border: 1px solid #e5e5e5;
    border-radius: 7px;

    padding: 30px;
}

.form-group {
    margin-bottom: 24px;
}

.form-group label {
    display: block;

    margin-bottom: 8px;

    font-size: 13px;
    font-weight: 600;
}

.form-control {
    width: 100%;

    min-height: 50px;

    padding: 0 15px;

    background: #fafafa;

    border: 1px solid #ddd;
    border-radius: 5px;

    outline: none;

    font-family: 'Barlow', sans-serif;
}

.form-control:focus {
    border-color: #111;

    background: #fff;
}

textarea.form-control {
    min-height: 140px;

    padding-top: 14px;

    resize: vertical;
}


/* SWITCH */

.option-row {
    display: flex;
    align-items: center;
    justify-content: space-between;

    padding: 18px 0;

    border-top: 1px solid #eee;
}

.option-info strong {
    display: block;

    font-size: 14px;

    margin-bottom: 4px;
}

.option-info span {
    color: #888;

    font-size: 12px;
}

.switch {
    position: relative;

    display: inline-block;

    width: 46px;
    height: 26px;
}

.switch input {
    opacity: 0;
}

.slider {
    position: absolute;

    inset: 0;

    cursor: pointer;

    background: #d5d5d5;

    border-radius: 999px;

    transition: .2s;
}

.slider:before {
    content: "";

    position: absolute;

    width: 20px;
    height: 20px;

    left: 3px;
    top: 3px;

    background: #fff;

    border-radius: 50%;

    transition: .2s;
}

.switch input:checked + .slider {
    background: #111;
}

.switch input:checked + .slider:before {
    transform: translateX(20px);
}


/* BOTÕES */

.form-actions {
    display: flex;
    justify-content: flex-end;

    gap: 10px;

    margin-top: 25px;
}

.btn-cancel,
.btn-save {
    min-height: 48px;

    padding: 0 24px;

    border-radius: 999px;

    font-family: 'Barlow', sans-serif;

    font-weight: 600;
}

.btn-cancel {
    display: inline-flex;
    align-items: center;

    border: 1px solid #ddd;

    background: #fff;
    color: #111;

    text-decoration: none;
}

.btn-save {
    border: none;

    background: #111;
    color: #fff;

    cursor: pointer;
}


/* ERROS */

.validation-errors {
    max-width: 800px;

    padding: 16px 18px;

    margin-bottom: 20px;

    background: #fff1f0;

    border: 1px solid #f1c7c4;
    border-radius: 6px;

    color: #8a2721;
}

.validation-errors ul {
    padding-left: 20px;

    margin-top: 8px;
}

</style>

@endsection


@section('content')

<div class="category-form-header">

    <div>

        <h2>Nova categoria</h2>

        <p>
            Cadastre uma nova categoria de produtos.
        </p>

    </div>

    <a
        href="{{ route('admin.categories.index') }}"
        class="btn-back"
    >

        <i class="fa-solid fa-arrow-left"></i>

        Voltar

    </a>

</div>


@if($errors->any())

    <div class="validation-errors">

        <strong>
            Verifique os campos:
        </strong>

        <ul>

            @foreach($errors->all() as $error)

                <li>
                    {{ $error }}
                </li>

            @endforeach

        </ul>

    </div>

@endif


<form
    action="{{ route('admin.categories.store') }}"
    method="POST"
>

    @csrf


    <div class="category-form-card">


        {{-- NOME --}}

        <div class="form-group">

            <label for="name">
                Nome da categoria
            </label>

            <input
                type="text"
                name="name"
                id="name"
                value="{{ old('name') }}"
                class="form-control"
                placeholder="Ex.: Tênis masculino"
                required
            >

        </div>


        {{-- DESCRIÇÃO --}}

        <div class="form-group">

            <label for="description">
                Descrição
            </label>

            <textarea
                name="description"
                id="description"
                class="form-control"
                placeholder="Descrição da categoria..."
            >{{ old('description') }}</textarea>

        </div>


        {{-- CATEGORIA ATIVA --}}

        <div class="option-row">

            <div class="option-info">

                <strong>
                    Categoria ativa
                </strong>

                <span>
                    Permitir o uso desta categoria nos produtos.
                </span>

            </div>


            <label class="switch">

                <input
                    type="checkbox"
                    name="active"
                    value="1"
                    {{ old('active', true) ? 'checked' : '' }}
                >

                <span class="slider"></span>

            </label>

        </div>


    </div>


    {{-- BOTÕES --}}

    <div
        class="form-actions"
        style="max-width: 800px;"
    >

        <a
            href="{{ route('admin.categories.index') }}"
            class="btn-cancel"
        >
            Cancelar
        </a>


        <button
            type="submit"
            class="btn-save"
        >

            <i class="fa-solid fa-check"></i>

            Cadastrar categoria

        </button>

    </div>

</form>

@endsection