<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form</title>
</head>
<body>
    <h1>Name and Lastname Form</h1>
    <form action="{{ route('form.submit') }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br>
        
        <label for="lastname">Lastname:</label>
        <input type="text" name="lastname" id="lastname" required><br>

        <button type="submit">Send</button>
    </form>
</body>
</html>
