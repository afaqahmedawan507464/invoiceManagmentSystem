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
        Schema::create('stock_records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('incoming_report_ids')->nullable();
            $table->foreign('incoming_report_ids')->references('id')->on('incoming_inspection_reports')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->date('item_incomingdate');
            $table->string('item_name');
            $table->string('item_model')->nullable();
            $table->string('item_srno')->nullable();
            $table->string('item_companyname')->nullable();
            $table->string('item_batchNo')->nullable();
            $table->string('item_expDate')->nullable();
            $table->integer('item_qtv')->nullable();
            $table->string('size')->nullable();
            $table->string('part_companyname')->nullable();
            $table->string('item_scope_model')->nullable();
            $table->string('ratePerUnit')->nullable();
            $table->string('totalAmount')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_records');
    }
};
