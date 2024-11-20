@extends("layouts.app")

@section("title", "AlexMurcia exam")

@section("content")

<div>
    <h1>Edit Dentist</h1>

    <form action="{{route("dentists.update", $dentist->id)}}" method="POST">
        @csrf
        @method("PUT")

        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{old("name", $dentist->name)}}" required>
        </div>
        <div>
            <label for="surname">Surname</label>
            <input type="text" id="surname" name="surname" value="{{old("surname", $dentist->surname)}}" required>
        </div>
        <div>
            <label for="dni">DNI</label>
            <input type="text" id="dni" name="dni" value="{{old("dni", $dentist->dni)}}" required>
        </div>
        <div>
            <label for="date_of_birth">Date of birth</label>
            <input type="date" id="date_of_birth" name="date_of_birth" value="{{old("date_of_birth", $dentist->date_of_birth)}}" required>
        </div>

        <button type="submit">Update Dentist</button>
    </form>
</div>
@endsection