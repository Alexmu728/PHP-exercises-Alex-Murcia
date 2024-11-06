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
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $citizens = Citizen::all();
        $subjects = Subject::all();
        return view('tasks.create', compact('citizens', 'subjects'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'datetime' => 'required|date',
            'citizen_id' => 'required|exists:citizens,id'
        ]);

        Task::create($validatedData);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully');
    }

    public function edit(string $id)
    {
        $task = Task::findOrFail($id);
        $citizens = Citizen::all();
        $subjects = Subject::all();
        return view('tasks.edit', compact('task', 'citizens', 'subjects'));
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'datetime' => 'required|date',
            'citizen_id' => 'required|exists:citizens,id'
        ]);

        $task = Task::findOrFail($id);
        $task->update($validatedData);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully');
    }

    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully');
    }
}
