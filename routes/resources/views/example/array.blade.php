<!DOCTYPE html>
<html>
<head>
    <title>Array in Anonymous Function</title>
</head>
<body>
    <h1>Array Values</h1>
    <ul>
        @foreach($array as $value)
            <li>{{ $value }}</li>
        @endforeach
    </ul>
</body>
</html>
