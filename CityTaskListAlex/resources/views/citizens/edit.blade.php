@extends('layouts.app')

@section('title', 'Edit Citizen')

@section('content')
<div class="container mt-5">
    <h1>Edit Citizen</h1>

    <form action="{{ route('citizens.update', $citizen->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $citizen->name) }}" required>
        </div>

        <div class="form-group">
            <label for="age">Age</label>
            <input type="number" id="age" name="age" class="form-control" value="{{ old('age', $citizen->age) }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $citizen->email) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Citizen</button>
    </form>
</div>
@endsection
