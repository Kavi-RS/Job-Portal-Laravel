<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\JobSeeker;
use App\Models\Recruiter;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){

        return view('auth.login');
    }


    public function authenticate(Request $request){

        $credentials = $request->validate(['email' => 'required|email','password' => 'required',]);
        if (!Auth::attempt($credentials)) {
            return back()->withErrors(['email' => 'Invalid email or password']);
        }
        $request->session()->regenerate();

        if (Auth::user()->role === 'recruiter') {
            return redirect()->route('recruiter.dashboard');
        }

        return redirect()->route('job-seeker.dashboard');
    }


    public function jobSeekerRegister(){
        $locations = Location::orderBy('name')->get();
        return view('auth.job-seeker-register',compact('locations'));
    }


    public function storeJobSeeker(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:20',
            'experience' => 'required|numeric|min:0',
            'notice_period' => 'required|integer|min:0',
            'skills' => 'required|string',
            'location_id' => 'required|exists:locations,id',
            'resume' => 'required|file|mimes:pdf,doc,docx|max:5120',
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create(['name' => $data['name'],'email' => $data['email'],'password' => Hash::make($data['password']),'role' => 'job_seeker',]);
        $resume = $request->file('resume')->store('resumes', 'public');
        $photo = $request->file('photo')->store('photos', 'public');

        JobSeeker::create([
            'user_id' => $user->id,
            'phone' => $data['phone'],
            'experience' => $data['experience'],
            'notice_period' => $data['notice_period'],
            'skills' => $data['skills'],
            'location_id' => $data['location_id'],
            'resume' => $resume,
            'photo' => $photo,
        ]);

        return redirect()->route('login')->with('success', 'Registration successful.');
    }


    public function recruiterRegister()
    {
        return view('auth.recruiter-register');
    }


    public function storeRecruiter(Request $request)
    {
        $data = $request->validate([
            'company_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $data['company_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'recruiter',
        ]);

        Recruiter::create([
            'user_id' => $user->id,
            'company_name' => $data['company_name'],
            'phone' => $data['phone'],
            'address' => $data['address'],
        ]);

        return redirect()->route('login')->with('success', 'Recruiter registration successful.');
    }


    public function logout(Request $request){

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}