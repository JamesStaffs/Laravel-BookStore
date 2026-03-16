<?php

namespace App\Http\Controllers\Api;

use App\Models\Book;
use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;

class BookController extends Controller
{
    // API READING
    public function index() {
        $books = Book::all();
        return BookResource::collection($books);
    }
}