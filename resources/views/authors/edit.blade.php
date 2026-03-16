<h2>Update an author</h2>

<form method="POST" action="{{ route('authors.update', $author) }}">
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
        <label for="name">Name</label>
        <input type="text" name="name" value="{{ old('name', $author->name) }}">
    </p>

    <p>
        <label for="bio">Bio</label>
        <textarea name="bio">{{ old('bio', $author->bio) }}</textarea>
    </p>

    <p>
        <input type="submit" value="Update">
    </p>
</form>