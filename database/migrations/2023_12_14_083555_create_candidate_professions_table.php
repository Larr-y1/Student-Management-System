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
        Schema::create('candidate_professions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('candidate_id');
            $table->foreign('candidate_id')->references('id')->on('candidates');
            $table->string('institution')->nullable();
            $table->string('certification')->nullable();
            $table->string('professional_level')->nullable();
            $table->string('date_of_award')->nullable();
            $table->string('membership_no')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidate_professions');
    }
};
