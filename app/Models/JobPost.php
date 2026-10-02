<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobPost extends Model
{
    protected $fillable = [
        'recruiter_id',
        'location_id',
        'job_title',
        'experience',
        'job_description',
        'skills_required',
        'status',
    ];

    public function recruiter(): BelongsTo
    {
        return $this->belongsTo(Recruiter::class, 'recruiter_id');
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class, 'location_id');
    }
}