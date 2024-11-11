<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ["name", "responsible"]; // Agregado el campo "responsible"

    public function tasks()
    {
        return $this->belongsToMany(Task::class, "subject_task");
    }
}

