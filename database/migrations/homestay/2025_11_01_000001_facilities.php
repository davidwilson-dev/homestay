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
            $table->string('name', 100)->unique();
            $table->string('code', 20)->unique();
            $table->string('address');
            $table->string('province');
            $table->string('phone')->nullable();
            $table->string('avatar')->nullable();
            $table->timestamps();

            $table->index('province');
        });
    }

    public function down()
    {
        Schema::dropIfExists('facilities');
    }
};
