@extends('layouts.app')

@section('title', 'Applied Candidates')

@section('content')

<h2 class="mb-4">
    Applied Candidates
</h2>


<div class="card">

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered table-hover">

                <thead class="table-dark">

                    <tr>

                        <th>Photo</th>

                        <th>Candidate Name</th>

                        <th>Experience</th>

                        <th>Phone</th>

                        <th>Job Title</th>

                        <th>Resume</th>

                    </tr>

                </thead>


                <tbody>

                @forelse($applications as $application)

                    <tr>

                        <td>

                            @if(
                                $application->jobSeeker->photo
                            )

                                <img
                                    src="{{ asset(
                                        'storage/' .
                                        $application
                                            ->jobSeeker
                                            ->photo
                                    ) }}"
                                    width="50"
                                    height="50"
                                    class="rounded-circle"
                                >

                            @else

                                No Photo

                            @endif

                        </td>


                        <td>
                            {{ $application
                                ->jobSeeker
                                ->user
                                ->name }}
                        </td>


                        <td>
                            {{ $application
                                ->jobSeeker
                                ->experience }}
                            Years
                        </td>


                        <td>
                            {{ $application
                                ->jobSeeker
                                ->phone }}
                        </td>


                        <td>
                            {{ $application
                                ->job
                                ->job_title }}
                        </td>


                        <td>

                            <a
                                href="{{ route(
                                    'recruiter.resume',
                                    $application->jobSeeker
                                ) }}"
                                class="btn btn-sm btn-success"
                            >
                                Download
                            </a>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="6"
                            class="text-center"
                        >
                            No applications found.
                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection