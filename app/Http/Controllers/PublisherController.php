<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePublisherRequest;
use App\Http\Requests\UpdatePublisherRequest;
use App\Models\Publisher;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publishers = Publisher::with('books')
            ->paginate();
        return view('publishers.index', compact('publishers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('librarian', User::class);
        return view('publishers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePublisherRequest $request)
    {
        Gate::authorize('librarian', User::class);
        $validation = $request->validated();
        Publisher::create($validation);

        return to_route('publishers.index')
            ->with('success', 'Editora criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $publisher = Publisher::with('books')
            ->findOrFail($id);
        return view('publishers.show', compact('publisher'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publisher $id)
    {
        Gate::authorize('librarian', User::class);
        $publisher = $id;
        return view('publishers.edit', compact('publisher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePublisherRequest $request, Publisher $id)
    {
        Gate::authorize('librarian', User::class);
        $validation = $request->validated();
        $publisher = $id;
        $publisher->update($validation);

        return to_route('publishers.index')
            ->with('success', 'Editora atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publisher $id)
    {
        Gate::authorize('librarian', User::class);
        $publisher = $id;
        $publisher->delete();

        return to_route('publishers.index')
            ->with('success', 'Editora exlucida com sucesso');
    }
}
