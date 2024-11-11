<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'due_date', 'citizen_id']; // Cambiado 'datetime' a 'due_date'

    public function citizen()
    {
        return $this->belongsTo(Citizen::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }
}

