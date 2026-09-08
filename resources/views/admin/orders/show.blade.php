@extends('admin.layout')

@section('title', 'Detalhes do Pedido')

@section('page-title', 'Detalhes do Pedido')


@section('page-styles')

<style>

/* =========================================
   CABEÇALHO
========================================= */

.order-detail-header {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;

    gap: 25px;

    margin-bottom: 30px;
}

.order-detail-header h2 {
    font-family: 'Barlow Condensed', sans-serif;

    font-size: 48px;
    font-weight: 600;

    line-height: 1;
}

.order-detail-header p {
    margin-top: 9px;

    color: #777;

    font-size: 14px;
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

    transition: .2s;
}

.btn-back:hover {
    background: #111;
    color: #fff;

    border-color: #111;
}


/* =========================================
   RESUMO
========================================= */

.order-summary-grid {
    display: grid;

    grid-template-columns: repeat(4, 1fr);

    gap: 16px;

    margin-bottom: 25px;
}

.summary-card {
    background: #fff;

    border: 1px solid #e5e5e5;
    border-radius: 7px;

    padding: 20px;
}

.summary-card span {
    display: block;

    margin-bottom: 7px;

    color: #888;

    font-size: 12px;

    text-transform: uppercase;
    letter-spacing: .06em;
}

.summary-card strong {
    font-size: 16px;
}


/* =========================================
   LAYOUT
========================================= */

.order-detail-grid {
    display: grid;

    grid-template-columns: minmax(0, 2fr) minmax(280px, 1fr);

    gap: 20px;

    align-items: start;
}

.order-box {
    background: #fff;

    border: 1px solid #e5e5e5;
    border-radius: 7px;

    padding: 25px;
}

.order-box + .order-box {
    margin-top: 20px;
}

.order-box-title {
    padding-bottom: 18px;

    margin-bottom: 20px;

    border-bottom: 1px solid #eee;

    font-family: 'Barlow Condensed', sans-serif;

    font-size: 22px;
    font-weight: 600;

    text-transform: uppercase;

    letter-spacing: .04em;
}


/* =========================================
   PRODUTOS
========================================= */

.order-item {
    display: grid;

    grid-template-columns: 70px minmax(180px, 1fr) auto auto;

    gap: 18px;

    align-items: center;

    padding: 18px 0;

    border-bottom: 1px solid #eee;
}

.order-item:first-of-type {
    padding-top: 0;
}

.order-item:last-child {
    border-bottom: none;

    padding-bottom: 0;
}

.order-item-image {
    width: 70px;
    height: 70px;

    overflow: hidden;

    border-radius: 6px;

    background: #f4f4f4;

    display: flex;
    align-items: center;
    justify-content: center;
}

.order-item-image img {
    width: 100%;
    height: 100%;

    object-fit: cover;
}

.order-item-image i {
    color: #aaa;

    font-size: 22px;
}

.order-item-info strong {
    display: block;

    margin-bottom: 6px;

    font-size: 15px;
}

.order-item-info span {
    display: block;

    color: #888;

    font-size: 12px;

    margin-top: 3px;
}

.order-item-quantity {
    text-align: center;

    white-space: nowrap;
}

.order-item-quantity span {
    display: block;

    color: #888;

    font-size: 11px;

    margin-bottom: 4px;
}

.order-item-value {
    text-align: right;

    white-space: nowrap;
}

.order-item-value span {
    display: block;

    margin-bottom: 4px;

    color: #888;

    font-size: 11px;
}


/* =========================================
   TOTAL
========================================= */

.order-total-row {
    display: flex;
    align-items: center;
    justify-content: space-between;

    margin-top: 22px;

    padding-top: 22px;

    border-top: 2px solid #111;
}

.order-total-row span {
    font-size: 15px;

    font-weight: 600;
}

.order-total-row strong {
    font-family: 'Barlow Condensed', sans-serif;

    font-size: 27px;
}


/* =========================================
   CLIENTE
========================================= */

.customer-data-row {
    margin-bottom: 18px;
}

.customer-data-row:last-child {
    margin-bottom: 0;
}

