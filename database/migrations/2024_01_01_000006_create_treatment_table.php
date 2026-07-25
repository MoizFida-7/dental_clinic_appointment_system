<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('treatment', function (Blueprint $table) {
            $table->id('TreatmentID');
            $table->string('TreatmentName', 100)->nullable();
            $table->string('Description', 255)->nullable();
            $table->decimal('TreatmentCost', 10, 2)->nullable();
            $table->unsignedBigInteger('AppointmentID')->nullable();
            $table->foreign('AppointmentID')->references('AppointmentID')->on('appointment')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('treatment');
    }
};
