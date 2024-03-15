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
        Schema::create('deliever_challans', function (Blueprint $table) {
            $table->id();
            $table->string('delivery_challan_po_no');
            $table->unsignedBigInteger('invoice_id')->nullable()->nullable();
            $table->foreign('invoice_id')->references('id')->on('invoices')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('invoice_client_id')->nullable();
            $table->foreign('invoice_client_id')->references('id')->on('clients')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->longText('item_id')->nullable();
            $table->date('delivery_challan_date');
            $table->string('delivery_challan',500);
            $table->longText('delivery_challan_item_srNumber');
            $table->longText('delivery_challan_item_description');
            $table->longText('delivery_challan_item_qtv');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deliever_challans');
    }
};
