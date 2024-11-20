<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Client extends Model
{
    //
    protected $fillable = ["dentists_id", "name", "surname", "dni", "date_of_birth"];
    public function dentist(){
        return $this-> belongsTo(Dentist::class);
    }
}
