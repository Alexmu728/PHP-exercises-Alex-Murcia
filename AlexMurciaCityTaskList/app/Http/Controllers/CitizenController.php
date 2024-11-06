<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Citizen;

class CitizenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $citizens=Citizen::all();
        return view("citizens.index", compact("citizens"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("citizens.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData=$request->validate([
            "name"=> "required|string|max:225",
            "age"=> "required|integer",
            "email"=> "required|email|unique:citizens",
            "date_pf_birth"=> "required|date",
            "gender"=> "required|in:male,female,other"
        ]);

        Citizen::create($validatedData);
        return redirect()->route("citizens.index")->with("success", "Citizen created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $citizen=Citizen::findOrFail($id);
        return view("citizens.show", compact("citizen"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $citizen=Citizen::findOrFail($id);
        return view("citizens.edit", compact("citizen"));
    }

    /**
     * Update the specified resource in storage.
     */
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

        return redirect()->route('citizens.index')->with('success', 'Ciudadano actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $citizen=Citizen::findOrFail($id);
        $citizen->delete();
        return redirect()->route("citizens.index")->with("success", "Citizen deleted successfully");
    }
}
