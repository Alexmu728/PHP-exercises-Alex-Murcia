<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParkingLot extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'capacity', 'location'];

    public function cars()
    {
        return $this->hasMany(Car::class);
    }
}
