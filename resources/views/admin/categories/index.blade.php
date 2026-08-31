@extends('admin.layout')

@section('title', 'Categorias')

@section('page-title', 'Categorias')


@section('page-styles')

<style>

.categories-header {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    gap: 25px;
    margin-bottom: 30px;
}

.categories-header h2 {
    font-family: 'Barlow Condensed', sans-serif;
    font-size: 50px;
    font-weight: 600;
    line-height: 1;
}

.categories-header p {
    color: #777;
    margin-top: 10px;
    font-size: 15px;
}

.btn-primary-admin {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 9px;

    background: #111;
    color: #fff;

    padding: 14px 24px;

    border-radius: 999px;

    text-decoration: none;

    font-size: 14px;
    font-weight: 600;

    transition: .2s;
}

.btn-primary-admin:hover {
    background: #333;
}


/* CARDS */

.category-stats {
    display: grid;
    grid-template-columns: repeat(3, 1fr);

    gap: 18px;

    margin-bottom: 30px;
}

.category-card {
    background: #fff;

    border: 1px solid #e5e5e5;
    border-radius: 7px;

    padding: 22px;
}

.category-card-icon {
    width: 42px;
    height: 42px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #111;
    color: #fff;

    border-radius: 50%;

    margin-bottom: 18px;
}

.category-card span {
    color: #777;
    font-size: 13px;
}

