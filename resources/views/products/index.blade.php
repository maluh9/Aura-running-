<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    @include('partials.page-meta', ['pageTitle' => $title])

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            color: #111;
            background: #fff;
        }

        .catalog {
            max-width: 1450px;
            margin: 0 auto;
            padding: 64px 50px 90px;
        }

        .catalog h1 {
            margin: 0 0 10px;
            font-size: clamp(38px, 5vw, 64px);
        }

        .catalog-intro {
            color: #666;
            font-size: 18px;
            margin: 0 0 42px;
        }

        .catalog-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 30px 18px;
        }

        .product-card {
            position: relative;
            min-width: 0;
        }

        .product-card-image {
            display: block;
            height: 420px;
            overflow: hidden;
            background: #f3f3f3;
            border-radius: 4px;
        }

        .product-card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform .3s ease;
        }

        .product-card:hover img {
            transform: scale(1.035);
        }

        .favorite-form {
            position: absolute;
            z-index: 2;
            top: 14px;
            right: 14px;
        }

        .favorite-button {
            width: 42px;
            height: 42px;
            display: grid;
            place-items: center;
            border: 1px solid rgba(255, 255, 255, .85);
            border-radius: 50%;
            background: rgba(0, 0, 0, .38);
            color: #fff;
            font-size: 25px;
            text-decoration: none;
            cursor: pointer;
        }

        .favorite-button.active {
            color: #ff4f69;
            background: #fff;
        }

        .product-card-info {
            padding: 15px 2px;
        }

        .product-card-category {
            color: #777;
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: .08em;
        }

        .product-card h2 {
            font-size: 20px;
            margin: 7px 0;
        }

        .product-card-price {
            font-size: 17px;
        }

        .empty-products {
            padding: 80px 0;
            color: #666;
            font-size: 18px;
        }

        @media (max-width: 1050px) {
            .catalog-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 760px) {
            .catalog {
                padding: 42px 18px 70px;
            }

            .catalog-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .product-card-image {
                height: 300px;
            }
        }

        @media (max-width: 480px) {
            .catalog-grid {
                grid-template-columns: 1fr;
            }

            .product-card-image {
                height: 420px;
            }
        }
    </style>
</head>

<body>
    @include('partials.store-header')

    <main class="catalog">
        <h1>{{ $title }}</h1>

        @if($description)
            <p class="catalog-intro">
                {{ $description }}
            </p>
        @endif

        @if($products->isNotEmpty())
            <div class="catalog-grid">
                @foreach($products as $product)
                    <article class="product-card">
                        @auth
                            <form
                                class="favorite-form"
                                action="{{ route('favorites.toggle', $product->id) }}"
                                method="POST"
                            >
                                @csrf

                                <button
                                    class="favorite-button {{ in_array($product->id, $favoriteProductIds) ? 'active' : '' }}"
                                    type="submit"
                                    aria-label="Alternar favorito"
                                >
                                    {{ in_array($product->id, $favoriteProductIds) ? '♥' : '♡' }}
                                </button>
                            </form>
                        @else
                            <div class="favorite-form">
                                <a
                                    class="favorite-button"
                                    href="{{ route('login') }}"
                                    aria-label="Entrar para favoritar"
                                >
                                    ♡
                                </a>
                            </div>
                        @endauth

                        <a
                            class="product-card-image"
                            href="{{ route('products.show', $product->slug) }}"
                        >
                            <img
                                src="{{ $product->image_url }}"
                                alt="{{ $product->name }}"
                            >
                        </a>

                        <div class="product-card-info">
                            <span class="product-card-category">
                                {{ $product->category->name }}
                            </span>

                            <h2>{{ $product->name }}</h2>

                            <span class="product-card-price">
                                R$ {{ number_format($product->price, 2, ',', '.') }}
                            </span>
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            <p class="empty-products">
                Nenhum produto disponível nesta seção no momento.
            </p>
        @endif
    </main>
</body>
</html>
