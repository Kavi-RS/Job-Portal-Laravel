@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="card shadow-sm border-0">

        <div class="card-body p-4">

            <h2 class="mb-4">Job Seeker Registration</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form
                method="POST"
                action="{{ route('job-seeker.store') }}"
                enctype="multipart/form-data"
            >

                @csrf

                <div class="row">

                    <!-- Name -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Name</label>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            class="form-control"
                            placeholder="Enter your name"
                            required
                        >
                    </div>


                    <!-- Email -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Email</label>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            class="form-control"
                            placeholder="Enter your email"
                            required
                        >
                    </div>


                    <!-- Phone -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Phone</label>

                        <input
                            type="text"
                            name="phone"
                            value="{{ old('phone') }}"
                            class="form-control"
                            placeholder="Enter phone number"
                            required
                        >
                    </div>


                    <!-- Experience -->
                    <div class="col-md-3 mb-3">
                        <label class="form-label">
                            Experience (Years)
                        </label>

                        <input
                            type="number"
                            name="experience"
                            value="{{ old('experience') }}"
                            class="form-control"
                            placeholder="Years"
                            min="0"
                        >
                    </div>


                    <!-- Notice Period -->
                    <div class="col-md-3 mb-3">
                        <label class="form-label">
                            Notice Period (Days)
                        </label>

                        <input
                            type="number"
                            name="notice_period"
                            value="{{ old('notice_period') }}"
                            class="form-control"
                            placeholder="Days"
                            min="0"
                        >
                    </div>


                    <!-- Skills -->
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Skills</label>

                        <textarea
                            name="skills"
                            class="form-control"
                            rows="3"
                            placeholder="PHP, Laravel, MySQL, JavaScript..."
                        >{{ old('skills') }}</textarea>
                    </div>


                    <!-- Location -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Job Location</label>

                        <select
                            name="location_id"
                            class="form-select"
                        >

                            <option value="">
                                Select Location
                            </option>

                            @foreach($locations as $location)

                                <option
                                    value="{{ $location->id }}"
                                    {{ old('location_id') == $location->id ? 'selected' : '' }}
                                >
                                    {{ $location->name }}
                                </option>

                            @endforeach

                        </select>
                    </div>


                    <!-- Resume -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Resume</label>

                        <input
                            type="file"
                            name="resume"
                            class="form-control"
                            accept=".pdf,.doc,.docx"
                        >
                    </div>


                    <!-- Photo -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Photo</label>

                        <input
                            type="file"
                            name="photo"
                            class="form-control"
                            accept="image/*"
                        >
                    </div>


                    <!-- Password -->
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Password</label>

                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            placeholder="Password"
                            required
                        >
                    </div>


                    <!-- Confirm Password -->
                    <div class="col-md-3 mb-3">
                        <label class="form-label">
                            Confirm Password
                        </label>

                        <input
                            type="password"
                            name="password_confirmation"
                            class="form-control"
                            placeholder="Confirm Password"
                            required
                        >
                    </div>

                </div>


                <div class="mt-3">

                    <button
                        type="submit"
                        class="btn btn-success"
                    >
                        Register
                    </button>

                    <a
                        href="{{ route('login') }}"
                        class="btn btn-secondary"
                    >
                        Back to Login
                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection