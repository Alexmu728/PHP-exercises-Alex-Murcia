<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Citizen;
use App\Models\Subject;

class TaskController extends Controller
{
    public function index()
{
    $tasks = Task::with(['citizen', 'subjects'])->get();

    return view('tasks.index', compact('tasks'));
}

    public function create()
    {
        $citizens = Citizen::all();
        $subjects = Subject::all();
        return view('tasks.create')->with('citizens', $citizens)->with('subjects', $subjects);

    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        $citizens = Citizen::all(); 
        $subjects = Subject::all(); 
        return view('tasks.edit', compact('task', 'citizens', 'subjects')); 
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'citizen_id' => 'required|exists:citizens,id',
            'subjects' => 'required|array',
        ]);

        $task = Task::findOrFail($id);
        $task->update([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'citizen_id' => $validatedData['citizen_id'],
        ]);

        $task->subjects()->sync($validatedData['subjects']);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'due_date' => 'required|date',
            'citizen_id' => 'required|exists:citizens,id',
            'subjects' => 'required|array', 
        ]);

        $task = Task::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'due_date' => $validatedData['due_date'],
            'citizen_id' => $validatedData['citizen_id'],
        ]);

        $task->subjects()->sync($validatedData['subjects']);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully');
    }

    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully');
    }

    public function search(Request $request)
    {
        $request->validate([
            'keyword' => 'required|string|max:255',
        ]);

        $keyword = $request->input('keyword');
        $tasks = Task::where('title', 'LIKE', "%{$keyword}%")
                    ->orWhere('description', 'LIKE', "%{$keyword}%")
                    ->get();

        return view('tasks.index', compact('tasks'))->with('success', 'Search completed.');
    }

    public function show($id)
    {
        $task = Task::findOrFail($id); 
        return view('tasks.show', compact('task')); 
    }
}
