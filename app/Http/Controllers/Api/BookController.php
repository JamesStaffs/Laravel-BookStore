<?php

namespace App\Http\Controllers\Api;

use App\Models\Book;
use App\Http\Controllers\Controller;
use App\Http\Resources\BookWithAuthorResource;

class BookController extends Controller
{
    // API READING
    public function index() {
        $books = Book::with('author')->get();
        return BookWithAuthorResource::collection($books);
    }

    public function show(Book $book) {
        $book->load('author');
        return new BookWithAuthorResource($book);
    }
}