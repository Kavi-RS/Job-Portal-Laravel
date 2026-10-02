@extends('layouts.app')

@section('title', 'Job Posts')

@section('content')

<div class="d-flex justify-content-between mb-4">

    <h2>Job Posts</h2>

    <a
        href="{{ route('recruiter.jobs.create') }}"
        class="btn btn-primary"
    >
        + Add Job
    </a>

</div>


<div class="card">

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered table-hover">

                <thead class="table-dark">

                    <tr>
                        <th>#</th>
                        <th>Job Title</th>
                        <th>Experience</th>
                        <th>Skills</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>

                </thead>


                <tbody>

                @forelse($jobs as $job)

                    <tr>

                        <td>
                            {{ $loop->iteration }}
                        </td>

                        <td>
                            {{ $job->job_title }}
                        </td>

                        <td>
                            {{ $job->experience }} Years
                        </td>

                        <td>
                            {{ $job->skills_required }}
                        </td>

                        <td>

                            @if($job->status === 'active')

                                <span class="badge bg-success">
                                    Active
                                </span>

                            @else

                                <span class="badge bg-danger">
                                    Inactive
                                </span>

                            @endif

                        </td>

                        <td>

                            <a
                                href="{{ route(
                                    'recruiter.jobs.edit',
                                    $job
                                ) }}"
                                class="btn btn-sm btn-warning"
                            >
                                Edit
                            </a>


                            <form
                                action="{{ route(
                                    'recruiter.jobs.destroy',
                                    $job
                                ) }}"
                                method="POST"
                                class="d-inline"
                            >

                                @csrf

                                @method('DELETE')

                                <button
                                    class="btn btn-sm btn-danger"
                                    onclick="
                                        return confirm(
                                            'Are you sure?'
                                        )
                                    "
                                >
                                    Delete
                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="6"
                            class="text-center"
                        >
                            No jobs found.
                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection