<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('citizens', function (Blueprint $table) {
            $table->integer('age'); 
            $table->string('email')->unique(); 
            $table->date('date_pf_birth'); 
            $table->enum('gender', ['male', 'female', 'other']);
        });
    }

    public function down(): void
    {
        Schema::table('citizens', function (Blueprint $table) {
            $table->dropColumn(['age', 'email', 'date_pf_birth', 'gender']);
        });
    }
};
