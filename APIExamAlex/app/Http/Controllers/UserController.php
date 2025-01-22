<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Event;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('name')->get();

        return response()->json($users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'dni' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
        ]);

        $users = User::create($validatedData);

        return response()->json($users, 201);
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
    public function destroy($name)
    {
        $users = User::where('name', $name)->first();

        if (!$users) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $users->delete();

        return response()->json(['message' => 'User deleted successfully']);
    }

    public function dentists(){
        $user = User::where('role', 'dentist')->get();

        if(!$user){
            return response()->json(['message' => 'There are no dentists'], 404);
        }
        return response()->json($user);
    }

    public function enroll(Request $request){
        $validated=$request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'dni' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'event_id'=>'required|exists:event_id',
        ]);

        $event= Event::find($validated['event_id']);

        $user=User::create($validated);

        return response()->json($user, 201);
    }

    public function assigned($dentistid){
        $user = User::where('id', $dentistid)->first();

        $events=Event::with($user)->get();

        return response()->json($events, 201);
    }
}
