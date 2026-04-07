<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Members</title>
</head>
<body>
    <nav>
<h1>Members</h1>

@if(session('success'))
    <div>{{ session('success') }}</div>
@endif

<a href="{{ route('members.create') }}">Add Member</a>

<ul>

    @foreach($members as $member)
    <li>
        <a href="{{ route('members.show', $member) }}">
            {{ $member->name }}
        </a>
    </li>

    <button><a href="{{ route('members.edit', $member) }}">Edit</a></button>

<form action="{{ route('members.destroy', $member) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')

    <button type="submit" onclick="return confirm('Delete member?')">
        Delete
    </button>
</form>
@endforeach

</ul>

</body>
</html>
