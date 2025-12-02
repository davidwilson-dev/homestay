<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('staffs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('facility_id')->constrained('facilities')->cascadeOnDelete();
            $table->string('id_staff')->unique();
            $table->string('full_name');
            $table->date('birthday');
            $table->string('citizen')->nullable();
            $table->string('avatar')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->text('note')->nullable();
            $table->timestamps();

            $table->index('facility_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('staffs');
    }
};
