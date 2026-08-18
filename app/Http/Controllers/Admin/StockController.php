<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('category');

        if ($request->filled('search')) {

            $search = $request->search;

            $query->where('name', 'like', "%{$search}%");
        }

        $products = $query
            ->orderBy('name')
            ->paginate(10)
            ->withQueryString();


        $totalStock = Product::sum('stock');


        $lowStockCount = Product::where('stock', '>', 0)
            ->where('stock', '<=', 5)
            ->count();


        $outOfStockCount = Product::where('stock', 0)
            ->count();


        return view('admin.stock.index', compact(
            'products',
            'totalStock',
            'lowStockCount',
            'outOfStockCount'
        ));
    }


    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'stock' => 'required|integer|min:0',
        ]);


        $product->stock = $validated['stock'];

        $product->save();


        return redirect()
            ->route('admin.stock.index')
            ->with('success', 'Estoque atualizado com sucesso.');
    }
}