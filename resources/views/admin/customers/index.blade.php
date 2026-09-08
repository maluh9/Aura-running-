@extends('admin.layout')

@section('title', 'Clientes')

@section('page-title', 'Clientes')


@section('page-styles')

<style>

    .customers-header {
        margin-bottom: 30px;
    }

    .customers-header h2 {
        font-family: 'Barlow Condensed', sans-serif;
        font-size: 50px;
        font-weight: 600;
        line-height: 1;
    }

    .customers-header p {
        margin-top: 9px;
        color: #777;
        font-size: 14px;
    }


    .customer-stats {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 18px;
        margin-bottom: 30px;
    }

    .customer-stat {
        padding: 22px;
        background: #fff;
        border: 1px solid #e5e5e5;
        border-radius: 7px;
    }

    .customer-stat-icon {
        width: 42px;
        height: 42px;

        display: flex;
        align-items: center;
        justify-content: center;

        margin-bottom: 17px;

        background: #111;
        color: #fff;

        border-radius: 50%;
    }

    .customer-stat span {
        color: #777;
        font-size: 12px;
    }

    .customer-stat strong {
        display: block;
        margin-top: 4px;

        font-family: 'Barlow Condensed', sans-serif;
        font-size: 34px;
        font-weight: 600;
    }


    .customers-toolbar {
        display: flex;
        align-items: center;
        justify-content: space-between;

        margin-bottom: 18px;
    }

    .customers-search {
        width: 450px;
        height: 48px;

        display: flex;
        align-items: center;

        overflow: hidden;

        background: #fff;

        border: 1px solid #ddd;
        border-radius: 6px;
    }

    .customers-search i {
        margin-left: 16px;
        color: #999;
    }

    .customers-search input {
        flex: 1;
        min-width: 0;

        padding: 0 14px;

        border: none;
        outline: none;

        font-family: 'Barlow', sans-serif;
    }

    .customers-search button {
        height: 100%;
        padding: 0 20px;

        background: #111;
        color: #fff;

        border: none;

        font-family: 'Barlow', sans-serif;

        cursor: pointer;
    }


    .customers-table-box {
        overflow-x: auto;

        background: #fff;

        border: 1px solid #e5e5e5;
        border-radius: 7px;
    }

    .customers-table {
        width: 100%;
        border-collapse: collapse;
    }

    .customers-table th {
        padding: 16px 18px;

        background: #fafafa;

        border-bottom: 1px solid #e8e8e8;

        color: #777;

        font-size: 11px;
        font-weight: 600;

        letter-spacing: .10em;

        text-align: left;
        text-transform: uppercase;

        white-space: nowrap;
    }

    .customers-table td {
        padding: 17px 18px;

        border-bottom: 1px solid #eee;

        font-size: 14px;

        vertical-align: middle;
    }

    .customers-table tbody tr:hover {
        background: #fafafa;
    }


    .customer-user {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .customer-avatar {
        width: 39px;
        height: 39px;

        flex-shrink: 0;

        display: flex;
        align-items: center;
        justify-content: center;

        background: #111;
        color: #fff;

        border-radius: 50%;

        font-family: 'Barlow Condensed', sans-serif;

        font-size: 17px;
        font-weight: 600;
    }

    .customer-user strong {
        display: block;
        margin-bottom: 2px;
    }

    .customer-user span {
        color: #999;
        font-size: 11px;
    }


    .orders-count {
        display: inline-flex;
        align-items: center;
        justify-content: center;

        min-width: 33px;
        height: 30px;

        padding: 0 10px;

        background: #f1f1f1;

        border-radius: 999px;

        font-size: 12px;
        font-weight: 600;
    }


    .customer-view {
        width: 36px;
        height: 36px;

        display: inline-flex;
        align-items: center;
        justify-content: center;

        background: #fff;
        color: #111;

        border: 1px solid #ddd;
        border-radius: 50%;

        text-decoration: none;

        transition: .2s ease;
    }

    .customer-view:hover {
        background: #111;
        color: #fff;
        border-color: #111;
    }


    .customers-empty {
        padding: 70px 30px;
        text-align: center;
    }

    .customers-empty i {
        margin-bottom: 15px;
        color: #aaa;
        font-size: 35px;
    }

    .customers-empty h3 {
        font-family: 'Barlow Condensed', sans-serif;
        font-size: 25px;
    }

    .customers-empty p {
        margin-top: 5px;
        color: #888;
    }


    .customers-pagination {
        padding: 18px;
        border-top: 1px solid #eee;
    }


    @media(max-width: 900px) {

        .customer-stats {
            grid-template-columns: 1fr;
        }

        .customers-search {
            width: 100%;
        }

    }

</style>

@endsection



@section('content')


<div class="customers-header">

    <h2>
        Clientes
    </h2>

    <p>
        Consulte os clientes cadastrados e acompanhe
        o histórico de compras na AURA.
    </p>

</div>



<div class="customer-stats">


    <div class="customer-stat">

        <div class="customer-stat-icon">

            <i class="fa-solid fa-users"></i>

        </div>

        <span>
            Clientes cadastrados
        </span>

        <strong>
            {{ $totalCustomers }}
        </strong>

    </div>



    <div class="customer-stat">

        <div class="customer-stat-icon">

            <i class="fa-solid fa-bag-shopping"></i>

        </div>

        <span>
            Clientes com pedidos
        </span>

        <strong>
            {{ $customersWithOrders }}
        </strong>

    </div>



    <div class="customer-stat">

        <div class="customer-stat-icon">

            <i class="fa-solid fa-dollar-sign"></i>

        </div>

        <span>
            Receita confirmada
        </span>

        <strong>

            R$ {{ number_format(
                $totalRevenue,
                2,
                ',',
                '.'
            ) }}

        </strong>

    </div>


</div>



<div class="customers-toolbar">

    <form
        action="{{ route('admin.customers.index') }}"
        method="GET"
        class="customers-search"
    >

        <i class="fa-solid fa-magnifying-glass"></i>

        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Buscar nome ou e-mail..."
        >

        <button type="submit">
            Buscar
        </button>

    </form>

</div>



<div class="customers-table-box">


    @if($customers->count())


        <table class="customers-table">

            <thead>

                <tr>

                    <th>Cliente</th>
                    <th>Pedidos</th>
                    <th>Total pago</th>
                    <th>Cadastro</th>
                    <th>Ações</th>

                </tr>

            </thead>


            <tbody>


                @foreach($customers as $customer)


                    <tr>


                        <td>

                            <div class="customer-user">

                                <div class="customer-avatar">

                                    {{ strtoupper(
                                        substr($customer->name, 0, 1)
                                    ) }}

                                </div>

                                <div>

                                    <strong>
                                        {{ $customer->name }}
                                    </strong>

                                    <span>
                                        {{ $customer->email }}
                                    </span>

                                </div>

                            </div>

                        </td>


                        <td>

                            <span class="orders-count">

                                {{ $customer->orders_count }}

                            </span>

                        </td>


                        <td>

                            <strong>

                                R$ {{ number_format(
                                    $customer->total_spent ?? 0,
                                    2,
                                    ',',
                                    '.'
                                ) }}

                            </strong>

                        </td>


                        <td>

                            {{ $customer->created_at
                                ?->format('d/m/Y') ?? '—' }}

                        </td>


                        <td>

                            <a
                                href="{{ route(
                                    'admin.customers.show',
                                    $customer
                                ) }}"
                                class="customer-view"
                                title="Visualizar cliente"
                            >

                                <i class="fa-solid fa-eye"></i>

                            </a>

                        </td>


                    </tr>


                @endforeach


            </tbody>

        </table>


        <div class="customers-pagination">

            @include(
                'admin.partials.pagination',
                [
                    'paginator' => $customers
                ]
            )

        </div>


    @else


        <div class="customers-empty">

            <i class="fa-solid fa-users"></i>

            <h3>
                Nenhum cliente encontrado
            </h3>

            <p>
                Os usuários cadastrados aparecerão aqui.
            </p>

        </div>


    @endif


</div>


@endsection