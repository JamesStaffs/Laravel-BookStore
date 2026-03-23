<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use Illuminate\Support\Facades\Gate;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', Author::class);
        $authors = Author::all();
        return view('authors.index', [
            'authors' => $authors
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Author::class);
        return view('authors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('create', Author::class);
        $validated = $request->validate([
            'name' => ['required', 'min:1', 'max:100'],
            'bio' => ['nullable', 'string', 'max:1000']
        ]);

        $author = new Author();
        $author->name = $validated['name'];
        $author->bio = $validated['bio'];
        $author->save();

        return redirect()->route('authors.show', [
            'author' => $author->id
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        Gate::authorize('view', $author);
        return view('authors.show', [
            'author' => $author
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        Gate::authorize('update', $author);
        return view('authors.edit', [
            'author' => $author
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        Gate::authorize('update', $author);
        $validated = $request->validate([
            'name' => ['required', 'min:1', 'max:100'],
            'bio' => ['nullable', 'string', 'max:1000']
        ]);

        $author->name = $validated['name'];
        $author->bio = $validated['bio'];
        $author->save();

        return redirect()->route('authors.show', [
            'author' => $author->id
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        Gate::authorize('delete', $author);
        $author->delete();
        return redirect()->route('authors.index');
    }
}
