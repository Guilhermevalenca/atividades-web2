<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::with(['author', 'publisher', 'categories'])
            ->get();
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = Author::all();
        $publishers = Publisher::all();
        $categories = Category::all();

        return view('books.create', compact('authors', 'publishers', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        $validation = $request->validated();

        if(array_key_exists('cover', $validation)) {
            $coverPath = $validation['cover']->store('covers_books', 'public');
            $validation['cover'] = $coverPath;
        }

        $book = Book::create($validation);
        $book->categories()
            ->attach($validation['categories']);

        return to_route('books.index')
            ->with('success', 'Livro criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $book = Book::with(['author', 'publisher', 'categories'])
            ->findOrFail($id);
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $authors = Author::all();
        $publishers = Publisher::all();
        $categories = Category::all();

        return view('books.edit', compact('book', 'authors', 'publishers', 'categories'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, $id)
    {
        $validation = $request->validated();
        $book = Book::findOrFail($id);

        if(array_key_exists('cover', $validation)) {
            $coverPath = $validation['cover']->store('covers_books', 'public');
            $validation['cover'] = $coverPath;
        }

        $book->update($validation);
        $book->categories()
            ->sync($validation['categories']);

        return to_route('books.index')
            ->with('success', 'Livro atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $id)
    {
        $book = $id;
        $book->categories()->detach();
        $book->delete();

        return to_route('books.index')
            ->with('success', 'Livro excluído com sucesso');
    }
}
