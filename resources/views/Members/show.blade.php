<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Details</title>
</head>
<body>

<nav>
    <a href="/">Homepage</a>
</nav>

<h1>Member Details</h1>

<p>Name: {{ $member->name }}</p>
<p>Email: {{ $member->email }}</p>

<a href="{{ route('members.index') }}">Back</a>

</body>
</html>
