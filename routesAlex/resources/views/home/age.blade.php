<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Age Form</title>
</head>
<body>
    <h1>Hello {{ $name }}!</h1>
    <form action="{{ route('age.submit') }}" method="POST">
        @csrf
        <label for="age">Age:</label>
        <input type="number" name="age" id="age" required><br>

        <button type="submit">Send</button>
    </form>
</body>
</html>
