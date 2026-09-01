@extends('admin.layout')

@section('title', 'Pedidos')

@section('page-title', 'Pedidos')


@section('page-styles')

<style>

.orders-header {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    gap: 25px;

    margin-bottom: 30px;
}

.orders-header h2 {
    font-family: 'Barlow Condensed', sans-serif;

    font-size: 50px;
    font-weight: 600;

    line-height: 1;
}

.orders-header p {
    color: #777;

    margin-top: 10px;

    font-size: 15px;
}


/* CARDS */

.orders-stats {
    display: grid;

    grid-template-columns: repeat(3, 1fr);

    gap: 18px;

    margin-bottom: 30px;
}

.order-stat-card {
    background: #fff;

    border: 1px solid #e5e5e5;
    border-radius: 7px;

    padding: 22px;
}

.order-stat-icon {
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

.order-stat-card span {
    color: #777;

    font-size: 13px;
}

.order-stat-card strong {
    display: block;

    margin-top: 4px;

    font-family: 'Barlow Condensed', sans-serif;

    font-size: 34px;
}


/* FILTROS */

.orders-toolbar {
    display: flex;
    align-items: center;
    justify-content: space-between;

    gap: 15px;

    margin-bottom: 18px;
}

.orders-search {
    display: flex;

    width: 450px;
    height: 48px;

    background: #fff;

    border: 1px solid #ddd;
    border-radius: 6px;

    overflow: hidden;
}

.orders-search i {
    display: flex;
    align-items: center;

    margin-left: 16px;

    color: #999;
}

.orders-search input {
    flex: 1;
    min-width: 0;

    border: none;
    outline: none;

    padding: 0 14px;

    font-family: 'Barlow', sans-serif;
}

.orders-search button {
    border: none;

    padding: 0 20px;

    background: #111;
    color: #fff;

    cursor: pointer;
}


/* TABELA */

.orders-table-box {
    background: #fff;

    border: 1px solid #e5e5e5;
    border-radius: 7px;

    overflow-x: auto;
}

.orders-table {
    width: 100%;

    border-collapse: collapse;
}

.orders-table th {
    padding: 16px 18px;

    text-align: left;

    background: #fafafa;

    border-bottom: 1px solid #e8e8e8;

    color: #777;

    font-size: 11px;
    font-weight: 600;

    letter-spacing: .10em;
    text-transform: uppercase;

    white-space: nowrap;
}

.orders-table td {
    padding: 17px 18px;

    border-bottom: 1px solid #eee;

    font-size: 14px;

    vertical-align: middle;
}

.orders-table tbody tr:hover {
    background: #fafafa;
}


/* PEDIDO */

.order-number {
    font-weight: 600;
}

.order-customer strong {
    display: block;

    margin-bottom: 3px;
}

.order-customer span {
    color: #999;

    font-size: 12px;
}


/* STATUS */

.order-status {
    display: inline-block;

    padding: 6px 10px;

    border-radius: 999px;

    background: #f1f1f1;

    font-size: 12px;
    font-weight: 600;

    white-space: nowrap;
}

.payment-pending {
    color: #a96800;

    background: #fff4df;
}

.payment-paid {
    color: #28733c;

    background: #eef8f0;
}


/* VAZIO */

.orders-empty {
    padding: 70px 30px;

    text-align: center;
}

.orders-empty i {
    color: #aaa;

    font-size: 35px;

    margin-bottom: 15px;
}

.orders-empty h3 {
    font-family: 'Barlow Condensed', sans-serif;

    font-size: 24px;
}

.orders-empty p {
    color: #888;

    margin-top: 5px;
}


/* PAGINAÇÃO */

.orders-pagination {
    padding: 18px;

    border-top: 1px solid #eee;
}


@media(max-width: 900px) {

    .orders-stats {
        grid-template-columns: 1fr;
    }

    .orders-toolbar {
        flex-direction: column;

        align-items: flex-start;
    }

    .orders-search {
        width: 100%;
    }

}

.order-view-button {
    width: 36px;
    height: 36px;

    display: inline-flex;
    align-items: center;
    justify-content: center;

    border: 1px solid #ddd;
    border-radius: 50%;

    background: #fff;
    color: #111;

    text-decoration: none;

    transition: .2s ease;
}

.order-view-button:hover {
    background: #111;
    color: #fff;

    border-color: #111;
}

</style>

@endsection


@section('content')


<div class="orders-header">

    <div>

        <h2>Pedidos</h2>

        <p>
            Acompanhe os pedidos realizados na Aura Running.
        </p>

    </div>

</div>


{{-- CARDS --}}

<div class="orders-stats">


    <div class="order-stat-card">

        <div class="order-stat-icon">

            <i class="fa-solid fa-bag-shopping"></i>

        </div>

        <span>
            Total de pedidos
        </span>

        <strong>
            {{ $totalOrders }}
        </strong>

    </div>


    <div class="order-stat-card">

        <div class="order-stat-icon">

            <i class="fa-regular fa-clock"></i>

        </div>

        <span>
            Pedidos realizados
        </span>

        <strong>
            {{ $pendingOrders }}
        </strong>

    </div>


    <div class="order-stat-card">

        <div class="order-stat-icon">

            <i class="fa-solid fa-dollar-sign"></i>

        </div>

        <span>
            Vendas confirmadas
        </span>

        <strong>
            R$ {{ number_format($totalSales, 2, ',', '.') }}
        </strong>

    </div>


</div>


{{-- BUSCA --}}

<div class="orders-toolbar">

    <form
        action="{{ route('admin.orders.index') }}"
        method="GET"
        class="orders-search"
    >

        <i class="fa-solid fa-magnifying-glass"></i>

        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Buscar pedido ou cliente..."
        >

        <button type="submit">
            Buscar
        </button>

    </form>

</div>


{{-- TABELA --}}

<div class="orders-table-box">


    @if($orders->count() > 0)


        <table class="orders-table">

            <thead>

                <tr>

                    <th>Pedido</th>
                    <th>Cliente</th>
                    <th>Data</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Pagamento</th>
                    <th>Ações</th>

                </tr>

            </thead>


            <tbody>


                @foreach($orders as $order)


                    <tr>


                        <td>

                            <span class="order-number">

                                {{ $order->order_number }}

                            </span>

                        </td>


                        <td>

                            <div class="order-customer">

                                <strong>
                                    {{ optional($order->user)->name ?? 'Cliente não encontrado' }}
                                </strong>

                                <span>
                                    {{ optional($order->user)->email ?? '—' }}
                                </span>

                            </div>

                        </td>


                        <td>

                            {{ $order->created_at->format('d/m/Y H:i') }}

                        </td>


                        <td>

                            <strong>

                                R$ {{ number_format($order->total, 2, ',', '.') }}

                            </strong>

                        </td>


                        <td>

                            <span class="order-status">

                                {{ ucwords(str_replace('_', ' ', $order->status)) }}

                            </span>

                        </td>


                        <td>

                            @if($order->payment_status === 'pago')

                                <span class="order-status payment-paid">

                                    Pago

                                </span>

                            @else

                                <span class="order-status payment-pending">

                                    {{ ucfirst($order->payment_status ?? 'Pendente') }}

                                </span>

                            @endif

                        </td>
                            {{-- AÇÕES --}}
                        <td>

                            <a
                                href="{{ route('admin.orders.show', $order) }}"
                                class="order-view-button"
                                title="Visualizar pedido"
                            >

                                <i class="fa-solid fa-eye"></i>

                            </a>

                        </td>

                    </tr>


                @endforeach


            </tbody>

        </table>


        <div class="orders-pagination">

            @include('admin.partials.pagination', [
                'paginator' => $orders
            ])

        </div>


    @else


        <div class="orders-empty">

            <i class="fa-solid fa-bag-shopping"></i>

            <h3>
                Nenhum pedido encontrado
            </h3>

            <p>
                Os pedidos realizados pelos clientes aparecerão aqui.
            </p>

        </div>


    @endif


</div>


@endsection