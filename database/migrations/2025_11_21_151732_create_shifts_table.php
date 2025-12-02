<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('shifts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('facility_id')->constrained('facilities')->cascadeOnDelete();
            $table->string('name'); 
            $table->time('start_time');
            $table->time('end_time');
            $table->timestamps();

            $table->unique(['facility_id','name']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('shifts');
    }
};
