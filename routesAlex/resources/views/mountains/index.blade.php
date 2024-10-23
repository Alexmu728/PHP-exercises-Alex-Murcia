<!DOCTYPE html>
<html>
<head>
    <title>Mountains List</title>
</head>
<body>
    <h1>Mountains in Europe, part of a range, climbed after 2000:</h1>
    <ul>
        @foreach($rangeMountainsEurope as $mountain)
            <li>{{ $mountain->name }} - {{ $mountain->height }} meters</li>
        @endforeach
    </ul>

    <h1>Mountains at least 1500 meters or do not belong to a range and name doesn't start with a vowel:</h1>
    <ul>
        @foreach($mountainsFilter as $mountain)
            <li>{{ $mountain->name }} - {{ $mountain->height }} meters</li>
        @endforeach
    </ul>
</body>
</html>
