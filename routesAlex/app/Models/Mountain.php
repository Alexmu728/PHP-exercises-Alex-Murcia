<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mountain extends Model
{
    use HasFactory;
    protected $table="mountains";
    protected $fillable = [
        'name',
        'height',
        'belongsToRange',
        'firstClimbDate',
        'continent'
    ];
}