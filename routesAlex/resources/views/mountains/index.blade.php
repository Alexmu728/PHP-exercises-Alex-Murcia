<html>
<head>
    <title>Mountains List</title>
</head>
<body>
    <h1>List of Mountains</h1>
    <ul>
        @foreach ($mountains as $mountain)
            <li>
                <a href="{{ route('mountains.show', $mountain->id) }}">{{ $mountain->name }}</a>
                - First Climb Date: {{ $mountain->firstClimbDate }}
            </li>
        @endforeach
    </ul>
</body>
</html>
