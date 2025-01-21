<?php

namespace App\Http\Controllers;

use App\Models\Parking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ParkingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parkings = Parking::with('cars')->orderBy('name', 'asc')->get();

        return response()->json($parkings, 200);
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
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'location' => 'required',
                'capacity' => 'required|integer'
            ], $messages = [
                'required' => 'The :attribute field is required.',
                'name.required' => 'The name field is required.',
                'location.required' => 'The location field is required.',
                'capacity.required' => 'The capacity field is required.',
                'capacity.integer' => 'The capacity field must be an integer.'
            ]
        );

        if($validator->fails()){
            $errors = array();
            foreach ($validator->errors()->all() as $error) {
                array_push($errors, $error);
            }
            return response()->json([
                'errors' => $errors
            ], 200);
        }

        $parking = new Parking();
        $parking->name = $request->name;
        $parking->location = $request->location;
        $parking->capacity = $request->capacity;
        $parking->save();

        return response()->json([
            'message' => 'Parking created successfully',
            'parking' => $parking
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Parking $parking, $id)
    {
        $parking = Parking::with('cars')->findOrFail($id);

        if ($parking) {
            return response()->json([
                'parking' => $parking
            ], 200);
        } else {
            return response()->json([
                'message' => 'Parking not found'
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Parking $parking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Parking $parking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Parking $parking)
    {
        //
    }
}
