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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quotation_id')->nullable();
            $table->foreign('quotation_id')->references('id')->on('quotations')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('invoice_client_id')->nullable();
            $table->foreign('invoice_client_id')->references('id')->on('clients')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->longText('item_id')->nullable();
            $table->string('invoice_number');
            $table->date('invoice_date');
            $table->string('invoice_heading',1000);
            $table->longText('invoice_item_srNumber');
            $table->longText('invoice_scope_model')->nullable();
            $table->longText('invoice_scope_srno')->nullable();
            $table->longText('invoice_scope_problem')->nullable();
            $table->longText('invoice_need_work')->nullable();
            $table->longText('invoice_item_decription')->nullable();
            $table->longText('invoice_item_disposible_batchNo')->nullable();
            $table->longText('invoice_item_disposible_expDate')->nullable();
            $table->longText('invoice_item_disposible_qtv')->nullable();
            $table->longText('invoice_item_disposible_pricePerUnit')->nullable();
            $table->longText('invoice_total_price');
            $table->string('invoice_gsttext')->nullable();
            $table->string('invoice_grant_total_amount')->nullable();
            $table->string('invoice_grant_total_amount_inWords',1000)->nullable();
            $table->longText('invoice_termAndConditions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
