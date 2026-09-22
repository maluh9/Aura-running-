@php

    /*
    |--------------------------------------------------------------------------
    | QUANTIDADE ATUAL DO CARRINHO
    |--------------------------------------------------------------------------
    |
    | Soma as quantidades reais salvas no banco para o usuário logado.
    |
    */

    $storeCartCount = 0;

    if (auth()->check()) {

        $storeCartCount = (int) \App\Models\CartItem::whereHas(
            'cart',
            function ($query) {

                $query->where(
                    'user_id',
                    auth()->id()
                );

            }
        )->sum('quantity');

    }

@endphp


<style>

    @import url('https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@400;500;600;700&family=Barlow:wght@400;500;600&display=swap');


    .store-header {
        width: 100%;
        height: 96px;

        background: #fff;

        border-bottom: 1px solid #eeeeee;

        font-family: 'Barlow', sans-serif;

        position: relative;

        z-index: 1000;
    }


    .store-nav {
        width: 100%;
        height: 100%;

        padding: 0 50px;

        display: flex;

        align-items: center;

        justify-content: space-between;
    }



    /* =========================================
       LOGO
    ========================================= */

    .store-logo-link {
        display: flex;

        align-items: center;

        text-decoration: none;
    }


    .store-logo {
        width: 110px;

        height: auto;

        display: block;
    }



    /* =========================================
       MENU
    ========================================= */

    .store-menu {
        display: flex;

        align-items: center;

        gap: 0;
    }


    .store-menu-link {
        padding: 8px 16px;

        color: #111;

        text-decoration: none;

        font-family: 'Barlow Condensed', sans-serif;

        font-size: 15px;

        font-weight: 600;

        letter-spacing: .12em;

        text-transform: uppercase;

        border-radius: 6px;

        transition:
            background .2s ease,
            opacity .2s ease;
    }


    .store-menu-link:hover {
        background: #f3f3f3;

        color: #111;
    }



    /* =========================================
       DIVISOR
    ========================================= */

    .store-nav-divider {
        width: 1px;

        height: 18px;

        margin: 0 7px;

        background: #cccccc;
    }



    /* =========================================
       ÍCONES
    ========================================= */

    .store-icon-link {
        width: 38px;

        height: 38px;

        display: flex;

        align-items: center;

        justify-content: center;

        padding: 0;

        margin: 0 2px;

        color: #111;

        text-decoration: none;

        border-radius: 50%;

        position: relative;

        transition:
            background .2s ease,
            transform .2s ease;
    }


    .store-icon-link:hover {
        background: #f2f2f2;

        color: #111;

        transform: translateY(-1px);
    }


    .store-icon-link svg {
        width: 19px;

        height: 19px;

        stroke: currentColor;
    }



    /* =========================================
       CONTADOR DO CARRINHO
    ========================================= */

    .store-cart-badge {
        min-width: 18px;

        height: 18px;

        padding: 0 5px;

        position: absolute;

        top: -2px;

        right: -3px;

        display: flex;

        align-items: center;

        justify-content: center;

        background: #111;

        color: #fff;

        border: 2px solid #fff;

        border-radius: 999px;

        font-family: 'Barlow', sans-serif;

        font-size: 10px;

        font-weight: 700;

        line-height: 1;

        pointer-events: none;

        transition:
            transform .2s ease,
            opacity .2s ease;
    }


    .store-cart-badge.is-hidden {
        opacity: 0;

        transform: scale(0);

        pointer-events: none;
    }


    .store-cart-badge.bump {
        animation: cartBadgeBump .35s ease;
    }


    @keyframes cartBadgeBump {

        0% {
            transform: scale(1);
        }

        45% {
            transform: scale(1.4);
        }

        100% {
            transform: scale(1);
        }

    }



    /* =========================================
       MENSAGEM "ADICIONADO"
    ========================================= */

    .store-cart-toast {
        position: fixed;

        top: 112px;

        right: 28px;

        max-width: 340px;

        padding: 15px 20px;

        background: #111;

        color: #fff;

        border-radius: 4px;

        font-family: 'Barlow', sans-serif;

        font-size: 14px;

        font-weight: 500;

        box-shadow:
            0 10px 30px
            rgba(0, 0, 0, .15);

        opacity: 0;

        visibility: hidden;

        transform: translateY(-10px);

        transition:
            opacity .25s ease,
            transform .25s ease,
            visibility .25s ease;

        z-index: 99999;
    }


    .store-cart-toast.show {
        opacity: 1;

        visibility: visible;

        transform: translateY(0);
    }


    .store-cart-toast.error {
        background: #a92727;
    }



    /* =========================================
       RESPONSIVO
    ========================================= */

    @media (max-width: 900px) {

        .store-nav {
            padding: 0 20px;
        }


        .store-menu-link,
        .store-nav-divider {
            display: none;
        }


        .store-logo {
            width: 90px;
        }


        .store-cart-toast {
            top: 100px;

            left: 18px;

            right: 18px;

            max-width: none;
        }

    }

</style>



