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
        Schema::create('admin_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admin_id');
            $table->foreign('admin_id')->references('id')->on('admins')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('first_name');
            $table->string('user_image');
            $table->string('email_address')->unique();
            $table->string('office_number');
            $table->string('mobile_number');
            $table->string('salutation');
            $table->string('nationality');
            $table->date('date_of_birth');
            $table->string('marred_status');
            $table->string('blood_group');
            $table->string('cnic_number');
            $table->string('father_name');
            $table->string('address');
            $table->string('city');
            $table->string('province');
            $table->string('postal_code');
            $table->string('country');
            $table->string('contact_number');
            $table->string('emergency_contact_person');
            $table->string('relationship');
            $table->string('person_contact');
            $table->string('place_of_birth');
            $table->string('sub_department');
            $table->date('end_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_details');
    }
};
