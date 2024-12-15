<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'license_plate_id',
        'model',
        'size',
        'parking_lot_id',
    ];

    public function licensePlate()
    {
        return $this->belongsTo(LicensePlate::class);
    }

    public function parkingLot()
    {
        return $this->belongsTo(ParkingLot::class);
    }
}
