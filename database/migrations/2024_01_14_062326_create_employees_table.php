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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('user_type')->default(0);  // 1 is main admin and 2 is emloyee
            $table->string('employeename');
            $table->string('employeeemailaddress');
            $table->string('password');
            $table->string('user_image')->nullable();
            $table->tinyInteger('active_status')->default(0); // 0 is deactive and 1 is active
            $table->tinyInteger('online_status')->default(0); // 0 is deactive and 1 is active
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
