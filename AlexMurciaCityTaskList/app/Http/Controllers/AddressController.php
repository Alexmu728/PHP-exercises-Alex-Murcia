<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address; 
use App\Models\Citizen;

class AddressController extends Controller
{
    public function index()
    {
        $addresses = Address::all();
        return view('addresses.index', compact('addresses'));
    }

    public function create()
    {
        $citizens = Citizen::all(); 
        return view('addresses.create', compact('citizens'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'citizen_id' => 'required|exists:citizens,id|unique:addresses',
            'street' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'postalCode' => 'required|string|max:10'
        ]);

        Address::create($validatedData);

        return redirect()->route('addresses.index')->with('success', 'Dirección creada correctamente.');
    }

    public function edit(string $id)
    {
        $address = Address::findOrFail($id);
        $citizens = Citizen::all();
        return view('addresses.edit', compact('address', 'citizens'));
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'citizen_id' => 'required|exists:citizens,id|unique:addresses,citizen_id,' . $id,
            'street' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'postalCode' => 'required|string|max:10'
        ]);

        $address = Address::findOrFail($id);
        $address->update($validatedData);

        return redirect()->route('addresses.index')->with('success', 'Dirección actualizada correctamente.');
    }

    public function destroy(string $id)
    {
        $address = Address::findOrFail($id);
        $address->delete();

        return redirect()->route('addresses.index')->with('success', 'Dirección eliminada correctamente.');
    }
}
