<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $subjetcs=Subjects::all();
        return view("subjects.index", compact("subjects"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("subjects.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData=$request->validate([
            "name"=> "required|string|max:255",
            "responsible"=> "required|string|max:255"
        ]);

        Subject::create($validatedData);
        return redirect()->route("subjects.index")->with("success", "Subject created succesfully");
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
        $subject =Subject::findOrFail($id);
        return view("subjects.edit", compact("subject"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validatedData=$request->validate([
            "name"=> "required|string|max:255",
            "responsible"=> "required|string|max:255"
        ]);

        $subject=Subject::findOrFail($id);
        $subject->update($validatedData);
        return redirect()->route("subjects.index")->with("success", "Subject updated succesfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $subject=Subject::findOrFail($id);
        $subject->delete();
        return redirect()->route("subjects.index")->with("success", "Subject deleted successfully");
    }
}
