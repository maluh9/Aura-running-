<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();

        $lowStockCount = Product::where('stock', '<=', 5)->count();

        $totalOrders = Order::count();

        $totalCustomers = User::where('is_admin', false)->count();

        $recentOrders = Order::with('user')
            ->latest()
            ->take(5)
            ->get();

        $lowStockProducts = Product::where('stock', '<=', 5)
            ->orderBy('stock')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalProducts',
            'lowStockCount',
            'totalOrders',
            'totalCustomers',
            'recentOrders',
            'lowStockProducts'
        ));
    }
}