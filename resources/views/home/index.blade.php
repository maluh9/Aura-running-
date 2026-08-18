<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AURA Running</title>

    <link rel="icon" type="image/png" href="{{ asset('favicon.ico') }}">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
@import url('https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@400;500;600&family=Barlow:wght@400;500&display=swap');

/* ══════════════════════════════
   RESET
══════════════════════════════ */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    background-color: #ffffff;
    font-family: 'Barlow', sans-serif;
    scroll-behavior: smooth;
}

/* ══════════════════════════════
   HEADER / HERO
══════════════════════════════ */
header {
    padding-top: 15px;
    background-image:
        linear-gradient(to bottom, rgba(0,0,0,0.55) 0%, rgba(0,0,0,0.15) 10%, transparent 100%),
        url(../imagens/Imagem\ de\ fundo\ -\ aura\ running\ com\ exposição\ fraca.png);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    height: 695px;
    position: relative;
}

/* Navbar */
.barra-navegacao {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 50px;
    height: 72px;
}

.barra-navegacao h4 {
    margin: 0;
    line-height: 0;
}

/* Links do menu */
.menu-links {
    display: flex;
    align-items: center;
    gap: 0;
}

.menu-links a {
    color: rgba(255, 255, 255, 0.88);
    text-decoration: none;
    font-family: 'Barlow Condensed', sans-serif;
    font-size: 15px;
    font-weight: 500;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    padding: 8px 16px;
    border-radius: 6px;
    transition: color 0.2s ease, background 0.2s ease;
}

.menu-links a:hover {
    color: #ffffff;
    background: rgba(255, 255, 255, 0.12);
}

/* Divisor vertical entre links e ícones */
.nav-divider {
    width: 1px;
    height: 16px;
    background: rgba(255, 255, 255, 0.3);
    margin: 0 6px;
}

/* Ícones (pesquisa, carrinho, cadastro) */
.menu-links a.icone {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 38px;
    height: 38px;
    padding: 0;
    border-radius: 50%;
}

/* Conteúdo do hero (botões + título) */
.hero-conteudo {
    position: absolute;
    bottom: 72px;
    left: 0;
    display: flex;
    flex-direction: row;
    align-items: center;
    gap: 32px;
    padding-left: 0;
    padding-bottom: 48px;
}

/* Coluna dos botões */
.hero-esquerda {
    display: flex;
    flex-direction: column;
    gap: 15px;
    margin-left: -10px;
}

/* Título principal */
.hero-titulo {
    font-size: 50px;
    font-weight: 600;
    line-height: 1.1;
    color: #fff;
    letter-spacing: -0.02em;
}

/* Botões do hero */
.btn-hero {
    display: inline-block;
    padding: 15px 80px;
    border-radius: 0 999px 999px 0;
    font-size: 25px;
    font-weight: 700;
    letter-spacing: 0.06em;
    text-decoration: none;
    text-transform: uppercase;
    transition: background 0.2s ease, color 0.2s ease, transform 0.15s ease;
}

.btn-hero:hover {
    transform: scale(1.03);
}

.btn-claro {
    background: #ffffff;
    color: #111111;
}

.btn-claro:hover {
    background: rgba(255, 255, 255, 0.88);
}

.btn-escuro {
    background: #111111;
    color: #ffffff;
    border: 2px solid #ffffff;
}

.btn-escuro:hover {
    background: rgba(0, 0, 0, 0.75);
    border-color: rgba(255, 255, 255, 0.8);
}


/* ══════════════════════════════
   SEÇÃO NOSSOS PRODUTOS
══════════════════════════════ */
.secao-produtos {
    padding: 50px;
}

/* Título da seção */
.titulo-secao {
    font-size: 50px;
    font-weight: 600;
    margin-bottom: 25px;
    margin-top: 50px;
}

/* Grid: coluna esquerda (2 imagens) + coluna direita (1 imagem) */
.grade-produtos {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
}

.coluna-esquerda {
    display: flex;
    flex-direction: column;
    gap: 16px;
}

/* Card base */
.card-produto {
    position: relative;
    overflow: hidden;
    border-radius: 5px;
    text-decoration: none;
}

.card-produto img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.4s ease;
}

