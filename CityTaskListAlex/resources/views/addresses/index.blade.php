@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>List of Addresses</h1>

    @if($addresses->isEmpty())
        <p>No addresses found.</p>
    @else

    <form action="{{ route('address.search') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="keyword" class="form-control" placeholder="Search addresses">
            <div class="input-group-append">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
    </form>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Citizen</th>
                    <th>Street</th>
                    <th>City</th>
                    <th>Postal Code</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($addresses as $address)
                    <tr>
                        <td>{{ $address->citizen->name }}</td>
                        <td>{{ $address->street }}</td>
                        <td>{{ $address->city }}</td>
                        <td>{{ $address->postal_code }}</td>
                        <td>
                        <a href="{{ route('addresses.edit', $address->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('addresses.destroy', $address->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    <div class="mb-3">
        <a href="{{ route('addresses.create') }}" class="btn btn-primary">Add New Address</a>
    </div>
</div>
@endsection
