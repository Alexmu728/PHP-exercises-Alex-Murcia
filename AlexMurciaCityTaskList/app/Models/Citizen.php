<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citizen extends Model
{
    use HasFactory;

    protected $fillable = ["name", "age", "email", "date_pf_birth", "gender"];

    public function address()
    {
        return $this->hasOne(Address::class); 
    }

    public function tasks()
    {
        return $this->hasMany(Task::class); 
    }
}
