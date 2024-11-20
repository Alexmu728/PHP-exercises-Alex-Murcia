<?php

namespace App\Http\Controllers;

use App\Models\Dentist;
use Illuminate\Http\Request;

class DentistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $dentists=Dentist::all();
        return view("dentists.index", compact("dentists"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("dentists.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData=$request->validate([
            "name"=> "required|string|max:225",
            "surname"=> "required|string|max:225",
            "dni"=>"required|string|max:225",
            "date_of_birth"=>"required|date",
        ]);
    

        Dentist::create($validatedData);

        return redirect()->route("dentists.index")->with("success", "Dentist created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $dentist=Dentist::findOrFail($id);

        return view("dentists.edit", compact("dentist"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validatedData=$request->validate([
            "name"=>"required|string|max:225",
            "surname" => "required|string|max:225",
            "dni"=> "required|string|max:225",
        ]);

        $dentist=Dentist::findOrFail($id);
        $dentist->update($validatedData);

        return redirect()->route("dentists.index")-> with("success", "Dentist edited successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        $dentist=Dentist::findOrFail($id);
        $dentist->delete();
        return redirect()->route("dentists.index")->with("success", "Dentist deleted successfully");
    }
}
