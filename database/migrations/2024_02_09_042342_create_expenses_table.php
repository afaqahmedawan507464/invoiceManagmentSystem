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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->longText('expense_date');
            $table->longText('expense_category_type');
            $table->longText('slip_number')->nullable();
            $table->longText('expense_detail')->nullable();
            $table->longText('expense_amount')->nullable();
            $table->longText('expense_payment_method')->nullable();
            $table->longText('expense_patticash_amount')->nullable();
            $table->string('pre_patticash_month')->nullable();
            $table->string('remaining_patticash_this_month')->nullable();
            $table->string('total_received_patticash')->nullable();
            $table->string('total_use_amount')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
