<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boardgame Details</title>
</head>
<body>
    <nav>
            <a href="/">Homepage</a>
    <a href="/boardgames">Back to Board Games list</a>
    </nav>


<h1>Boardgame Details</h1>

<p>Name: {{ $boardgame['name'] }}</p>
<p>Age Range: {{ $boardgame['age range'] }}</p>
<p>Language: {{ $boardgame['language'] }}</p>

</body>
</html>