.card-produto:hover img {
    transform: scale(1.04);
}

/* Duas imagens empilhadas à esquerda */
.coluna-esquerda .card-produto {
    height: 400px;
    width: 900px;
}

/* Imagem vertical à direita */
.card-vertical {
    height: 816px;
    width: 510px;
}

/* Label no canto inferior esquerdo de cada card */
.card-produto span {
    position: absolute;
    bottom: 16px;
    left: 16px;
    color: #fff;
    font-size: 20px;
    font-weight: 600;
}

/* ══════════════════════════════
   SEÇÃO DESTAQUES
══════════════════════════════ */
.secao-destaques {
    padding: 50px 0 24px;
}

.secao-destaques .titulo-secao {
    padding-left: 50px;
    margin-top: 0px;
}

.carrossel-wrapper {
    overflow-x: auto;
    overflow-y: hidden;
    scrollbar-width: none;
    -ms-overflow-style: none;
    cursor: grab;
    user-select: none;
}

.carrossel-wrapper::-webkit-scrollbar {
    display: none;
}

.carrossel {
    display: flex;
    gap: 8px;
    width: max-content;
    padding: 0 50px 24px;
}

.card-destaque {
    position: relative;
    display: block;
    width: 340px;
    height: 470px;
    text-decoration: none;
    color: #111;
    border-radius: 5px;
    overflow: hidden;
    flex-shrink: 0;
}

.card-destaque img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    pointer-events: none;
    transition: transform 0.3s ease;
}

.card-destaque:hover img {
    transform: scale(1.04);
}

/* Nome sobre a imagem, canto inferior esquerdo */
.card-destaque-nome {
    font-family: 'Barlow', sans-serif;
    position: absolute;
    bottom: 16px;
    left: 16px;
    font-size: 25px;
    font-weight: 600;
    color: #111;
}

/* Scrollbar — área de toque generosa com padding */
.scrollbar-destaques {
    margin: 0 50px 50px;
    padding: 10px 0;        /* área clicável maior */
    cursor: pointer;
}

.scrollbar-trilho {
    height: 3px;
    background: #e0e0e0;
    border-radius: 99px;
    position: relative;
}

.scrollbar-progresso {
    position: absolute;
    left: 0;
    height: 100%;
    background: #111;
    border-radius: 99px;
    cursor: grab;
    transition: none;
}

/* ══════════════════════════════
   CARROSSEL DE ROUPAS
══════════════════════════════ */

.secao-roupas {
    padding-top: 50px;
}

.card-roupa {
    width: 340px;
    flex-shrink: 0;
    color: #111;
}

.card-roupa-img {
    position: relative;
    display: block;
    width: 340px;
    height: 470px;
    overflow: hidden;
    border-radius: 5px;
    text-decoration: none;
}

.card-roupa-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.3s ease;
}

.card-roupa:hover .card-roupa-img img {
    transform: scale(1.04);
}

.btn-favorito {
    position: absolute;
    top: 18px;
    right: 18px;
    background: none;
    border: none;
    color: white;
    font-size: 38px;
    cursor: pointer;
    z-index: 2;
    line-height: 1;
}

.btn-favorito.favoritado {
    color: white;
}

.card-roupa-info {
    padding-top: 16px;
}

.tag-favoritos {
    display: inline-block;
    color: #a46a00;
    border: 1px solid #a46a00;
    border-radius: 3px;
    padding: 3px 7px;
    font-size: 14px;
    text-transform: uppercase;
    margin-bottom: 10px;
}

.card-roupa-info h3 {
    font-size: 20px;
    font-weight: 700;
    margin-bottom: 5px;
}

.card-roupa-info p {
    font-size: 18px;
    margin-bottom: 5px;
    color: #111;
}

.card-roupa-info strong {
    font-size: 18px;
    font-weight: 500;
}

.logo-centro {
    margin-top: 70px;
    display: flex;
    justify-content: center;
}

.banner-copa {
    margin-top: 70px;
}

/* ══════════════════════════════
   camisetas seleções
══════════════════════════════ */

.secao-selecoes {
    padding: 70px 50px;
    padding-top: 100px;
}

.selecoes-container {
    display: grid;
    grid-template-columns: 760px 500px;
    justify-content: center;
    gap: 30px;
    align-items: start;
}

