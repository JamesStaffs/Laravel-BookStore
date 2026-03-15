<h2>Add a book</h2>

<form method="POST" action="{{ route('books.store') }}">
    @csrf

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <p>
        <label for="title">Title</label>
        <input type="text" name="title" value="{{ old('title') }}">
    </p>

    <p>
        <label for="isbn">ISBN</label>
        <input type="text" name="isbn" value="{{ old('isbn') }}">
    </p>

    <p>
        <label for="author">Author</label>
        <input type="text" name="author" value="{{ old('author') }}">
    </p>

    <p>
        <input type="submit" value="Create">
    </p>
</form>