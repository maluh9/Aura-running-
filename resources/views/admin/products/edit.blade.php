@extends('admin.layout')

@section('title', 'Editar Produto')

@section('page-title', 'Editar Produto')


@section('page-styles')

<style>

.product-form-header {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    gap: 25px;
    margin-bottom: 32px;
}

.product-form-header h2 {
    font-family: 'Barlow Condensed', sans-serif;
    font-size: 50px;
    font-weight: 600;
    line-height: 1;
}

.product-form-header p {
    color: #777;
    font-size: 15px;
    margin-top: 10px;
}

.btn-back {
    display: inline-flex;
    align-items: center;
    gap: 9px;

    color: #111;
    text-decoration: none;

    font-size: 14px;
    font-weight: 600;

    padding: 12px 18px;

    background: #fff;

    border: 1px solid #ddd;
    border-radius: 999px;

    transition: .2s ease;
}

.btn-back:hover {
    background: #111;
    color: #fff;
    border-color: #111;
}

.product-form-layout {
    display: grid;
    grid-template-columns: minmax(0, 2fr) minmax(300px, 1fr);
    gap: 22px;
    align-items: start;
}

.form-card {
    background: #fff;

    border: 1px solid #e5e5e5;
    border-radius: 7px;

    padding: 28px;
}

.form-card + .form-card {
    margin-top: 20px;
}

.form-card h3 {
    font-family: 'Barlow Condensed', sans-serif;

    font-size: 22px;
    font-weight: 600;

    text-transform: uppercase;
    letter-spacing: .04em;

    margin-bottom: 24px;
}

.form-group {
    margin-bottom: 22px;
}

.form-group:last-child {
    margin-bottom: 0;
}

.form-group label {
    display: block;

    margin-bottom: 8px;

    font-size: 13px;
    font-weight: 600;

    color: #333;
}

.required {
    color: #b42318;
}

.form-control {
    width: 100%;
    min-height: 50px;

    border: 1px solid #ddd;
    border-radius: 5px;

    background: #fafafa;

    padding: 0 15px;

    outline: none;

    font-family: 'Barlow', sans-serif;
    font-size: 15px;

    color: #111;

    transition: .2s ease;
}

.form-control:focus {
    border-color: #111;
    background: #fff;
}

textarea.form-control {
    min-height: 150px;

    padding-top: 14px;
    padding-bottom: 14px;

    resize: vertical;
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 18px;
}


/* IMAGEM ATUAL */

.current-image {
    width: 100%;
    height: 260px;

    border-radius: 7px;

    overflow: hidden;

    background: #f4f4f4;

    margin-bottom: 18px;

    display: flex;
    align-items: center;
    justify-content: center;
}

.current-image img {
    width: 100%;
    height: 100%;
    object-fit: contain;
}

.no-current-image {
    text-align: center;
    color: #aaa;
}

.no-current-image i {
    font-size: 32px;
    display: block;
    margin-bottom: 8px;
}

.image-upload-box {
    border: 1px dashed #bbb;
    border-radius: 7px;

    background: #fafafa;

    padding: 22px;

    text-align: center;
}

.image-upload-box p {
    font-size: 13px;
    color: #555;
    margin-bottom: 5px;
}

.image-upload-box span {
    display: block;
    font-size: 12px;
    color: #999;
    margin-bottom: 15px;
}


/* OPÇÕES */

.option-row {
    display: flex;
    align-items: center;
    justify-content: space-between;

    gap: 20px;

    padding: 18px 0;

    border-bottom: 1px solid #eee;
}

.option-row:first-child {
    padding-top: 0;
}

