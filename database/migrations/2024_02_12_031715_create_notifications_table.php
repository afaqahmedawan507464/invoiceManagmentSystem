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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('message');
            $table->tinyInteger('read_status')->default(0); // 1: read, 0: unread
            $table->unsignedBigInteger('readByEmployee')->nullable();
            $table->foreign('readByEmployee')->references('id')->on('employees')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('readByAdmin')->nullable();
            $table->foreign('readByAdmin')->references('id')->on('admins')
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
        Schema::dropIfExists('notifications');
    }
};
