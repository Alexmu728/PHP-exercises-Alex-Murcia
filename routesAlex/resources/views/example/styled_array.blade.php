<!DOCTYPE html>
<html>
<head>
    <title>Styled Array</title>
    <style>
        .green-background {
            background-color: green;
        }
    </style>
</head>
<body>
    <h1>Styled Array with Odd Rows</h1>
    <ul>
        @foreach($array as $index => $value)
            @if($index % 2 !== 0)
                <li class="green-background">{{ $value }}</li>
            @else
                <li>{{ $value }}</li>
            @endif
        @endforeach
    </ul>
</body>
</html>