.customer-data-row span {
    display: block;

    margin-bottom: 5px;

    color: #888;

    font-size: 11px;

    text-transform: uppercase;
    letter-spacing: .06em;
}

.customer-data-row strong {
    display: block;

    font-size: 14px;
}


/* =========================================
   STATUS
========================================= */

.order-status-badge {
    display: inline-flex;

    padding: 7px 11px;

    border-radius: 999px;

    background: #f0f0f0;

    font-size: 12px;
    font-weight: 600;
}

.payment-pending {
    background: #fff4df;

    color: #a96800;
}

.payment-paid {
    background: #eef8f0;

    color: #28733c;
}


/* =========================================
   RASTREIO
========================================= */

.tracking-empty {
    color: #999;

    font-size: 13px;
}


/* =========================================
   RESPONSIVO
========================================= */

@media(max-width: 1100px) {

    .order-summary-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .order-detail-grid {
        grid-template-columns: 1fr;
    }

}

@media(max-width: 700px) {

    .order-summary-grid {
        grid-template-columns: 1fr;
    }

    .order-detail-header {
        flex-direction: column;

        align-items: flex-start;
    }

    .order-item {
        grid-template-columns: 60px 1fr;
    }

    .order-item-quantity,
    .order-item-value {
        text-align: left;
    }

}

/* =========================================
   CABEÇALHO MELHORADO
========================================= */

.order-header-label {
    color: #999;

    font-size: 11px;
    font-weight: 600;

    text-transform: uppercase;

    letter-spacing: .12em;

    margin-bottom: 8px;
}


/* =========================================
   ÁREA DE GERENCIAMENTO
========================================= */

.management-section {
    margin-top: 22px;
}

.management-heading {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;

    gap: 20px;

    margin-bottom: 18px;
}

.management-heading > div > span {
    color: #999;

    font-size: 11px;
    font-weight: 600;

    text-transform: uppercase;
    letter-spacing: .12em;
}

.management-heading h3 {
    margin-top: 4px;

    font-family: 'Barlow Condensed', sans-serif;

    font-size: 30px;
    font-weight: 600;
}

.management-heading > p {
    color: #888;

    font-size: 13px;
}


/* GRID */

.management-grid {
    display: grid;

    grid-template-columns: repeat(2, minmax(0, 1fr));

    gap: 18px;
}


/* CARD */

.management-card {
    background: #fff;

    border: 1px solid #e5e5e5;
    border-radius: 8px;

    padding: 24px;
}

.management-card-header {
    display: flex;
    align-items: center;

    gap: 13px;

    padding-bottom: 18px;
    margin-bottom: 18px;

    border-bottom: 1px solid #eee;
}

.management-icon {
    width: 42px;
    height: 42px;

    flex-shrink: 0;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 50%;

    background: #111;
    color: #fff;
}

.management-icon.danger {
    background: #a72e2e;
}

.management-card-header h4 {
    font-family: 'Barlow Condensed', sans-serif;

    font-size: 19px;
    font-weight: 600;

    text-transform: uppercase;

    letter-spacing: .04em;
}

.management-card-header p {
    color: #999;

    font-size: 12px;

    margin-top: 3px;
}


/* FORMULÁRIOS */

.admin-order-form {
    display: flex;
    flex-direction: column;

    gap: 12px;
}

.admin-order-form select,
.admin-order-form input,
.admin-order-form textarea {
    width: 100%;

    min-height: 46px;

    padding: 0 13px;

    border: 1px solid #ddd;
    border-radius: 6px;

    background: #fafafa;

    outline: none;

    font-family: 'Barlow', sans-serif;

    font-size: 13px;
}

.admin-order-form textarea {
    min-height: 85px;

    padding-top: 12px;

    resize: vertical;
}

.admin-order-form select:focus,
.admin-order-form input:focus,
.admin-order-form textarea:focus {
    background: #fff;

    border-color: #111;
}


/* BOTÃO */

