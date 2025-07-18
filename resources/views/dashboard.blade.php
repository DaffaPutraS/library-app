@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row mb-4">
        <div class="col-12">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h2 class="fw-bold mb-0">Selamat Datang, {{ Auth::user()->name }}!</h2>
                            <p class="mb-0">Anda login sebagai <span class="badge bg-warning text-dark">{{ ucfirst(Auth::user()->role) }}</span></p>
                        </div>
                        <div class="text-end">
                            <p class="mb-0">{{ now()->format('l, d F Y') }}</p>
                            <p class="mb-0" id="live-clock"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <!-- Quick Stats -->
        <div class="col-md-4 mb-3">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body text-center">
                    <div class="display-4 text-primary mb-2">
                        <i class="bi bi-book"></i>
                    </div>
                    <h5 class="card-title">Total Buku</h5>
                    <h2 class="fw-bold">{{ \App\Models\Book::count() }}</h2>
                    <p class="text-muted">Jumlah buku dalam koleksi</p>
                </div>
                <div class="card-footer bg-transparent border-0">
                    <a href="{{ route('books.index') }}" class="btn btn-sm btn-outline-primary w-100">Lihat Buku</a>
                </div>
            </div>
        </div>

        @if(Auth::user()->role == 'admin' || Auth::user()->role == 'librarian')
        <div class="col-md-4 mb-3">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body text-center">
                    <div class="display-4 text-success mb-2">
                        <i class="bi bi-tags"></i>
                    </div>
                    <h5 class="card-title">Total Kategori</h5>
                    <h2 class="fw-bold">{{ \App\Models\Category::count() }}</h2>
                    <p class="text-muted">Jenis kategori yang tersedia</p>
                </div>
                <div class="card-footer bg-transparent border-0">
                    <a href="{{ route('categories.index') }}" class="btn btn-sm btn-outline-success w-100">Lihat Kategori</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body text-center">
                    <div class="display-4 text-danger mb-2">
                        <i class="bi bi-journal-check"></i>
                    </div>
                    <h5 class="card-title">Total Peminjaman</h5>
                    <h2 class="fw-bold">{{ \App\Models\Loan::count() }}</h2>
                    <p class="text-muted">Jumlah peminjaman tercatat</p>
                </div>
                <div class="card-footer bg-transparent border-0">
                    <a href="{{ route('loans.index') }}" class="btn btn-sm btn-outline-danger w-100">Lihat Peminjaman</a>
                </div>
            </div>
        </div>
        @endif
    </div>

    @if(Auth::user()->role == 'admin')
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Akses Admin</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-grid">
                                <a href="{{ route('users.index') }}" class="btn btn-lg btn-outline-primary mb-3">
                                    <i class="bi bi-people me-2"></i> Kelola Pengguna
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-grid">
                                <a href="{{ route('categories.index') }}" class="btn btn-lg btn-outline-success mb-3">
                                    <i class="bi bi-tag me-2"></i> Kelola Kategori
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>

@push('styles')
<script>
    function updateClock() {
        const now = new Date();
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const seconds = String(now.getSeconds()).padStart(2, '0');
        document.getElementById('live-clock').textContent = `${hours}:${minutes}:${seconds}`;
    }
    
    // Update setiap detik
    setInterval(updateClock, 1000);
    
    // Jalankan segera saat halaman dimuat
    updateClock();
</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
@endpush
@endsection