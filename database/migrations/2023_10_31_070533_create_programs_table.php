<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category');
            $table->text('summary');
            $table->string('status')->default('active');
            $table->string('image')->nullable();
            $table->boolean('is_prerequisite')->default(false);
            $table->unsignedBigInteger('prerequisite_program_id')->nullable();
            $table->foreign('prerequisite_program_id')->references('id')->on('programs');
            $table->foreignIdFor(User::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
