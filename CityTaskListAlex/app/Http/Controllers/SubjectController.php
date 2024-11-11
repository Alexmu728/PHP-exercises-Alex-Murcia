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
}


