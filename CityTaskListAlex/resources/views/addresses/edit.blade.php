@extends('layouts.app')

@section('title', 'Edit Address')

@section('content')
<div class="container">
    <h1>Edit Address</h1>

    <form action="{{ route('addresses.update', $address->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="citizen_id">Citizen</label>
            <select id="citizen_id" name="citizen_id" class="form-control" required>
                @foreach($citizens as $citizen)
                    <option value="{{ $citizen->id }}" {{ $citizen->id == $address->citizen_id ? 'selected' : '' }}>{{ $citizen->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="street">Street</label>
            <input type="text" id="street" name="street" class="form-control" value="{{ old('street', $address->street) }}" required>
        </div>

        <div class="form-group">
            <label for="city">City</label>
            <input type="text" id="city" name="city" class="form-control" value="{{ old('city', $address->city) }}" required>
        </div>

        <div class="form-group">
            <label for="postal_code">Postal Code</label>
            <input type="text" id="postal_code" name="postal_code" class="form-control" value="{{ old('postal_code', $address->postal_code) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Address</button>
    </form>
</div>
@endsection
