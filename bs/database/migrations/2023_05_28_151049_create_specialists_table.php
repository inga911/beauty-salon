<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecialistsTable extends Migration
{
    public function up(): void
    {
        Schema::create('specialists', function (Blueprint $table) {
            $table->id();
            $table->string('name', 20);
            $table->string('surname', 20);
            $table->string('photo', 200)->nullable();
            $table->unsignedBigInteger('beauty_salon_id')->nullable();
            $table->foreign('beauty_salon_id')->references('id')->on('beauty_salons')->onDelete('cascade');
            $table->unsignedBigInteger('service_id')->nullable();
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->decimal('rate', 3, 2)->unsigned()->nullable()->default(null);
            $table->json('rates')->default('[]');
        }); 
    }

    public function down(): void
    {
        Schema::dropIfExists('specialists');
    }
};
