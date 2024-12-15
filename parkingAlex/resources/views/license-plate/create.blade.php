<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create License Plate</title>
</head>
<body>
    <h1>Create License Plate</h1>

    <form action="{{ route('license-plate.store') }}" method="POST">
        @csrf
        <div>
            <label for="license_plate">License Plate:</label>
            <input type="text" name="license_plate" id="license_plate" value="{{ old('license_plate') }}">
        </div>
        <button type="submit">Create Plate</button>
    </form>
</body>
</html>
