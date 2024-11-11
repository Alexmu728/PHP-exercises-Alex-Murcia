@extends('layouts.app')

@section('title', 'Citizens')

@section('content')
<div class="container mt-5">
    <h1>Citizens</h1>

    <!-- Mostrar mensaje de éxito -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Formulario para agregar ciudadano -->
    <form action="{{ route('citizens.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="age" class="form-label">Age</label>
            <input type="number" class="form-control" id="age" name="age" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <button type="submit" class="btn btn-primary">Add citizen</button>
    </form>

    <h2 class="mt-5">Citizen list</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($citizens as $citizen)
                <tr>
                    <td>{{ $citizen->name }}</td>
                    <td>{{ $citizen->age }}</td>
                    <td>{{ $citizen->email }}</td>
                    <td>
                        <a href="{{ route('citizens.edit', $citizen->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('citizens.destroy', $citizen->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
