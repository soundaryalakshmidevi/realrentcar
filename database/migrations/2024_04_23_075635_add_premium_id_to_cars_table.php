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
        Schema::table('cars', function (Blueprint $table) {
            $table->unsignedBigInteger('premium_id')->nullable();
            
            // Add foreign key constraint
            $table->foreign('premium_id')
                  ->references('id')->on('premium')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
       
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->dropForeign(['premium_id']);
            
            // Drop the premium_id column
            $table->dropColumn('premium_id');
        });
    }
};
