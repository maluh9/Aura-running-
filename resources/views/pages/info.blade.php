<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    @include(
        'partials.page-meta',
        ['pageTitle' => $page['title']]
    )

    <style>

        @import url('https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@400;500;600;700&family=Barlow:wght@400;500;600&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #f7f7f7;
            color: #111;

            font-family:
                'Barlow',
                sans-serif;
        }

        .info-page {
            width: 100%;
            max-width: 900px;

            margin: 0 auto;

            padding: 70px 30px;
        }

        .info-label {
            display: block;

            margin-bottom: 12px;

            color: #888;

            font-family:
                'Barlow Condensed',
                sans-serif;

            font-size: 14px;

            letter-spacing: .12em;

            text-transform: uppercase;
        }

        h1 {
            margin-bottom: 25px;

            font-family:
                'Barlow Condensed',
                sans-serif;

            font-size: 62px;

            font-weight: 600;

            text-transform: uppercase;
        }

        p {
            max-width: 700px;

            color: #555;

            font-size: 18px;

            line-height: 1.7;
        }

        .back {
            display: inline-flex;

            margin-top: 40px;

            padding: 14px 25px;

            background: #111;

            color: #fff;

            text-decoration: none;

            font-family:
                'Barlow Condensed',
                sans-serif;

            font-size: 16px;

            font-weight: 600;

            text-transform: uppercase;
        }

    </style>

</head>

<body>

@include('partials.store-header')


<main class="info-page">

    <span class="info-label">
        AURA Running
    </span>

    <h1>
        {{ $page['title'] }}
    </h1>

    <p>
        {{ $page['text'] }}
    </p>


    <a
        href="{{ route('home') }}"
        class="back"
    >
        Voltar para a loja
    </a>

</main>

</body>

</html>