.selecoes-esquerda h2 {
    font-size: 62px;
    font-weight: 800;
    line-height: 1;
    margin: 0 0 45px;
    color: #000;
    padding-top: 50px;
}

.grade-selecoes {
    display: grid;
    grid-template-columns: repeat(3, 180px);
    gap: 28px 18px;
}

.card-selecao {
    width: 180px;
    height: 180px;
    background: #eef0f1;
    border: 2px solid transparent;
    cursor: pointer;
    position: relative;
    padding: 18px;
    text-align: left;
}

.card-selecao:hover,
.card-selecao.ativo {
    border-color: #111;
}

.card-selecao img {
    width: 115px;
    height: 115px;
    object-fit: contain;
    display: block;
    margin: -40px auto 0;
}

.card-selecao span {
    position: absolute;
    left: 12px;
    bottom: 12px;
    background: white;
    color: #111;
    font-size: 15px;
    font-weight: 700;
    padding: 4px 6px;
}

.preview-camisa {
    border-radius: 5px;
    width: 500px;
    height: 600px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #13b7d1, #ffdf4d);
    text-decoration: none;
    overflow: hidden;
}

.preview-camisa img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

/* ══════════════════════════════
   FOOTER
══════════════════════════════ */

.footer-aura {
    margin-top: 30px;
    padding: 70px 50px 40px;
    background: #ffffff;
}

.footer-topo {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 100px;
}

.footer-newsletter {
    max-width: 620px;
}

.footer-newsletter h2 {
    font-size: 50px;
    line-height: 1.1;
    font-weight: 700;
    color: #111;
    margin-bottom: 35px;
}

.footer-newsletter input {
    width: 100%;
    height: 82px;
    border: 1px solid #dcdcdc;
    background: #f8f8f8;
    padding: 0 24px;
    font-size: 22px;
    outline: none;
}

.footer-newsletter input:focus {
    border-color: #111;
}

.footer-links {
    display: flex;
    gap: 90px;
}

.footer-coluna {
    display: flex;
    flex-direction: column;
    gap: 16px;
    min-width: 180px;
}

.footer-coluna h4 {
    font-size: 24px;
    margin-bottom: 10px;
    color: #111;
}

.footer-coluna a {
    text-decoration: none;
    color: #111;
    font-size: 20px;
    transition: opacity 0.2s ease;
}

.footer-coluna a:hover {
    opacity: 0.6;
}

.footer-meio {
    margin-top: 90px;

    display: flex;
    align-items: center;
    gap: 10px;

    font-size: 20px;
    color: #111;
}

.footer-meio img {
    width: 22px;
    height: 22px;
    object-fit: cover;
    border-radius: 50%;
}

.footer-bottom {
    margin-top: 70px;

    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 40px;

    flex-wrap: wrap;
}

.footer-legais {
    display: flex;
    flex-wrap: wrap;
    gap: 28px;
}

.footer-legais a {
    text-decoration: none;
    color: #111;
    font-size: 18px;
}

.footer-redes {
    display: flex;
    align-items: center;
    gap: 24px;
}

.footer-redes a {
    color: #111;
    font-size: 28px;
    transition: transform 0.2s ease, opacity 0.2s ease;
}

.footer-redes a:hover {
    transform: translateY(-2px);
    opacity: 0.7;
}

/*================ CADASTRO ESTILO ON ================*/

.barra-navegacao{
	position:relative;
	z-index:99999;
}

.painel-login{
	position:fixed;
	top:0;
	right:-45vw;
	width:45vw;
	height:100vh;
	background:#fff;
	z-index:999;
	opacity:0;
	visibility:hidden;
	transition:.35s ease;
	font-family:'Inter',sans-serif;
	padding-top:120px;
	box-sizing:border-box;
}

.painel-login.ativo{
	right:0;
	opacity:1;
	visibility:visible;
}

.painel-overlay{
	position:fixed;
	inset:0;
	z-index:50;
	display:none;
}

.painel-overlay.ativo{
	display:block;
}

header.login-aberto .menu-links a{
	color:#000!important;
	opacity:1!important;
	background:transparent!important;
}

