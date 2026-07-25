<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reminder', function (Blueprint $table) {
            $table->id('ReminderID');
            $table->date('ReminderDate')->nullable();
            $table->string('ReminderType', 50)->nullable();
            $table->string('Status', 30)->nullable();
            $table->unsignedBigInteger('AppointmentID')->nullable();
            $table->foreign('AppointmentID')->references('AppointmentID')->on('appointment')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reminder');
    }
};
