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
        Schema::create('leave_employees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admin_user')->nullable();
            $table->foreign('admin_user')->references('id')->on('admins')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('employee_user')->nullable();
            $table->foreign('employee_user')->references('id')->on('employees')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('reason','1000');
            $table->tinyInteger('leave_duration')->default(0);       // note is if value is 0 then full day leave else half day leave
            $table->date('leave_starting_date');
            $table->date('leave_ending_date');
            $table->tinyInteger('leave_status')->default(0);    //note 0 is not approved and 1 is approved
            $table->tinyInteger('read_status')->default(0);    //note 0 is not read and 1 is read
            $table->unsignedBigInteger('approved_by')->nullable();
            $table->foreign('approved_by')->references('id')->on('admins')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->date('leaveDate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave_employees');
    }
};
