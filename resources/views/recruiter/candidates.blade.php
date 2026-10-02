@extends('layouts.app')

@section('title', 'Find Candidates')

@section('content')

<h2 class="mb-4">
    Find Candidates
</h2>


<div class="card mb-4">

    <div class="card-body">

        <form
            method="GET"
            action="{{ route('recruiter.candidates') }}"
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
                        type="number"
                        name="notice_period"
                        class="form-control"
                        placeholder="Notice <= "
                        value="{{ request('notice_period') }}"
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

                        <th>Photo</th>

                        <th>Candidate Name</th>

                        <th>Experience</th>

                        <th>Notice Period</th>

                        <th>Skills</th>

                        <th>Location</th>

                    </tr>

                </thead>


                <tbody>

                @forelse($candidates as $candidate)

                    <tr>

                        <td>

                            @if($candidate->photo)

                                <img
                                    src="{{ asset(
                                        'storage/' .
                                        $candidate->photo
                                    ) }}"
                                    width="50"
                                    height="50"
                                    class="rounded-circle"
                                >

                            @else

                                <span>
                                    No Photo
                                </span>

                            @endif

                        </td>


                        <td>
                            {{ $candidate->user->name }}
                        </td>


                        <td>
                            {{ $candidate->experience }}
                            Years
                        </td>


                        <td>
                            {{ $candidate->notice_period }}
                            Days
                        </td>


                        <td>
                            {{ $candidate->skills }}
                        </td>


                        <td>
                            {{ $candidate->location->name ?? '-' }}
                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="6"
                            class="text-center"
                        >
                            No candidates found.
                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>


        {{ $candidates->links() }}

    </div>

</div>

@endsection