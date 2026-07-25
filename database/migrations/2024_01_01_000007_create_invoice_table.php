<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('invoice', function (Blueprint $table) {
            $table->id('InvoiceID');
            $table->date('InvoiceDate')->nullable();
            $table->decimal('TotalAmount', 10, 2)->nullable();
            $table->string('Status', 30)->nullable();
            $table->unsignedBigInteger('AppointmentID')->nullable();
            $table->foreign('AppointmentID')->references('AppointmentID')->on('appointment')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invoice');
    }
};
