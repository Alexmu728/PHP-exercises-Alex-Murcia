<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class SubjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    $this->middleware(function ($request, $next) {
        if (auth()->user()->role_id != 1) { // Verifica si el rol del usuario es 'admin'
            abort(403, 'Acción no autorizada');
        }
        return $next($request);
    });
    }

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
        // Validación del campo 'name'
        $request->validate([
            'name' => 'required|unique:subjects',
        ]);
    
        // Asignar un valor predeterminado para 'responsible'
        $data = $request->all();
        $data['responsible'] = auth()->user()->id;  // Asignar el ID del usuario autenticado como responsable
    
        // Crear el nuevo subject
        Subject::create($data);
    
        return redirect()->route('subjects.index');
    }

    public function edit(Subject $subject)
    {
        return view('subjects.edit', compact('subject'));
    }

    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'name' => 'required|unique:subjects,name,' . $subject->id,
        ]);

        $subject->update($request->all());

        return redirect()->route('subjects.index');
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();

        return redirect()->route('subjects.index');
    }
}


