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
        Schema::create('attendance_employees', function (Blueprint $table) {
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
            $table->timestamp('clockInTime')->nullable();
            $table->date('clockInDate')->nullable();
            $table->timestamp('clockOutTime')->nullable();
            $table->date('clockOutDate')->nullable();
            $table->string('lateTime')->nullable();
            $table->string('overTime')->nullable();
            $table->tinyInteger('attendance_status')->default(0); // 0 is absent , 1 is present , 2 is leave
            $table->tinyInteger('late_status')->default(0); // 0 is not late , 1 is late 
            $table->string('total_hours')->nullable();
            $table->string('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendance_employees');
    }
};
