<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('facilities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('address');
            $table->string('province');
            $table->string('phone')->nullable();
            $table->enum('status', ['active','inactive'])->default('active');
            $table->timestamps();

            $table->index('province');
        });
    }

    public function down()
    {
        Schema::dropIfExists('facilities');
    }
};
