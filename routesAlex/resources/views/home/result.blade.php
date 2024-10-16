<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Result</title>
</head>
<body>
    <h1>Hello {{ $name }}!</h1>
    <p>Your age is: {{ $age }}</p>
    <a href="{{ route('home.index') }}">Back</a>
</body>
</html>
