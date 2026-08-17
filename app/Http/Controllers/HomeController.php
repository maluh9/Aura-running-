<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::where('active', true)
            ->with('category')
            ->get();

        return view('home.index', compact('products'));
    }
}