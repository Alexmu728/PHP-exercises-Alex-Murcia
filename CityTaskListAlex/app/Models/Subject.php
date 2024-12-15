<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    // Define los campos que pueden ser llenados masivamente
    protected $fillable = ['name', 'created_by'];

    // Relación con el modelo User (quien creó el subject)
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
