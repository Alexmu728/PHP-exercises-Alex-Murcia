<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = ['citizen_id', 'street', 'city', 'postal_code'];

    public function citizen() {
        return $this->belongsTo(Citizen::class); 
    }
}

