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
        Schema::create('searches', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('searchString');
            $table->unsignedBigInteger('timesofsearch')->default(1);
            $table->string('exists', 5)->default(false);
            $table->string('city', 100)->nullable();
            $table->string('country', 100)->nullable();
            $table->string('ip')->nullable();
            $table->string('device_type')->nullable();
            $table->string('browser')->nullable();
            $table->string('user_agent')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('searches');
    }
};
