<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('facility_id')->constrained('facilities')->cascadeOnDelete();
            $table->string('room_number')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->unsignedInteger('capacity')->default(2);
            $table->decimal('base_price', 12, 2)->default(0);
            $table->enum('status', ['available','unavailable','maintenance'])->default('available');
            $table->string('floor')->nullable();
            $table->timestamps();

            $table->index(['facility_id','status']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('rooms');
    }
};
