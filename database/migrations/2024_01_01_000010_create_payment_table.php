<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payment', function (Blueprint $table) {
            $table->id('PaymentID');
            $table->date('PaymentDate')->nullable();
            $table->decimal('AmountPaid', 10, 2)->nullable();
            $table->string('PaymentMethod', 50)->nullable();
            $table->unsignedBigInteger('InvoiceID')->nullable();
            $table->foreign('InvoiceID')->references('InvoiceID')->on('invoice')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payment');
    }
};