header.login-aberto .menu-links svg{
	stroke:#000!important;
}

header.login-aberto .nav-divider{
	background:rgba(0,0,0,.25)!important;
}

header.login-aberto .cadastro-container .icone{
	background:#f3f3f3!important;
	color:#000!important;
}

.login-direita{
	width:480px;
	margin-top:60px;
	margin-left:110px;
	color:#000;
}

.login-direita h2{
	font-size:22px;
	font-weight:700;
	line-height:1.15;
	letter-spacing:-.5px;
	margin-bottom:18px;
}

.login-direita p{
	font-size:15px;
	line-height:1.4;
	color:#111;
	margin-bottom:22px;
}

.login-direita input{
	width:100%;
	height:56px;
	padding:0 22px;
	background:#f5f5f5;
	border:1px solid #e5e5e5;
	font-size:15px;
	outline:none;
	margin-bottom:24px;
	box-sizing:border-box;
}

.btn-continuar{
	width:100%;
	height:50px;
	border:none;
	border-radius:999px;
	background:black;
	color:white;
	font-size:15px;
	font-weight:600;
	cursor:pointer;
	margin-bottom:38px;
}

.linha-ou{
	display:flex;
	align-items:center;
	gap:18px;
	margin-bottom:30px;
	font-size:15px;
}

.linha-ou span{
	flex:1;
	height:1px;
	background:#ddd;
}

.social{
	display:flex;
	gap:12px;
}

.social button{
	flex:1;
	height:50px;
	border-radius:999px;
	border:1px solid #222;
	background:white;
	font-size:20px;
	cursor:pointer;
}

.termos{
	margin-top:30px;
	font-size:12px!important;
	line-height:1.5!important;
	color:#222;
}

.termos a{
	color:black;
	font-weight:600;
	text-decoration:underline;
}

body.login-travado{
	overflow:hidden;
	height:100vh;
}
/* Integração Laravel: controles funcionais sobre o layout de referência */
.card-destaque {
    position: relative;
}

.card-destaque-link {
    width: 100%;
    height: 100%;
    display: block;
    color: inherit;
}

.card-destaque .favorite-product-form {
    position: absolute;
    top: 18px;
    right: 18px;
    z-index: 10;
    margin: 0;
}

.card-destaque .favorite-button {
    position: static;
    width: 42px;
    height: 42px;
    border: 1px solid rgba(255,255,255,.75);
    border-radius: 50%;
    background: rgba(0,0,0,.35);
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    cursor: pointer;
    line-height: 1;
}

.card-destaque .favorite-button:hover {
    background: #fff;
    color: #111;
}

.card-destaque-nome {
    z-index: 3;
    color: #fff;
    text-shadow: 0 1px 8px rgba(0,0,0,.45);
}

@media (max-width: 900px) {
    .selecoes-container {
        grid-template-columns: 1fr;
    }

    .preview-camisa {
        width: 100%;
        max-width: 500px;
        margin: 0 auto;
    }

    .grade-produtos {
        grid-template-columns: 1fr;
    }

    .coluna-esquerda .card-produto,
    .card-vertical {
        width: 100%;
        height: 420px;
    }

    .footer-topo {
        flex-direction: column;
    }
}

.card-destaque,
.card-roupa {
    position: relative;
}

.favorite-product-form {
    position: absolute;
    top: 18px;
    right: 18px;
    z-index: 10;
    margin: 0;
}

.favorite-button,
.btn-favorito {
    width: 42px;
    height: 42px;
    display: grid;
    place-items: center;
    border: 1px solid rgba(255, 255, 255, .8);
    border-radius: 50%;
    background: rgba(0, 0, 0, .38);
    color: #fff;
    font-size: 25px;
    text-decoration: none;
    cursor: pointer;
    line-height: 1;
}

.favorite-button.active,
.btn-favorito.active {
    background: #fff;
    color: #ff4765;
}

.card-destaque-link {
    width: 100%;
    height: 100%;
    display: block;
    color: inherit;
}

.carrossel-wrapper {
    overflow-x: auto;
    overflow-y: hidden;
    cursor: grab;
    user-select: none;
    scrollbar-width: none;
}

.carrossel-wrapper::-webkit-scrollbar {
    display: none;
}