.admin-order-form button {
    min-height: 44px;

    display: inline-flex;
    align-items: center;
    justify-content: center;

    gap: 8px;

    padding: 0 18px;

    border: none;
    border-radius: 999px;

    background: #111;
    color: #fff;

    font-family: 'Barlow', sans-serif;

    font-size: 13px;
    font-weight: 600;

    cursor: pointer;

    transition: .2s ease;
}

.admin-order-form button:hover {
    background: #333;
}


/* CANCELAMENTO */

.cancellation-card {
    border-color: #eadada;
}

.admin-order-form .cancel-order-button {
    background: #ad2e2e;
}

.admin-order-form .cancel-order-button:hover {
    background: #8c2525;
}


/* RESPONSIVO */

@media(max-width: 900px) {

    .management-grid {
        grid-template-columns: 1fr;
    }

    .management-heading {
        flex-direction: column;

        align-items: flex-start;
    }

}

.order-sidebar-box {
    padding: 0 25px;
}

.sidebar-section {
    padding: 24px 0;
    border-bottom: 1px solid #eee;
}

.sidebar-section:last-child {
    border-bottom: none;
}

.sidebar-section .order-box-title {
    margin-bottom: 16px;
    padding-bottom: 12px;
}

.sidebar-section .customer-data-row {
    margin-bottom: 14px;
}

.sidebar-section .customer-data-row:last-child {
    margin-bottom: 0;
}

</style>

@endsection


@section('content')


{{-- CABEÇALHO --}}

<div class="order-detail-header">

    <div>

        <h2>
            {{ $order->order_number }}
        </h2>

        <p>
            Pedido realizado em
            {{ $order->created_at->format('d/m/Y') }}
            às
            {{ $order->created_at->format('H:i') }}.
        </p>

    </div>


    <a
        href="{{ route('admin.orders.index') }}"
        class="btn-back"
    >

        <i class="fa-solid fa-arrow-left"></i>

        Voltar aos pedidos

    </a>

</div>



{{-- RESUMO --}}

<div class="order-summary-grid">


    <div class="summary-card">

        <span>
            Número do pedido
        </span>

        <strong>
            {{ $order->order_number }}
        </strong>

    </div>


    <div class="summary-card">

        <span>
            Status
        </span>

        <strong>

            {{ ucwords(str_replace('_', ' ', $order->status)) }}

        </strong>

    </div>


    <div class="summary-card">

        <span>
            Pagamento
        </span>

        <strong>

            {{ ucfirst($order->payment_status ?? 'Pendente') }}

        </strong>

    </div>


    <div class="summary-card">

        <span>
            Total
        </span>

        <strong>

            R$ {{ number_format($order->total, 2, ',', '.') }}

        </strong>

    </div>


</div>



<div class="order-detail-grid">


    {{-- COLUNA PRINCIPAL --}}

    <div>


        <div class="order-box">

            <div class="order-box-title">

                Produtos do pedido

            </div>


            @foreach($order->items as $item)


                <div class="order-item">


                    {{-- IMAGEM --}}

                    <div class="order-item-image">

                        @if($item->product && $item->product->image)

                            <img
                                src="{{ $item->product->image_url }}"
                                alt="{{ $item->product->name }}"
                            >

                        @else

                            <i class="fa-solid fa-image"></i>

                        @endif

                    </div>


                    {{-- INFORMAÇÕES --}}

                    <div class="order-item-info">

                        <strong>

                            {{ optional($item->product)->name ?? 'Produto não encontrado' }}

                        </strong>


                        @if($item->size)

                            <span>

                                Tamanho:
                                {{ $item->size }}

                            </span>

                        @endif


                        <span>

                            Preço unitário:
                            R$ {{ number_format($item->price, 2, ',', '.') }}

                        </span>

                    </div>


                    {{-- QUANTIDADE --}}

                    <div class="order-item-quantity">

                        <span>
                            Quantidade
                        </span>

                        <strong>
                            {{ $item->quantity }}
                        </strong>

                    </div>


                    {{-- SUBTOTAL --}}

                    <div class="order-item-value">

                        <span>
                            Subtotal
                        </span>

                        <strong>

                            R$ {{ number_format(
                                $item->price * $item->quantity,
                                2,
                                ',',
                                '.'
                            ) }}

                        </strong>

                    </div>


                </div>


            @endforeach



            <div class="order-total-row">

                <span>
                    Total do pedido
                </span>

                <strong>

                    R$ {{ number_format($order->total, 2, ',', '.') }}

                </strong>

            </div>


        </div>


    </div>



