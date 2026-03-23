<h2>Update a book</h2>

<form method="POST" action="{{ route('books.update', $book) }}">
    @csrf
    @method('PUT')

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <p>
        <label for="title">Title</label>
        <input type="text" name="title" value="{{ old('title', $book->title) }}">
    </p>

    <p>
        <label for="isbn">ISBN</label>
        <input type="text" name="isbn" value="{{ old('isbn', $book->isbn) }}">
    </p>

    <p>
        <label for="author_id">Author</label>
        <select name="author_id">
            <option value="">Select an author</option>
            @foreach($authors as $author)
                <option value="{{ $author->id }}" {{ old('author_id', $book->author_id) == $author->id ? 'selected' : '' }}>
                    {{ $author->name }}
                </option>
            @endforeach
        </select>
    </p>

    <p>
        <input type="submit" value="Update">
    </p>
</form>