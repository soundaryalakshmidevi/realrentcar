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
        Schema::create('trip_commend', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('booking_id');
            $table->string('driver_id');
            $table->string('trip_id')->nullable();
            $table->string('commends')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
