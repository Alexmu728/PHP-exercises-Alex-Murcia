<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\LicensePlate;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        return Car::with('licensePlate')->get(); 
    }

    public function show($license_plate)
    {
        $licensePlate = LicensePlate::where('license_plate', $license_plate)->first();

        if (!$licensePlate) {
            return response()->json(['message' => 'License plate not found'], 404);
        }

        $car = Car::where('license_plate_id', $licensePlate->id)->first();

        if (!$car) {
            return response()->json(['message' => 'Car not found'], 404);
        }

        return response()->json($car);
    }

    public function storeCarInParkingLot(Request $request)
    {
        $validated = $request->validate([
            'model' => 'required|string|max:255',
            'size' => 'required|string|max:255',
            'license_plate' => 'required|unique:cars',
            'parking_lot_id' => 'required|exists:parking_lots,id',
        ]);

        $parkingLot = ParkingLot::findOrFail($validated['parking_lot_id']);
        
        $currentCarsCount = Car::where('parking_lot_id', $parkingLot->id)->count();
        
        if ($currentCarsCount >= $parkingLot->capacity) {
            return response()->json([
                'error' => 'Parking lot has reached its capacity.'
            ], 400);
        }

        $car = Car::create([
            'model' => $validated['model'],
            'size' => $validated['size'],
            'license_plate' => $validated['license_plate'],
            'parking_lot_id' => $validated['parking_lot_id'],
        ]);

        return response()->json($car, 201);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'license_plate_id' => 'required|exists:license_plates,id',
            'model' => 'required|string|max:255',
            'size' => 'required|string|max:255',
            'parking_lot_id' => 'required|exists:parking_lots,id',
        ]);


        $car = Car::create($validated);

        return response()->json($car, 201);
    }


    public function getLicensePlates()
    {
        $plates = LicensePlate::all();
        return response()->json($plates);
    }

    public function storeLicensePlate(Request $request)
    {
        $validated = $request->validate([
            'license_plate' => 'required|unique:cars',
        ]);

        $licensePlate = LicensePlate::create([
            'license_plate' => $validated['license_plate']
        ]);

        return response()->json($licensePlate, 201);
    }
    public function latest()
    {
        return Car::latest()->take(10)->get();
    }

}
