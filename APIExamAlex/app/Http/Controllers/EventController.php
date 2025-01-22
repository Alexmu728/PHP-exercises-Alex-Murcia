<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\User;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::orderBy('name')->get();

        return response()->json($events);
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
            'date' => 'required|date',
            'description' => 'required|string|max:255',
        ]);

        $events = Event::create($validatedData);

        return response()->json($events, 201);
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
        $events = Event::where('name', $name)->first();

        if (!$events) {
            return response()->json(['message' => 'Event not found'], 404);
        }

        $events->delete();

        return response()->json(['message' => 'Event deleted successfully']);
    }

    public function attendants($eventid)
    {
        $event = Event::findOrFail($eventid);

        $attendants = $event->dentists;

        return response()->json($attendants);
    }
}
