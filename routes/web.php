<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// HOME

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

// PÁGINAS DE MASCULINO E FEMININO

Route::get(
    '/produtos/genero/{gender}',
    [CategoryController::class, 'gender']
)->name('products.gender');

// PÁGINAS TÊNIS, ACESSÓRIOS E OUTFITS

Route::get(
    '/produtos/{category}',
    [CategoryController::class, 'show']
)->name('categories.show');

// PÁGINA INDIVIDUAL DO PRODUTO

Route::get(
    '/produto/{slug}',
    [ProductController::class, 'show']
)->name('products.show');

// ROTAS PROTEGIDAS POR LOGIN

Route::middleware('auth')->group(function () {
    // CARRINHO

    Route::get(
        '/carrinho',
        [CartController::class, 'index']
    )->name('cart.index');

    Route::post(
        '/carrinho/adicionar/{productId}',
        [CartController::class, 'add']
    )->name('cart.add');

    Route::post(
        '/carrinho/atualizar/{itemId}',
        [CartController::class, 'update']
    )->name('cart.update');

    Route::delete(
        '/carrinho/remover/{itemId}',
        [CartController::class, 'remove']
    )->name('cart.remove');

    // FAVORITOS

    Route::get(
        '/favoritos',
        [FavoriteController::class, 'index']
    )->name('favorites.index');

    Route::post(
        '/favoritos/{productId}',
        [FavoriteController::class, 'toggle']
    )->name('favorites.toggle');

    // PEDIDOS

    Route::get(
        '/meus-pedidos',
        [OrderController::class, 'index']
    )->name('orders.index');

    Route::get(
        '/meus-pedidos/{id}',
        [OrderController::class, 'show']
    )->name('orders.show');

    Route::post(
        '/finalizar-compra',
        [OrderController::class, 'checkout']
    )->name('orders.checkout');

    // PERFIL

    Route::get(
        '/profile',
        [ProfileController::class, 'edit']
    )->name('profile.edit');

    Route::patch(
        '/profile',
        [ProfileController::class, 'update']
    )->name('profile.update');

    Route::get('/profile/password', function () {
        return view('profile.password');
    })->name('profile.password');

    Route::delete(
        '/profile',
        [ProfileController::class, 'destroy']
    )->name('profile.destroy');
});

require __DIR__.'/auth.php';
