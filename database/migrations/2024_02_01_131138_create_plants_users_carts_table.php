<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('plants_users_carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('plant_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('garden_id')->nullable();
            $table->unsignedBigInteger('pieces')->nullable();
            $table->unsignedBigInteger('total_price')->nullable();
            $table->enum('stauts', ['approved', 'pending', 'rejected'])->default('pending');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('plant_id')->references('id')->on('all_plants')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('garden_id')->references('id')->on('gardens')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plants_users_carts');
    }
};
