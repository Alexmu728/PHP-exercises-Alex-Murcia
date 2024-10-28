<html>
<head>
    <title>Mountain Details</title>
</head>
<body>
    <h1>{{ $mountain->name }}</h1>
    <p>Height: {{ $mountain->height }} meters</p>
    <p>Belongs to Range: {{ $mountain->belongsToRange ? 'Yes' : 'No' }}</p>
    <p>First Climb Date: {{ $mountain->firstClimbDate }}</p>
    <p>Continent: {{ $mountain->continent }}</p>
</body>
</html>
