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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->foreignId('flight_id')->constrained('flights')->required();
            $table->string('passanger_name')->required();
            $table->string('passanger_phone')->required()->string(14);
            $table->string('seat_number')->required()->string(3);
            $table->boolean('is_boarding')->default(false)->required();
            $table->datetime('boarding_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
