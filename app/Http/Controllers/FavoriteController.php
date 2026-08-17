<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class FavoriteController extends Controller
{
    // Adicionar ou remover favorito
    public function toggle($productId): RedirectResponse
    {
        if (!Auth::check()) {
            return redirect()
                ->route('login')
                ->with('error', 'Você precisa estar logado para favoritar produtos.');
        }

        $product = Product::findOrFail($productId);

        $favorite = Favorite::where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->first();

        if ($favorite) {
            $favorite->delete();

            return back()->with('success', 'Produto removido dos favoritos.');
        }

        Favorite::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
        ]);

        return back()->with('success', 'Produto adicionado aos favoritos!');
    }


    // Mostrar favoritos do usuário
    public function index(): View
    {
        $favorites = Favorite::with('product')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('favorites.index', compact('favorites'));
    }
}
