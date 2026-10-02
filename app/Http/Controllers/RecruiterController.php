<?php

namespace App\Http\Controllers;

use App\Models\JobSeeker;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RecruiterController extends Controller
{
    public function dashboard(){
        return view('recruiter.dashboard');
    }

    public function candidates(Request $request){

        $query = JobSeeker::with(['user','location']);

        if ($request->filled('skills')) {
            $skills = $request->skills;
            $query->where('skills','like',"%{$skills}%");
        }

        if ($request->filled('notice_period')) {
            $query->where('notice_period','<=',$request->notice_period);
        }

        if ($request->filled('min_experience')) {
            $query->where('experience','>=',$request->min_experience);
        }


        if ($request->filled('max_experience')) {
            $query->where('experience','<=',$request->max_experience);
        }

        if ($request->filled('location_id')) {
            $query->where('location_id',$request->location_id);
        }

        $candidates = $query->latest()->paginate(20);
        $locations = \App\Models\Location::orderBy('name')->get();

        return view('recruiter.candidates',compact('candidates', 'locations'));
    }

    public function applications()
    {
        $applications = JobApplication::with(['jobSeeker.user','jobSeeker','job',])->whereHas('job', function ($query) 
            { $query->where('recruiter_id',
                Auth::user()->recruiter->id
                );
            })->latest()->get();

        return view('recruiter.applications',compact('applications'));
    }

    public function downloadResume(JobSeeker $candidate)
    {
        return Storage::disk('public')->download($candidate->resume);
    }
}