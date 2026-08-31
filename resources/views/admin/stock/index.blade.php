@extends('admin.layout')

@section('title', 'Estoque')

@section('page-title', 'Estoque')


@section('page-styles')

<style>

.stock-page-header {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;

    margin-bottom: 30px;
}

.stock-page-header h2 {
    font-family: 'Barlow Condensed', sans-serif;

    font-size: 50px;
    font-weight: 600;

    line-height: 1;
}

.stock-page-header p {
    margin-top: 10px;

    color: #777;

    font-size: 15px;
}


/* CARDS */

.stock-stats {
    display: grid;

    grid-template-columns: repeat(3, 1fr);

    gap: 18px;

    margin-bottom: 30px;
}

.stock-card {
    background: #fff;

    border: 1px solid #e5e5e5;
    border-radius: 7px;

    padding: 22px;
}

.stock-card-icon {
    width: 42px;
    height: 42px;

    display: flex;
    align-items: center;
    justify-content: center;

    margin-bottom: 18px;

    border-radius: 50%;

    background: #111;
    color: #fff;
}

.stock-card span {
    color: #777;

    font-size: 13px;
}

.stock-card strong {
    display: block;

    margin-top: 4px;

    font-family: 'Barlow Condensed', sans-serif;

    font-size: 34px;
}


/* ALERTA */

.admin-alert {
    padding: 15px 18px;

    margin-bottom: 20px;

    border-radius: 6px;

    font-size: 14px;
}

.admin-alert.success {
    background: #eef8f0;
    border: 1px solid #cae8d0;
    color: #286536;
}


/* BUSCA */

.stock-toolbar {
    display: flex;
    justify-content: space-between;
    align-items: center;

    margin-bottom: 18px;
}

.stock-search {
    width: 450px;
    height: 48px;

    display: flex;
    align-items: center;

    background: #fff;

    border: 1px solid #ddd;
    border-radius: 6px;

    overflow: hidden;
}

.stock-search i {
    margin-left: 16px;

    color: #999;
}

.stock-search input {
    flex: 1;

    min-width: 0;
    height: 100%;

    padding: 0 14px;

    border: none;
    outline: none;

    font-family: 'Barlow', sans-serif;
}

.stock-search button {
    height: 100%;

    padding: 0 20px;

    border: none;

    background: #111;
    color: #fff;

    cursor: pointer;
}


/* TABELA */

.stock-table-box {
    background: #fff;

    border: 1px solid #e5e5e5;
    border-radius: 7px;

    overflow-x: auto;
}

.stock-table {
    width: 100%;

    border-collapse: collapse;
}

.stock-table th {
    padding: 16px 18px;

    text-align: left;

    background: #fafafa;

    border-bottom: 1px solid #e8e8e8;

    color: #777;

    font-size: 11px;
    font-weight: 600;

    text-transform: uppercase;
    letter-spacing: .10em;

    white-space: nowrap;
}

.stock-table td {
    padding: 15px 18px;

    border-bottom: 1px solid #eee;

    vertical-align: middle;

    font-size: 14px;
}


/* PRODUTO */

.stock-product {
    display: flex;
    align-items: center;

    gap: 13px;

    min-width: 230px;
}

.stock-product-image {
    width: 55px;
    height: 55px;

    overflow: hidden;

    flex-shrink: 0;

    border-radius: 5px;

    background: #f3f3f3;
}

.stock-product-image img {
    width: 100%;
    height: 100%;

    object-fit: cover;
}

.stock-product-image-empty {
    width: 100%;
    height: 100%;

    display: flex;
    align-items: center;
    justify-content: center;

    color: #aaa;
}

.stock-product strong {
    display: block;
}

.stock-product small {
    color: #999;
}


/* STATUS */

.stock-badge {
    display: inline-block;

    padding: 6px 10px;

    border-radius: 999px;

    font-size: 12px;
    font-weight: 600;

    white-space: nowrap;
}

.stock-normal {
    background: #eef8f0;
    color: #28733c;
}

.stock-low {
    background: #fff4df;
    color: #a96800;
}

.stock-empty {
    background: #fdecec;
    color: #a72e2e;
}


/* FORM */

.stock-update-form {
    display: flex;
    align-items: center;

    gap: 8px;
}

.stock-input {
    width: 80px;
    height: 40px;

    padding: 0 10px;

    border: 1px solid #ddd;
    border-radius: 5px;

    outline: none;

    font-family: 'Barlow', sans-serif;
}

.stock-input:focus {
    border-color: #111;
}

