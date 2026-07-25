<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dentist', function (Blueprint $table) {
            $table->id('DentistID');
            $table->string('FirstName', 50);
            $table->string('LastName', 50);
            $table->string('PhoneNumber', 20)->nullable();
            $table->string('Email', 100)->nullable();
            $table->unsignedBigInteger('SpecializationID')->nullable();
            $table->foreign('SpecializationID')->references('SpecializationID')->on('specialization')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dentist');
    }
};
