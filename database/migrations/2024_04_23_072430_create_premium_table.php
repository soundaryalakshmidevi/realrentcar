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
        Schema::create('premium', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('car_id'); // Ensure the same data type as the referenced column
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');
            $table->integer('premium_amount');
            $table->date('premium_start_date');
            $table->date('premium_end_date');
            $table->string('remain_days');
            $table->enum('status', ['pending', 'Active', 'Expired'])->default('pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('premium');
    }
};
