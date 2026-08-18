<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Favorite;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function show(Category $category): View
    {
        abort_unless($category->active, 404);

        $products = $category->products()
            ->where('active', true)
            ->with('category')
            ->orderByDesc('featured')
            ->orderBy('name')
            ->get();

        $title = $category->slug === 'roupas'
            ? 'Outfits'
            : $category->name;

        return $this->catalogView(
            $products,
            $title,
            $category->description
        );
    }

    public function gender(string $gender): View
    {
        abort_unless(
            in_array($gender, ['masculino', 'feminino'], true),
            404
        );

        $products = Product::where('active', true)
            ->whereIn('gender', [$gender, 'unissex'])
            ->with('category')
            ->orderByDesc('featured')
            ->orderBy('name')
            ->get();

        $title = $gender === 'masculino'
            ? 'Masculino'
            : 'Feminino';

        return $this->catalogView(
            $products,
            $title,
            'Performance, conforto e estilo para acompanhar cada movimento.'
        );
    }

    private function catalogView(
        Collection $products,
        string $title,
        ?string $description
    ): View {
        $favoriteProductIds = Auth::check()
            ? Favorite::where('user_id', Auth::id())
                ->pluck('product_id')
                ->all()
            : [];

        return view('products.index', compact(
            'products',
            'title',
            'description',
            'favoriteProductIds'
        ));
    }
}