.category-card strong {
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

.categories-toolbar {
    display: flex;
    align-items: center;
    justify-content: space-between;

    gap: 20px;

    margin-bottom: 18px;
}

.category-search {
    width: 450px;
    height: 48px;

    display: flex;
    align-items: center;

    background: #fff;

    border: 1px solid #ddd;
    border-radius: 6px;

    overflow: hidden;
}

.category-search i {
    margin-left: 16px;

    color: #999;
}

.category-search input {
    flex: 1;
    min-width: 0;

    height: 100%;

    padding: 0 14px;

    border: none;
    outline: none;

    font-family: 'Barlow', sans-serif;
}

.category-search button {
    height: 100%;

    padding: 0 20px;

    border: none;

    background: #111;
    color: #fff;

    cursor: pointer;
}

.categories-count {
    color: #777;
    font-size: 14px;
}


/* TABELA */

.category-table-box {
    background: #fff;

    border: 1px solid #e5e5e5;
    border-radius: 7px;

    overflow-x: auto;
}

.category-table {
    width: 100%;

    border-collapse: collapse;
}

.category-table th {
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

.category-table td {
    padding: 17px 18px;

    border-bottom: 1px solid #eee;

    vertical-align: middle;

    font-size: 14px;
}

.category-table tbody tr:hover {
    background: #fafafa;
}

.category-name strong {
    display: block;

    margin-bottom: 4px;
}

.category-name small {
    color: #999;
}


/* STATUS */

.status-active,
.status-inactive {
    display: inline-block;

    padding: 6px 10px;

    border-radius: 999px;

    font-size: 12px;
    font-weight: 600;
}

.status-active {
    background: #111;

    color: #fff;
}

.status-inactive {
    background: #eee;

    color: #777;
}


/* AÇÕES */

.category-actions {
    display: flex;

    gap: 7px;
}

.category-actions form {
    margin: 0;
}

.action-button {
    width: 35px;
    height: 35px;

    display: flex;
    align-items: center;
    justify-content: center;

    border: 1px solid #ddd;
    border-radius: 50%;

    background: #fff;
    color: #111;

    text-decoration: none;

    cursor: pointer;

    transition: .2s;
}

.action-button:hover {
    background: #111;
    color: #fff;

    border-color: #111;
}


/* SEM CATEGORIAS */

.empty-categories {
    padding: 70px 30px;

    text-align: center;
}

.empty-categories i {
    color: #aaa;

    font-size: 35px;

    margin-bottom: 15px;
}

.empty-categories h3 {
    font-family: 'Barlow Condensed', sans-serif;

    font-size: 24px;
}

.empty-categories p {
    color: #888;

    margin-top: 5px;
}


/* PAGINAÇÃO */

.category-pagination {
    padding: 18px;

    border-top: 1px solid #eee;
}


@media(max-width: 900px) {

    .category-stats {
        grid-template-columns: 1fr;
    }

    .categories-header {
        flex-direction: column;

        align-items: flex-start;
    }

    .categories-toolbar {
        flex-direction: column;

        align-items: flex-start;
    }

    .category-search {
        width: 100%;
    }

}

</style>

@endsection


@section('content')


<div class="categories-header">

    <div>

        <h2>Categorias</h2>

        <p>
            Organize as categorias utilizadas nos produtos da Aura Running.
        </p>

    </div>


    <a
        href="{{ route('admin.categories.create') }}"
        class="btn-primary-admin"
    >

        <i class="fa-solid fa-plus"></i>

        Nova categoria

    </a>

</div>


@if(session('success'))

    <div class="admin-alert success">

        {{ session('success') }}

    </div>

@endif


<div class="category-stats">


    <div class="category-card">

        <div class="category-card-icon">

            <i class="fa-solid fa-tags"></i>

        </div>

        <span>Total de categorias</span>

        <strong>
            {{ $totalCategories }}
        </strong>

    </div>


    <div class="category-card">

        <div class="category-card-icon">

            <i class="fa-solid fa-check"></i>

        </div>

        <span>Categorias ativas</span>

        <strong>
            {{ $activeCategories }}
        </strong>

    </div>


    <div class="category-card">

        <div class="category-card-icon">

            <i class="fa-solid fa-eye-slash"></i>

        </div>

        <span>Categorias inativas</span>

        <strong>
            {{ $inactiveCategories }}
        </strong>

    </div>


</div>


<div class="categories-toolbar">


    <form
        method="GET"
        action="{{ route('admin.categories.index') }}"
        class="category-search"
    >

        <i class="fa-solid fa-magnifying-glass"></i>


        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Buscar categoria..."
        >


        <button type="submit">
            Buscar
        </button>

    </form>


    <div class="categories-count">

        {{ $categories->total() }}

        {{ $categories->total() === 1 ? 'categoria' : 'categorias' }}

    </div>


</div>


<div class="category-table-box">


    @if($categories->count() > 0)


        <table class="category-table">


            <thead>

                <tr>

                    <th>Categoria</th>

                    <th>Descrição</th>

                    <th>Produtos</th>

                    <th>Status</th>

                    <th>Ações</th>

                </tr>

            </thead>


            <tbody>


                @foreach($categories as $category)


                    <tr>


                        <td>

                            <div class="category-name">

                                <strong>
                                    {{ $category->name }}
                                </strong>

                                <small>
                                    {{ $category->slug }}
                                </small>

                            </div>

                        </td>


                        <td>

                            {{ $category->description ?: 'Sem descrição' }}

                        </td>


                        <td>

                            <strong>
                                {{ $category->products_count }}
                            </strong>

                        </td>


                        <td>

                            @if($category->active)

                                <span class="status-active">
                                    Ativa
                                </span>

                            @else

                                <span class="status-inactive">
                                    Inativa
                                </span>

                            @endif

                        </td>


                        <td>

                            <div class="category-actions">


                                <a
                                    href="{{ route('admin.categories.edit', $category) }}"
                                    class="action-button"
                                    title="Editar categoria"
                                >

                                    <i class="fa-solid fa-pen"></i>

                                </a>


                                <form
                                    method="POST"
                                    action="{{ route('admin.categories.toggle-status', $category) }}"
                                >

                                    @csrf

                                    @method('PATCH')


                                    <button
                                        type="submit"
                                        class="action-button"
                                        title="{{ $category->active ? 'Desativar' : 'Ativar' }}"
                                    >

                                        @if($category->active)

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


        <div class="category-pagination">

            {{ $categories->links() }}

        </div>


    @else


        <div class="empty-categories">

            <i class="fa-solid fa-tags"></i>

            <h3>
                Nenhuma categoria encontrada
            </h3>

            <p>
                Cadastre uma categoria para começar.
            </p>

        </div>


    @endif


</div>


@endsection