.carrossel-wrapper.arrastando {
    cursor: grabbing;
}

@media (max-width: 900px) {
    .barra-navegacao {
        padding: 0 18px;
    }

    .menu-links > a:not(.icone),
    .nav-divider {
        display: none;
    }
}
    </style>
</head>

<body>
<header>

<nav class="barra-navegacao">
    <a href="{{ route('home') }}">
        <img
            src="{{ asset('imagens/ChatGPT Image 28 de abr. de 2026, 08_44_05.png') }}"
            alt="AURA Running"
            height="50"
        >
    </a>

    <div class="menu-links">
        <a href="#produtos">Produtos</a>
        <a href="#destaques">Destaques</a>

        <a href="{{ route('favorites.index') }}">
            Favoritos
        </a>

        <a href="#copa">Copa do Mundo</a>

        <span class="nav-divider"></span>

        <!-- Favoritos -->
        <a
            href="{{ route('favorites.index') }}"
            class="icone"
            title="Favoritos"
        >
            <svg
                width="19"
                height="19"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
            >
                <path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.6l-1-1a5.5 5.5 0 0 0-7.8 7.8l1 1L12 21l7.8-7.6 1-1a5.5 5.5 0 0 0 0-7.8Z"/>
            </svg>
        </a>

        <!-- Carrinho -->
        <a
            href="{{ route('cart.index') }}"
            class="icone"
            title="Carrinho"
        >
            <svg
                width="19"
                height="19"
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

        <!-- Perfil -->
        <a
            href="{{ auth()->check()
                ? route('profile.edit')
                : route('login') }}"
            class="icone"
            title="{{ auth()->check() ? 'Meu perfil' : 'Entrar' }}"
        >
            <svg
                width="19"
                height="19"
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
</nav>

<div class="painel-overlay" id="overlay"></div>

<div class="painel-login" id="painelLogin">
	<div class="login-direita">
		<h2>Faça login ou crie uma conta</h2>
		<p>Digite seu e-mail para se cadastrar ou fazer login.</p>

		<input type="email" placeholder="E-mail *">

		<button class="btn-continuar">Continuar</button>

		<div class="linha-ou">
			<span></span>
			Ou
			<span></span>
		</div>

		<div class="social">
			<button><i class="fa-brands fa-google"></i></button>
			<button><i class="fa-brands fa-apple"></i></button>
		</div>

		<p class="termos">
			Ao continuar, você concorda com os
			<a href="#">Termos de Serviço da Aura</a>
			e declara ter lido nossa
			<a href="#">Política de Privacidade.</a>
		</p>
	</div>
</div>
        <div class="hero-conteudo">
            <div class="hero-esquerda">
                <a
                    href="{{ route('products.gender', 'masculino') }}"
                    class="btn-hero btn-claro"
                >
                    Para ele
                </a>

                <a
                    href="{{ route('products.gender', 'feminino') }}"
                    class="btn-hero btn-escuro"
                >
                    Para ela
                </a>
        </div>
            <h1 class="hero-titulo">Feito para quem<br>não para</h1>
        </div>
    </header>

    <section id="produtos" class="secao-produtos">
        <h2 class="titulo-secao">Nossos Produtos</h2>
        <div class="grade-produtos">
            <div class="coluna-esquerda">
                <a
                    href="{{ route('categories.show', 'tenis') }}"
                    class="card-produto"
                >
                    <img
                        src="{{ asset('imagens/Tênis Floresta.png') }}"
                        alt="Tênis"
                    >

                    <span>Tênis</span>
                </a>

                <a
                    href="{{ route('categories.show', 'acessorios') }}"
                    class="card-produto"
                >
                    <img
                        src="{{ asset('imagens/Acessórios.png') }}"
                        alt="Acessórios"
                    >

                    <span>Acessórios</span>
                </a>
            </div>

            <a
                href="{{ route('categories.show', 'roupas') }}"
                class="card-produto card-vertical"
            >
                <img
                    src="{{ asset('imagens/Corrida deserto.png') }}"
                    alt="Outfits"
                >

                <span>Outfits</span>
            </a>
        </div>
    </section>

<!-- Destaques e scrollbar -->

