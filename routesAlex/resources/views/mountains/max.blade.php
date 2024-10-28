<<html>
<head>
    <title>Highest Mountain in Europe</title>
</head>
<body>
    <h1>Highest Mountain in Europe that Belongs to a Range</h1>
    @if ($mountain)
        <p>Name: {{ $mountain->name }}</p>
        <p>Height: {{ $mountain->height }} meters</p>
        <p>First Climb Date: {{ $mountain->firstClimbDate }}</p>
    @else
        <p>No mountains found in Europe that belong to a range.</p>
    @endif
</body>
</html>
