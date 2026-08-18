<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function show(string $slug)
    {
        $product = Product::where('slug', $slug)
            ->where('active', true)
            ->with('category')
            ->firstOrFail();

        $isFavorite = Auth::check()
            && Favorite::where('user_id', Auth::id())
                ->where('product_id', $product->id)
                ->exists();

        return view('products.show', compact(
            'product',
            'isFavorite'
        ));
    }
}
