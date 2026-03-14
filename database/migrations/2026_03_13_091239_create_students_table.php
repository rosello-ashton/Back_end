<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('student_id')->unique();
            $table->enum('gender', ['Male', 'Female']);
            $table->date('birthday');
            $table->string('course');
            $table->integer('year_level');
            $table->enum('status', ['Active', 'Inactive', 'Graduated', 'Dropped'])->default('Active');
            $table->date('enrollment_date');
            $table->string('address')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};