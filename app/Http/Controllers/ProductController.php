<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\NationalTeam;

class ProductController extends Controller
{
    public function show(string $slug)
    {
        $product = Product::where('slug', $slug)

            // Produto precisa estar ativo
            ->where('active', true)

            // Categoria do produto também precisa estar ativa
            ->whereHas('category', function ($query) {

                $query->where('active', true);

            })

            ->with('category')

            ->firstOrFail();


        $isFavorite = Auth::check()
            && Favorite::where(
                'user_id',
                Auth::id()
            )
                ->where(
                    'product_id',
                    $product->id
                )
                ->exists();


        return view(
            'products.show',
            compact(
                'product',
                'isFavorite'
            )
        );
    }
}