<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('job_seekers', function (Blueprint $table) {

            $table->id();

            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->string('phone', 20);

            $table->unsignedInteger('experience')->default(0);

            $table->unsignedInteger('notice_period')->default(0);

            $table->text('skills')->nullable();

            $table->unsignedBigInteger('location_id')->nullable();

            $table->string('resume')->nullable();

            $table->string('photo')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('job_seekers');
    }
};