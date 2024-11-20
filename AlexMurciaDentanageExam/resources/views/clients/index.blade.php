@extends("layouts.app")

@section("title", "AlexMurcia exam")

@section("content")

<p>
    <h1>Clients</h1>

    @if(session("success"))
        <div>{{session("success")}}</div>
    @endif

    <a href="{{route("clients.create")}}"><button>Create clients</button></a>

    <h2>Clients list</h2>
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
                <th>Dentist</th>
            </tr>
            <tr>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($clients as $client)
                <tr>
                    <td>{{$client->name}}</td>
                    <td>{{$client->surname}}</td>
                    <td>{{$client->dni}}</td>
                    <td>{{$client->date_of_birth}}</td>
                    <td>
                        <form action="{{route("clients.destroy", $client->id)}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <p>*tried to put the dentist that belongs to the client but it would`t work</p>
</div>
@endsection