@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Task</h1>

        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="due_date">Due Date</label>
                <input type="date" id="due_date" name="due_date" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="citizen_id">Citizen</label>
                <select id="citizen_id" name="citizen_id" class="form-control" required>
                    @foreach($citizens as $citizen)
                        <option value="{{ $citizen->id }}">{{ $citizen->name }}</option>
                    @endforeach
                </select>
            </div>

            <h3>Subjects</h3>
            <div class="form-group">
                <label for="subjects">Select Subjects</label>
                <select id="subjects" name="subjects[]" class="form-control" multiple>
                    @foreach($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Create Task</button>
        </form>
    </div>
@endsection
