<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('school_days', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->enum('type', ['School Day', 'Holiday', 'Event', 'Weekend'])->default('School Day');
            $table->string('event_name')->nullable();
            $table->integer('total_students')->default(0);
            $table->integer('present_students')->default(0);
            $table->integer('absent_students')->default(0);
            $table->decimal('attendance_rate', 5, 2)->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('school_days');
    }
};