<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use App\Models\Location;
use App\Models\JobApplication;
use App\Jobs\SendJobApplicationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobSeekerController extends Controller
{
    public function dashboard(){
        return view('job-seeker.dashboard');
    }

    public function jobs(Request $request){

        $query = JobPost::with(['recruiter'])->where('status', 'active');

        if ($request->filled('skills')) {
            $query->where('skills_required','like','%' . $request->skills . '%');
        }

        if ($request->filled('company_name')) {
            $query->whereHas('recruiter',function ($q) use ($request) {
                    $q->where('company_name','like','%' . $request->company_name . '%');
                }
            );
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

        $jobs = $query->latest()->paginate(20);
        $locations = Location::orderBy('name')->get();

        return view('job-seeker.jobs',compact('jobs', 'locations'));
    }

    public function apply(JobPost $job){

        $jobSeeker = Auth::user()->jobSeeker;
        if (!$jobSeeker) {
            return back()->with('error','Job seeker profile not found.');
        }

        $exists = JobApplication::where(['job_id' => $job->id,'job_seeker_id' => $jobSeeker->id,])->exists();

        if ($exists) {
            return back()->with('error', 'You already applied for this job.');
        }

        $application = JobApplication::create([
            'job_id' => $job->id,
            'job_seeker_id' => $jobSeeker->id,
            'status' => 'applied',
        ]);

        SendJobApplicationMail::dispatch($application->id);

        return back()->with('success', 'Application submitted successfully.');
    }
}