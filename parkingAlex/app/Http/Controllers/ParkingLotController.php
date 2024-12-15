<?php

namespace App\Http\Controllers;

use App\Models\ParkingLot;

class ParkingLotController extends Controller
{
    public function index()
    {
        $parkingLots = ParkingLot::with('cars')->orderBy('name')->get();
        return response()->json($parkingLots);
    }
}
