<?php

namespace Database\Seeders;

use App\Models\NationalTeam;
use Illuminate\Database\Seeder;

class NationalTeamSeeder extends Seeder
{
    public function run(): void
    {
        $teams = [

            [
                'name' => 'Brasil',
                'slug' => 'brasil',
                'hero_image' => 'imagens/copa/brasil-hero.jpg',
                'description' => 'Vista as cores do Brasil com a AURA.',
                'sort_order' => 1,
            ],

            [
                'name' => 'Estados Unidos',
                'slug' => 'estados-unidos',
                'hero_image' => 'imagens/copa/estados-unidos-hero.jpg',
                'description' => 'Coleção AURA inspirada nos Estados Unidos.',
                'sort_order' => 2,
            ],

            [
                'name' => 'Canadá',
                'slug' => 'canada',
                'hero_image' => 'imagens/copa/canada-hero.jpg',
                'description' => 'Vista as cores do Canadá com a AURA.',
                'sort_order' => 3,
            ],

            [
                'name' => 'Espanha',
                'slug' => 'espanha',
                'hero_image' => 'imagens/copa/espanha-hero.jpg',
                'description' => 'Coleção inspirada nas cores da Espanha.',
                'sort_order' => 4,
            ],

            [
                'name' => 'França',
                'slug' => 'franca',
                'hero_image' => 'imagens/copa/franca-hero.jpg',
                'description' => 'A coleção francesa da AURA.',
                'sort_order' => 5,
            ],

            [
                'name' => 'Nova Zelândia',
                'slug' => 'nova-zelandia',
                'hero_image' => 'imagens/copa/nova-zelandia-hero.jpg',
                'description' => 'AURA inspirada na Nova Zelândia.',
                'sort_order' => 6,
            ],

        ];


        foreach ($teams as $team) {

            NationalTeam::updateOrCreate(
                [
                    'slug' => $team['slug']
                ],
                $team
            );

        }
    }
}