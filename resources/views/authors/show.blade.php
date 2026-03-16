<h2>{{ $author->name }}</h2>

<ul>
    <li><a href="{{ route('authors.edit', $author) }}">Edit</a></li>
    <li>
        <form method="POST" action="{{ route('authors.destroy', $author) }}">
            @csrf
            @method('DELETE')
            <input type="submit" value="Delete" />
        </form>
    </li>
</ul>

@if($author->bio)
    <p>{{ $author->bio }}</p>
@endif

<h3>Books by this author</h3>
@if($author->books->count())
    <ul>
        @foreach($author->books as $book)
            <li><a href="{{ route('books.show', $book) }}">{{ $book->title }}</a></li>
        @endforeach
    </ul>
@else
    <p>No books yet.</p>
@endif