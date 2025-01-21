<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'license_plate',
        'model',
        'size',
    ];

    public function parking()
    {
        return $this->belongsTo(Parking::class);
    }
}
