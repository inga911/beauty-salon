<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeautySalonsTable extends Migration
{
    public function up(): void
    {
        Schema::create('beauty_salons', function (Blueprint $table) {
            $table->id();
            $table->string('salon_name', 150);
            $table->string('address', 300)->default('');
            $table->string('city', 300)->default('');
            $table->string('phone_number', 12)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('beauty_salons');
    }
};