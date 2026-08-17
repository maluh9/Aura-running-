<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $tenis = Category::where('slug', 'tenis')->first();
        $roupas = Category::where('slug', 'roupas')->first();
        $acessorios = Category::where('slug', 'acessorios')->first();

        Product::create([
            'category_id' => $tenis->id,
            'name' => 'Aura Monster',
            'slug' => 'aura-monster',
            'image' => 'products/aura-monster.png',
            'description' => 'Tênis de corrida desenvolvido para proporcionar conforto, estabilidade e desempenho.',
            'price' => 799.90,
            'stock' => 20,
            'featured' => true,
            'active' => true,
        ]);

        Product::create([
            'category_id' => $tenis->id,
            'name' => 'The Sigma Fire',
            'slug' => 'the-sigma-fire',
            'image' => 'products/the-sigma-fire.png',
            'description' => 'Tênis esportivo leve e versátil para seus treinos.',
            'price' => 499.90,
            'stock' => 15,
            'featured' => true,
            'active' => true,
        ]);

        Product::create([
            'category_id' => $tenis->id,
            'name' => 'Aurazenith',
            'slug' => 'aurazenith',
            'image' => 'products/aurazenith.png',   
            'description' => 'Tecnologia e conforto para acompanhar sua rotina de corrida.',
            'price' => 699.90,
            'stock' => 10,
            'featured' => true,
            'active' => true,
        ]);

        Product::create([
            'category_id' => $roupas->id,
            'name' => 'Aura Performance T-Shirt',
            'slug' => 'aura-performance-t-shirt',
            'description' => 'Camiseta esportiva leve e confortável.',
            'price' => 149.90,
            'stock' => 30,
            'featured' => false,
            'active' => true,
        ]);

        Product::create([
            'category_id' => $roupas->id,
            'name' => 'Aura Running Shorts',
            'slug' => 'aura-running-shorts',
            'description' => 'Short esportivo para corrida e treino.',
            'price' => 129.90,
            'stock' => 25,
            'featured' => false,
            'active' => true,
        ]);

        Product::create([
            'category_id' => $acessorios->id,
            'name' => 'Aura Running Cap',
            'slug' => 'aura-running-cap',
            'description' => 'Boné esportivo leve para corrida.',
            'price' => 99.90,
            'stock' => 20,
            'featured' => false,
            'active' => true,
        ]);

        Product::create([
            'category_id' => $acessorios->id,
            'name' => 'Aura Sport Bottle',
            'slug' => 'aura-sport-bottle',
            'description' => 'Garrafa esportiva para acompanhar seus treinos.',
            'price' => 79.90,
            'stock' => 40,
            'featured' => false,
            'active' => true,
        ]);
    }
}