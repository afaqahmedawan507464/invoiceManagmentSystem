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
        Schema::create('incoming_and_outgoing_disposibles', function (Blueprint $table) {
            $table->id();
            $table->date('item_incomingDate');
            $table->string('item_sendername');
            $table->string('incoming_type');
            $table->string('incoming_description')->nullable();
            $table->string('item_model')->nullable();
            $table->string('item_srno')->nullable();
            $table->string('item_disposible_batchNo')->nullable();
            $table->date('item_disposible_expDate')->nullable();
            $table->integer('item_disposible_qtv')->nullable();
            $table->string('outgoing_type')->nullable();
            $table->date('item_outgoing_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incoming_and_outgoing_disposibles');
    }
};
