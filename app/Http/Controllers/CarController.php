<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::all();

        return response()->json($cars, 200);
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
                'license_plate' => 'required',
                'model' => 'required',
                'size' => 'required|integer',
                'parking_id' => 'required|integer'
            ], $messages = [
                'required' => 'The :attribute field is required.',
                'integer' => 'The :attribute field must be an integer.',
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

        $car = new Car();
        $car->license_plate = strtoupper($request->license_plate);
        $car->model = $request->model;
        $car->size = $request->size;
        $car->parking_id = $request->parking_id;
        $car->save();

        return response()->json([
            'message' => 'Car saved successfully',
            'car' => $car
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car, $license_plate)
    {
        $license_plate = strtoupper($license_plate);
        $car = Car::where('license_plate', '=', $license_plate)->first();

        if(!$car){
            return response()->json([
                'error' => 'Car not found'
            ], 404);
        }

        return response()->json($car, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $car = car::findOrFail($id);

        $car->delete();

        return response()->json([
            "message" => "Car deleted successfully"
        ], 200);
    }

    /**
     * Get the 10 latests cars
     */
    public function latest()
    {
        $cars = Car::orderBy('updated_at', 'desc')->take(10)->get();
        return response()->json($cars, 200);
    }
}
