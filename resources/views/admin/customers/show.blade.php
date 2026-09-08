@extends('admin.layout')

@section('title', 'Cliente')

@section('page-title', 'Cliente')


@section('page-styles')

<style>

    .customer-back {
        min-height: 40px;

        display: inline-flex;
        align-items: center;
        justify-content: center;

        padding: 0 18px;

        margin-bottom: 25px;

        background: #fff;
        color: #111;

        border: 1px solid #ddd;
        border-radius: 999px;

        text-decoration: none;

        font-size: 12px;
        font-weight: 600;

        transition: .2s;
    }

    .customer-back:hover {
        background: #111;
        color: #fff;
        border-color: #111;
    }


    .customer-header {
        display: flex;
        align-items: center;

        gap: 20px;

        margin-bottom: 30px;
    }

    .customer-large-avatar {
        width: 72px;
        height: 72px;

        display: flex;
        align-items: center;
        justify-content: center;

        flex-shrink: 0;

        background: #111;
        color: #fff;

        border-radius: 50%;

        font-family: 'Barlow Condensed', sans-serif;

        font-size: 29px;
        font-weight: 600;
    }

    .customer-header h2 {
        font-family: 'Barlow Condensed', sans-serif;

        font-size: 42px;
        font-weight: 600;

        line-height: 1;
    }

    .customer-header p {
        margin-top: 7px;

        color: #777;

        font-size: 14px;
    }


    .customer-summary {
        display: grid;

        grid-template-columns: repeat(3, 1fr);

        gap: 18px;

        margin-bottom: 25px;
    }

    .summary-card {
        padding: 22px;

        background: #fff;

        border: 1px solid #e5e5e5;
        border-radius: 7px;
    }

    .summary-card span {
        color: #888;

        font-size: 11px;

        text-transform: uppercase;

        letter-spacing: .08em;
    }

    .summary-card strong {
        display: block;

        margin-top: 5px;

        font-family: 'Barlow Condensed', sans-serif;

        font-size: 29px;
        font-weight: 600;
    }


    .customer-box {
        overflow: hidden;

        background: #fff;

        border: 1px solid #e5e5e5;
        border-radius: 7px;
    }

    .customer-box-header {
        padding: 20px 22px;

        background: #fafafa;

        border-bottom: 1px solid #eee;
    }

    .customer-box-header h3 {
        font-family: 'Barlow Condensed', sans-serif;

        font-size: 22px;
        font-weight: 600;
    }


    .customer-orders {
        width: 100%;

        border-collapse: collapse;
    }

    .customer-orders th {
        padding: 15px 18px;

        text-align: left;

        color: #888;

        font-size: 10px;
        font-weight: 600;

        letter-spacing: .09em;

        text-transform: uppercase;

        border-bottom: 1px solid #eee;
    }

    .customer-orders td {
        padding: 16px 18px;

        font-size: 13px;

        border-bottom: 1px solid #eee;
    }


    .order-status {
        display: inline-flex;

        padding: 6px 10px;

        background: #f1f1f1;

        border-radius: 999px;

        font-size: 11px;
        font-weight: 600;
    }

    .order-status.cancelado {
        background: #fdecec;

        color: #a72e2e;
    }


    .view-order {
        width: 34px;
        height: 34px;

        display: inline-flex;
        align-items: center;
        justify-content: center;

        background: #fff;
        color: #111;

        border: 1px solid #ddd;
        border-radius: 50%;

        text-decoration: none;

        transition: .2s;
    }

    .view-order:hover {
        background: #111;
        color: #fff;
        border-color: #111;
    }


    .no-orders {
        padding: 50px;

        color: #888;

        text-align: center;
    }


    @media(max-width:900px) {

        .customer-summary {
            grid-template-columns: 1fr;
        }

    }

</style>

@endsection



@section('content')


<a
    href="{{ route('admin.customers.index') }}"
    class="customer-back"
>

    Clientes

</a>


<div class="customer-header">


    <div class="customer-large-avatar">

        {{ strtoupper(substr($customer->name, 0, 1)) }}

    </div>


    <div>

        <h2>
            {{ $customer->name }}
        </h2>

        <p>
            {{ $customer->email }}
        </p>

    </div>


</div>



<div class="customer-summary">


    <div class="summary-card">

        <span>
            Pedidos realizados
        </span>

        <strong>
            {{ $customer->orders->count() }}
        </strong>

    </div>


    <div class="summary-card">

        <span>
            Total pago
        </span>

        <strong>

            R$ {{ number_format(
                $totalSpent,
                2,
                ',',
                '.'
            ) }}

        </strong>

    </div>


    <div class="summary-card">

        <span>
            Cliente desde
        </span>

        <strong>

            {{ $customer->created_at
                ?->format('d/m/Y') ?? '—' }}

        </strong>

    </div>


</div>



<div class="customer-box">


    <div class="customer-box-header">

        <h3>
            Histórico de pedidos
        </h3>

    </div>


    @if($customer->orders->count())


        <table class="customer-orders">


            <thead>

                <tr>

                    <th>Pedido</th>
                    <th>Data</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Pagamento</th>
                    <th></th>

                </tr>

            </thead>


            <tbody>


                @foreach($customer->orders as $order)


                    <tr>


                        <td>

                            <strong>
                                {{ $order->order_number }}
                            </strong>

                        </td>


                        <td>

                            {{ $order->created_at
                                ->format('d/m/Y H:i') }}

                        </td>


                        <td>

                            R$ {{ number_format(
                                $order->total,
                                2,
                                ',',
                                '.'
                            ) }}

                        </td>


                        <td>

                            <span
                                class="order-status {{ $order->status }}"
                            >

                                {{ ucwords(
                                    str_replace(
                                        '_',
                                        ' ',
                                        $order->status
                                    )
                                ) }}

                            </span>

                        </td>


                        <td>

                            {{ ucfirst(
                                $order->payment_status
                                ?? 'pendente'
                            ) }}

                        </td>


                        <td>

                            <a
                                href="{{ route(
                                    'admin.orders.show',
                                    $order
                                ) }}"
                                class="view-order"
                                title="Visualizar pedido"
                            >

                                <i class="fa-solid fa-eye"></i>

                            </a>

                        </td>


                    </tr>


                @endforeach


            </tbody>


        </table>


    @else


        <div class="no-orders">

            Este cliente ainda não realizou pedidos.

        </div>


    @endif


</div>


@endsection