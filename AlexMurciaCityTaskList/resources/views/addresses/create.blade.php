@extends('layouts.app')

@section('content')
<html>
    <head>
        <title>Assign Addresses</title>
    </head>
    <body>
        <div class="container">
            <h1>Assign Address</h1>

            <!-- Formulario para asignar la dirección -->
            <form action="{{ route('addresses.store') }}" method="POST">
                @csrf

                <!-- Selector de ciudadano -->
                <div class="mb-3">
                    <label for="citizen_id" class="form-label">Select a Citizen</label>
                    <select name="citizen_id" id="citizen_id" class="form-select" required>
                        <option value="">Select a citizen</option>
                        <!-- Recorrer los ciudadanos y crear una opción para cada uno -->
                        @foreach ($citizens as $citizen)
                            <option value="{{ $citizen->id }}">{{ $citizen->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Campos de dirección -->
                <div class="mb-3">
                    <label for="street" class="form-label">Street</label>
                    <input type="text" class="form-control" id="street" name="street" required>
                </div>
                <div class="mb-3">
                    <label for="city" class="form-label">City</label>
                    <input type="text" class="form-control" id="city" name="city" required>
                </div>
                <div class="mb-3">
                    <label for="postalCode" class="form-label">Postal Code</label>
                    <input type="text" class="form-control" id="postalCode" name="postalCode" required>
                </div>

                <button type="submit" class="btn btn-primary">Assign Address</button>
            </form>
        </div>
    </body>
</html>
@endsection

