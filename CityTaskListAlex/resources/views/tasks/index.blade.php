@extends('layouts.app')

@section('title', 'Create Task')

@section('content')
<div class="container mt-5">
    <h1>Create Task</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
        </div>
        <div class="mb-3">
            <label for="datetime" class="form-label">Date and Time</label>
            <input type="datetime-local" class="form-control" id="datetime" name="datetime" required>
        </div>

        <div class="mb-3">
            <label for="citizen_id" class="form-label">Select a Citizen</label>
            <select name="citizen_id" id="citizen_id" class="form-select" required>
                <option value="">Select a citizen</option>
                @foreach($citizens as $citizen)
                    <option value="{{ $citizen->id }}">{{ $citizen->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="subjects" class="form-label">Select Subjects
