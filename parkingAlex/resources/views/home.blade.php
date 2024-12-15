<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>Welcome to the Car Parking Management System</h1>
    <h2>Not working, done by tinker</h2>

    <h2>Create Car</h2>
    <a href="{{ route('cars.create', ['car_id' => 1]) }}">Create a New Car</a> 

    <h2>Create License Plate</h2>
    <a href="{{ route('license-plate.create') }}">Create a New License Plate</a> 
</body>
</html>
