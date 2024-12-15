<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Car</title>
</head>
<body>
    <h1>Add Car Details for License Plate: {{ $car->license_plate }}</h1>

    @if(session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('cars.store', ['car_id' => $car->id]) }}" method="POST">
        @csrf
        <div>
            <label for="model">Model:</label>
            <input type="text" name="model" id="model" value="{{ old('model', $car->model ?? '') }}">
        </div>
        <div>
            <label for="size">Size:</label>
            <input type="text" name="size" id="size" value="{{ old('size', $car->size ?? '') }}">
        </div>
        <div>
            <label for="parking_lot_id">Parking Lot:</label>
            <select name="parking_lot_id" id="parking_lot_id">
                @foreach($parkingLots as $lot)
                    <option value="{{ $lot->id }}" {{ old('parking_lot_id', $car->parking_lot_id) == $lot->id ? 'selected' : '' }}>
                        {{ $lot->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit">Save</button>
    </form>
</body>
</html>
