<p>There are {{ $books->count() }} book(s).</p>
<p>
    <a href="{{ route('books.create') }}">Add a book</a>
</p>

<h3>Genre</h3>
<p>Choose a genre to filter the books:</p>

<form method="GET" action="{{ route('books.index') }}">
    <select name="genre">
        <option value="">All Genres</option>
        @foreach($genres as $genre)
            <option value="{{ $genre->id }}" @selected($selectedGenreId == $genre->id)>
                {{ $genre->name }}
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