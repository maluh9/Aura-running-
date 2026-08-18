<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::where('active', true)
            ->where('featured', true)
            ->with('category')
            ->get();

        $outfitProducts = Product::where('active', true)
            ->whereHas('category', function ($query) {
                $query->where('slug', 'roupas');
            })
            ->with('category')
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
