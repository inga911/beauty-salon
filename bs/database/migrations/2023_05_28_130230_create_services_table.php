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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('service_title', 100);
            $table->string('service_description', 400)->nullable();
            $table->string('duration', 10)->default('60');
            $table->decimal('price', 8, 2)->default(20);
            // $table->unsignedBigInteger('beauty_salon_id')->nullable();
            // $table->foreign('beauty_salon_id')->references('id')->on('beauty_salons')->onDelete('cascade');
            // $table->unsignedBigInteger('specialist_id')->nullable();
            // $table->foreign('specialist_id')->references('id')->on('specialists')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
