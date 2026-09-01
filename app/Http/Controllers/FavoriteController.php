<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FavoriteController extends Controller
{
    public function toggle(
        Request $request,
        int $productId
    ): RedirectResponse {
        $product = Product::where('active', true)
            ->findOrFail($productId);

        $favorite = Favorite::where(
            'user_id',
            $request->user()->id
        )
            ->where('product_id', $product->id)
            ->first();

        if ($favorite) {
            $favorite->delete();

            return back()->with(
                'success',
                'Produto removido dos favoritos.'
            );
        }

        Favorite::create([
            'user_id' => $request->user()->id,
            'product_id' => $product->id,
        ]);

        return back()->with(
            'success',
            'Produto adicionado aos favoritos.'
        );
    }

    public function index(Request $request): View
    {
        $favorites = Favorite::where(
            'user_id',
            $request->user()->id
        )
            ->with('product.category')
            ->latest()
            ->get();

        return view('favorites.index', compact('favorites'));
    }
}
