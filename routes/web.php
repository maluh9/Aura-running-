<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;


/*
|--------------------------------------------------------------------------
| AURA RUNNING
|--------------------------------------------------------------------------
*/

// Página inicial
Route::get('/', [HomeController::class, 'index']);


// Página do produto
Route::get('/produto/{slug}', [ProductController::class, 'show'])
    ->name('products.show');



/*
|--------------------------------------------------------------------------
| USUÁRIO LOGADO
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {


    /*
    |--------------------------------------------------------------------------
    | CARRINHO
    |--------------------------------------------------------------------------
    */

    Route::post('/carrinho/adicionar/{id}', [CartController::class, 'add'])
        ->name('cart.add');

    Route::get('/carrinho', [CartController::class, 'index'])
        ->name('cart.index');

    Route::post('/carrinho/atualizar/{itemId}', [CartController::class, 'update'])
        ->name('cart.update');

    Route::delete('/carrinho/remover/{itemId}', [CartController::class, 'remove'])
        ->name('cart.remove');


    /*
|--------------------------------------------------------------------------
| FINALIZAR COMPRA
|--------------------------------------------------------------------------
*/

Route::post('/finalizar-compra', [OrderController::class, 'checkout'])
    ->name('orders.checkout');

  /*
|--------------------------------------------------------------------------
| PEDIDOS
|--------------------------------------------------------------------------
*/

Route::get('/meus-pedidos', [OrderController::class, 'index'])
    ->name('orders.index');

Route::get('/meus-pedidos/{id}', [OrderController::class, 'show'])
    ->name('orders.show');

Route::post('/finalizar-compra', [OrderController::class, 'checkout'])
    ->name('orders.checkout');

    /*
    |--------------------------------------------------------------------------
    | MINHA CONTA
    |--------------------------------------------------------------------------
    */

    Route::get('/minha-conta', function () {
        return view('account.index');
    })->name('account.index');


    /*
    |--------------------------------------------------------------------------
    | FAVORITOS 
    |--------------------------------------------------------------------------
    */

    Route::post('/favoritos/{productId}', [FavoriteController::class, 'toggle'])
        ->name('favorites.toggle');

    Route::get('/favoritos', [FavoriteController::class, 'index'])
        ->name('favorites.index');


    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


   /*
|--------------------------------------------------------------------------
| PERFIL
|--------------------------------------------------------------------------
*/

Route::get('/profile', [ProfileController::class, 'edit'])
    ->name('profile.edit');

Route::patch('/profile', [ProfileController::class, 'update'])
    ->name('profile.update');

Route::get('/profile/password', function () {
    return view('profile.password');
})->name('profile.password');

Route::delete('/profile', [ProfileController::class, 'destroy'])
    ->name('profile.destroy');

});



/*
|--------------------------------------------------------------------------
| LOGIN / REGISTER / LOGOUT
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | DASHBOARD
        |--------------------------------------------------------------------------
        */

        Route::get('/', [DashboardController::class, 'index'])
            ->name('dashboard');


        /*
        |--------------------------------------------------------------------------
        | PRODUTOS
        |--------------------------------------------------------------------------
        */

        Route::get('/produtos', [AdminProductController::class, 'index'])
            ->name('products.index');

        Route::get('/produtos/novo', [AdminProductController::class, 'create'])
            ->name('products.create');

        Route::post('/produtos', [AdminProductController::class, 'store'])
            ->name('products.store');

        Route::get('/produtos/{product}/editar', [AdminProductController::class, 'edit'])
            ->name('products.edit');

        Route::put('/produtos/{product}', [AdminProductController::class, 'update'])
            ->name('products.update');

        Route::patch('/produtos/{product}/status', [AdminProductController::class, 'toggleStatus'])
            ->name('products.toggle-status');

    });