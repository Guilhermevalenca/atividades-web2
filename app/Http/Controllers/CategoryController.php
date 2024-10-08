<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::with('books')
            ->paginate();

        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('librarian', User::class);
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        Gate::authorize('librarian', User::class);
        $validation = $request->validated();
        Category::create($validation);

        return to_route('categories.index')
            ->with('success', 'Categoria criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $category = Category::with('books')
            ->findOrFail($id);

        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $id)
    {
        Gate::authorize('librarian', User::class);
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $id)
    {
        Gate::authorize('librarian', User::class);
        $validation = $request->validated();
        $category = $id;
        $category->update($validation);

        return to_route('categories.index')
            ->with('success', 'Categoria atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $id)
    {
        Gate::authorize('librarian', User::class);
        $category = $id;
        $category->books()->detach();
        $category->delete();

        return to_route('categories.index')
            ->with('success', 'Categoria excluida com sucesso!');
    }
}
