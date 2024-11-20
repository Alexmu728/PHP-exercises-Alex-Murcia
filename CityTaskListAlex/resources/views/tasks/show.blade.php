@extends('layouts.app')

@section('title', 'Task Details')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Task Details</h1>

    <div class="card">
        <div class="card-header">
            <h3>{{ $task->title }}</h3>
        </div>
        <div class="card-body">
            <p><strong>Description:</strong> {{ $task->description }}</p>
            <p><strong>Due Date:</strong> {{ $task->due_date }}</p>
            <p><strong>Citizen:</strong> {{ $task->citizen->name }}</p>
            <p><strong>Subjects:</strong>
                @if($task->subjects->isEmpty())
                    No subjects assigned.
                @else
                    <ul>
                        @foreach($task->subjects as $subject)
                            <li>{{ $subject->name }}</li>
                        @endforeach
                    </ul>
                @endif
            </p>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary">Edit</a>

            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this task?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>

    <a href="{{ route('tasks.index') }}" class="btn btn-secondary mt-4">Back to Tasks</a>
</div>
@endsection