{{-- COLUNA LATERAL --}}
<div>

    <div class="order-box order-sidebar-box">


        {{-- CLIENTE --}}

        <div class="sidebar-section">

            <div class="order-box-title">
                Cliente
            </div>

            <div class="customer-data-row">

                <span>Nome</span>

                <strong>
                    {{ optional($order->user)->name ?? 'Cliente não encontrado' }}
                </strong>

            </div>

            <div class="customer-data-row">

                <span>E-mail</span>

                <strong>
                    {{ optional($order->user)->email ?? '—' }}
                </strong>

            </div>

        </div>



        {{-- SITUAÇÃO --}}

        <div class="sidebar-section">

            <div class="order-box-title">
                Situação do pedido
            </div>

            <div class="customer-data-row">

                <span>Status</span>

                <span class="order-status-badge">
                    {{ ucwords(str_replace('_', ' ', $order->status)) }}
                </span>

            </div>

            <div class="customer-data-row">

                <span>Pagamento</span>

                @if($order->payment_status === 'pago')

                    <span class="order-status-badge payment-paid">
                        Pago
                    </span>

                @else

                    <span class="order-status-badge payment-pending">
                        {{ ucfirst($order->payment_status ?? 'Pendente') }}
                    </span>

                @endif

            </div>

        </div>



        {{-- RASTREAMENTO --}}

        <div class="sidebar-section">

            <div class="order-box-title">
                Rastreamento
            </div>

            @if($order->tracking_code)

                <div class="customer-data-row">

                    <span>Código</span>

                    <strong>
                        {{ $order->tracking_code }}
                    </strong>

                </div>

            @else

                <p class="tracking-empty">
                    Nenhum código de rastreamento informado.
                </p>

            @endif

        </div>


    </div>

</div>

</div>
{{-- =========================================
     GERENCIAMENTO
========================================= --}}

