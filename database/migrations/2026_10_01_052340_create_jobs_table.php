<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('job_posts', function (Blueprint $table) {

            $table->id();

            $table->foreignId('recruiter_id')
                ->constrained('recruiters')
                ->cascadeOnDelete();

            $table->string('job_title');

            $table->unsignedInteger('experience')->default(0);

            $table->text('job_description');

            $table->text('skills_required')->nullable();

            $table->enum('status', ['active', 'inactive'])
                ->default('active');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('job_posts');
    }
};