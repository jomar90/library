<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1>Edit Member</h1>

    <form action="{{ route('members.update', $member) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Name</label>
        <input type="text" name="name" value="{{ old('name', $member->name) }}">

        @error('name')
        <div>{{ $message }}</div>
        @enderror

        <label>Email</label>
        <input type="email" name="email" value="{{ old('email', $member->email) }}">

        @error('email')
        <div>{{ $message }}</div>
        @enderror

        <button type="submit">Update</button>
    </form>
</body>

</html>
