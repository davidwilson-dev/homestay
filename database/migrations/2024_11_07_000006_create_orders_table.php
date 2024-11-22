<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_code')->unique(); //room_id + '-' + time now
            $table->string('name_customer');
            $table->string('id_passport');
            $table->string('phone_number')->nullable();
            $table->string('email')->nullable();
            $table->datetime('checkin-estimate')->nullable();
            $table->datetime('checkout-estimate')->nullable();
            $table->datetime('checkin')->nullable();
            $table->datetime('checkout')->nullable();
            $table->enum('status', ['booked', 'checkin', 'checkout']);
            $table->unsignedBigInteger('room_id');
            $table->foreign('room_id')->references('id')->on('rooms');
            $table->float('discount')->default(0);
            $table->float('penalty_fee')->default(0);
            $table->float('utility_fee')->default(0);
            $table->float('description')->nullable();
            $table->float('deposit')->default(0);
            $table->float('order_price')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
