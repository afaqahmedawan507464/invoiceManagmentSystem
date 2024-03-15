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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('company_logo');
            $table->string('company_emailaddress');
            $table->string('company_contactnumber');
            $table->string('company_phonenumber')->nullable();
            $table->string('company_ownername');
            $table->string('company_ntnnumber');
            $table->timestamp('companyTimeIn')->nullable();
            $table->timestamp('companyTimeOut')->nullable();
            $table->longText('company_address');
            $table->longText('company_workDetails');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
