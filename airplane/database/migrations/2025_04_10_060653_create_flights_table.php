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
        Schema::create('flights', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('flight_code')->required()->unique()->string(5);
            $table->string('origin')->required()->string(3);
            $table->string('destination')->required()->string(3);
            $table->datetime('departure_time')->required();
            $table->datetime('arrival_time')->required();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
