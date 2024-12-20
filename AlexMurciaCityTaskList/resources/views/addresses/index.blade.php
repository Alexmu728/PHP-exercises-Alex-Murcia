@section('content')
<html>
    <head>
        <title>Addresses</title>
    </head>
    <body>
        <div class="container">
            <h1>Asign addresses</h1>

            <form action="{{ route('addresses.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="citizen_id" class="form-label">Select a citizen</label>
                    <select name="citizen_id" id="citizen_id" class="form-select" required>
                        <option value="">Select a citizen</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="street" class="form-label">Street</label>
                    <input type="text" class="form-control" id="street" name="street" required>
                </div>
                <div class="mb-3">
                    <label for="city" class="form-label">City</label>
                    <input type="text" class="form-control" id="city" name="city" required>
                </div>
                <div class="mb-3">
                    <label for="postalCode" class="form-label">Postal code</label>
                    <input type="text" class="form-control" id="postalCode" name="postalCode" required>
                </div>
                <button type="submit" class="btn btn-primary">Assign address</button>
            </form>
        </div>
        @endsection
    </body>
</html>
