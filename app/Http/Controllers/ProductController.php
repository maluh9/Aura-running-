<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | EXIBIR PRODUTO
    |--------------------------------------------------------------------------
    */

    public function show(string $slug)
    {
        $product = Product::where('slug', $slug)

            // Produto precisa estar ativo
            ->where('active', true)

            // Categoria também precisa estar ativa
            ->whereHas('category', function ($query) {

                $query->where('active', true);

            })

            ->with('category')

            ->firstOrFail();


        $isFavorite = Auth::check()
            && Favorite::where(
                'user_id',
                Auth::id()
            )
                ->where(
                    'product_id',
                    $product->id
                )
                ->exists();


        return view(
            'products.show',
            compact(
                'product',
                'isFavorite'
            )
        );
    }



    /*
    |--------------------------------------------------------------------------
    | PRA ELE / PRA ELA
    |--------------------------------------------------------------------------
    |
    | REGRA:
    |
    | Tênis      → aparece nos dois
    | Acessórios → aparece nos dois
    | Copa       → aparece nos dois
    |
    | Roupas:
    | feminino   → Pra ela
    | masculino  → Pra ele
    | unissex    → aparece nos dois
    |
    */

    public function gender(string $gender)
    {
        /*
        |--------------------------------------------------------------------------
        | VALIDA A PÁGINA
        |--------------------------------------------------------------------------
        */

        if (!in_array(
            $gender,
            [
                'masculino',
                'feminino',
            ]
        )) {

            abort(404);
        }


        /*
        |--------------------------------------------------------------------------
        | BUSCA PRODUTOS
        |--------------------------------------------------------------------------
        */

        $products = Product::where(
            'active',
            true
        )

            /*
            |--------------------------------------------------------------------------
            | CATEGORIA PRECISA ESTAR ATIVA
            |--------------------------------------------------------------------------
            */

            ->whereHas(
                'category',
                function ($category) {

                    $category->where(
                        'active',
                        true
                    );

                }
            )


            /*
            |--------------------------------------------------------------------------
            | FILTRO PRA ELE / PRA ELA
            |--------------------------------------------------------------------------
            */

            ->where(
                function ($query) use ($gender) {


                    /*
                    |--------------------------------------------------------------------------
                    | PRODUTOS QUE NÃO SÃO ROUPAS
                    |--------------------------------------------------------------------------
                    |
                    | Tênis, acessórios e Copa aparecem nos dois.
                    |
                    */

                    $query->whereHas(
                        'category',
                        function ($category) {

                            $category->where(
                                'slug',
                                '!=',
                                'roupas'
                            );

                        }
                    )


                    /*
                    |--------------------------------------------------------------------------
                    | ROUPAS
                    |--------------------------------------------------------------------------
                    */

                    ->orWhere(
                        function ($clothing) use ($gender) {


                            $clothing

                                // precisa ser da categoria roupas
                                ->whereHas(
                                    'category',
                                    function ($category) {

                                        $category->where(
                                            'slug',
                                            'roupas'
                                        );

                                    }
                                )

                                // masculino/feminino + unissex
                                ->whereIn(
                                    'gender',
                                    [
                                        $gender,
                                        'unissex',
                                    ]
                                );

                        }
                    );

                }
            )


            ->with('category')

            ->orderBy('id')

            ->get();


        /*
        |--------------------------------------------------------------------------
        | ABRE A VIEW
        |--------------------------------------------------------------------------
        */

        return view(
            'products.gender',
            compact(
                'products',
                'gender'
            )
        );
    }
}