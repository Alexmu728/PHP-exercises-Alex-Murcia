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
        return view('addresses.create', compact("citizens"));
    }

    public function store(Request $request)
    {
        $request->validate([
            'citizen_id' => 'required|exists:citizens,id',
            'street' => 'required|string',
            'city' => 'required|string',
            'postal_code' => 'required|string', // Cambiado 'postalCode' a 'postal_code'
        ]);

        Address::create([
            'citizen_id' => $request->citizen_id,
            'street' => $request->street,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
        ]);

        return redirect()->route('addresses.index')->with('success', 'Address assigned successfully.');
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'citizen_id' => 'required|exists:citizens,id|unique:addresses,citizen_id,' . $id,
            'street' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'postal_code' => 'required|string|max:10' // Cambiado 'postalCode' a 'postal_code'
        ]);

        $address = Address::findOrFail($id);
        $address->update($validatedData);

        return redirect()->route('addresses.index')->with('success', 'Address updated successfully');
    }

    public function destroy(string $id)
    {
        $address = Address::findOrFail($id); 
        $address->delete();

        return redirect()->route('addresses.index')->with('success', 'Address deleted successfully');
    }
}