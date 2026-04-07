<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book form</title>
</head>
<body>

    @if(session('success'))
    <div>{{ session('success') }}</div>
    @endif

    <form action="{{ route('books.store') }}" method="POST">
    @csrf
    <label>Title:</label>
    <input type="text" name="title" value="{{ old('title') }}">
    @error('title')
        <div>{{ $message }}</div>
    @enderror

    <label>Author:</label>
    <input type="text" name="author" value="{{ old('author') }}">
    @error('author')
        <div>{{ $message }}</div>
    @enderror

    <label>Publisher:</label>
    <input type="text" name="publisher" value="{{ old('publisher') }}">
    @error('publisher')
        <div>{{ $message }}</div>
    @enderror

    <label>Publication Year:</label>
    <input type="number" name="publication_year" value="{{ old('publication_year') }}">
    @error('publication_year')
        <div>{{ $message }}</div>
    @enderror

    <label>Pages:</label>
    <input type="number" name="pages" value="{{ old('pages') }}">
    @error('pages')
        <div>{{ $message }}</div>
    @enderror

    <button type="submit">Add Book</button>
</form>
</body>
</html>
