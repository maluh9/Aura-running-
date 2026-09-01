@extends('admin.layout')

@section('title', 'Produtos')

@section('page-title', 'Produtos')


@section('page-styles')

<style>

/* =========================================
   CABEÇALHO
========================================= */

.page-header {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    gap: 25px;
    margin-bottom: 32px;
}

.page-header h2 {
    font-family: 'Barlow Condensed', sans-serif;
    font-size: 50px;
    font-weight: 600;
    line-height: 1;
}

.page-header p {
    color: #777;
    margin-top: 10px;
    font-size: 15px;
}


/* =========================================
   BOTÃO NOVO PRODUTO
========================================= */

.btn-primary-admin {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;

    background: #111;
    color: #fff;

    text-decoration: none;

    padding: 14px 24px;

    border-radius: 999px;

    font-family: 'Barlow', sans-serif;
    font-size: 14px;
    font-weight: 600;

    white-space: nowrap;

    transition: .2s ease;
}

.btn-primary-admin:hover {
    background: #333;
    transform: translateY(-1px);
}


/* =========================================
   ALERTA
========================================= */

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


/* =========================================
   BUSCA
========================================= */

.products-toolbar {
    display: flex;
    align-items: center;
    justify-content: space-between;

    gap: 20px;

    margin-bottom: 18px;
}

.admin-search {
    width: 450px;
    max-width: 100%;
    height: 48px;

    display: flex;
    align-items: center;

    background: #fff;

    border: 1px solid #ddd;
    border-radius: 6px;

    overflow: hidden;
}

.admin-search > i {
    margin-left: 16px;
    color: #999;
}

.admin-search input {
    flex: 1;
    min-width: 0;

    height: 100%;

    border: none;
    outline: none;

    padding: 0 14px;

    font-family: 'Barlow', sans-serif;
    font-size: 14px;
}

.admin-search button {
    height: 100%;

    border: none;

    background: #111;
    color: #fff;

    padding: 0 20px;

    cursor: pointer;

    font-family: 'Barlow', sans-serif;
    font-size: 14px;
}

.admin-search button:hover {
    background: #333;
}

.products-count {
    color: #777;
    font-size: 14px;
    white-space: nowrap;
}


/* =========================================
   TABELA
========================================= */

.admin-table-box {
    width: 100%;

    background: #fff;

    border: 1px solid #e4e4e4;
    border-radius: 7px;

    overflow-x: auto;
}

.products-table {
    width: 100%;
    border-collapse: collapse;
}

.products-table th {
    text-align: left;

    padding: 16px 18px;

    background: #fafafa;

    border-bottom: 1px solid #e8e8e8;

    color: #777;

    font-size: 11px;
    font-weight: 600;

    letter-spacing: .10em;
    text-transform: uppercase;

    white-space: nowrap;
}

.products-table td {
    padding: 15px 18px;

    border-bottom: 1px solid #eee;

    vertical-align: middle;

    font-size: 14px;
}

.products-table tbody tr:hover {
    background: #fafafa;
}

.products-table tbody tr:last-child td {
    border-bottom: none;
}


/* =========================================
   PRODUTO
========================================= */

.product-cell {
    display: flex;
    align-items: center;

    gap: 13px;

    min-width: 220px;
}

.product-thumb {
    width: 58px;
    height: 58px;

    flex-shrink: 0;

    overflow: hidden;

    border-radius: 5px;

    background: #f2f2f2;
}

.product-thumb img {
    width: 100%;
    height: 100%;

    object-fit: cover;
    display: block;
}

.product-no-image {
    width: 100%;
    height: 100%;

    display: flex;
    align-items: center;
    justify-content: center;

    color: #aaa;
}

.product-cell strong {
    display: block;
    margin-bottom: 4px;
}

.product-cell span {
    color: #999;
    font-size: 12px;
}


/* =========================================
   ESTOQUE
========================================= */

.stock-status,
.status-active,
.status-inactive {
    display: inline-block;

    padding: 6px 10px;

    border-radius: 999px;

    font-size: 12px;
    font-weight: 600;

    white-space: nowrap;
}

.stock-ok {
    background: #eef8f0;
    color: #28733c;
}

.stock-low {
    background: #fff4df;
    color: #a96800;
}

.stock-zero {
    background: #fdecec;
    color: #a72e2e;
}


/* =========================================
   STATUS
========================================= */

.status-active {
    background: #111;
    color: #fff;
}

.status-inactive {
    background: #eee;
    color: #777;
}

.muted {
    color: #aaa;
}


/* =========================================
   AÇÕES
========================================= */

.product-actions {
    display: flex;
    align-items: center;
    gap: 7px;
}

.product-actions form {
    margin: 0;
}

.action-button {
    width: 35px;
    height: 35px;

    display: flex;
    align-items: center;
    justify-content: center;

    flex-shrink: 0;

    border: 1px solid #ddd;
    border-radius: 50%;

    background: #fff;
    color: #111;

    text-decoration: none;

    cursor: pointer;

    transition: .2s ease;
}

.action-button:hover {
    background: #111;
    color: #fff;
    border-color: #111;
}


/* =========================================
   SEM PRODUTOS
========================================= */

.empty-products {
    text-align: center;
    padding: 80px 30px;
}

