<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('staff_shift', function (Blueprint $table) {
            $table->id();
            $table->foreignId('staff_id')->constrained('staffs')->cascadeOnDelete();
            $table->foreignId('shift_id')->constrained('shifts')->cascadeOnDelete();
            $table->date('date');
            $table->text('note')->nullable();
            $table->timestamps();

            $table->unique(['staff_id','shift_id','date']);
            $table->index(['shift_id','date']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('staff_shift');
    }
};
