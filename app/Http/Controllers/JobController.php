<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function index(){
        $jobs = Job::where('recruiter_id',Auth::user()->recruiter->id)->latest()->get();
        return view('recruiter.jobs.index', compact('jobs'));
    }

    public function create(){
        return view('recruiter.jobs.create');
    }


    public function store(Request $request){
        $data = $request->validate([
            'job_title' => 'required|string|max:255',
            'experience' => 'required|numeric|min:0',
            'job_description' => 'required|string',
            'skills_required' => 'required|string',
            'status' => 'required|in:active,inactive',
        ]);

        $data['recruiter_id'] = Auth::user()->recruiter->id;

        Job::create($data);

        return redirect()->route('recruiter.jobs')->with('success', 'Job created successfully.');
    }


    public function edit(Job $job){
        return view('recruiter.jobs.edit', compact('job'));
    }


    public function update(Request $request, Job $job){

        $data = $request->validate([
            'job_title' => 'required|string|max:255',
            'experience' => 'required|numeric|min:0',
            'job_description' => 'required|string',
            'skills_required' => 'required|string',
            'status' => 'required|in:active,inactive',
        ]);

        $job->update($data);
        return redirect()->route('recruiter.jobs')->with('success', 'Job updated successfully.');
    }


    public function destroy(Job $job){
        $job->delete();
        return back()->with('success','Job deleted successfully.');
    }
}