.empty-products > i {
    font-size: 35px;
    margin-bottom: 18px;
    color: #aaa;
}

.empty-products h3 {
    font-family: 'Barlow Condensed', sans-serif;
    font-size: 24px;
    margin-bottom: 7px;
}

.empty-products p {
    color: #888;
    font-size: 14px;
}


/* =========================================
   PAGINAÇÃO
========================================= */

.admin-pagination {
    padding: 18px;
    border-top: 1px solid #eee;
}


/* =========================================
   RESPONSIVO
========================================= */

@media (max-width: 900px) {

    .page-header {
        flex-direction: column;
        align-items: flex-start;
    }

    .products-toolbar {
        flex-direction: column;
        align-items: flex-start;
    }

    .admin-search {
        width: 100%;
    }

}

</style>

@endsection


@section('content')


<div class="page-header">

    <div>

        <h2>Produtos</h2>

        <p>
            Gerencie os produtos cadastrados na Aura Running.
        </p>

    </div>


    <a
        href="{{ route('admin.products.create') }}"
        class="btn-primary-admin"
    >

        <i class="fa-solid fa-plus"></i>

        Novo produto

    </a>

</div>


@if(session('success'))

    <div class="admin-alert success">

        {{ session('success') }}

    </div>

@endif


<div class="products-toolbar">

    <form
        method="GET"
        action="{{ route('admin.products.index') }}"
        class="admin-search"
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


    <div class="products-count">

        {{ $products->total() }}

        {{ $products->total() === 1 ? 'produto' : 'produtos' }}

    </div>

</div>


<div class="admin-table-box">


    @if($products->count() > 0)


        <table class="products-table">

            <thead>

                <tr>

                    <th>Produto</th>
                    <th>Categoria</th>
                    <th>Preço</th>
                    <th>Estoque</th>
                    <th>Status</th>
                    <th>Destaque</th>
                    <th>Ações</th>

                </tr>

            </thead>


            <tbody>


                @foreach($products as $product)


                    <tr>


                        {{-- PRODUTO --}}
                        <td>

                            <div class="product-cell">

                                <div class="product-thumb">

                                    @if($product->image)

                                        <img
                                            src="{{ $product->image_url }}"
                                            alt="{{ $product->name }}"
                                        >

                                    @else

                                        <div class="product-no-image">

                                            <i class="fa-solid fa-image"></i>

                                        </div>

                                    @endif

                                </div>


                                <div>

                                    <strong>
                                        {{ $product->name }}
                                    </strong>

                                    <span>
                                        #{{ $product->id }}
                                    </span>

                                </div>

                            </div>

                        </td>


                        {{-- CATEGORIA --}}
                        <td>

                            {{ optional($product->category)->name ?? 'Sem categoria' }}

                        </td>


                        {{-- PREÇO --}}
                        <td>

                            <strong>

                                R$ {{ number_format($product->price, 2, ',', '.') }}

                            </strong>

                        </td>


                        {{-- ESTOQUE --}}
                        <td>

                            @if($product->stock == 0)

                                <span class="stock-status stock-zero">
                                    Esgotado
                                </span>

                            @elseif($product->stock <= 5)

                                <span class="stock-status stock-low">

                                    {{ $product->stock }} un.

                                </span>

                            @else

                                <span class="stock-status stock-ok">

                                    {{ $product->stock }} un.

                                </span>

                            @endif

                        </td>


                        {{-- STATUS --}}
                        <td>

                            @if($product->active)

                                <span class="status-active">
                                    Ativo
                                </span>

                            @else

                                <span class="status-inactive">
                                    Inativo
                                </span>

                            @endif

                        </td>


                        {{-- DESTAQUE --}}
                        <td>

                            @if($product->featured)

                                <i
                                    class="fa-solid fa-star"
                                    title="Produto em destaque"
                                ></i>

                            @else

                                <span class="muted">
                                    —
                                </span>

                            @endif

                        </td>


                        {{-- AÇÕES --}}
                        <td>

                            <div class="product-actions">

                                <a
                                    href="{{ route('admin.products.edit', $product) }}"
                                    class="action-button"
                                    title="Editar produto"
                                >

                                    <i class="fa-solid fa-pen"></i>

                                </a>


                                <form
                                    action="{{ route('admin.products.toggle-status', $product) }}"
                                    method="POST"
                                >

                                    @csrf
                                    @method('PATCH')

                                    <button
                                        type="submit"
                                        class="action-button"
                                        title="{{ $product->active ? 'Desativar produto' : 'Ativar produto' }}"
                                    >

                                        @if($product->active)

                                            <i class="fa-solid fa-eye-slash"></i>

                                        @else

                                            <i class="fa-solid fa-eye"></i>

                                        @endif

                                    </button>

                                </form>

                            </div>

                        </td>


                    </tr>


                @endforeach


            </tbody>

        </table>


<div class="admin-pagination">

    @include('admin.partials.pagination', [
        'paginator' => $products
    ])

</div>


    @else


        <div class="empty-products">

            <i class="fa-solid fa-box-open"></i>

            <h3>
                Nenhum produto encontrado
            </h3>

            <p>
                Cadastre um novo produto ou tente outra busca.
            </p>

        </div>


    @endif


</div>


@endsection