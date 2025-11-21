<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('facility_id')->constrained('facilities')->cascadeOnDelete();
            $table->string('title');
            $table->decimal('amount', 12, 2);
            $table->date('expense_date');
            $table->foreignId('user_id')->constrained('users'); // manager user id
            $table->text('note')->nullable();
            $table->timestamps();

            $table->index(['facility_id','expense_date']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('expenses');
    }
};
