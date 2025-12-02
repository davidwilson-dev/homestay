<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('booking_room', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained('bookings')->cascadeOnDelete();
            $table->foreignId('room_id')->constrained('rooms')->cascadeOnDelete();
            $table->date('checkin_date');
            $table->date('checkout_date');
            $table->unsignedInteger('guest_count')->default(1);
            $table->unsignedInteger('adult')->default(1);
            $table->unsignedInteger('children')->default(0);
            $table->decimal('price', 12, 2)->default(0); // price per night at time of booking
            $table->decimal('total_price', 12, 2)->default(0); // price * nights
            $table->timestamps();

            $table->index(['room_id','checkin_date','checkout_date']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('booking_room');
    }
};
