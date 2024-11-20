<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all(); 
        return view('subjects.index', compact('subjects')); 
    }

    public function create()
    {
        return view('subjects.create');
    }

    public function edit($id)
    {
        $subject = Subject::findOrFail($id);
        return view('subjects.edit', compact('subject')); 
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'responsible' => 'required|string|max:255',
        ]);

        $subject = Subject::findOrFail($id);
        $subject->update($validatedData);

        return redirect()->route('subjects.index')->with('success', 'Subject updated successfully');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'responsible' => 'required|string|max:255',
        ]);

        Subject::create([
            'name' => $request->name,
            'responsible' => $request->responsible,
        ]);

        return redirect()->route('subjects.index')->with('success', 'Subject created successfully.');
    }
    public function search(Request $request)
    {
        $request->validate([
            'keyword' => 'required|string|max:255',
        ]);

        $keyword = $request->input('keyword');
        $subjects = Subject::where('name', 'LIKE', "%{$keyword}%")
                        ->orWhere('description', 'LIKE', "%{$keyword}%")
                        ->get();

        return view('subjects.index', compact('subjects'))->with('success', 'Search completed.');
    }

    public function show($id)
    {
        // Buscar el subject por ID
        $subject = Subject::findOrFail($id);

        // Retornar la vista show.blade.php con los datos del subject
        return view('subjects.show', compact('subject'));
    }
}


