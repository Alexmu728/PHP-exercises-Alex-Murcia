<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citizen extends Model
{
    use HasFactory;

    protected $table="citizens";
    protected $fillable=["name", "other_column"];
    //
    public function address(){
        return $this->hasOne(Address::class);
    }
    public function tasks(){
        return $this->hasMany(Task::class);
    }
}
