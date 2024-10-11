<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Vaccination Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #fff;
            color: #000;
            padding: 50px;
        }

        .btn-primary {
            background-color: #2d3748;
            color: #fff;
            min-width: 120px;
            border-color: #2d3748 !important;
        }
        .btn-primary:hover {
            color: #2d3748;
            background-color: #fff;
        }
        .btn-outline-dark {
            border-color: #2d3748;
            color: #2d3748;
            background-color: #fff;
            min-width: 120px;
        }
        .btn-outline-dark:hover {
            background-color: #2d3748;
            color: #fff;
        }

        .alert {
            margin-top: 20px;
        }
    </style>
    @yield('extra-css')
</head>
<body>
<div class="container">
    <h2 class="text-center mb-4">
        <a href="{{ route('home') }}" class="text-decoration-none text-dark">Vaccination Portal</a>
    </h2>
    <hr>

    <!-- Status Notification -->
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Error Notifications -->
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
@yield('extra-js')
</body>
</html>
