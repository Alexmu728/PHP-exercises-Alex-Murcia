<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    public function citizen(){
        return $this->belongsTo(Citizen::class);
    }

    public function subjects(){
        return $this->belongsToMany(Subject::class, "subject_task");
    }
}
