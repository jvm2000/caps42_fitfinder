<?php

use App\Models\Program;
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
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            
            $table->string('name');
            $table->string('summary');
            $table->date('duration');
            $table->string('procedure');
            $table->string('set');
            $table->smallInteger('setcount');
            $table->string('rep');
            $table->smallInteger('repcount');
            $table->json('schedule');
            $table->foreignIdFor(Program::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modules');
    }
};
