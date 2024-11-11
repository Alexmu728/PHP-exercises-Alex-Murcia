<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all(); // Corrección de typo en variable ($subjects)
        return view("subjects.index", compact("subjects"));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "name" => "required|string|max:255",
            "responsible" => "required|string|max:255"
        ]);

        Subject::create($validatedData);
        return redirect()->route("subjects.index")->with("success", "Subject created successfully");
    }

    public function edit(string $id)
    {
        $subject = Subject::findOrFail($id);
        return view("subjects.edit", compact("subject"));
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            "name" => "required|string|max:255",
            "responsible" => "required|string|max:255"
        ]);

        $subject = Subject::findOrFail($id);
        $subject->update($validatedData);

        return redirect()->route("subjects.index")->with("success", "Subject updated successfully");
    }

    public function destroy(string $id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();

        return redirect()->route("subjects.index")->with("success", "Subject deleted successfully");
    }
}

