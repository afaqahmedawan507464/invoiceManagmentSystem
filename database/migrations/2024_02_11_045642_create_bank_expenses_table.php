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
        Schema::create('bank_expenses', function (Blueprint $table) {
            $table->id();
            $table->longText('payment_date');
            $table->longText('name');
            $table->longText('payment_category_type');
            $table->longText('slip_number')->nullable();
            $table->longText('payment_amount')->nullable();
            $table->longText('payment_method')->nullable();
            $table->longText('bank_name')->nullable();
            $table->longText('bank_account_number')->nullable();
            $table->longText('check_number')->nullable();
            $table->longText('total_send_amount')->nullable();
            $table->longText('total_received_amount')->nullable();
            $table->longText('remaining_amount')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_expenses');
    }
};
