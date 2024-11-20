<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dentist extends Model
{
    //
    protected $fillable=["clients_id", "name", "surname", "dni", "date_of_birth"];
    public function clients(){
        return $this->hasMany(Client::class);
    }
}
