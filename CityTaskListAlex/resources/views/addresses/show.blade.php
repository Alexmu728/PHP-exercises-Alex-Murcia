// resources/views/addresses/show.blade.php

@extends('layouts.app')

@section('title', 'Address Details')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Address Details</h1>

    <div class="card">
        <div class="card-header">
            <h3>{{ $address->street }}, {{ $address->city }}</h3>
        </div>
        <div class="card-body">
            <p><strong>Street:</strong> {{ $address->street }}</p>
            <p><strong>City:</strong> {{ $address->city }}</p>
            <p><strong>State:</strong> {{ $address->state }}</p>
            <p><strong>Zip Code:</strong> {{ $address->zip }}</p>
            <p><strong>Created At:</strong> {{ $address->created_at->format('d-m-Y') }}</p>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('addresses.edit', $address->id) }}" class="btn btn-primary">Edit</a>

            <form action="{{ route('addresses.destroy', $address->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this address?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>

    <a href="{{ route('addresses.index') }}" class="btn btn-secondary mt-4">Back to Addresses</a>
</div>
@endsection
