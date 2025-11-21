<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('facility_id')->constrained('facilities')->cascadeOnDelete();
            $table->string('code')->unique();
            $table->string('customer_name');
            $table->string('customer_email')->nullable();
            $table->string('customer_phone');
            $table->decimal('total_amount', 12, 2)->default(0);
            $table->enum('status', ['pending','confirmed','checked_in','checked_out','cancelled'])->default('pending');
            $table->enum('payment_status', ['unpaid','deposit','partial','paid','refunded','overdue'])->default('unpaid');
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->text('note')->nullable();
            $table->timestamps();

            $table->index(['facility_id','status','payment_status']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('bookings');
    }
};
