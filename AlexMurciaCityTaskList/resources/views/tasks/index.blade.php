<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Task</title>
    <!-- Agrega Bootstrap o tus propios estilos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-5">
        <h1>Create task</h1>

        <!-- Formulario de creación de tarea -->
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

        <!-- Formulario de búsqueda de tareas -->
        <form action="{{ route('tasks.search') }}" method="GET" class="mt-4">
            <input type="text" name="keyword" placeholder="Search tasks" class="form-control mb-3">
            <button type="submit" class="btn btn-primary">Search</button>
        </form>

        <!-- Formulario de filtrado de tareas -->
        <form action="{{ route('tasks.filter') }}" method="GET" class="mt-4">
            <input type="text" name="title" placeholder="Title" class="form-control mb-3">
            <input type="text" name="description" placeholder="Description" class="form-control mb-3">
            <input type="date" name="datetime" class="form-control mb-3">
            <select name="operator" class="form-select mb-3">
                <option value="and">AND</option>
                <option value="or">OR</option>
            </select>
            <button type="submit" class="btn btn-primary">Filter</button>
        </form>

    </div>

    <!-- Agregar el script de Bootstrap si lo necesitas -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
