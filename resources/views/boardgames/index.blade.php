<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BoardGames</title>
</head>
<body>
    <nav>
 <a href="/">Homepage</a>
</nav>

    <h1>BoardGames</h1>
    <ol>
@foreach($boardgames as $boardgame)
    <li>
        <a href="/boardgame/{{ $boardgame['id'] }}">
            {{ $boardgame['name'] }}
        </a>
    </li>
@endforeach
</ol>
</body>
</html>
