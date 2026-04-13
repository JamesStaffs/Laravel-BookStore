<p>There are {{ $books->count() }} book(s).</p>
<p>
    <a href="{{ route('books.create') }}">Add a book</a>
</p>

<h3>Filters</h3>
<form method="GET" action="{{ route('books.index') }}">
    <label for="genre">Genre:</label>
    <select name="genre" id="genre">
        <option value="">All Genres</option>
        @foreach($genres as $genre)
            <option value="{{ $genre->id }}" @selected($selectedGenreId == $genre->id)>
                {{ $genre->name }}
            </option>
        @endforeach
    </select>

    <label for="author">Author:</label>
    <select name="author" id="author">
        <option value="">All Authors</option>
        @foreach($authors as $author)
            <option value="{{ $author->id }}" @selected($selectedAuthorId == $author->id)>
                {{ $author->name }}
            </option>
        @endforeach
    </select>

    <button type="submit">Filter</button>
</form>

@if($books->count())
    <h3>Books</h3>
    <ul>
        @foreach($books as $book)
            <li>
                <a href="{{ route('books.show', $book) }}">
                    {{ $book->title }} by {{ $book->author->name }}
                </a>
            </li>
        @endforeach
    </ul>
@else
    <p>There are no books to display.</p>
@endif