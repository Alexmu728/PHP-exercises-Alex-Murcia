@extends('layouts.app')

@section('title', 'Tasks List')

@section('content')
<div class="container mt-5">
    <h1>Tasks List</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Botón para agregar tarea -->
    <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Add Task</a>

    <h2 class="mt-5">Task list</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Citizen</th>
                <th>Date and Time</th>
                <th>Subjects</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->citizen->name }}</td>
                    <td>{{ \Carbon\Carbon::parse($task->datetime)->format('d-m-Y H:i') }}</td>
                    <td>
                        @foreach($task->subjects as $subject)
                            <span class="badge badge-secondary">{{ $subject->name }}</span>
                        @endforeach
                    </td>
                    <td>
                        <!-- Acción de eliminar tarea -->
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
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
