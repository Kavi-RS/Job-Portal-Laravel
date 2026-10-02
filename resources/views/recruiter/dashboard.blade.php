@extends('layouts.app')

@section('title', 'Recruiter Dashboard')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h2>Recruiter Dashboard</h2>

        <p class="text-muted">
            Manage jobs and candidates
        </p>
    </div>

</div>


<div class="row g-4">


    <div class="col-md-4">

        <div class="card">

            <div class="card-body">

                <h5>
                    Job Posts
                </h5>

                <p>
                    Create and manage your job postings.
                </p>

                <a
                    href="{{ route('recruiter.jobs') }}"
                    class="btn btn-primary"
                >
                    Manage Jobs
                </a>

            </div>

        </div>

    </div>


    <div class="col-md-4">

        <div class="card">

            <div class="card-body">

                <h5>
                    Find Candidates
                </h5>

                <p>
                    Search candidates using filters.
                </p>

                <a
                    href="{{ route('recruiter.candidates') }}"
                    class="btn btn-success"
                >
                    Find Candidates
                </a>

            </div>

        </div>

    </div>


    <div class="col-md-4">

        <div class="card">

            <div class="card-body">

                <h5>
                    Applied Candidates
                </h5>

                <p>
                    View candidates who applied.
                </p>

                <a
                    href="{{ route('recruiter.applications') }}"
                    class="btn btn-warning"
                >
                    View Applications
                </a>

            </div>

        </div>

    </div>

</div>

@endsection