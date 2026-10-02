<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobSeekerController;
use App\Http\Controllers\RecruiterController;
use App\Http\Controllers\JobController;

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.authenticate');
Route::get('/register/job-seeker', [AuthController::class, 'jobSeekerRegister'])->name('job-seeker.register');
Route::post('/register/job-seeker', [AuthController::class, 'storeJobSeeker'])->name('job-seeker.store');
Route::get('/register/recruiter', [AuthController::class, 'recruiterRegister'])->name('recruiter.register');
Route::post('/register/recruiter', [AuthController::class, 'storeRecruiter'])->name('recruiter.store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::middleware('auth')->prefix('recruiter')->group(function () {

    Route::get('/dashboard',[RecruiterController::class, 'dashboard'])->name('recruiter.dashboard');
    Route::get('/jobs',[JobController::class, 'index'])->name('recruiter.jobs');
    Route::get('/jobs/create',[JobController::class, 'create'])->name('recruiter.jobs.create');
    Route::post('/jobs',[JobController::class, 'store'])->name('recruiter.jobs.store');
    Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->name('recruiter.jobs.edit');
    Route::put('/jobs/{job}',[JobController::class, 'update'])->name('recruiter.jobs.update');
    Route::delete('/jobs/{job}',[JobController::class, 'destroy'])->name('recruiter.jobs.destroy');
    Route::get('/candidates',[RecruiterController::class, 'candidates'])->name('recruiter.candidates');
    Route::get('/applications',[RecruiterController::class, 'applications'])->name('recruiter.applications');
    Route::get('/candidate/{candidate}/resume',[RecruiterController::class, 'downloadResume'])->name('recruiter.resume');
});


Route::middleware('auth')->prefix('job-seeker')->group(function () {

    Route::get('/dashboard',[JobSeekerController::class, 'dashboard'])->name('job-seeker.dashboard');
    Route::get('/jobs',[JobSeekerController::class, 'jobs'])->name('job-seeker.jobs');
    Route::post('/jobs/{job}/apply',[JobSeekerController::class, 'apply'])->name('job-seeker.apply');
});