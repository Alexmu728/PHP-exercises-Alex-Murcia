@extends('layouts.app')

@section('title', 'Citizens')

@section('content')
<div class="container mt-5">
    <h1>Citizens</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('citizen.search') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="keyword" class="form-control" placeholder="Search citizens">
            <div class="input-group-append">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
    </form>

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
