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
        Schema::create('gardens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('garden_name', 100);
            $table->text('local_address')->nullable();
            $table->string('city', 30);
            $table->string('geo_location', 100)->nullable();
            $table->string('garden_size', 100)->nullable();
            $table->string('total_plants', 10)->nullable();
            $table->enum('garden_category', ['Others', 'Fruits', 'Flowers', 'Vegetables', 'Cactus', 'Large Tree'])->default('Fruits');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gardens');
    }
};
