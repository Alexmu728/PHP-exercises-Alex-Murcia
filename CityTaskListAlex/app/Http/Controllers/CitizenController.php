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
            'age' => 'required|integer|min:0',
            'email' => 'required|email|unique:citizens,email',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:male,female,other',
        ]);

        Citizen::create($validatedData);

        return redirect()->route('citizens.index')->with('success', 'Citizen created successfully!');
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'email' => 'required|email',
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
    public function edit($id)
    {
        $citizen = Citizen::findOrFail($id);
        return view('citizens.edit', compact('citizen'));
    }

    public function search(Request $request)
    {
        $request->validate([
            'keyword' => 'required|string|max:255',
        ]);

        $keyword = $request->input('keyword');
        $citizens = Citizen::where('name', 'LIKE', "%{$keyword}%")
                            ->orWhere('email', 'LIKE', "%{$keyword}%")
                            ->orWhere('phone', 'LIKE', "%{$keyword}%")
                            ->get();

        return view('citizens.index', compact('citizens'))->with('success', 'Search completed.');
    }
    public function show($id)
    {
        // Buscar el ciudadano por ID
        $citizen = Citizen::findOrFail($id);

        // Retornar la vista show.blade.php con los datos del ciudadano
        return view('citizens.show', compact('citizen'));
    }
}

