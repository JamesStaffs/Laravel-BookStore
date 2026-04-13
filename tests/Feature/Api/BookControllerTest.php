<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\Book;
use App\Models\Author;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_returns_books_collection()
    {
        $author = Author::factory()->create();
        $book = Book::factory()->create(['author_id' => $author->id]);

        $response = $this->getJson('/api/books');

        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data' => [
                         '*' => [
                             'id',
                             'title',
                             'isbn',
                             'author' => [
                                 'id',
                                 'name'
                             ]
                         ]
                     ]
                 ]);
    }

    public function test_show_returns_single_book()
    {
        $author = Author::factory()->create();
        $book = Book::factory()->create(['author_id' => $author->id]);

        $response = $this->getJson("/api/books/{$book->id}");

        $response->assertStatus(200)
                 ->assertJson([
                     'data' => [
                         'id' => $book->id,
                         'title' => $book->title,
                         'isbn' => $book->isbn,
                         'author' => [
                             'id' => $author->id,
                             'name' => $author->name
                         ]
                     ]
                 ]);
    }

    public function test_show_returns_404_for_nonexistent_book()
    {
        $response = $this->getJson('/api/books/999');

        $response->assertStatus(404);
    }
}