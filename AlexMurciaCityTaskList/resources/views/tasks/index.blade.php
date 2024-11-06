@section('content')

<div class="container">
    <h1>Create task</h1>

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
            <label for="datetime" class="form-label">Date and time</label>
            <input type="datetime-local" class="form-control" id="datetime" name="datetime" required>
        </div>

        <div class="mb-3">
            <label for="citizen_id" class="form-label">Select a citizen</label>
            <select name="citizen_id" id="citizen_id" class="form-select" required>
                <option value="">Select a citizen</option>
                @foreach($citizens as $citizen)
                <option value="{{ $citizen->id }}">{{ $citizen->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="subjects" class="form-label">Select a subject</label>
            <div class="form-check">
                @foreach($subjects as $subject)
                <input type="checkbox" name="subjects[]" value="{{ $subject->id }}" class="form-check-input" id="subject_{{ $subject->id }}">
                <label for="subject_{{ $subject->id }}" class="form-check-label">{{ $subject->name }}</label><br>
                @endforeach
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Create task</button>
    </form>
</div>
@endsection
