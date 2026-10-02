@extends('layouts.app')

@section('title', 'Job Seeker Dashboard')

@section('content')

<div class="mb-4">

    <h2>
        Job Seeker Dashboard
    </h2>

    <p class="text-muted">
        Find your next career opportunity.
    </p>

</div>


<div class="row">

    <div class="col-md-6">

        <div class="card">

            <div class="card-body">

                <h4>
                    Find Jobs
                </h4>

                <p>
                    Search active jobs using skills,
                    experience and location.
                </p>

                <a
                    href="{{ route('job-seeker.jobs') }}"
                    class="btn btn-primary"
                >
                    Find Jobs
                </a>

            </div>

        </div>

    </div>

</div>

@endsection