@extends('layouts.app')

@section('title', 'Citizens')

@section('content')
<div class="container mt-5">
    <h1>Citizens</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Enlace para redirigir a la página de creación de ciudadanos -->
    <a href="{{ route('citizens.create') }}" class="btn btn-primary mb-3">Add Citizen</a>

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
                    <!-- Botón de Editar -->
                    <a href="{{ route('citizens.edit', $citizen->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <!-- Formulario para eliminar al ciudadano -->
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
