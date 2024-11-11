@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Address</h1>

        <form action="{{ route('addresses.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="citizen_id">Citizen</label>
                <select id="citizen_id" name="citizen_id" class="form-control" required>
                    @foreach($citizens as $citizen)
                        <option value="{{ $citizen->id }}">{{ $citizen->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="street">Street</label>
                <input type="text" id="street" name="street" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="city">City</label>
                <input type="text" id="city" name="city" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="postal_code">Postal Code</label>
                <input type="text" id="postal_code" name="postal_code" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Create Address</button>
        </form>
    </div>
@endsection
