<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable =['id', 'name', 'date', 'description'];

    public function user(){
        return $this->hasMany(User::class);
    }
}