.stock-save {
    width: 40px;
    height: 40px;

    display: flex;
    align-items: center;
    justify-content: center;

    border: none;
    border-radius: 50%;

    background: #111;
    color: #fff;

    cursor: pointer;

    transition: .2s;
}

.stock-save:hover {
    background: #333;
}


/* PAGINAÇÃO */

.stock-pagination {
    padding: 18px;
    border-top: 1px solid #eee;
}


/* RESPONSIVO */

@media(max-width: 900px) {

    .stock-stats {
        grid-template-columns: 1fr;
    }

    .stock-toolbar {
        flex-direction: column;
        align-items: flex-start;

        gap: 15px;
    }

    .stock-search {
        width: 100%;
    }

}

</style>

@endsection


@section('content')


<div class="stock-page-header">

    <div>

        <h2>
            Controle de estoque
        </h2>

        <p>
            Acompanhe e atualize a quantidade disponível dos produtos.
        </p>

    </div>

</div>


@if(session('success'))

    <div class="admin-alert success">

        {{ session('success') }}

    </div>

@endif


{{-- RESUMO --}}

<div class="stock-stats">


    <div class="stock-card">

        <div class="stock-card-icon">

            <i class="fa-solid fa-boxes-stacked"></i>

        </div>

        <span>
            Unidades em estoque
        </span>

        <strong>
            {{ $totalStock }}
        </strong>

    </div>


    <div class="stock-card">

        <div class="stock-card-icon">

            <i class="fa-solid fa-triangle-exclamation"></i>

        </div>

        <span>
            Estoque baixo
        </span>

        <strong>
            {{ $lowStockCount }}
        </strong>

    </div>


    <div class="stock-card">

        <div class="stock-card-icon">

            <i class="fa-solid fa-circle-xmark"></i>

        </div>

        <span>
            Produtos esgotados
        </span>

        <strong>
            {{ $outOfStockCount }}
        </strong>

    </div>


</div>


{{-- BUSCA --}}

<div class="stock-toolbar">

    <form
        action="{{ route('admin.stock.index') }}"
        method="GET"
        class="stock-search"
    >

        <i class="fa-solid fa-magnifying-glass"></i>

        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Buscar produto..."
        >

        <button type="submit">
            Buscar
        </button>

    </form>

</div>


{{-- TABELA --}}

<div class="stock-table-box">


    <table class="stock-table">

        <thead>

            <tr>

                <th>Produto</th>

                <th>Categoria</th>

                <th>Quantidade</th>

                <th>Situação</th>

                <th>Atualizar estoque</th>

            </tr>

        </thead>


        <tbody>


            @foreach($products as $product)


                <tr>


                    {{-- PRODUTO --}}

                    <td>

                        <div class="stock-product">


                            <div class="stock-product-image">

                                @if($product->image)

                                    <img
                                        src="{{ asset('storage/' . $product->image) }}"
                                        alt="{{ $product->name }}"
                                    >

                                @else

                                    <div class="stock-product-image-empty">

                                        <i class="fa-solid fa-image"></i>

                                    </div>

                                @endif

                            </div>


                            <div>

                                <strong>
                                    {{ $product->name }}
                                </strong>

                                <small>
                                    #{{ $product->id }}
                                </small>

                            </div>


                        </div>

                    </td>


                    {{-- CATEGORIA --}}

                    <td>

                        {{ optional($product->category)->name ?? 'Sem categoria' }}

                    </td>


                    {{-- QUANTIDADE --}}

                    <td>

                        <strong>
                            {{ $product->stock }}
                        </strong>

                        unidades

                    </td>


                    {{-- SITUAÇÃO --}}

                    <td>


                        @if($product->stock == 0)

                            <span class="stock-badge stock-empty">

                                Esgotado

                            </span>


                        @elseif($product->stock <= 5)

                            <span class="stock-badge stock-low">

                                Estoque baixo

                            </span>


                        @else

                            <span class="stock-badge stock-normal">

                                Normal

                            </span>

                        @endif


                    </td>


                    {{-- ALTERAR --}}

                    <td>

                        <form
                            action="{{ route('admin.stock.update', $product) }}"
                            method="POST"
                            class="stock-update-form"
                        >

                            @csrf
                            @method('PATCH')


                            <input
                                type="number"
                                name="stock"
                                value="{{ $product->stock }}"
                                min="0"
                                step="1"
                                class="stock-input"
                                required
                            >


                            <button
                                type="submit"
                                class="stock-save"
                                title="Salvar estoque"
                            >

                                <i class="fa-solid fa-check"></i>

                            </button>


                        </form>

                    </td>


                </tr>


            @endforeach


        </tbody>

    </table>


    <div class="stock-pagination">

        {{ $products->links() }}

    </div>


</div>


@endsection