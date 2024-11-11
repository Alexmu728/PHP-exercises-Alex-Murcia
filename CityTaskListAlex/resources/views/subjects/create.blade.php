@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Subject</h1>

        <form action="{{ route('subjects.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Subject Name</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="responsible">Responsible</label>
                <input type="text" id="responsible" name="responsible" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Create Subject</button>
        </form>
    </div>
@endsection
