@extends('layouts.app')

@section('title', 'Create Job')

@section('content')

<div class="row justify-content-center">

    <div class="col-md-9">

        <div class="card">

            <div class="card-body p-4">

                <h3 class="mb-4">
                    Create Job
                </h3>


                <form
                    method="POST"
                    action="{{ route('recruiter.jobs.store') }}"
                >

                    @csrf


                    <div class="mb-3">

                        <label class="form-label">
                            Job Title
                        </label>

                        <input
                            type="text"
                            name="job_title"
                            class="form-control"
                            value="{{ old('job_title') }}"
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
                            value="{{ old('experience') }}"
                            placeholder="Example: 2"
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
                        >{{ old('job_description') }}</textarea>

                    </div>


                    <div class="mb-3">

                        <label class="form-label">
                            Skills Required
                        </label>

                        <textarea
                            name="skills_required"
                            rows="3"
                            class="form-control"
                            placeholder="PHP, Laravel, MySQL"
                            required
                        >{{ old('skills_required') }}</textarea>

                    </div>


                    <div class="mb-4">

                        <label class="form-label">
                            Status
                        </label>

                        <select
                            name="status"
                            class="form-select"
                            required
                        >

                            <option value="active">
                                Active
                            </option>

                            <option value="inactive">
                                Inactive
                            </option>

                        </select>

                    </div>


                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Create Job
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