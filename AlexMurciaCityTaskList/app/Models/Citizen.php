<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Citizen extends Model
{
    //
    public function address(){
        return $this->hasOne(Address::class);
    }
    public function tasks(){
        return $this->hasMany(Task::class);
    }
}
