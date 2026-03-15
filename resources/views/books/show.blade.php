<h2>{{ $book->title }}</h2>

<ul>
    <li><a href="{{ route('books.edit', $book) }}">Edit</a></li>
    <li>
        <form method="POST" action="{{ route('books.destroy', $book) }}">
            @csrf
            @method('DELETE')
            <input type="submit" value="Delete" />
        </form>
    </li>
</ul>

<h3>Authored by {!! $book->author !!}</h3>
<p>ISBN: {!! $book->isbn !!}</p>