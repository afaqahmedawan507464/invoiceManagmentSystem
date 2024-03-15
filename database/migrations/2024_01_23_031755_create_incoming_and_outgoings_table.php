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
        Schema::create('incoming_and_outgoings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('incoming_report_ids')->nullable();
            $table->foreign('incoming_report_ids')->references('id')->on('incoming_inspection_reports')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('model')->nullable();
            $table->string('item_sr_no')->nullable();
            $table->date('incoming_date');
            $table->longText('details')->nullable();
            $table->string('sender_name');
            $table->string('incoming_slip_number');
            $table->date('outgoing_date')->nullable();
            $table->string('outgoing_slip_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incoming_and_outgoings');
    }
};
