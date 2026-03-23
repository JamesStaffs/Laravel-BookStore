<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use App\Http\Resources\BookResource;

class BookController extends Controller
{
    // READING
    public function index() {
        $books = Book::all();
        return view('books.index', [
            'books' => $books
        ]);
    }


    // READING
    public function show(Request $request)
    {
        $book = Book::findOrFail($request->id);
        return view('books.show', [
            'book' => $book
        ]);
    }

    // Show us a form to enter the details of a Book
    public function create(Request $request)
    {
        $authors = Author::all();
        return view('books.create', [
            'authors' => $authors
        ]);
    }

    // The saving of the form that was shown in "create"
    public function store(Request $request)
    {
        $normaliseIsbn = str_replace('-', '', $request->isbn);
        $request->merge(['isbn' => $normaliseIsbn]);

        $validated = $request->validate([
            'title' => ['required', 'min:1', 'max:60'],
            'author_id' => ['required', 'exists:authors,id'],
            'isbn' => [
                'required',
                'numeric',
                function($attribute, $value, $fail) {
                    // $attribute = isbn
                    // $value - the normalised isbn (no -)
                    // $fail - call when validation error
                    $length = strlen($value);
                    if($length != 10 && $length != 13) {
                        $fail('The ISBN must be 10 or 13 digits long');
                    }
                }
            ]
        ]);

        $book = new Book();
        $book->title = $validated['title'];
        $book->isbn = $validated['isbn'];
        $book->author_id = $validated['author_id'];
        $book->save();

        return redirect()->route('books.show', [
            'id' => $book->id
        ]);
    }

    // Show us a form to edit the details of a Book
    public function edit(Request $request)
    {
        $book = Book::findOrFail($request->id);
        $authors = Author::all();
        return view('books.edit', [
            'book' => $book,
            'authors' => $authors
        ]);
    }

    // The saving of the form that was shown in "update"
    public function update(Request $request)
    {
        $normaliseIsbn = str_replace('-', '', $request->isbn);
        $request->merge(['isbn' => $normaliseIsbn]);

        $validated = $request->validate([
            'title' => ['required', 'min:1', 'max:60'],
            'author_id' => ['required', 'exists:authors,id'],
            'isbn' => [
                'required',
                'numeric',
                function($attribute, $value, $fail) {
                    // $attribute = isbn
                    // $value - the normalised isbn (no -)
                    // $fail - call when validation error
                    $length = strlen($value);
                    if($length != 10 && $length != 13) {
                        $fail('The ISBN must be 10 or 13 digits long');
                    }
                }
            ]
        ]);

        $book = Book::findOrFail($request->id);
        $book->title = $validated['title'];
        $book->isbn = $validated['isbn'];
        $book->author_id = $validated['author_id'];
        $book->save();

        return redirect()->route('books.show', [
            'id' => $book->id
        ]);
    }

    public function destroy(Request $request)
    {
        $book = Book::findOrFail($request->id);
        $book->delete();
        return redirect()->route('books.index');
    }
}
