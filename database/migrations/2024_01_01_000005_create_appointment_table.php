<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('appointment', function (Blueprint $table) {
            $table->id('AppointmentID');
            $table->date('AppointmentDate')->nullable();
            $table->time('AppointmentTime')->nullable();
            $table->string('Status', 30)->nullable();
            $table->unsignedBigInteger('PatientID')->nullable();
            $table->unsignedBigInteger('DentistID')->nullable();
            $table->unsignedBigInteger('ReceptionistID')->nullable();
            $table->foreign('PatientID')->references('PatientID')->on('patient')->onDelete('set null');
            $table->foreign('DentistID')->references('DentistID')->on('dentist')->onDelete('set null');
            $table->foreign('ReceptionistID')->references('ReceptionistID')->on('receptionist')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('appointment');
    }
};
