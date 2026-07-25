<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('patient', function (Blueprint $table) {
            $table->id('PatientID');
            $table->string('FirstName', 50);
            $table->string('LastName', 50);
            $table->string('Gender', 10)->nullable();
            $table->date('DateOfBirth')->nullable();
            $table->string('PhoneNumber', 20)->nullable();
            $table->string('Email', 100)->nullable();
            $table->string('Address', 255)->nullable();
            $table->date('RegistrationDate')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('patient');
    }
};
