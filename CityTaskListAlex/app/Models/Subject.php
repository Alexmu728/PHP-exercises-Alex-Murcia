<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'created_by'];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
