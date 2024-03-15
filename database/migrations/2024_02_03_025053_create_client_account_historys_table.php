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
        Schema::create('client_account_historys', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('account_name')->nullable();
            $table->foreign('account_name')->references('id')->on('clients')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('invoice_id')->nullable();
            $table->foreign('invoice_id')->references('id')->on('invoices')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->date('invoice_date');
            $table->longText('item_id')->nullable();
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
            $table->string('invoice_grant_total_amount')->nullable();
            $table->tinyInteger('payment_type'); //default 0 is payment is pending,1 is payment is done
            $table->longText('Notes');
            $table->string('Previous_amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_account_historys');
    }
};
