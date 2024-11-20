@extends('layouts.app')

@section('title', 'Edit Subject')

@section('content')
<div class="container">
    <h1>Edit Subject</h1>

    <form action="{{ route('subjects.update', $subject->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Subject Name</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $subject->name) }}" required>
        </div>

        <div class="form-group">
            <label for="responsible">Responsible Person</label>
            <input type="text" id="responsible" name="responsible" class="form-control" value="{{ old('responsible', $subject->responsible) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Subject</button>
    </form>
</div>
@endsection
