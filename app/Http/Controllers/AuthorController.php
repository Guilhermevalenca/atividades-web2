<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use App\Models\Author;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::with('books')
            ->paginate();
        return view('authors.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('librarian', User::class);
        return view('authors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAuthorRequest $request)
    {
        Gate::authorize('librarian', User::class);
        $validation = $request->validated();
        Author::create($validation);

        return to_route('authors.index')
            ->with('success', 'Autor criado com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $author = Author::with('books')
            ->findOrFail($id);
        return view('authors.show', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $id)
    {
        Gate::authorize('librarian', User::class);
        $author = $id;
        return view('authors.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAuthorRequest $request, Author $id)
    {
        Gate::authorize('librarian', User::class);
        $author = $id;
        $validation = $request->validated();
        $author->update($validation);

        return to_route('authors.index')
            ->with('success', 'Autor atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $id)
    {
        Gate::authorize('librarian', User::class);
        $author = $id;
        $author->delete();

        return to_route('authors.index')
            ->with('success', 'Autor excluido com sucesso!');
    }
}
