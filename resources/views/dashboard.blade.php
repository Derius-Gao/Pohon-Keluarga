
@extends('layout')

    <title>@yield('title', \App\Models\Setting::getValue('site_title', 'Custom Auth Laravel'))</title>

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center" style="font-weight: 700; color: #3a3a5a;">
        Welcome, {{ \Illuminate\Support\Facades\Auth::user()->name }}!
    </h1>

    <div class="row g-4 justify-content-center">
        <!-- Card Pohon Keluarga -->
        <div class="col-sm-6 col-md-4 col-lg-3">
            <a href="{{ url('/familytree') }}" class="text-decoration-none">
                <div class="card shadow rounded-4 h-100 hover-scale">
                    <div class="card-body text-center p-4">
                        <i class="fa fa-sitemap fa-3x mb-3" aria-hidden="true" style="color: #7262ff;"></i>
                        <h5 class="card-title fw-bold">Pohon Keluarga</h5>
                        <p class="card-text text-muted">Lihat dan kelola silsilah keluarga secara visual.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Card Tabel User -->
        <div class="col-sm-6 col-md-4 col-lg-3">
            <a href="{{ url('/users') }}" class="text-decoration-none">
                <div class="card shadow rounded-4 h-100 hover-scale">
                    <div class="card-body text-center p-4">
                        <i class="fa fa-users fa-3x mb-3" aria-hidden="true" style="color: #f67280;"></i>
                        <h5 class="card-title fw-bold">Tabel User</h5>
                        <p class="card-text text-muted">Kelola data user dalam sistem Anda.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Card Tabel Marga -->
        <div class="col-sm-6 col-md-4 col-lg-3">
            <a href="{{ url('/marga') }}" class="text-decoration-none">
                <div class="card shadow rounded-4 h-100 hover-scale">
                    <div class="card-body text-center p-4">
                        <i class="fa fa-tree fa-3x mb-3" aria-hidden="true" style="color: #f8b400;"></i>
                        <h5 class="card-title fw-bold">Tabel Marga</h5>
                        <p class="card-text text-muted">Kelola data marga keluarga Anda.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Card Tabel Pasangan -->
        <div class="col-sm-6 col-md-4 col-lg-3">
            <a href="{{ url('/pasangan') }}" class="text-decoration-none">
                <div class="card shadow rounded-4 h-100 hover-scale">
                    <div class="card-body text-center p-4">
                        <i class="fa fa-heart fa-3x mb-3" aria-hidden="true" style="color: #ff6f91;"></i>
                        <h5 class="card-title fw-bold">Tabel Pasangan</h5>
                        <p class="card-text text-muted">Kelola data pasangan dan status pernikahan.</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

<style>
    .hover-scale {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .hover-scale:hover {
        transform: translateY(-8px) scale(1.05);
        box-shadow: 0 12px 30px rgba(114, 98, 255, 0.3);
        cursor: pointer;
    }
</style>
@endsection