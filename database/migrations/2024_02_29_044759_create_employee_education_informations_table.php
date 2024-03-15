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
        Schema::create('employee_education_informations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('degree');
            $table->string('subject');
            $table->string('grade');
            $table->integer('gradution_year');
            $table->string('qualification_mode');
            $table->string('duration');
            $table->string('language');
            $table->string('country');
            $table->string('detail_breif',300)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_education_informations');
    }
};
