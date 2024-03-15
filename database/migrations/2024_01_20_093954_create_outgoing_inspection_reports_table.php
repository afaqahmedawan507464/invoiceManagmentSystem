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
        Schema::create('outgoing_inspection_reports', function (Blueprint $table) {
            $table->id();
            
$table->unsignedBigInteger('incoming_report_id');
$table->foreign('incoming_report_id')->references('id')->on('incoming_inspection_reports')
->onDelete('cascade')
->onUpdate('cascade');
$table->string('scope_model',300);
$table->date('scope_incoming_date');
$table->string('scope_sr_number');
$table->string('sender_name');
$table->longText('scope_sending_with');
$table->tinyInteger('scope_leakage')->default(0);   //0 is not ok 1 is ok
$table->tinyInteger('scope_view')->default(0);   //0 is not ok 1 is ok
$table->tinyInteger('scope_lightguide')->default(0);   //0 is not ok 1 is ok
$table->tinyInteger('scope_airwater')->default(0);   //0 is not ok 1 is ok
$table->tinyInteger('scope_angulation')->default(0);   //0 is not ok 1 is ok
$table->tinyInteger('scope_lgtube')->default(0);   //0 is not ok 1 is ok
$table->tinyInteger('scope_insertiontube')->default(0);   //0 is not ok 1 is ok
$table->tinyInteger('scope_biopsychannel')->default(0);   //0 is not ok 1 is ok
$table->tinyInteger('scope_objectivelenz')->default(0);   //0 is not ok 1 is ok
$table->tinyInteger('scope_suction')->default(0);   //0 is not ok 1 is ok
$table->tinyInteger('scope_angulation_lock')->default(0);   //0 is not ok 1 is ok
$table->tinyInteger('scope_freezing_buttons')->default(0);   //0 is not ok 1 is ok
// this is part is tjf scope related part
$table->tinyInteger('scope_tjf_elevator_channel')->nullable();   //0 is not ok 1 is ok
$table->tinyInteger('scope_tjf_elevator_wire')->nullable();   //0 is not ok 1 is ok
$table->tinyInteger('scope_tjf_elevator_axel')->nullable();   //0 is not ok 1 is ok
$table->tinyInteger('scope_tjf_tip_cover')->nullable();   //0 is not ok 1 is ok
$table->tinyInteger('scope_tjf_elevator_clinder')->nullable();   //0 is not ok 1 is ok
$table->tinyInteger('scope_tjf_liver')->nullable();   //0 is not ok 1 is ok
$table->longText('remarks');
$table->unsignedBigInteger('inspectedby_id');
$table->foreign('inspectedby_id')->references('id')->on('employees')
->onDelete('cascade')
->onUpdate('cascade');
$table->unsignedBigInteger('company_id');
$table->foreign('company_id')->references('id')->on('companies')
->onDelete('cascade')
->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outgoing_inspection_reports');
    }
};
