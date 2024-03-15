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
        Schema::create('service_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('invoice_client_id')->nullable();
            $table->foreign('invoice_client_id')->references('id')->on('clients')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->date('service_date');
            $table->string('equiment_name',500);
            $table->string('equiment_model',500);
            $table->string('equiment_srNo',500);
            $table->longText('service_report_item_srNumber');
            $table->longText('service_report_item_question');
            $table->longText('service_report_item_answer');
            $table->string('service_report_anycomment',1000);
            $table->string('service_report_name');
            $table->date('service_report_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_reports');
    }
};
