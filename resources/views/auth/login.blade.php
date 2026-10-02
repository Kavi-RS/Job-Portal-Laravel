@extends('layouts.app')
@section('title', 'Login')

@section('content')

<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">

<style>
    body {
        font-family: 'Montserrat', sans-serif;
    }
    .glass-wrap {
        background: rgba(255, 255, 255, 0.25);
        backdrop-filter: blur(14px);
        -webkit-backdrop-filter: blur(14px);
        border: 1px solid rgba(255, 255, 255, 0.4);
        border-radius: 20px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.25);
        padding: 60px 50px;
        min-height: 480px;
    }
    .glass-card {
        background: rgba(255, 255, 255, 0.55);
        border: 1px solid rgba(255, 255, 255, 0.6);
        border-radius: 20px;
        padding: 35px 30px;
    }
    .glass-card .form-control {
        background: rgba(255, 255, 255, 0.8);
        border: none;
        border-radius: 10px;
        padding: 10px 14px;
    }
    .btn-pill {
        background: #0d6efd;
        color: #fff;
        border: none;
        border-radius: 30px;
        padding: 10px 30px;
    }
    .btn-pill:hover { background: #0b5ed7; color: #fff; }
    .btn-pill-outline {
        display: inline-block;
        border: 1px solid #0d6efd;
        color: #0d6efd;
        border-radius: 30px;
        padding: 8px 20px;
        font-size: 13px;
        font-weight: 500;
        background: transparent;
        text-decoration: none;
    }
    .btn-pill-outline:hover { background: #0d6efd; color: #fff; }
    .hero-title { font-size: 40px; font-weight: 600; color: #222; }
    .hero-sub { font-size: 18px; color: #222; }
</style>

<div class="container mt-5 mb-5">
    <div class="glass-wrap">
        <div class="row align-items-center">

            {{-- Left side text --}}
            <div class="col-md-6 mb-4 mb-md-0">
                <div class="hero-sub">Welcome back</div>
                <div class="hero-title mb-3">Sign in to your account</div>
                <p style="font-size: 14px; color: #333;">
                    Whether you are looking for your next career move or searching for
                    the right talent, log in to pick up right where you left off.
                </p>

                <div class="mt-4">
                    <p class="mb-2" style="font-size: 13px; color: #333;">New here? Create a free account</p>
                    <a href="{{ route('job-seeker.register') }}" class="btn-pill-outline me-2">I'm a Job Seeker</a>
                    <a href="{{ route('recruiter.register') }}" class="btn-pill-outline">I'm a Recruiter</a>
                </div>
            </div>
            
            <div class="col-md-5 offset-md-1">
                <div class="glass-card">
                    <h4 class="text-center mb-1">Login</h4>
                    <p class="text-center mb-4" style="font-size: 13px; color: #555;">
                        Enter your credentials to continue
                    </p>

                    <form method="POST" action="{{ route('login.authenticate') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-control" placeholder="you@example.com" value="{{ old('email') }}" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                        </div>

                        <button type="submit" class="btn-pill w-100">Login</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection