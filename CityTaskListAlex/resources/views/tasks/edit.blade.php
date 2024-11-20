@extends('layouts.app')

@section('title', 'Edit Task')

@section('content')
<div class="container">
    <h1>Edit Task</h1>

    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $task->title) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" class="form-control" required>{{ old('description', $task->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="citizen_id">Citizen</label>
            <select id="citizen_id" name="citizen_id" class="form-control" required>
                @foreach($citizens as $citizen)
                    <option value="{{ $citizen->id }}" {{ $citizen->id == $task->citizen_id ? 'selected' : '' }}>{{ $citizen->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="subjects">Subjects</label>
            <select id="subjects" name="subjects[]" class="form-control" multiple>
                @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}" {{ in_array($subject->id, $task->subjects->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $subject->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Task</button>
    </form>
</div>
@endsection
