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
        Schema::create('subtasks',function(Blueprint $table){
            $table->id();
            $table->string('titleSubtask');
            $table->longText('descriptionSubtask');
            $table->foreignId('id_task')->references('id')->on('tasks')->onDelete('cascade');
            $table->enum('statusSubtask', ['pending', 'completed',])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subtasks');

    }
};
