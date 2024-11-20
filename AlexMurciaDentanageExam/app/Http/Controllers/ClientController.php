<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Dentist;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $clients= Client::with(["dentist"])->get();
        return view("clients.index", compact("clients"));

    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $dentists=Dentist::all();
        return view("clients.create")->with("dentists", $dentists);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData=$request->validate([
            "name"=>  "required|string|max:225",
            "surname"=>"required|string|max:225",
            "dni"=>"required|string|max:225",
            "date_of_birth"=>"required|date",
            "dentist_id"=>"required|exists:dentists,id",
        ]);

        /*$client=Client::create([
            "name"=>$validatedData["name"],
            "surname"=>$validatedData["surname"],
            "dni"=>$validatedData["dni"],
            "date_of_birth"=> $validatedData["date_of_birth"],
            "dentist_id"=>$validatedData["dentist_id"],
        ]);*/

        Client::create($validatedData);

        return redirect()->route("clients.index")->with("success", "Client created successfully");
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $client=Client::findOrFail($id);
        $client->delete();

        return  redirect()->route("clients.index")->with("success", "Client deleted successfully");
    }
}
