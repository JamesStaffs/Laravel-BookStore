<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthorControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_returns_authors_collection()
    {
        $author = Author::factory()->create();

        $response = $this->getJson('/api/authors');

        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data' => [
                         '*' => [
                             'id',
                             'name'
                         ]
                     ]
                 ]);
    }

    public function test_show_returns_single_author_with_books()
    {
        $author = Author::factory()->create();
        $book = Book::factory()->create(['author_id' => $author->id]);

        $response = $this->getJson("/api/authors/{$author->id}");

        $response->assertStatus(200)
                 ->assertJson([
                     'data' => [
                         'id' => $author->id,
                         'name' => $author->name,
                         'books' => [
                             [
                                 'id' => $book->id,
                                 'title' => $book->title,
                                 'isbn' => $book->isbn
                             ]
                         ]
                     ]
                 ]);
    }

    public function test_show_returns_404_for_nonexistent_author()
    {
        $response = $this->getJson('/api/authors/999');

        $response->assertStatus(404);
    }
}