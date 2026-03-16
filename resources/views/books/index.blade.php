<p>There are {{ $books->count() }} book(s).</p>
<p>
    <a href="{{ route('books.create') }}">Add a book</a>
</p>

@if($books->count())
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
    <p>The Book Shop is empty.</p>
@endif