<div class="management-section">

    <div class="management-heading">

        <div>

            <span>Administração</span>

            <h3>
                Gerenciamento do pedido
            </h3>

        </div>

        <p>
            Atualize a situação do pedido, pagamento e entrega.
        </p>

    </div>


    <div class="management-grid">


        {{-- STATUS DO PEDIDO --}}

        <div class="management-card">

            <div class="management-card-header">

                <div class="management-icon">
                    <i class="fa-solid fa-box"></i>
                </div>

                <div>

                    <h4>Status do pedido</h4>

                    <p>
                        Atualize a etapa atual da compra.
                    </p>

                </div>

            </div>


            @if($order->status !== 'cancelado')

                <form
                    method="POST"
                    action="{{ route('admin.orders.update-status', $order) }}"
                    class="admin-order-form"
                >

                    @csrf
                    @method('PATCH')


                    <select name="status">

                        <option
                            value="pedido_realizado"
                            {{ $order->status === 'pedido_realizado' ? 'selected' : '' }}
                        >
                            Pedido realizado
                        </option>

                        <option
                            value="em_preparacao"
                            {{ $order->status === 'em_preparacao' ? 'selected' : '' }}
                        >
                            Em preparação
                        </option>

                        <option
                            value="enviado"
                            {{ $order->status === 'enviado' ? 'selected' : '' }}
                        >
                            Enviado
                        </option>

                        <option
                            value="entregue"
                            {{ $order->status === 'entregue' ? 'selected' : '' }}
                        >
                            Entregue
                        </option>

                    </select>


                    <button type="submit">

                        <i class="fa-solid fa-check"></i>

                        Atualizar status

                    </button>

                </form>

            @else

                <div class="cancelled-warning">

                    <i class="fa-solid fa-ban"></i>

                    Pedido cancelado

                </div>

            @endif

        </div>



        {{-- PAGAMENTO --}}

        <div class="management-card">

            <div class="management-card-header">

                <div class="management-icon">
                    <i class="fa-solid fa-credit-card"></i>
                </div>

                <div>

                    <h4>Pagamento</h4>

                    <p>
                        Gerencie a situação financeira do pedido.
                    </p>

                </div>

            </div>


            <form
                method="POST"
                action="{{ route('admin.orders.update-payment', $order) }}"
                class="admin-order-form"
            >

                @csrf
                @method('PATCH')


                <select name="payment_status">

                    <option
                        value="pendente"
                        {{ $order->payment_status === 'pendente' ? 'selected' : '' }}
                    >
                        Pendente
                    </option>

                    <option
                        value="pago"
                        {{ $order->payment_status === 'pago' ? 'selected' : '' }}
                    >
                        Pago
                    </option>

                    <option
                        value="cancelado"
                        {{ $order->payment_status === 'cancelado' ? 'selected' : '' }}
                    >
                        Cancelado
                    </option>

                    <option
                        value="reembolsado"
                        {{ $order->payment_status === 'reembolsado' ? 'selected' : '' }}
                    >
                        Reembolsado
                    </option>

                </select>


                <button type="submit">

                    <i class="fa-solid fa-check"></i>

                    Atualizar pagamento

                </button>

            </form>

        </div>



        {{-- RASTREAMENTO --}}

        <div class="management-card">

            <div class="management-card-header">

                <div class="management-icon">
                    <i class="fa-solid fa-truck"></i>
                </div>

                <div>

                    <h4>Rastreamento</h4>

                    <p>
                        Informe o código utilizado na entrega.
                    </p>

                </div>

            </div>


            <form
                method="POST"
                action="{{ route('admin.orders.update-tracking', $order) }}"
                class="admin-order-form"
            >

                @csrf
                @method('PATCH')


                <input
                    type="text"
                    name="tracking_code"
                    value="{{ old('tracking_code', $order->tracking_code) }}"
                    placeholder="Ex.: BR123456789BR"
                >


                <button type="submit">

                    <i class="fa-solid fa-truck"></i>

                    Salvar rastreamento

                </button>

            </form>

        </div>



        {{-- CANCELAMENTO --}}

        <div class="management-card cancellation-card">

            <div class="management-card-header">

                <div class="management-icon danger">
                    <i class="fa-solid fa-ban"></i>
                </div>

                <div>

                    <h4>Cancelamento</h4>

                    <p>
                        Cancele o pedido somente quando necessário.
                    </p>

                </div>

            </div>


            @if($order->status !== 'cancelado')

                <form
                    method="POST"
                    action="{{ route('admin.orders.cancel', $order) }}"
                    class="admin-order-form"
                    onsubmit="return confirm('Tem certeza que deseja cancelar este pedido?');"
                >

                    @csrf
                    @method('PATCH')


                    <select
                        name="cancellation_reason"
                        required
                    >

                        <option value="">
                            Selecione o motivo
                        </option>

                        <option value="solicitacao_cliente">
                            Solicitação do cliente
                        </option>

                        <option value="produto_indisponivel">
                            Produto indisponível
                        </option>

                        <option value="problema_pagamento">
                            Problema no pagamento
                        </option>

                        <option value="problema_endereco">
                            Problema no endereço
                        </option>

                        <option value="outro">
                            Outro
                        </option>

                    </select>


                    <textarea
                        name="cancellation_note"
                        placeholder="Observação sobre o cancelamento..."
                    ></textarea>


                    <button
                        type="submit"
                        class="cancel-order-button"
                    >

                        <i class="fa-solid fa-ban"></i>

                        Cancelar pedido

                    </button>

                </form>


            @else

                <div class="cancel-information">

                    <strong>
                        Pedido cancelado
                    </strong>

                    <p>
                        Este pedido não pode mais ser processado.
                    </p>

                    @if($order->cancellation_note)

                        <p>
                            {{ $order->cancellation_note }}
                        </p>

                    @endif

                </div>

            @endif

        </div>


    </div>

</div>


@endsection