<header class="store-header">

    <nav class="store-nav">


        {{-- =========================================
             LOGO
        ========================================= --}}

        <a
            href="{{ route('home') }}"
            class="store-logo-link"
        >

            <img
                src="{{ asset('imagens/ChatGPT Image 28 de abr. de 2026, 12_48_49.png') }}"
                alt="AURA Running"
                class="store-logo"
            >

        </a>



        {{-- =========================================
             MENU
        ========================================= --}}

        <div class="store-menu">


            <a
                href="{{ route('home') }}#produtos"
                class="store-menu-link"
            >
                Produtos
            </a>


            <a
                href="{{ route('home') }}#destaques"
                class="store-menu-link"
            >
                Destaques
            </a>


            <a
                href="{{ route('home') }}#outfits"
                class="store-menu-link"
            >
                Outfits
            </a>


            <a
                href="{{ route('home') }}#copa"
                class="store-menu-link"
            >
                Copa do Mundo
            </a>


            <span class="store-nav-divider"></span>



            {{-- =========================================
                 FAVORITOS
            ========================================= --}}

            <a
                href="{{ auth()->check()
                    ? route('favorites.index')
                    : route('login') }}"
                class="store-icon-link"
                title="Favoritos"
            >

                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke-width="2"
                >

                    <path
                        d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.6l-1-1a5.5 5.5 0 0 0-7.8 7.8l1 1L12 21l7.8-7.6 1-1a5.5 5.5 0 0 0 0-7.8Z"
                    />

                </svg>

            </a>



            {{-- =========================================
                 CARRINHO
            ========================================= --}}

            <a
                href="{{ auth()->check()
                    ? route('cart.index')
                    : route('login') }}"
                class="store-icon-link"
                title="Carrinho"
                id="storeCartLink"
            >

                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke-width="2"
                >

                    <circle
                        cx="9"
                        cy="20"
                        r="1"
                    />


                    <circle
                        cx="19"
                        cy="20"
                        r="1"
                    />


                    <path
                        d="M3 4h2l2.7 11.4a2 2 0 0 0 2 1.6h7.7a2 2 0 0 0 2-1.6L21 8H6"
                    />

                </svg>


                @auth

                    <span
                        id="storeCartBadge"
                        class="store-cart-badge {{ $storeCartCount < 1 ? 'is-hidden' : '' }}"
                        aria-label="{{ $storeCartCount }} item(ns) no carrinho"
                    >
                        {{ $storeCartCount }}
                    </span>

                @endauth

            </a>



            {{-- =========================================
                 PERFIL
            ========================================= --}}

            <a
                href="{{ auth()->check()
                    ? route('account.index')
                    : route('login') }}"
                class="store-icon-link"
                title="{{ auth()->check()
                    ? 'Minha conta'
                    : 'Entrar' }}"
            >

                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke-width="2"
                >

                    <path
                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"
                    />


                    <circle
                        cx="12"
                        cy="7"
                        r="4"
                    />

                </svg>

            </a>


        </div>

    </nav>

</header>



{{-- =========================================
     MENSAGEM DO CARRINHO
========================================= --}}

<div
    id="storeCartToast"
    class="store-cart-toast"
    role="status"
    aria-live="polite"
>
    Produto adicionado ao carrinho.
</div>



@auth

<script>

