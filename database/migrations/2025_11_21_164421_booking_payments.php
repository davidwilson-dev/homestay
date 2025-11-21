<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('booking_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained('bookings')->cascadeOnDelete();
            $table->foreignId('facility_id')->constrained('facilities')->cascadeOnDelete(); 
            $table->decimal('amount', 12, 2);
            $table->enum('payment_type', ['deposit','partial','full','refund'])->default('deposit'); 
            $table->enum('method', ['cash','bank','wallet','other']);
            $table->enum('status', ['pending','succeeded','failed','refunded'])->default('pending');
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('transaction_code')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->text('note')->nullable();
            $table->timestamps();

            $table->index(['booking_id','status']);
            $table->index(['facility_id','payment_type']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('booking_payments');
    }
};
