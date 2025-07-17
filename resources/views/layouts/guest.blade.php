<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Library App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
        }
        .login-image {
            object-fit: cover;
            height: 100%;
            width: 100%;
        }
    </style>
    @stack('styles')
</head>
<body>
    <section class="d-flex align-items-center justify-content-center min-vh-100 bg-light" style="max-width:1200px; margin:auto;">
        <div class="row w-100 bg-white rounded-lg overflow-hidden shadow-lg">
            @if (Request::is('register'))
                <!-- Left: Image & Info -->
                <div class="d-none d-md-block col-md-6 p-0">
                    <img src="{{ asset('images/img_register.jpg') }}" alt="Register Image" class="login-image">
                </div>
                <!-- Right: Register Form -->
                <div class="col-12 col-md-6 p-5 d-flex flex-column justify-content-center">
                    @yield('content')
                </div>
            @else
                <!-- Left: Login Form -->
                <div class="col-12 col-md-6 p-5 d-flex flex-column justify-content-center">
                    @yield('content')
                </div>
                <!-- Right: Image & Info -->
                <div class="d-none d-md-block col-md-6 p-0">
                    <img src="{{ asset('images/img_login.jpg') }}" alt="Login Image" class="login-image">
                </div>
            @endif
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>