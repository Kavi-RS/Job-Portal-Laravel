@extends('layouts.app')

@section('title', 'Edit Job')

@section('content')

<div class="row justify-content-center">

    <div class="col-md-9">

        <div class="card">

            <div class="card-body p-4">

                <h3 class="mb-4">
                    Edit Job
                </h3>


                <form
                    method="POST"
                    action="{{ route(
                        'recruiter.jobs.update',
                        $job
                    ) }}"
                >

                    @csrf

                    @method('PUT')


                    <div class="mb-3">

                        <label class="form-label">
                            Job Title
                        </label>

                        <input
                            type="text"
                            name="job_title"
                            class="form-control"
                            value="{{ old(
                                'job_title',
                                $job->job_title
                            ) }}"
                            required
                        >

                    </div>


                    <div class="mb-3">

                        <label class="form-label">
                            Experience
                        </label>

                        <input
                            type="number"
                            step="0.1"
                            min="0"
                            name="experience"
                            class="form-control"
                            value="{{ old(
                                'experience',
                                $job->experience
                            ) }}"
                            required
                        >

                    </div>


                    <div class="mb-3">

                        <label class="form-label">
                            Job Description
                        </label>

                        <textarea
                            name="job_description"
                            rows="6"
                            class="form-control"
                            required
                        >{{ old(
                            'job_description',
                            $job->job_description
                        ) }}</textarea>

                    </div>


                    <div class="mb-3">

                        <label class="form-label">
                            Skills Required
                        </label>

                        <textarea
                            name="skills_required"
                            rows="3"
                            class="form-control"
                            required
                        >{{ old(
                            'skills_required',
                            $job->skills_required
                        ) }}</textarea>

                    </div>


                    <div class="mb-4">

                        <label class="form-label">
                            Status
                        </label>

                        <select
                            name="status"
                            class="form-select"
                        >

                            <option
                                value="active"
                                @selected(
                                    old(
                                        'status',
                                        $job->status
                                    ) === 'active'
                                )
                            >
                                Active
                            </option>

                            <option
                                value="inactive"
                                @selected(
                                    old(
                                        'status',
                                        $job->status
                                    ) === 'inactive'
                                )
                            >
                                Inactive
                            </option>

                        </select>

                    </div>


                    <button
                        type="submit"
                        class="btn btn-success"
                    >
                        Update Job
                    </button>


                    <a
                        href="{{ route('recruiter.jobs') }}"
                        class="btn btn-secondary"
                    >
                        Cancel
                    </a>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection