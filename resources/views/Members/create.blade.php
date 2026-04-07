<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Create Member</h1>

<form action="{{ route('members.store') }}" method="POST">
    @csrf

    <div>
        <label>Name:</label>
        <input type="text" name="name" value="{{ old('name') }}">
        @error('name')
            <div>{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email') }}">
        @error('email')
            <div>{{ $message }}</div>
        @enderror
    </div>

    <button type="submit">Save</button>

</form>
</body>
</html>
