@extends("layouts.app")

@section("title", "AlexMurcia exam")

@section("content")

<div>
    <h1>Dentists</h1>

    @if(session("success"))
        <div>{{session("success")}}</div>
    @endif

    <a href="{{route("dentists.create")}}"><button>Create dentists</button></button></a>

    <h2>Dentists list</h2>
    <table>
        <thead>
            <tr>
                <th>Name</th>
            </tr>
            <tr>
                <th>Surname</th>
            </tr>
            <tr>
                <th>dni</th>
            </tr>
            <tr>
                <th>Birth date</th>
            </tr>
            <tr>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($dentists as $dentist)
                <tr>
                    <td>{{$dentist->name}}</td>
                    <td>{{$dentist->surname}}</td>
                    <td>{{$dentist->dni}}</td>
                    <td>{{$dentist->date_of_birth}}</td>
                    <td>
                        <a href="{{route("dentists.edit", $dentist->id)}}"><button>Edit</button></a>

                        <form action="{{route("dentists.destroy", $dentist->id)}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection