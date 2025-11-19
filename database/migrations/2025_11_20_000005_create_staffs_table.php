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
        Schema::create('staffs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('position_id')->nullable()->constrained('positions')->nullOnDelete();
            $table->string('code')->unique()->nullable(); // NV001
            $table->string('full_name');
            $table->string('phone')->nullable();
            $table->string('avatar')->nullable();
            $table->decimal('salary', 12, 2)->nullable();
            $table->date('birthday')->nullable();
            $table->enum('gender', ['male','female','other'])->nullable();
            $table->date('recruit_date')->nullable();
            $table->enum('type', ['fulltime', 'parttime', 'collaborator']);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->text('additional_information')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staffs');
    }
};
