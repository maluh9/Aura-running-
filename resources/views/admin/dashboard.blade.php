@extends('admin.layout')

@section('title', 'Dashboard')

@section('page-title', 'Dashboard')

@section('content')


<div class="dashboard-header">

    <h2>
        Olá, {{ auth()->user()->name }}.
    </h2>

    <p>
        Acompanhe o desempenho e o gerenciamento da Aura Running.
    </p>

</div>


{{-- CARDS PRINCIPAIS --}}
<div class="stats-grid">


    {{-- PRODUTOS --}}
    <div class="stat-card">

        <div class="stat-icon">
            <i class="fa-solid fa-box"></i>
        </div>

        <div class="stat-label">
            Produtos cadastrados
        </div>

        <div class="stat-number">
            {{ $totalProducts }}
        </div>

    </div>


    {{-- ESTOQUE --}}
    <div class="stat-card">

        <div class="stat-icon">
            <i class="fa-solid fa-boxes-stacked"></i>
        </div>

        <div class="stat-label">
            Estoque baixo
        </div>

        <div class="stat-number">
            {{ $lowStockCount }}
        </div>

    </div>


    {{-- PEDIDOS --}}
    <div class="stat-card">

        <div class="stat-icon">
            <i class="fa-solid fa-bag-shopping"></i>
        </div>

        <div class="stat-label">
            Pedidos
        </div>

        <div class="stat-number">
            {{ $totalOrders }}
        </div>

    </div>


    {{-- CLIENTES --}}
    <div class="stat-card">

        <div class="stat-icon">
            <i class="fa-solid fa-users"></i>
        </div>

        <div class="stat-label">
            Clientes
        </div>

        <div class="stat-number">
            {{ $totalCustomers }}
        </div>

    </div>


</div>


{{-- PARTE INFERIOR DO DASHBOARD --}}
<div class="dashboard-grid">


    {{-- PEDIDOS RECENTES --}}
    <div class="dashboard-box">

        <div class="dashboard-box-header">

            <h3>
                Pedidos recentes
            </h3>

            <a href="#">
                Ver todos
            </a>

        </div>


        @if($recentOrders->count() > 0)

            <table class="admin-table">

                <thead>

                    <tr>
                        <th>Pedido</th>
                        <th>Cliente</th>
                        <th>Valor</th>
                        <th>Status</th>
                    </tr>

                </thead>

                <tbody>

                    @foreach($recentOrders as $order)

                        <tr>

                            <td>
                                {{ $order->order_number }}
                            </td>

                            <td>
                                {{ optional($order->user)->name ?? 'Cliente' }}
                            </td>

                            <td>
                                R$ {{ number_format($order->total, 2, ',', '.') }}
                            </td>

                            <td>

                                <span class="status-badge">
                                    {{ ucwords(str_replace('_', ' ', $order->status)) }}
                                </span>

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        @else

            <div class="dashboard-empty">
                Nenhum pedido recente para exibir.
            </div>

        @endif


    </div>


    {{-- ESTOQUE BAIXO --}}
    <div class="dashboard-box">

        <div class="dashboard-box-header">

            <h3>
                Estoque baixo
            </h3>

            <a href="#">
                Ver estoque
            </a>

        </div>


        @if($lowStockProducts->count() > 0)

            @foreach($lowStockProducts as $product)

                <div class="stock-item">

                    <div>

                        <strong>
                            {{ $product->name }}
                        </strong>

                        <p>
                            Estoque atual
                        </p>

                    </div>


                    <span class="stock-number">
                        {{ $product->stock }}
                    </span>

                </div>

            @endforeach

        @else

            <div class="dashboard-empty">
                Nenhum produto com estoque baixo.
            </div>

        @endif


    </div>


</div>


@endsection