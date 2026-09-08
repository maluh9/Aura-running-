<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | DESTAQUES
        |--------------------------------------------------------------------------
        |
        | Exibe somente produtos:
        | - ativos;
        | - marcados como destaque;
        | - pertencentes a categorias ativas.
        |
        */

        $featuredProducts = Product::where('active', true)
            ->where('featured', true)
            ->whereHas('category', function ($query) {

                $query->where('active', true);

            })
            ->with('category')
            ->orderBy('id')
            ->limit(10)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | OUTFITS
        |--------------------------------------------------------------------------
        |
        | Exibe somente produtos:
        | - ativos;
        | - da categoria roupas;
        | - cuja categoria também esteja ativa.
        |
        */

        $outfitProducts = Product::where('active', true)
            ->whereHas('category', function ($query) {

                $query
                    ->where('slug', 'roupas')
                    ->where('active', true);

            })
            ->with('category')
            ->orderBy('id')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | FAVORITOS DO USUÁRIO
        |--------------------------------------------------------------------------
        */

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