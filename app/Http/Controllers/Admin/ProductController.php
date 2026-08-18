<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LISTAR PRODUTOS
    |--------------------------------------------------------------------------
    */
    public function index(Request $request)
    {
        $query = Product::with('category');

        // Busca
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $products = $query
            ->orderBy('created_at', 'desc')
            ->paginate(10)
            ->withQueryString();

        return view('admin.products.index', compact('products'));
    }


    /*
    |--------------------------------------------------------------------------
    | FORMULÁRIO NOVO PRODUTO
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        $categories = Category::where('active', true)
            ->orderBy('name')
            ->get();

        return view('admin.products.create', compact('categories'));
    }


    /*
    |--------------------------------------------------------------------------
    | SALVAR NOVO PRODUTO
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],

            'category_id' => [
                'required',
                'exists:categories,id',
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'price' => [
                'required',
                'numeric',
                'min:0',
            ],

            'stock' => [
                'required',
                'integer',
                'min:0',
            ],

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:4096',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | SLUG
        |--------------------------------------------------------------------------
        */

        $baseSlug = Str::slug($validated['name']);
        $slug = $baseSlug;
        $contador = 1;

        while (Product::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $contador;
            $contador++;
        }


        /*
        |--------------------------------------------------------------------------
        | IMAGEM
        |--------------------------------------------------------------------------
        */

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')
                ->store('products', 'public');
        }


        /*
        |--------------------------------------------------------------------------
        | CADASTRAR
        |--------------------------------------------------------------------------
        */

        Product::create([
            'category_id' => $validated['category_id'],
            'name' => $validated['name'],
            'slug' => $slug,
            'description' => $validated['description'] ?? null,
            'price' => $validated['price'],
            'stock' => $validated['stock'],
            'image' => $imagePath,

            'featured' => $request->boolean('featured'),
            'active' => $request->boolean('active'),
        ]);


        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Produto cadastrado com sucesso.');
    }


    /*
    |--------------------------------------------------------------------------
    | FORMULÁRIO EDITAR
    |--------------------------------------------------------------------------
    */
    public function edit(Product $product)
    {
        $categories = Category::orderBy('name')->get();

        return view(
            'admin.products.edit',
            compact('product', 'categories')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | ATUALIZAR PRODUTO
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'category_id' => [
                'required',
                'exists:categories,id',
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'price' => [
                'required',
                'numeric',
                'min:0',
            ],

            'stock' => [
                'required',
                'integer',
                'min:0',
            ],

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:4096',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | ALTEROU O NOME?
        |--------------------------------------------------------------------------
        */

        if ($product->name !== $validated['name']) {

            $baseSlug = Str::slug($validated['name']);
            $slug = $baseSlug;
            $contador = 1;

            while (
                Product::where('slug', $slug)
                    ->where('id', '!=', $product->id)
                    ->exists()
            ) {
                $slug = $baseSlug . '-' . $contador;
                $contador++;
            }

            $product->slug = $slug;
        }


        /*
        |--------------------------------------------------------------------------
        | NOVA IMAGEM
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image')) {

            if (
                $product->image &&
                Storage::disk('public')->exists($product->image)
            ) {
                Storage::disk('public')->delete($product->image);
            }

            $product->image = $request
                ->file('image')
                ->store('products', 'public');
        }


        /*
        |--------------------------------------------------------------------------
        | ATUALIZAR
        |--------------------------------------------------------------------------
        */

        $product->category_id = $validated['category_id'];
        $product->name = $validated['name'];
        $product->description = $validated['description'] ?? null;
        $product->price = $validated['price'];
        $product->stock = $validated['stock'];

        $product->featured = $request->boolean('featured');
        $product->active = $request->boolean('active');

        $product->save();


        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Produto atualizado com sucesso.');
    }


    /*
    |--------------------------------------------------------------------------
    | ATIVAR / DESATIVAR
    |--------------------------------------------------------------------------
    */
    public function toggleStatus(Product $product)
    {
        $product->active = !$product->active;
        $product->save();

        return redirect()
            ->route('admin.products.index')
            ->with(
                'success',
                $product->active
                    ? 'Produto ativado com sucesso.'
                    : 'Produto desativado com sucesso.'
            );
    }
}