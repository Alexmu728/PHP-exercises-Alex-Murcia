<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('subject_task', function (Blueprint $table) {
            $table->foreignId('subject_id')->constrained('subjects')->onDelete('cascade'); 
            $table->foreignId('task_id')->constrained('tasks')->onDelete('cascade'); 
            $table->primary(['subject_id', 'task_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subject_task');
    }
};
