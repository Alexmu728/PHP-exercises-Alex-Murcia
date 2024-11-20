// resources/views/subjects/show.blade.php

@extends('layouts.app')

@section('title', 'Subject Details')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Subject Details</h1>

    <div class="card">
        <div class="card-header">
            <h3>{{ $subject->name }}</h3>
        </div>
        <div class="card-body">
            <p><strong>Description:</strong> {{ $subject->description }}</p>
            <p><strong>Created At:</strong> {{ $subject->created_at->format('d-m-Y') }}</p>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('subjects.edit', $subject->id) }}" class="btn btn-primary">Edit</a>

            <form action="{{ route('subjects.destroy', $subject->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this subject?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>

    <a href="{{ route('subjects.index') }}" class="btn btn-secondary mt-4">Back to Subjects</a>
</div>
@endsection
