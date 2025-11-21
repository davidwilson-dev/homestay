<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('room_rates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('room_id')->constrained('rooms')->cascadeOnDelete();
            $table->enum('rate_type', ['event','holiday','weekend']);
            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('price', 12, 2);
            $table->timestamps();

            $table->index(['room_id','start_date','end_date']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('room_rates');
    }
};
