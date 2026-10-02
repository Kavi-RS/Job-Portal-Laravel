@extends('layouts.app')
@section('title', 'Find Jobs')
@section('content')

<h2 class="mb-4">
    Find Jobs
</h2>


<div class="card mb-4">

    <div class="card-body">

        <form
            method="GET"
            action="{{ route('job-seeker.jobs') }}"
        >

            <div class="row g-2">


                <div class="col-md-2">

                    <input
                        type="text"
                        name="skills"
                        class="form-control"
                        placeholder="Skills"
                        value="{{ request('skills') }}"
                    >

                </div>


                <div class="col-md-2">

                    <input
                        type="text"
                        name="company_name"
                        class="form-control"
                        placeholder="Company Name"
                        value="{{ request('company_name') }}"
                    >

                </div>


                <div class="col-md-2">

                    <input
                        type="number"
                        step="0.1"
                        name="min_experience"
                        class="form-control"
                        placeholder="Min Experience"
                        value="{{ request('min_experience') }}"
                    >

                </div>


                <div class="col-md-2">

                    <input
                        type="number"
                        step="0.1"
                        name="max_experience"
                        class="form-control"
                        placeholder="Max Experience"
                        value="{{ request('max_experience') }}"
                    >

                </div>


                <div class="col-md-2">

                    <select
                        name="location_id"
                        class="form-select"
                    >

                        <option value="">
                            Location
                        </option>

                        @foreach($locations as $location)

                            <option
                                value="{{ $location->id }}"
                                @selected(
                                    request('location_id')
                                    == $location->id
                                )
                            >
                                {{ $location->name }}
                            </option>

                        @endforeach

                    </select>

                </div>


                <div class="col-md-2">

                    <button
                        class="btn btn-primary w-100"
                    >
                        Search
                    </button>

                </div>

            </div>

        </form>

    </div>

</div>


<div class="card">

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered table-hover">

                <thead class="table-dark">

                    <tr>

                        <th>#</th>

                        <th>Job Title</th>

                        <th>Company Name</th>

                        <th>Experience</th>

                        <th>Action</th>

                    </tr>

                </thead>


                <tbody>

                @forelse($jobs as $job)

                    <tr>

                        <td>
                            {{ $jobs->firstItem() + $loop->index }}
                        </td>


                        <td>
                            {{ $job->job_title }}
                        </td>


                        <td>
                            {{ $job->recruiter->company_name }}
                        </td>


                        <td>
                            {{ $job->experience }}
                            Years
                        </td>


                        <td>

                            <form
                                method="POST"
                                action="{{ route(
                                    'job-seeker.apply',
                                    $job
                                ) }}"
                            >

                                @csrf

                                <button
                                    type="submit"
                                    class="btn btn-sm btn-primary"
                                >
                                    Apply
                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="5"
                            class="text-center"
                        >
                            No active jobs found.
                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>


        {{ $jobs->links() }}

    </div>

</div>

@endsection