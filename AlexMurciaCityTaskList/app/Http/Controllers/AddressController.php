<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address; 
use App\Models\Citizen;

class AddressController extends Controller
{
    /**
     * Muestra una lista de todas las direcciones.
     */
    public function index()
    {
        $addresses = Address::all(); // Obtén todas las direcciones
        return view('addresses.index', compact('addresses'));
    }

    /**
     * Muestra el formulario para crear una nueva dirección.
     */
    public function create()
    {
        $citizens = Citizen::all(); // Obtén todos los ciudadanos
        return view('addresses.create', compact('citizens')); // Muestra la vista create.blade.php
    }

    /**
     * Almacena una nueva dirección en la base de datos.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'citizen_id' => 'required|exists:citizens,id|unique:addresses', // Requiere un ciudadano existente y único en direcciones
            'street' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'postalCode' => 'required|string|max:10'
        ]);

        Address::create($validatedData); // Crea la dirección con los datos validados

        return redirect()->route('addresses.index')->with('success', 'Address created successfully');
    }

    /**
     * Muestra el formulario para editar una dirección existente.
     */
    public function edit(string $id)
    {
        $address = Address::findOrFail($id); // Busca la dirección por ID, o falla
        $citizens = Citizen::all(); // Obtiene todos los ciudadanos para el select
        return view('addresses.edit', compact('address', 'citizens')); // Muestra la vista edit.blade.php
    }

    /**
     * Actualiza la dirección en la base de datos.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'citizen_id' => 'required|exists:citizens,id|unique:addresses,citizen_id,' . $id,
            'street' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'postalCode' => 'required|string|max:10'
        ]);

        $address = Address::findOrFail($id); // Busca la dirección a actualizar
        $address->update($validatedData); // Actualiza con los datos validados

        return redirect()->route('addresses.index')->with('success', 'Address updated successfully');
    }

    /**
     * Elimina una dirección de la base de datos.
     */
    public function destroy(string $id)
    {
        $address = Address::findOrFail($id); // Encuentra y elimina la dirección
        $address->delete();

        return redirect()->route('addresses.index')->with('success', 'Address deleted successfully');
    }
}
