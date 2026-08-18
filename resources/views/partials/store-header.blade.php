<style>
    .store-header {
        height: 82px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 50px;
        border-bottom: 1px solid #e9e9e9;
        background: #fff;
        position: relative;
        z-index: 20;
    }

    .store-logo img {
        display: block;
        height: 42px;
        width: auto;
    }

    .store-nav,
    .store-actions {
        display: flex;
        align-items: center;
        gap: 24px;
    }

    .store-nav a {
        color: #111;
        text-decoration: none;
        font-size: 14px;
        font-weight: 700;
        letter-spacing: .08em;
        text-transform: uppercase;
    }

    .store-actions a {
        width: 38px;
        height: 38px;
        display: grid;
        place-items: center;
        color: #111;
        text-decoration: none;
        border-radius: 50%;
    }

    .store-nav a:hover,
    .store-actions a:hover {
        opacity: .55;
    }

    .store-actions svg {
        width: 21px;
        height: 21px;
    }

    @media (max-width: 760px) {
        .store-header {
            padding: 0 18px;
        }

        .store-nav {
            display: none;
        }

        .store-actions {
            gap: 8px;
        }
    }
</style>

<header class="store-header">
    <a
        class="store-logo"
        href="{{ route('home') }}"
        aria-label="Ir para a página inicial"
    >
        <img
            src="{{ asset('imagens/ChatGPT Image 28 de abr. de 2026, 08_44_05.png') }}"
            alt="AURA Running"
        >
    </a>

    <nav class="store-nav">
        <a href="{{ route('categories.show', 'tenis') }}">
            Tênis
        </a>

        <a href="{{ route('categories.show', 'roupas') }}">
            Outfits
        </a>

        <a href="{{ route('categories.show', 'acessorios') }}">
            Acessórios
        </a>

        <a href="{{ route('products.gender', 'masculino') }}">
            Masculino
        </a>

        <a href="{{ route('products.gender', 'feminino') }}">
            Feminino
        </a>
    </nav>

    <div class="store-actions">
        <a
            href="{{ route('favorites.index') }}"
            title="Favoritos"
            aria-label="Abrir favoritos"
        >
            <svg
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
            >
                <path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.6l-1-1a5.5 5.5 0 0 0-7.8 7.8l1 1L12 21l7.8-7.6 1-1a5.5 5.5 0 0 0 0-7.8Z"/>
            </svg>
        </a>

        <a
            href="{{ route('cart.index') }}"
            title="Carrinho"
            aria-label="Abrir carrinho"
        >
            <svg
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
            >
                <circle cx="9" cy="20" r="1"/>
                <circle cx="19" cy="20" r="1"/>
                <path d="M3 4h2l2.7 11.4a2 2 0 0 0 2 1.6h7.7a2 2 0 0 0 2-1.6L21 8H6"/>
            </svg>
        </a>

        <a
            href="{{ auth()->check()
                ? route('profile.edit')
                : route('login') }}"
            title="{{ auth()->check() ? 'Meu perfil' : 'Entrar' }}"
        >
            <svg
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
            >
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                <circle cx="12" cy="7" r="4"/>
            </svg>
        </a>
    </div>
</header>
