<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citizen extends Model
{
    use HasFactory;

    protected $fillable = ["name", "age", "email", "date_of_birth", "gender"]; // Corregido "date_pf_birth" a "date_of_birth"

    public function address()
    {
        return $this->hasOne(Address::class); 
    }

    public function tasks()
    {
        return $this->hasMany(Task::class); 
    }
}

