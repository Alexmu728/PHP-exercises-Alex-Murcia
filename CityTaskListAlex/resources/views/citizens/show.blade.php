// resources/views/citizens/show.blade.php

@extends('layouts.app')

@section('title', 'Citizen Details')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Citizen Details</h1>

    <div class="card">
        <div class="card-header">
            <h3>{{ $citizen->name }}</h3>
        </div>
        <div class="card-body">
            <p><strong>Name:</strong> {{ $citizen->name }}</p>
            <p><strong>Email:</strong> {{ $citizen->email }}</p>
            <p><strong>Phone:</strong> {{ $citizen->phone }}</p>
            <p><strong>Created At:</strong> {{ $citizen->created_at->format('d-m-Y') }}</p>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('citizens.edit', $citizen->id) }}" class="btn btn-primary">Edit</a>

            <form action="{{ route('citizens.destroy', $citizen->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this citizen?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>

    <a href="{{ route('citizens.index') }}" class="btn btn-secondary mt-4">Back to Citizens</a>
</div>
@endsection
