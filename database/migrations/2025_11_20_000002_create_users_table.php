<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->foreignId('facility_id')->nullable()->constrained('facilities')->nullOnDelete();
            $table->enum('status', ['active','inactive'])->default('active');
            $table->enum('type', ['admin','owner', 'staff'])->default('staff');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

            $table->index('facility_id');
            $table->index('status');
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
