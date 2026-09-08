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

    /* LOGO */

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

    /* MENU */

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

    /* DIVISOR */

    .store-nav-divider {
        width: 1px;
        height: 18px;

        margin: 0 7px;

        background: #cccccc;
    }

    /* ÍCONES */

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


    /* RESPONSIVO */

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
    }
</style>


<header class="store-header">

    <nav class="store-nav">


        {{-- LOGO PRETA --}}

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



        {{-- MENU --}}

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



            {{-- FAVORITOS --}}

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



            {{-- CARRINHO --}}

            <a
                href="{{ auth()->check()
                    ? route('cart.index')
                    : route('login') }}"
                class="store-icon-link"
                title="Carrinho"
            >
                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke-width="2"
                >
                    <circle cx="9" cy="20" r="1"/>

                    <circle cx="19" cy="20" r="1"/>

                    <path
                        d="M3 4h2l2.7 11.4a2 2 0 0 0 2 1.6h7.7a2 2 0 0 0 2-1.6L21 8H6"
                    />
                </svg>
            </a>



            {{-- PERFIL --}}

            <a
    href="{{ auth()->check()
        ? route('account.index')
        : route('login') }}"
    class="store-icon-link"
    title="{{ auth()->check() ? 'Minha conta' : 'Entrar' }}"
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