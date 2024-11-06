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

    public function search(Request $request){
        $request->validate([
            "keyword" => "required|string|max:255"
        ]);
        $keyword=$request->input("keyword");

        $tasks= Task::where("title", "LIKE", "%{$keyword}%")->orWhere("description", "LIKE", "%{$keyword}%")->get();
        
        return view("tasks.index", compact("tasks"))->with("success", "Search completed");
    }

    public function filter(Request $request)
    {
        $filters = $request->only(['title', 'description', 'citizen_id', 'datetime', 'operator']);
        $query = Task::query();

        if($filters["operator"]==="or") {
            $query->where(function ($query) use ($filters) {
                foreach ($filters as $key => $value) {
                    if ($value && $key !== 'operator') {
                        $query->orWhere($key, 'LIKE', "%{$value}%");
                    }
                }
            });
        }else{
            foreach($filters as $key => $value) {
                if ($value && $key !== 'operator') {
                    $query->where($key, 'LIKE', "%{$value}%");
                }
            }
        }

        $tasks = $query->get();

        return view('tasks.index', compact('tasks'));
    }

    public function recent(){
        $tasks=Task::orderBy("created_at", "desc")->take(12)->get();
        return view("tasks.recent", compact("tasks"));
    }
}
