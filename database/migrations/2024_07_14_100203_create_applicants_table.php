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
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('desc', 255);
            $table->string('address', 255);
            $table->string('email')->unique();
            $table->string('lastEducation', 255);
            $table->float('ipk');
            $table->string('phoneNumber', 13);
            $table->string('image');
            $table->string('skill', 255);

            //dokument
            $table->string('ktp');
            $table->string('cv');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicants');
    }
};
