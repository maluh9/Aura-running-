<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $query = Category::withCount('products');

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $categories = $query
            ->orderBy('name')
            ->paginate(10)
            ->withQueryString();

        $totalCategories = Category::count();

        $activeCategories = Category::where('active', true)->count();

        $inactiveCategories = Category::where('active', false)->count();

        return view('admin.categories.index', compact(
            'categories',
            'totalCategories',
            'activeCategories',
            'inactiveCategories'
        ));
    }


    public function create()
    {
        return view('admin.categories.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'unique:categories,name'
            ],

            'description' => [
                'nullable',
                'string'
            ],
        ]);


        $slug = $this->generateUniqueSlug($validated['name']);


        Category::create([
            'name' => $validated['name'],
            'slug' => $slug,
            'description' => $validated['description'] ?? null,
            'active' => $request->boolean('active'),
        ]);


        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Categoria cadastrada com sucesso.');
    }


    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }


    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('categories', 'name')->ignore($category->id),
            ],

            'description' => [
                'nullable',
                'string'
            ],
        ]);


        if ($category->name !== $validated['name']) {
            $category->slug = $this->generateUniqueSlug(
                $validated['name'],
                $category->id
            );
        }


        $category->name = $validated['name'];

        $category->description = $validated['description'] ?? null;

        $category->active = $request->boolean('active');

        $category->save();


        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Categoria atualizada com sucesso.');
    }


    public function toggleStatus(Category $category)
    {
        $category->active = !$category->active;

        $category->save();


        return redirect()
            ->route('admin.categories.index')
            ->with(
                'success',
                $category->active
                    ? 'Categoria ativada com sucesso.'
                    : 'Categoria desativada com sucesso.'
            );
    }


    private function generateUniqueSlug(string $name, ?int $ignoreId = null): string
    {
        $baseSlug = Str::slug($name);

        if (!$baseSlug) {
            $baseSlug = 'categoria';
        }

        $slug = $baseSlug;

        $counter = 2;


        while (
            Category::where('slug', $slug)
                ->when($ignoreId, function ($query) use ($ignoreId) {
                    $query->where('id', '!=', $ignoreId);
                })
                ->exists()
        ) {
            $slug = $baseSlug . '-' . $counter;

            $counter++;
        }


        return $slug;
    }
}
