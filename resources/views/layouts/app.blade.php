<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Library App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote/dist/summernote.min.css" rel="stylesheet">
    @stack('styles')
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="#">Library App</a>
        <div>
            @auth
                <!-- Books - visible to all authenticated users -->
                <a class="nav-link text-white d-inline" href="{{ route('books.index') }}">Books</a>
                
                <!-- Categories and Loans - only for librarians and admins -->
                @if(Auth::user()->role == 'librarian' || Auth::user()->role == 'admin')
                    <a class="nav-link text-white d-inline" href="{{ route('categories.index') }}">Categories</a>
                    <a class="nav-link text-white d-inline" href="{{ route('loans.index') }}">Loans</a>
                @endif
                
                <!-- Users - only for admins -->
                @if(Auth::user()->role == 'admin')
                    <a class="nav-link text-white d-inline" href="{{ route('users.index') }}">Users</a>
                @endif
                
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-link nav-link text-white" style="display:inline; cursor:pointer;">
                        Logout
                    </button>
                </form>
            @else
                <a class="nav-link text-white d-inline" href="{{ route('login') }}">Login</a>
                <a class="nav-link text-white d-inline" href="{{ route('register') }}">Register</a>
            @endauth
        </div>
    </div>
</nav>
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @yield('content')
</div>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote/dist/summernote.min.js"></script>
@stack('scripts')
</body>
</html>