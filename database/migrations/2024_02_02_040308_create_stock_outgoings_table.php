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
        Schema::create('stock_outgoings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id')->nullable();
            $table->foreign('item_id')->references('id')->on('stock_records')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('invoice_id')->nullable();
            $table->foreign('invoice_id')->references('id')->on('invoices')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('inspection_id')->nullable();
            $table->foreign('inspection_id')->references('id')->on('incoming_inspection_reports')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->integer('solid_qtv');
            $table->date('solid_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_outgoings');
    }
};
