<h2>Add an author</h2>

<form method="POST" action="{{ route('authors.store') }}">
    @csrf

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <p>
        <label for="name">Name</label>
        <input type="text" name="name" value="{{ old('name') }}">
    </p>

    <p>
        <label for="bio">Bio</label>
        <textarea name="bio">{{ old('bio') }}</textarea>
    </p>

    <p>
        <input type="submit" value="Create">
    </p>
</form>