<section id="destaques" class="secao-destaques">
    <h2 class="titulo-secao">Destaques</h2>

    <div
        class="carrossel-wrapper"
        id="carrossel-wrapper"
    >
        <div class="carrossel">
            @foreach($featuredProducts as $product)
                <article class="card-destaque">
                    @auth
                        <form
                            action="{{ route('favorites.toggle', $product->id) }}"
                            method="POST"
                            class="favorite-product-form"
                        >
                            @csrf

                            <button
                                type="submit"
                                class="favorite-button {{ in_array($product->id, $favoriteProductIds) ? 'active' : '' }}"
                                title="Alternar favorito"
                            >
                                {{ in_array($product->id, $favoriteProductIds) ? '♥' : '♡' }}
                            </button>
                        </form>
                    @else
                        <div class="favorite-product-form">
                            <a
                                href="{{ route('login') }}"
                                class="favorite-button"
                                title="Entre para favoritar"
                            >
                                ♡
                            </a>
                        </div>
                    @endauth

                    <a
                        href="{{ route('products.show', $product->slug) }}"
                        class="card-destaque-link"
                    >
                        <img
                            src="{{ $product->image_url }}"
                            alt="{{ $product->name }}"
                        >

                        <span class="card-destaque-nome">
                            {{ $product->name }}
                        </span>
                    </a>
                </article>
            @endforeach
        </div>
    </div>
</section>

<div
    class="scrollbar-destaques"
    id="scrollbar-destaques"
>
    <div class="scrollbar-trilho">
        <div
            class="scrollbar-progresso"
            id="scrollbar-progresso"
        ></div>
    </div>
</div>

<section
    id="outfits"
    class="secao-destaques secao-roupas"
>
    <h2 class="titulo-secao">
        Monte seu outfit de alta performance
    </h2>

    <div
        class="carrossel-wrapper"
        id="carrossel-roupas"
    >
        <div class="carrossel">
            @foreach($outfitProducts as $product)
                <article class="card-roupa">
                    @auth
                        <form
                            action="{{ route('favorites.toggle', $product->id) }}"
                            method="POST"
                            class="favorite-product-form"
                        >
                            @csrf

                            <button
                                type="submit"
                                class="btn-favorito {{ in_array($product->id, $favoriteProductIds) ? 'active' : '' }}"
                            >
                                {{ in_array($product->id, $favoriteProductIds) ? '♥' : '♡' }}
                            </button>
                        </form>
                    @else
                        <div class="favorite-product-form">
                            <a
                                href="{{ route('login') }}"
                                class="btn-favorito"
                            >
                                ♡
                            </a>
                        </div>
                    @endauth

                    <a
                        href="{{ route('products.show', $product->slug) }}"
                        class="card-roupa-img"
                    >
                        <img
                            src="{{ $product->image_url }}"
                            alt="{{ $product->name }}"
                        >
                    </a>

                    <div class="card-roupa-info">
                        @if(in_array($product->id, $favoriteProductIds))
                            <span class="tag-favoritos">
                                Favorito
                            </span>
                        @endif

                        <h3>{{ $product->name }}</h3>

                        <p>{{ $product->description }}</p>

                        <strong>
                            R$ {{ number_format($product->price, 2, ',', '.') }}
                        </strong>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>

<div
    class="scrollbar-destaques"
    id="scrollbar-roupas"
>
    <div class="scrollbar-trilho">
        <div
            class="scrollbar-progresso"
            id="progresso-roupas"
        ></div>
    </div>
</div>

<div class="logo-centro">
    <img src="{{ asset('imagens/AURA x COPA.png') }}" alt="Produto 5" height="200px">
</div>

<div class="banner-copa">
    <img src="{{ asset('imagens/JOGA COM AURA.png') }}" alt="Produto 5" height="287px">
</div>

