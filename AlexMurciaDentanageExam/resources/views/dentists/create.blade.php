@extends("layouts.app")

@section("content")
    <div>
        <h1>Create Dentist</h1>

        <form action="{{route("dentists.store")}}" method="POST"> 
            @csrf
            <div>
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div>
                <label for="surname">Surname</label>
                <input type="text" id="surname" name="surname" required>
            </div>
            <div>
                <label for="dni">DNI</label>
                <input type="text" id="dni" name="dni" required>
            </div>
            <div>
                <label for="date_of_birth">Date of birth</label>
                <input type="date" id="date_of_birth" name="date_of_birth" required>
            </div>

            <button type="submit">Create dentist</button>
        </form>
        <p>*tried to add the onVacation boolean but I didn`t know how and after looking and trying it would`t work</p>
    </div>
@endsection