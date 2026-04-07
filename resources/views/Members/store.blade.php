<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member form</title>
</head>
<body>

    @if(session('success'))
    <div>{{ session('success') }}</div>
    @endif

    <form action="{{ route('members.store') }}" method="POST">
    @csrf
    <label>Name:</label>
    <input type="text" name="name" value="{{ old('name') }}">
    @error('name')
        <div>{{ $message }}</div>
    @enderror

    <label>Email:</label>
    <input type="email" name="email" value="{{ old('email') }}">
    @error('email')
        <div>{{ $message }}</div>
    @enderror

    <button type="submit">Add Member</button>
</form>
</body>
</html>
