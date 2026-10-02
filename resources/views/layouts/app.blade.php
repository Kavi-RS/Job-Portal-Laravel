<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Job Portal')
    </title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

 <style>

    body {
        margin: 0;
        min-height: 100vh;
        background: linear-gradient(135deg, #e0338f 0%, #a8c8e0 50%, #3b5bdb 100%);
        background-attachment: fixed;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .navbar-brand {
        font-weight: 700;
    }

    .sidebar {
        min-height: calc(100vh - 56px);
        background: rgba(33, 37, 41, 0.96);
    }

    .sidebar a {
        color: #fff;
        text-decoration: none;
        display: block;
        padding: 12px 20px;
    }

    .sidebar a:hover {
        background: #343a40;
    }

    .content {
        padding: 30px;
        min-height: calc(100vh - 56px);
    }

    .card {
        border: none;
        box-shadow: 0 2px 10px rgba(0,0,0,.08);
        background: rgba(255, 255, 255, 0.95);
    }

</style>

    @stack('styles')

</head>

<body>

<nav class="navbar navbar-dark bg-dark">

    <div class="container-fluid">

        <a class="navbar-brand"
           href="{{ url('/') }}">
            Job Portal
        </a>

        @auth

            <div class="text-white">

                {{ Auth::user()->name }}

                <form
                    action="{{ route('logout') }}"
                    method="POST"
                    class="d-inline"
                >

                    @csrf

                    <button
                        class="btn btn-sm btn-outline-light ms-2"
                    >
                        Logout
                    </button>

                </form>

            </div>

        @endauth

    </div>

</nav>


<div class="container-fluid">

    <div class="row">

        @auth

            <div class="col-md-2 p-0">

                <div class="sidebar">

                    @if(Auth::user()->role === 'recruiter')

                        <a href="{{ route('recruiter.dashboard') }}">
                            Dashboard
                        </a>

                        <a href="{{ route('recruiter.jobs') }}">
                            Job Posts
                        </a>

                        <a href="{{ route('recruiter.jobs.create') }}">
                            Add Job
                        </a>

                        <a href="{{ route('recruiter.candidates') }}">
                            Find Candidates
                        </a>

                        <a href="{{ route('recruiter.applications') }}">
                            Applied Jobs
                        </a>

                    @else

                        <a href="{{ route('job-seeker.dashboard') }}">
                            Dashboard
                        </a>

                        <a href="{{ route('job-seeker.jobs') }}">
                            Find Jobs
                        </a>

                    @endif

                </div>

            </div>

        @endif


        <div class="{{ Auth::check() ? 'col-md-10' : 'col-md-12' }}">

            <div class="content">

                @if(session('success'))

                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>

                @endif


                @if(session('error'))

                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>

                @endif


                @if($errors->any())

                    <div class="alert alert-danger">

                        <ul class="mb-0">

                            @foreach($errors->all() as $error)

                                <li>
                                    {{ $error }}
                                </li>

                            @endforeach

                        </ul>

                    </div>

                @endif


                @yield('content')

            </div>

        </div>

    </div>

</div>


<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>

@stack('scripts')

</body>

</html>