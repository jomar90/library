<h2>
    {{ $book->title }}
</h2>

<p>
    Your book is now on the website.
</p>

<p>
    <a href="{{ url('/books/' . $book->id) }}">View Your Books</a>
</p>
