<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create([
            'name' => 'Tênis',
            'slug' => 'tenis',
            'description' => 'Tênis esportivos para corrida e treino.',
            'active' => true,
        ]);

        Category::create([
            'name' => 'Roupas',
            'slug' => 'roupas',
            'description' => 'Roupas esportivas para treino e corrida.',
            'active' => true,
        ]);

        Category::create([
            'name' => 'Acessórios',
            'slug' => 'acessorios',
            'description' => 'Acessórios esportivos para acompanhar seus treinos.',
            'active' => true,
        ]);
    }
}