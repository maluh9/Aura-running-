<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        // Exibe no máximo os 10 produtos marcados como destaque.
        $featuredProducts = Product::where('active', true)
            ->where('featured', true)
            ->with('category')
            ->orderBy('id')
            ->limit(10)
            ->get();

        // Produtos exibidos no carrossel de outfits.
        $outfitProducts = Product::where('active', true)
            ->whereHas('category', function ($query) {
                $query->where('slug', 'roupas');
            })
            ->whereNotIn('name', [
                'Aura Performance T-Shirt',
                'Aura Running Shorts',
            ])
            ->with('category')
            ->orderBy('id')
            ->get();

        $favoriteProductIds = Auth::check()
            ? Favorite::where('user_id', Auth::id())
                ->pluck('product_id')
                ->all()
            : [];

        return view('home.index', compact(
            'featuredProducts',
            'outfitProducts',
            'favoriteProductIds'
        ));
    }
}
