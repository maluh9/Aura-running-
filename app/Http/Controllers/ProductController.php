<?php

namespace App\Http\Controllers;

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
            && Auth::user()
                ->favorites()
                ->where('product_id', $product->id)
                ->exists();

        return view('products.show', compact(
            'product',
            'isFavorite'
        ));
    }
}
