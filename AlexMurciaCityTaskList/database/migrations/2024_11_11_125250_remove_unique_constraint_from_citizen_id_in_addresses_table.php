<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveUniqueConstraintFromCitizenIdInAddressesTable extends Migration
{
    public function up()
    {
        Schema::table('addresses', function (Blueprint $table) {
            $table->dropUnique(['citizen_id']);  // Eliminar la restricción UNIQUE
        });
    }

    public function down()
    {
        Schema::table('addresses', function (Blueprint $table) {
            $table->unique('citizen_id');  // Restaurar la restricción UNIQUE si se revierte la migración
        });
    }
}