<section id="copa" class="secao-selecoes">
    <div class="selecoes-container">
        <div class="selecoes-esquerda">
            <h2>Encontre sua seleção</h2>

            <div class="grade-selecoes">
                <button class="card-selecao ativo" data-camisa="{{ asset('imagens/camisa-brasil.png') }}" data-link="brasil.html">
                    <img src="{{ asset('imagens/brasao-brasil.png') }}" alt="Brasil">
                    <span>Brasil</span>
                </button>

                <button class="card-selecao" data-camisa="{{ asset('imagens/camisa-eua.png') }}" data-link="eua.html">
                    <img src="{{ asset('imagens/brasao-eua.png') }}" alt="Estados Unidos">
                    <span>Estados Unidos</span>
                </button>

                <button class="card-selecao" data-camisa="{{ asset('imagens/camisa-canada.png') }}" data-link="canada.html">
                    <img src="{{ asset('imagens/brasao-canada.png') }}" alt="Canadá">
                    <span>Canadá</span>
                </button>

                <button class="card-selecao" data-camisa="{{ asset('imagens/camisa-espanha.png') }}" data-link="espanha.html">
                    <img src="{{ asset('imagens/brasao-espanha.png') }}" alt="Espanha">
                    <span>Espanha</span>
                </button>

                <button class="card-selecao" data-camisa="{{ asset('imagens/camisa-franca.png') }}" data-link="franca.html">
                    <img src="{{ asset('imagens/brasao-franca.png') }}" alt="França">
                    <span>França</span>
                </button>

                <button class="card-selecao" data-camisa="{{ asset('imagens/camisa-nova-zelandia.png') }}" data-link="nova-zelandia.html">
                    <img src="{{ asset('imagens/brasao-nova-zelandia.png') }}" alt="Nova Zelândia">
                    <span>Nova Zelândia</span>
                </button>
           </div>
        </div>

        <a href="#" class="preview-camisa" id="previewCamisa">
            <img src="{{ asset('imagens/camisa-brasil.png') }}" alt="Camisa da seleção" id="imagemCamisa">
        </a>
    </div>
</section>

<footer class="footer-aura">

    <div class="footer-topo">

        <div class="footer-newsletter">
            <h2>
                Fique por dentro para receber ofertas exclusivas
                e lançamentos antecipados
            </h2>

            <form>
                <input type="email" placeholder="E-mail *">
            </form>
        </div>

        <div class="footer-links">

            <div class="footer-coluna">
                <h4>Institucional</h4>

                <a href="#">Sobre nós</a>
                <a href="#">Inspirações</a>
                <a href="#">Contato</a>
            </div>

            <div class="footer-coluna">
                <h4>Explorar</h4>

                <a href="#">Masculino</a>
                <a href="#">Feminino</a>
                <a href="#">Acessórios</a>
                <a href="#">Tênis</a>
                <a href="#">Seleções</a>

            </div>

            <div class="footer-coluna">
                <h4>Ajuda</h4>

                <a href="#">Trocas e devoluções</a>
                <a href="#">Entregas</a>
                <a href="#">FAQ</a>

            </div>

        </div>
    </div>

    <div class="footer-meio">
        <img src="{{ asset('imagens/bandeira-brasil.svg') }}" alt="Brasil">
        <span>Brasil</span>
    </div>

    <div class="footer-bottom">

        <div class="footer-legais">
            <a href="#">© Aura Running 2026</a>
            <a href="#">Termos e Condições</a>
            <a href="#">Política de Privacidade</a>
            <a href="#">Cookies</a>
            <a href="#">Acessibilidade</a>
        </div>

        <div class="footer-redes">
            <a href="#"><i class="fa-brands fa-instagram"></i></a>
            <a href="#"><i class="fa-brands fa-tiktok"></i></a>
            <a href="#"><i class="fa-brands fa-youtube"></i></a>
            <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
            <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
        </div>

    </div>

</footer>

