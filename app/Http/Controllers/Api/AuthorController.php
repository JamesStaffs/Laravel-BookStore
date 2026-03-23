<?php

namespace App\Http\Controllers\Api;

use App\Models\Author;
use App\Http\Controllers\Controller;
use App\Http\Resources\AuthorResource;
use App\Http\Resources\AuthorWithBooksResource;

class AuthorController extends Controller
{
    // API READING
    public function index() {
        // Don't load books by default in index
        $authors = Author::all();
        return AuthorResource::collection($authors);
    }

    public function show(Author $author) {
        // Load books but not their authors to prevent recursion
        $author->load('books');
        return new AuthorWithBooksResource($author);
    }
}