@extends("layouts.app")

@section("content")
    <div>
        <h1>Create Client</h1>

        <form action="{{route("clients.store")}}" method="POST"> 
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
            <div>
                <label for="dentist_id">Assign dentist</label>
                <select id="dentist_id" name="dentist_id">
                    @foreach($dentists as $dentist)
                        <option value="{{$dentist->id}}">{{$dentist->name}}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit">Create client</button>
        </form>
    </div>
@endsection