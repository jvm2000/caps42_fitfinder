<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('enrollees', function (Blueprint $table) {
            $table->boolean('completion_email_sent')->default(false);
        });
    }
    
    public function down()
    {
        Schema::table('enrollees', function (Blueprint $table) {
            $table->dropColumn('completion_email_sent');
        });
    }
};