.option-row:last-child {
    padding-bottom: 0;
    border-bottom: none;
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


/* SWITCH */

.switch {
    position: relative;

    display: inline-block;

    width: 46px;
    height: 26px;

    flex-shrink: 0;
}

.switch input {
    opacity: 0;
    width: 0;
    height: 0;
}

.slider {
    position: absolute;

    cursor: pointer;

    inset: 0;

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

    box-shadow: 0 1px 4px rgba(0,0,0,.15);
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

    margin-top: 22px;
}

.btn-cancel {
    display: inline-flex;
    align-items: center;
    justify-content: center;

    min-height: 48px;

    padding: 0 22px;

    border: 1px solid #ddd;
    border-radius: 999px;

    background: #fff;
    color: #111;

    text-decoration: none;

    font-size: 14px;
    font-weight: 600;
}

.btn-save {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 9px;

    min-height: 48px;

    padding: 0 26px;

    border: none;
    border-radius: 999px;

    background: #111;
    color: #fff;

    font-family: 'Barlow', sans-serif;
    font-size: 14px;
    font-weight: 600;

    cursor: pointer;
}

.btn-save:hover {
    background: #333;
}


/* ERROS */

.validation-errors {
    background: #fff1f0;

    border: 1px solid #f1c7c4;

    color: #8a2721;

    border-radius: 6px;

    padding: 16px 18px;

    margin-bottom: 22px;
}

.validation-errors strong {
    display: block;
    margin-bottom: 8px;
}

.validation-errors ul {
    padding-left: 20px;
}

@media (max-width: 1000px) {

    .product-form-layout {
        grid-template-columns: 1fr;
    }

}

@media (max-width: 700px) {

    .product-form-header {
        flex-direction: column;
        align-items: flex-start;
    }

    .form-row {
        grid-template-columns: 1fr;
    }

}

</style>

@endsection


@section('content')


<div class="product-form-header">

    <div>

        <h2>Editar produto</h2>

        <p>
            Altere as informações de {{ $product->name }}.
        </p>

    </div>


    <a
        href="{{ route('admin.products.index') }}"
        class="btn-back"
    >

        <i class="fa-solid fa-arrow-left"></i>

        Voltar

    </a>

</div>


@if($errors->any())

    <div class="validation-errors">

        <strong>
            Verifique os campos abaixo:
        </strong>

        <ul>

            @foreach($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif


<form
    action="{{ route('admin.products.update', $product) }}"
    method="POST"
    enctype="multipart/form-data"
>

    @csrf
    @method('PUT')


    <div class="product-form-layout">


        {{-- COLUNA PRINCIPAL --}}
        <div>

            <div class="form-card">

                <h3>
                    Informações do produto
                </h3>


                <div class="form-group">

                    <label for="name">
                        Nome do produto
                        <span class="required">*</span>
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        class="form-control"
                        value="{{ old('name', $product->name) }}"
                        required
                    >

                </div>


                <div class="form-group">

                    <label for="category_id">
                        Categoria
                        <span class="required">*</span>
                    </label>

                    <select
                        id="category_id"
                        name="category_id"
                        class="form-control"
                        required
                    >

                        @foreach($categories as $category)

                            <option
                                value="{{ $category->id }}"
                                {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}
                            >

                                {{ $category->name }}

                            </option>

                        @endforeach

                    </select>

                </div>


                <div class="form-group">

                    <label for="description">
                        Descrição
                    </label>

                    <textarea
                        id="description"
                        name="description"
                        class="form-control"
                    >{{ old('description', $product->description) }}</textarea>

                </div>


                <div class="form-row">


                    <div class="form-group">

                        <label for="price">
                            Preço
                            <span class="required">*</span>
                        </label>

                        <input
                            type="number"
                            id="price"
                            name="price"
                            class="form-control"
                            value="{{ old('price', $product->price) }}"
                            min="0"
                            step="0.01"
                            required
                        >

                    </div>


                    <div class="form-group">

                        <label for="stock">
                            Estoque
                            <span class="required">*</span>
                        </label>

                        <input
                            type="number"
                            id="stock"
                            name="stock"
                            class="form-control"
                            value="{{ old('stock', $product->stock) }}"
                            min="0"
                            step="1"
                            required
                        >

                    </div>


                </div>


            </div>

        </div>



        {{-- COLUNA LATERAL --}}
        <div>


            <div class="form-card">

                <h3>
                    Imagem
                </h3>


                <div class="current-image">

                    @if($product->image)

                        <img
                            src="{{ asset('storage/' . $product->image) }}"
                            alt="{{ $product->name }}"
                        >

                    @else

                        <div class="no-current-image">

                            <i class="fa-regular fa-image"></i>

                            Sem imagem

                        </div>

                    @endif

                </div>


                <div class="image-upload-box">

                    <p>
                        Trocar imagem
                    </p>

                    <span>
                        Deixe vazio para manter a imagem atual.
                    </span>

                    <input
                        type="file"
                        name="image"
                        accept=".jpg,.jpeg,.png,.webp"
                    >

                </div>

            </div>



            <div class="form-card">

                <h3>
                    Visibilidade
                </h3>


                {{-- IMPORTANTE: permite salvar false --}}
                <input
                    type="hidden"
                    name="active"
                    value="0"
                >


                <div class="option-row">

                    <div class="option-info">

                        <strong>
                            Produto ativo
                        </strong>

                        <span>
                            Disponibilizar produto na loja.
                        </span>

                    </div>


                    <label class="switch">

                        <input
                            type="checkbox"
                            name="active"
                            value="1"
                            {{ old('active', $product->active) ? 'checked' : '' }}
                        >

                        <span class="slider"></span>

                    </label>

                </div>


                <input
                    type="hidden"
                    name="featured"
                    value="0"
                >


                <div class="option-row">

                    <div class="option-info">

                        <strong>
                            Produto em destaque
                        </strong>

                        <span>
                            Exibir como produto em destaque.
                        </span>

                    </div>


                    <label class="switch">

                        <input
                            type="checkbox"
                            name="featured"
                            value="1"
                            {{ old('featured', $product->featured) ? 'checked' : '' }}
                        >

                        <span class="slider"></span>

                    </label>

                </div>


            </div>


        </div>


    </div>


    <div class="form-actions">

        <a
            href="{{ route('admin.products.index') }}"
            class="btn-cancel"
        >
            Cancelar
        </a>


        <button
            type="submit"
            class="btn-save"
        >

            <i class="fa-solid fa-check"></i>

            Salvar alterações

        </button>

    </div>


</form>


@endsection