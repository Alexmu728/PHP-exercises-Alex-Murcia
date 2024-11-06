<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    //
    public function tasks(){
        return $this->belongsToMany(Task::class, "subject_task");
    }
}
