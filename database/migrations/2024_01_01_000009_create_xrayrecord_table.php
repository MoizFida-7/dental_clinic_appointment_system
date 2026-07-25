<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('xrayrecord', function (Blueprint $table) {
            $table->id('XRayID');
            $table->string('FilePath', 255)->nullable();
            $table->date('UploadDate')->nullable();
            $table->string('Notes', 255)->nullable();
            $table->unsignedBigInteger('PatientID')->nullable();
            $table->foreign('PatientID')->references('PatientID')->on('patient')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('xrayrecord');
    }
};
