<p>There are {{ $authors->count() }} author(s).</p>
<p>
    <a href="{{ route('authors.create') }}">Add an author</a>
</p>

@if($authors->count())
    <ul>
        @foreach($authors as $author)
            <li>
                <a href="{{ route('authors.show', $author) }}">
                    {{ $author->name }}
                </a>
            </li>
        @endforeach
    </ul>
@else
    <p>No authors yet.</p>
@endif