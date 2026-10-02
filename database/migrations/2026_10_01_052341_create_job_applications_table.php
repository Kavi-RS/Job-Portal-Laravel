<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('job_applications', function (Blueprint $table) {
            $table->foreignId('job_id')
                ->after('id')
                ->constrained('job_posts')
                ->cascadeOnDelete();

            $table->foreignId('job_seeker_id')
                ->after('job_id')
                ->constrained('job_seekers')
                ->cascadeOnDelete();

            $table->string('status')
                ->default('Applied')
                ->after('job_seeker_id');
        });
    }

    public function down(): void
    {
        Schema::table('job_applications', function (Blueprint $table) {
            $table->dropForeign(['job_id']);
            $table->dropForeign(['job_seeker_id']);

            $table->dropColumn([
                'job_id',
                'job_seeker_id',
                'status',
            ]);
        });
    }
};