<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PageController extends Controller
{
    public function show(
        string $slug
    ): View {

        $pages = [

            'sobre-nos' => [
                'title' => 'Sobre nós',
                'text' =>
                    'A AURA Running nasceu para unir performance, estilo e movimento em produtos pensados para quem não para.',
            ],

            'inspiracoes' => [
                'title' => 'Inspirações',
                'text' =>
                    'Descubra produtos, combinações e referências para acompanhar sua rotina de movimento.',
            ],

            'contato' => [
                'title' => 'Contato',
                'text' =>
                    'Entre em contato com a equipe AURA para dúvidas, sugestões ou informações sobre seus pedidos.',
            ],

            'trocas-e-devolucoes' => [
                'title' => 'Trocas e devoluções',
                'text' =>
                    'Consulte aqui as orientações para solicitar trocas ou devoluções de produtos AURA.',
            ],

            'entregas' => [
                'title' => 'Entregas',
                'text' =>
                    'Acompanhe as principais informações relacionadas à preparação, envio e entrega dos pedidos.',
            ],

            'faq' => [
                'title' => 'Perguntas frequentes',
                'text' =>
                    'Encontre respostas para as principais dúvidas sobre produtos, pedidos, entregas e sua conta.',
            ],

            'termos' => [
                'title' => 'Termos e Condições',
                'text' =>
                    'Consulte as condições gerais de utilização da plataforma AURA Running.',
            ],

            'privacidade' => [
                'title' => 'Política de Privacidade',
                'text' =>
                    'Conheça as práticas da AURA relacionadas à proteção e utilização das informações dos usuários.',
            ],

            'cookies' => [
                'title' => 'Cookies',
                'text' =>
                    'Consulte informações sobre a utilização de cookies durante a navegação na plataforma.',
            ],

            'acessibilidade' => [
                'title' => 'Acessibilidade',
                'text' =>
                    'A AURA busca oferecer uma experiência digital clara, acessível e inclusiva.',
            ],

        ];


        abort_unless(
            isset($pages[$slug]),
            404
        );


        return view(
            'pages.info',
            [
                'page' =>
                    $pages[$slug],
            ]
        );
    }
}