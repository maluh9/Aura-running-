<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Favorite;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AccountController extends Controller
{
    public function index(): View
    {
        $user = Auth::user();

        /*
        |--------------------------------------------------------------------------
        | PEDIDOS DO CLIENTE
        |--------------------------------------------------------------------------
        */

        $orderCount = Order::where(
            'user_id',
            $user->id
        )->count();


        /*
        |--------------------------------------------------------------------------
        | FAVORITOS DO CLIENTE
        |--------------------------------------------------------------------------
        */

        $favoriteCount = Favorite::where(
            'user_id',
            $user->id
        )->count();


        /*
        |--------------------------------------------------------------------------
        | CARRINHO DO CLIENTE
        |--------------------------------------------------------------------------
        */

        $cart = Cart::where(
            'user_id',
            $user->id
        )->first();


        $cartItemCount = 0;

        if ($cart) {
$cartItemCount = (int) CartItem::where(
    'cart_id',
    $cart->id
)->sum('quantity');

        }


        /*
        |--------------------------------------------------------------------------
        | ÚLTIMO PEDIDO
        |--------------------------------------------------------------------------
        */

        $lastOrder = Order::where(
            'user_id',
            $user->id
        )
        ->latest()
        ->first();


        return view(
            'account.index',
            compact(
                'user',
                'orderCount',
                'favoriteCount',
                'cartItemCount',
                'lastOrder'
            )
        );
    }
}