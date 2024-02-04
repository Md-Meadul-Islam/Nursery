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
        Schema::create('all_plants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('garden_id');
            $table->string('globalname', 20);
            $table->string('localname', 20);
            $table->text('details')->nullable();
            $table->enum('category', ['Others', 'Fruits', 'Flowers', 'Vegetables', 'Cactus', 'Herbal', 'Large Tree', 'Bonsai'])->default('Fruits');
            $table->enum('sub_category', ['Others', 'Summer Seasonal', 'Winter Seasonal', 'Rainy Seasonal', 'All-Times']);
            $table->unsignedBigInteger('price')->default(0);
            $table->unsignedBigInteger('offer_price')->default(0);
            $table->string('photo_1', 50)->default('product_demo.png');
            $table->string('photo_2', 50)->nullable();
            $table->string('photo_3', 50)->nullable();
            $table->string('video', 50)->nullable();
            $table->string('video_original_name', 100)->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('garden_id')->references('id')->on('gardens')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('all_plants');
    }
};
