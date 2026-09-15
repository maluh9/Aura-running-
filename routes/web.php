<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\StockController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\CustomerController as AdminCustomerController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\NationalTeamController;

/*
|--------------------------------------------------------------------------
| LOJA
|--------------------------------------------------------------------------
*/
Route::get(
    '/copa-do-mundo/{slug}',
    [NationalTeamController::class, 'show']
)->name('worldcup.show');

// HOME
Route::get(
    '/',
    [HomeController::class, 'index']
)->name('home');


// PÁGINAS MASCULINO E FEMININO
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


/*
|--------------------------------------------------------------------------
| ROTAS PROTEGIDAS POR LOGIN
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {


    /*
    |--------------------------------------------------------------------------
    | CARRINHO
    |--------------------------------------------------------------------------
    */

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



    /*
    |--------------------------------------------------------------------------
    | FAVORITOS
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/favoritos',
        [FavoriteController::class, 'index']
    )->name('favorites.index');


    Route::post(
        '/favoritos/{productId}',
        [FavoriteController::class, 'toggle']
    )->name('favorites.toggle');



    /*
    |--------------------------------------------------------------------------
    | PEDIDOS
    |--------------------------------------------------------------------------
    */

    // LISTA DE TODOS OS PEDIDOS
    Route::get(
        '/meus-pedidos',
        [OrderController::class, 'index']
    )->name('orders.index');


    // ACOMPANHAMENTO DE ENTREGA
    Route::get(
        '/acompanhar-entrega',
        [OrderController::class, 'tracking']
    )->name('orders.tracking');


    // DETALHES DE UM PEDIDO
    Route::get(
        '/meus-pedidos/{id}',
        [OrderController::class, 'show']
    )->name('orders.show');


    // FINALIZAR COMPRA
    Route::post(
        '/finalizar-compra',
        [OrderController::class, 'checkout']
    )->name('orders.checkout');

/*
|--------------------------------------------------------------------------
| PAGAMENTOS
|--------------------------------------------------------------------------
*/

Route::get(
    '/pagamentos',
    [PaymentController::class, 'index']
)->name('payments.index');


Route::get(
    '/pagamentos/{order}',
    [PaymentController::class, 'checkout']
)->name('payments.checkout');


Route::post(
    '/pagamentos/{order}/processar',
    [PaymentController::class, 'process']
)->name('payments.process');


Route::get(
    '/pagamentos/{order}/status',
    [PaymentController::class, 'status']
)->name('payments.status');


Route::post(
    '/pagamentos/{order}/atualizar',
    [PaymentController::class, 'refresh']
)->name('payments.refresh');

Route::get('/dashboard', function () {

    if (auth()->user()->is_admin) {
        return redirect()->route('admin.dashboard');
    }

    return redirect()->route('account.index');

})->name('dashboard');
    /*
    |--------------------------------------------------------------------------
    | MINHA CONTA
    |--------------------------------------------------------------------------
    */

    Route::get(
    '/minha-conta',
    [AccountController::class, 'index']
)->name('account.index');



    /*
    |--------------------------------------------------------------------------
    | PERFIL
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/profile',
        [ProfileController::class, 'edit']
    )->name('profile.edit');


    Route::patch(
        '/profile',
        [ProfileController::class, 'update']
    )->name('profile.update');


    Route::get(
        '/profile/password',
        function () {

            return view('profile.password');

        }
    )->name('profile.password');


    Route::delete(
        '/profile',
        [ProfileController::class, 'destroy']
    )->name('profile.destroy');

});


/*
|--------------------------------------------------------------------------
| AUTENTICAÇÃO
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

        Route::get(
            '/',
            [DashboardController::class, 'index']
        )->name('dashboard');



        /*
        |--------------------------------------------------------------------------
        | PRODUTOS
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/produtos',
            [AdminProductController::class, 'index']
        )->name('products.index');


        Route::get(
            '/produtos/novo',
            [AdminProductController::class, 'create']
        )->name('products.create');


        Route::post(
            '/produtos',
            [AdminProductController::class, 'store']
        )->name('products.store');


        Route::get(
            '/produtos/{product}/editar',
            [AdminProductController::class, 'edit']
        )->name('products.edit');


        Route::put(
            '/produtos/{product}',
            [AdminProductController::class, 'update']
        )->name('products.update');


        Route::patch(
            '/produtos/{product}/status',
            [AdminProductController::class, 'toggleStatus']
        )->name('products.toggle-status');



        /*
        |--------------------------------------------------------------------------
        | ESTOQUE
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/estoque',
            [StockController::class, 'index']
        )->name('stock.index');


        Route::patch(
            '/estoque/{product}',
            [StockController::class, 'update']
        )->name('stock.update');



        /*
        |--------------------------------------------------------------------------
        | CATEGORIAS
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/categorias',
            [AdminCategoryController::class, 'index']
        )->name('categories.index');


        Route::get(
            '/categorias/nova',
            [AdminCategoryController::class, 'create']
        )->name('categories.create');


        Route::post(
            '/categorias',
            [AdminCategoryController::class, 'store']
        )->name('categories.store');


        Route::get(
            '/categorias/{category}/editar',
            [AdminCategoryController::class, 'edit']
        )->name('categories.edit');


        Route::put(
            '/categorias/{category}',
            [AdminCategoryController::class, 'update']
        )->name('categories.update');


        Route::patch(
            '/categorias/{category}/status',
            [AdminCategoryController::class, 'toggleStatus']
        )->name('categories.toggle-status');



        /*
        |--------------------------------------------------------------------------
        | PEDIDOS
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/pedidos',
            [AdminOrderController::class, 'index']
        )->name('orders.index');


        Route::get(
            '/pedidos/{order}',
            [AdminOrderController::class, 'show']
        )->name('orders.show');


        Route::patch(
            '/pedidos/{order}/status',
            [AdminOrderController::class, 'updateStatus']
        )->name('orders.update-status');


        Route::patch(
            '/pedidos/{order}/pagamento',
            [AdminOrderController::class, 'updatePayment']
        )->name('orders.update-payment');


        Route::patch(
            '/pedidos/{order}/rastreamento',
            [AdminOrderController::class, 'updateTracking']
        )->name('orders.update-tracking');


        Route::patch(
            '/pedidos/{order}/cancelar',
            [AdminOrderController::class, 'cancel']
        )->name('orders.cancel');



        /*
        |--------------------------------------------------------------------------
        | CLIENTES
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/clientes',
            [AdminCustomerController::class, 'index']
        )->name('customers.index');


        Route::get(
            '/clientes/{customer}',
            [AdminCustomerController::class, 'show']
        )->name('customers.show');

    });