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
        Schema::create('candidates', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('phone_number');
            $table->string('email')->unique();
            $table->string('date_of_birth')->nullable();
            $table->string('gender')->nullable();
            $table->string('nationality')->nullable();
            $table->string('division')->nullable();
            $table->string('location')->nullable();
            $table->string('sub_location')->nullable();
            $table->string('village')->nullable();
            $table->string('profession')->nullable();
            $table->boolean('has_disability')->default(false);
            $table->string('national_id_no')->nullable();
            $table->string('passport_no')->nullable();
            $table->string('driver_license_no')->nullable();
            $table->string('image')->nullable();
            $table->string('password');
            $table->string('verification_token')->nullable();
            $table->string('reset_code')->nullable();
            $table->boolean('account_verified')->default(false);
            $table->boolean('enabled')->default(false);
            $table->string('api_token')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};
