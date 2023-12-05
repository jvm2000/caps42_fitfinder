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
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trainee_id');
            $table->unsignedBigInteger('coach_id');
            $table->unsignedBigInteger('program_id');
            $table->string('status')->default('Pending')->nullable();
            $table->string('message')->default('A request has been sent!');
            $table->foreign('trainee_id')->references('id')->on('users');
            $table->foreign('coach_id')->references('id')->on('users');
            $table->foreign('program_id')->references('id')->on('programs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