document.addEventListener(
    'DOMContentLoaded',
    function () {


        /*
        |--------------------------------------------------------------------------
        | ELEMENTOS
        |--------------------------------------------------------------------------
        */

        const cartBadge =
            document.getElementById(
                'storeCartBadge'
            );


        const toast =
            document.getElementById(
                'storeCartToast'
            );


        let toastTimer = null;



        /*
        |--------------------------------------------------------------------------
        | MOSTRAR MENSAGEM
        |--------------------------------------------------------------------------
        */

        function showCartToast(
            message,
            isError = false
        ) {

            if (!toast) {
                return;
            }


            toast.textContent =
                message;


            toast.classList.toggle(
                'error',
                isError
            );


            toast.classList.add(
                'show'
            );


            clearTimeout(
                toastTimer
            );


            toastTimer = setTimeout(
                function () {

                    toast.classList.remove(
                        'show'
                    );

                },
                2500
            );

        }



        /*
        |--------------------------------------------------------------------------
        | ATUALIZAR NÚMERO DO CARRINHO
        |--------------------------------------------------------------------------
        */

        function updateCartBadge(
            count
        ) {

            if (!cartBadge) {
                return;
            }


            count =
                Number(count) || 0;


            cartBadge.textContent =
                count;


            cartBadge.setAttribute(
                'aria-label',
                count +
                ' item(ns) no carrinho'
            );


            if (count > 0) {

                cartBadge.classList.remove(
                    'is-hidden'
                );

            } else {

                cartBadge.classList.add(
                    'is-hidden'
                );

            }


            cartBadge.classList.remove(
                'bump'
            );


            void cartBadge.offsetWidth;


            cartBadge.classList.add(
                'bump'
            );

        }



        /*
        |--------------------------------------------------------------------------
        | SINCRONIZAR CONTADOR COM O BANCO
        |--------------------------------------------------------------------------
        */

        async function refreshStoreCartBadge() {

            try {

                const response = await fetch(
                    '{{ route('cart.count') }}',
                    {
                        method: 'GET',
                        credentials: 'same-origin',
                        cache: 'no-store',
                        headers: {
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    }
                );


                if (!response.ok) {
                    return;
                }


                const data = await response.json();
                const count = Number(data.cart_count) || 0;


                updateCartBadge(count);


                localStorage.setItem(
                    'aura_cart_count',
                    String(count)
                );

            } catch (error) {

                // Mantém o valor já renderizado se a atualização falhar.

            }

        }


        window.addEventListener(
            'pageshow',
            refreshStoreCartBadge
        );


        window.addEventListener(
            'focus',
            refreshStoreCartBadge
        );


        document.addEventListener(
            'visibilitychange',
            function () {

                if (!document.hidden) {
                    refreshStoreCartBadge();
                }

            }
        );


        window.addEventListener(
            'storage',
            function (event) {

                if (event.key === 'aura_cart_count') {
                    updateCartBadge(event.newValue);
                }

            }
        );


        refreshStoreCartBadge();



        /*
        |--------------------------------------------------------------------------
        | INTERCEPTA "ADICIONAR AO CARRINHO"
        |--------------------------------------------------------------------------
        |
        | Funciona para qualquer formulário que utilize a rota:
        |
        | /carrinho/adicionar/{produto}
        |
        */

        document.addEventListener(
            'submit',
            async function (event) {


                const form =
                    event.target;


                if (
                    !form.matches(
                        'form[action*="/carrinho/adicionar/"]'
                    )
                ) {

                    return;

                }


                event.preventDefault();



                /*
                |--------------------------------------------------------------------------
                | CONFERE TAMANHO / OPÇÃO
                |--------------------------------------------------------------------------
                */

                const sizeInputs =
                    form.querySelectorAll(
                        'input[name="size"]'
                    );


                if (
                    sizeInputs.length > 0
                    &&
                    !form.querySelector(
                        'input[name="size"]:checked'
                    )
                ) {

                    showCartToast(
                        'Escolha uma opção antes de adicionar ao carrinho.',
                        true
                    );

                    return;
                }



                /*
                |--------------------------------------------------------------------------
                | BOTÃO
                |--------------------------------------------------------------------------
                */

                const button =
                    form.querySelector(
                        'button[type="submit"]'
                    );


                let originalButtonContent =
                    null;


                if (button) {

                    originalButtonContent =
                        button.innerHTML;


                    button.disabled =
                        true;


                    button.textContent =
                        'ADICIONANDO...';

                }



                try {


                    /*
                    |--------------------------------------------------------------------------
                    | ENVIA SEM SAIR DA PÁGINA
                    |--------------------------------------------------------------------------
                    */

                    const response =
                        await fetch(
                            form.action,
                            {

                                method:
                                    'POST',

                                body:
                                    new FormData(form),

                                credentials:
                                    'same-origin',

                                headers: {

                                    'Accept':
                                        'application/json',

                                    'X-Requested-With':
                                        'XMLHttpRequest',

                                },

                            }
                        );



                    /*
                    |--------------------------------------------------------------------------
                    | LÊ RESPOSTA
                    |--------------------------------------------------------------------------
                    */

                    const data =
                        await response.json();



                    /*
                    |--------------------------------------------------------------------------
                    | ERRO
                    |--------------------------------------------------------------------------
                    */

                    if (
                        !response.ok
                        ||
                        !data.success
                    ) {

                        throw new Error(
                            data.message
                            ||
                            'Não foi possível adicionar o produto.'
                        );

                    }



                    /*
                    |--------------------------------------------------------------------------
                    | ATUALIZA CONTADOR
                    |--------------------------------------------------------------------------
                    */

                    updateCartBadge(
                        data.cart_count
                    );


                    localStorage.setItem(
                        'aura_cart_count',
                        String(data.cart_count)
                    );



                    /*
                    |--------------------------------------------------------------------------
                    | MENSAGEM
                    |--------------------------------------------------------------------------
                    */

                    showCartToast(
                        data.message
                        ||
                        'Produto adicionado ao carrinho.'
                    );



                    /*
                    |--------------------------------------------------------------------------
                    | BOTÃO MOSTRA SUCESSO
                    |--------------------------------------------------------------------------
                    */

                    if (button) {

                        button.textContent =
                            'ADICIONADO ✓';


                        setTimeout(
                            function () {

                                button.innerHTML =
                                    originalButtonContent;

                                button.disabled =
                                    false;

                            },
                            1200
                        );

                    }


                } catch (error) {


                    /*
                    |--------------------------------------------------------------------------
                    | MOSTRA ERRO
                    |--------------------------------------------------------------------------
                    */

                    showCartToast(
                        error.message
                        ||
                        'Não foi possível adicionar o produto ao carrinho.',
                        true
                    );


                    if (button) {

                        button.innerHTML =
                            originalButtonContent;

                        button.disabled =
                            false;

                    }

                }


            }
        );


    }
);

</script>

@endauth