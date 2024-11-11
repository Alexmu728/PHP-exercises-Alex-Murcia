<?php

namespace App\Http\Controllers;

use App\Models\Citizen;
use Illuminate\Http\Request;

class CitizenController extends Controller
{
    public function index()
    {
        $citizens = Citizen::all();
        return view('citizens.index', compact('citizens'));
    }
    
    public function create()
    {
        return view('citizens.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'email' => 'required|email|unique:citizens,email',
            'date_pf_birth' => 'required|date',
            'gender' => 'required|in:male,female,other',
            'street' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'postal_code' => 'required|string|max:255',
        ]);

        $citizen = Citizen::create([
            'name' => $validatedData['name'],
            'age' => $validatedData['age'],
            'email' => $validatedData['email'],
            'date_pf_birth' => $validatedData['date_pf_birth'],
            'gender' => $validatedData['gender'],
        ]);

        $citizen->address()->create([
            'street' => $validatedData['street'],
            'city' => $validatedData['city'],
            'postal_code' => $validatedData['postal_code'],
        ]);

        return redirect()->route('citizens.index')->with('success', 'Citizen created successfully');
    }

    public function show(string $id)
    {
        //
        $citizen=Citizen::findOrFail($id);
        return view("citizens.show", compact("citizen"));
    }

    public function edit(string $id)
    {
        //
        $citizen=Citizen::findOrFail($id);
        return view("citizens.edit", compact("citizen"));
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'email' => 'required|email|unique:citizens,email,' . $id,
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:male,female,other'
        ]);

        $citizen = Citizen::findOrFail($id);
        $citizen->update($validatedData);

        return redirect()->route('citizens.index')->with('success', 'Citizen updated successfully');
    }

    public function destroy(string $id)
    {
        //
        $citizen=Citizen::findOrFail($id);
        $citizen->delete();
        return redirect()->route("citizens.index")->with("success", "Citizen deleted successfully");
    }
}

