<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $tenis = Category::where('slug', 'tenis')->firstOrFail();
        $roupas = Category::where('slug', 'roupas')->firstOrFail();
        $acessorios = Category::where('slug', 'acessorios')->firstOrFail();

        $products = [
            [
                $tenis->id,
                'Aura Monster',
                'aura-monster',
                'imagens/destaque_1.png',
                'Tênis de corrida com conforto, estabilidade e alto desempenho.',
                799.90,
                20,
                'unissex',
                true,
            ],
            [
                $tenis->id,
                'The Sigma Fire',
                'the-sigma-fire',
                'imagens/destaque_2.png',
                'Tênis esportivo leve e versátil para seus treinos.',
                499.90,
                15,
                'masculino',
                true,
            ],
            [
                $tenis->id,
                'Aurazenith',
                'aurazenith',
                'imagens/destaque_3.png',
                'Tecnologia e conforto para acompanhar sua rotina de corrida.',
                699.90,
                10,
                'feminino',
                true,
            ],
            [
                $acessorios->id,
                'Aura Running Cap',
                'aura-running-cap',
                'imagens/destaque_4.png',
                'Boné esportivo leve para corrida.',
                99.90,
                20,
                'unissex',
                true,
            ],
            [
                $acessorios->id,
                'Aura Sport Bottle',
                'aura-sport-bottle',
                'imagens/destaque_5.png',
                'Garrafa esportiva para acompanhar seus treinos.',
                79.90,
                40,
                'unissex',
                true,
            ],

            // OUTFITS

            [
                $roupas->id,
                'AeroFlex',
                'aeroflex',
                'imagens/roupa_1.png',
                'Corra em qualquer lugar com estilo.',
                419.90,
                18,
                'feminino',
                false,
            ],
            [
                $roupas->id,
                'Horizon Dry Fit',
                'horizon-dry-fit',
                'imagens/roupa_2.png',
                'Treine com conforto.',
                289.00,
                24,
                'masculino',
                false,
            ],
            [
                $roupas->id,
                'Urban Run',
                'urban-run',
                'imagens/roupa_3.png',
                'Visual casual e esportivo.',
                409.00,
                14,
                'feminino',
                false,
            ],
            [
                $roupas->id,
                'Core Dry Fit',
                'core-dry-fit',
                'imagens/roupa_4.png',
                'Leveza para o dia a dia.',
                329.00,
                22,
                'masculino',
                false,
            ],
            [
                $roupas->id,
                'Flex Jogger Run',
                'flex-jogger-run',
                'imagens/roupa_5.png',
                'Performance e mobilidade para correr.',
                439.90,
                16,
                'feminino',
                false,
            ],
            [
                $roupas->id,
                'Essential-T',
                'essential-t',
                'imagens/roupa_6.png',
                'Básica, respirável e confortável.',
                599.00,
                12,
                'masculino',
                false,
            ],
            [
                $roupas->id,
                'Run Shift',
                'run-shift',
                'imagens/roupa_7.png',
                'Relaxe ou corra com conforto.',
                305.00,
                20,
                'unissex',
                false,
            ],
        ];

        foreach ($products as [
            $categoryId,
            $name,
            $slug,
            $image,
            $description,
            $price,
            $stock,
            $gender,
            $featured
        ]) {
            Product::updateOrCreate(
                ['slug' => $slug],
                [
                    'category_id' => $categoryId,
                    'name' => $name,
                    'image' => $image,
                    'description' => $description,
                    'price' => $price,
                    'stock' => $stock,
                    'gender' => $gender,
                    'featured' => $featured,
                    'active' => true,
                ]
            );
        }
    }
}