<script>
    function configurarCarrossel(
        wrapperId,
        scrollbarId,
        progressoId
    ) {
        const wrapper = document.getElementById(wrapperId);
        const scrollbar = document.getElementById(scrollbarId);
        const progresso = document.getElementById(progressoId);

        if (!wrapper || !scrollbar || !progresso) {
            return;
        }

        const trilho = scrollbar.querySelector(
            '.scrollbar-trilho'
        );

        let arrastando = false;
        let arrastou = false;
        let inicioX = 0;
        let scrollInicial = 0;

        function atualizarBarra() {
            const maximo =
                wrapper.scrollWidth - wrapper.clientWidth;

            const proporcaoVisivel = Math.min(
                1,
                wrapper.clientWidth / wrapper.scrollWidth
            );

            const largura = Math.max(
                12,
                proporcaoVisivel * 100
            );

            const deslocamento = maximo > 0
                ? (
                    wrapper.scrollLeft / maximo
                ) * (100 - largura)
                : 0;

            progresso.style.width = largura + '%';
            progresso.style.left = deslocamento + '%';
        }

        wrapper.addEventListener(
            'pointerdown',
            function (event) {
                if (event.target.closest('button, form')) {
                    return;
                }

                arrastando = true;
                arrastou = false;
                inicioX = event.clientX;
                scrollInicial = wrapper.scrollLeft;

                wrapper.setPointerCapture(event.pointerId);
            }
        );

        wrapper.addEventListener(
            'pointermove',
            function (event) {
                if (arrastando) {
                    const distancia =
                        event.clientX - inicioX;

                    if (Math.abs(distancia) > 5) {
                        arrastou = true;

                        wrapper.classList.add(
                            'arrastando'
                        );

                        wrapper.scrollLeft =
                            scrollInicial - distancia;
                    }

                    return;
                }

                // Movimenta ao aproximar o mouse das laterais
                if (event.pointerType === 'mouse') {
                    const area =
                        wrapper.getBoundingClientRect();

                    const posicao =
                        event.clientX - area.left;

                    if (posicao < 55) {
                        wrapper.scrollLeft -= 10;
                    }

                    if (posicao > area.width - 55) {
                        wrapper.scrollLeft += 10;
                    }
                }
            }
        );

        function encerrarArraste() {
            arrastando = false;

            wrapper.classList.remove(
                'arrastando'
            );
        }

        wrapper.addEventListener(
            'pointerup',
            encerrarArraste
        );

        wrapper.addEventListener(
            'pointercancel',
            encerrarArraste
        );

        wrapper.addEventListener(
            'click',
            function (event) {
                if (arrastou) {
                    event.preventDefault();
                    event.stopPropagation();
                    arrastou = false;
                }
            },
            true
        );

        trilho.addEventListener(
            'pointerdown',
            function (event) {
                if (event.target === progresso) {
                    return;
                }

                const area =
                    trilho.getBoundingClientRect();

                const porcentagem =
                    (event.clientX - area.left)
                    / area.width;

                wrapper.scrollLeft =
                    porcentagem *
                    (
                        wrapper.scrollWidth
                        - wrapper.clientWidth
                    );
            }
        );

        progresso.addEventListener(
            'pointerdown',
            function (event) {
                event.preventDefault();

                progresso.setPointerCapture(
                    event.pointerId
                );

                const inicio = event.clientX;
                const scrollAntes = wrapper.scrollLeft;

                function mover(movimento) {
                    const area =
                        trilho.getBoundingClientRect();

                    const maximo =
                        wrapper.scrollWidth
                        - wrapper.clientWidth;

                    const larguraUtil =
                        area.width
                        - progresso.offsetWidth;

                    if (larguraUtil > 0) {
                        wrapper.scrollLeft =
                            scrollAntes
                            + (
                                (
                                    movimento.clientX
                                    - inicio
                                ) / larguraUtil
                            ) * maximo;
                    }
                }

                function soltar() {
                    progresso.removeEventListener(
                        'pointermove',
                        mover
                    );

                    progresso.removeEventListener(
                        'pointerup',
                        soltar
                    );

                    progresso.removeEventListener(
                        'pointercancel',
                        soltar
                    );
                }

                progresso.addEventListener(
                    'pointermove',
                    mover
                );

                progresso.addEventListener(
                    'pointerup',
                    soltar
                );

                progresso.addEventListener(
                    'pointercancel',
                    soltar
                );
            }
        );

        wrapper.addEventListener(
            'scroll',
            atualizarBarra,
            { passive: true }
        );

        window.addEventListener(
            'resize',
            atualizarBarra
        );

        atualizarBarra();
    }

    configurarCarrossel(
        'carrossel-wrapper',
        'scrollbar-destaques',
        'scrollbar-progresso'
    );

    configurarCarrossel(
        'carrossel-roupas',
        'scrollbar-roupas',
        'progresso-roupas'
    );
</script>

</body>
</html>
