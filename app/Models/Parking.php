<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parking extends Model
{
    protected $fillable = [
        'name',
        'location',
        'capacity',
    ];

    public function cars()
    {
        return $this->hasMany(Car::class);
    }
}
