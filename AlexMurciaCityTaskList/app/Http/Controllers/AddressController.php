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
        // Validación de los datos
        $request->validate([
            'citizen_id' => 'required|exists:citizens,id',
            'street' => 'required|string',
            'city' => 'required|string',
            'postalCode' => 'required|string',
        ]);

        // Crear la dirección
        Address::create([
            'citizen_id' => $request->citizen_id,
            'street' => $request->street,
            'city' => $request->city,
            'postal_code' => $request->postalCode,
        ]);

        // Redirigir después de guardar la dirección
        return redirect()->route('citizens.index')->with('success', 'Address assigned successfully.');
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

        return redirect()->route('addresses.index')->with('success', 'Address updated successfully');
    }

    public function destroy(string $id)
    {
        $address = Address::findOrFail($id); 
        $address->delete();

        return redirect()->route('addresses.index')->with('success', 'Address deleted successfully');
    }
}
