<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prescription', function (Blueprint $table) {
            $table->id('PrescriptionID');
            $table->string('MedicationName', 100)->nullable();
            $table->string('Dosage', 50)->nullable();
            $table->string('Duration', 50)->nullable();
            $table->unsignedBigInteger('TreatmentID')->nullable();
            $table->foreign('TreatmentID')->references('TreatmentID')->on('treatment')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prescription');
    }
};
