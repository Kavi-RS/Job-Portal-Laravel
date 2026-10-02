@extends('layouts.app')

@section('title', 'Recruiter Registration')

@section('content')

<div class="row justify-content-center mt-4">

    <div class="col-md-7">

        <div class="card">

            <div class="card-body p-4">

                <h3 class="mb-4">
                    Recruiter Registration
                </h3>


                <form
                    method="POST"
                    action="{{ route('recruiter.store') }}"
                >

                    @csrf


                    <div class="mb-3">

                        <label class="form-label">
                            Company Name
                        </label>

                        <input
                            type="text"
                            name="company_name"
                            class="form-control"
                            value="{{ old('company_name') }}"
                            required
                        >

                    </div>


                    <div class="mb-3">

                        <label class="form-label">
                            Email
                        </label>

                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            value="{{ old('email') }}"
                            required
                        >

                    </div>


                    <div class="mb-3">

                        <label class="form-label">
                            Phone
                        </label>

                        <input
                            type="text"
                            name="phone"
                            class="form-control"
                            value="{{ old('phone') }}"
                            required
                        >

                    </div>


                    <div class="mb-3">

                        <label class="form-label">
                            Address
                        </label>

                        <textarea
                            name="address"
                            class="form-control"
                            rows="4"
                            required
                        >{{ old('address') }}</textarea>

                    </div>


                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Password
                            </label>

                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                required
                            >

                        </div>


                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Confirm Password
                            </label>

                            <input
                                type="password"
                                name="password_confirmation"
                                class="form-control"
                                required
                            >

                        </div>

                    </div>


                    <button class="btn btn-success">
                        Register
                    </button>


                    <a
                        href="{{ route('login') }}"
                        class="btn btn-secondary"
                    >
                        Back to Login
                    </a>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection