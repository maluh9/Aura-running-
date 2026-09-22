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
    /*
    |--------------------------------------------------------------------------
    | CATEGORIA
    |--------------------------------------------------------------------------
    */

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



    /*
    |--------------------------------------------------------------------------
    | PRA ELE / PRA ELA
    |--------------------------------------------------------------------------
    |
    | Tênis:
    | aparecem nos dois.
    |
    | Acessórios:
    | aparecem nos dois.
    |
    | Copa:
    | aparece nos dois.
    |
    | Roupas:
    | feminino → Pra ela
    | masculino → Pra ele
    | unissex → nos dois
    |
    */

    public function gender(string $gender): View
    {
        /*
        |--------------------------------------------------------------------------
        | VALIDA GÊNERO
        |--------------------------------------------------------------------------
        */

        abort_unless(
            in_array(
                $gender,
                [
                    'masculino',
                    'feminino',
                ],
                true
            ),
            404
        );


        /*
        |--------------------------------------------------------------------------
        | PRODUTOS
        |--------------------------------------------------------------------------
        */

        $products = Product::where(
            'active',
            true
        )

            /*
            |--------------------------------------------------------------------------
            | CATEGORIA ATIVA
            |--------------------------------------------------------------------------
            */

            ->whereHas(
                'category',
                function ($query) {

                    $query->where(
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
                    | NÃO É ROUPA
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

                                ->whereHas(
                                    'category',
                                    function ($category) {

                                        $category->where(
                                            'slug',
                                            'roupas'
                                        );

                                    }
                                )

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


            /*
            |--------------------------------------------------------------------------
            | CARREGA CATEGORIA
            |--------------------------------------------------------------------------
            */

            ->with('category')


            /*
            |--------------------------------------------------------------------------
            | ORDEM DOS PRODUTOS
            |--------------------------------------------------------------------------
            |
            | 1 - Roupas
            | 2 - Tênis
            | 3 - Copa
            | 4 - Relógios
            | 5 - Garrafas
            | 6 - Bonés
            | 7 - Bolsas
            | 8 - Slide
            |
            */

            ->orderByRaw("
                CASE

                    /* ROUPAS */
                    WHEN category_id = 2 THEN 1

                    /* TÊNIS */
                    WHEN category_id = 1 THEN 2

                    /* COPA */
                    WHEN category_id = 4 THEN 3

                    /* RELÓGIOS */
                    WHEN name LIKE '%Watch%' THEN 4

                    /* GARRAFAS */
                    WHEN name LIKE '%Bottle%' THEN 5

                    /* BONÉS */
                    WHEN name LIKE '%Cap%' THEN 6

                    /* BOLSAS */
                    WHEN name LIKE '%Bag%' THEN 7

                    /* SLIDE / CHINELO */
                    WHEN name LIKE '%Slide%' THEN 8

                    ELSE 9

                END
            ")


            /*
            |--------------------------------------------------------------------------
            | DESTAQUES PRIMEIRO DENTRO DE CADA GRUPO
            |--------------------------------------------------------------------------
            */

            ->orderByDesc('featured')


            /*
            |--------------------------------------------------------------------------
            | ORDEM ALFABÉTICA DENTRO DO GRUPO
            |--------------------------------------------------------------------------
            */

            ->orderBy('name')

            ->get();



        /*
        |--------------------------------------------------------------------------
        | TÍTULO
        |--------------------------------------------------------------------------
        */

        $title = $gender === 'masculino'
            ? 'Pra ele'
            : 'Pra ela';



        /*
        |--------------------------------------------------------------------------
        | DESCRIÇÃO
        |--------------------------------------------------------------------------
        */

        $description = $gender === 'masculino'
            ? 'Tênis, acessórios e peças selecionadas para ele.'
            : 'Tênis, acessórios e peças selecionadas para ela.';



        /*
        |--------------------------------------------------------------------------
        | VIEW
        |--------------------------------------------------------------------------
        */

        return $this->catalogView(
            $products,
            $title,
            $description
        );
    }



    /*
    |--------------------------------------------------------------------------
    | VIEW DO CATÁLOGO
    |--------------------------------------------------------------------------
    */

    private function catalogView(
        Collection $products,
        string $title,
        ?string $description
    ): View {

        /*
        |--------------------------------------------------------------------------
        | FAVORITOS
        |--------------------------------------------------------------------------
        */

        $favoriteProductIds = Auth::check()

            ? Favorite::where(
                'user_id',
                Auth::id()
            )
                ->pluck('product_id')
                ->all()

            : [];


        return view(
            'products.index',
            compact(
                'products',
                'title',
                'description',
                'favoriteProductIds'
            )
        );
    }
}