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
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id')->nullable();
            $table->foreign('client_id')->references('id')->on('clients')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->longText('item_id')->nullable();
            $table->string('quotation_number');
            $table->date('quotation_date');
            $table->string('quotation_heading',1000);
            $table->longText('quotation_item_srNumber');
            $table->longText('quotation_scope_model')->nullable();
            $table->longText('quotation_scope_srno')->nullable();
            $table->longText('quotation_scope_problem')->nullable();
            $table->longText('quotation_need_work')->nullable();
            $table->longText('quotation_item_decription')->nullable();
            $table->longText('quotation_item_disposible_batchNo')->nullable();
            $table->longText('quotation_item_disposible_expDate')->nullable();
            $table->longText('quotation_item_disposible_qtv')->nullable();
            $table->longText('quotation_item_disposible_pricePerUnit')->nullable();
            $table->longText('quotation_total_price');
            $table->string('quotation_gsttext')->nullable();
            $table->string('quotation_grant_total_amount')->nullable();
            $table->string('quotation_grant_total_amount_inWords',1000)->nullable();
            $table->longText('quotation_termAndConditions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotations');
    }
};
