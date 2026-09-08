<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query()
            ->where('is_admin', false)
            ->withCount('orders')
            ->withSum([
                'orders as total_spent' => function ($query) {
                    $query->where('payment_status', 'pago');
                }
            ], 'total');

        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");

            });
        }

        $customers = $query
            ->orderBy('name')
            ->paginate(10)
            ->withQueryString();


        $totalCustomers = User::where('is_admin', false)->count();

        $customersWithOrders = User::where('is_admin', false)
            ->whereHas('orders')
            ->count();

        $totalRevenue = User::where('is_admin', false)
            ->withSum([
                'orders as paid_total' => function ($query) {
                    $query->where('payment_status', 'pago');
                }
            ], 'total')
            ->get()
            ->sum('paid_total');


        return view(
            'admin.customers.index',
            compact(
                'customers',
                'totalCustomers',
                'customersWithOrders',
                'totalRevenue'
            )
        );
    }


    public function show(User $customer)
    {
        if ($customer->is_admin) {
            abort(404);
        }

        $customer->load([
            'orders' => function ($query) {
                $query->latest();
            }
        ]);

        $totalSpent = $customer->orders()
            ->where('payment_status', 'pago')
            ->sum('total');

        return view(
            'admin.customers.show',
            compact(
                'customer',
                'totalSpent'
            )
        );
    }
}