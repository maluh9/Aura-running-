<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::updateOrCreate(
            ['slug' => 'tenis'],
            [
                'name' => 'Tênis',
                'description' => 'Tênis esportivos para corrida e treino.',
                'active' => true,
            ]
        );

        Category::updateOrCreate(
            ['slug' => 'roupas'],
            [
                'name' => 'Roupas',
                'description' => 'Outfits esportivos para treino, corrida e dia a dia.',
                'active' => true,
            ]
        );

        Category::updateOrCreate(
            ['slug' => 'acessorios'],
            [
                'name' => 'Acessórios',
                'description' => 'Acessórios esportivos para acompanhar seus treinos.',
                'active' => true,
            ]
        );
    }
}
