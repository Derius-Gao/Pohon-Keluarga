@extends('layout')

@section('title', 'Pengaturan Aplikasi')

@section('content')
<div class="container mt-4">
    <h2>Pengaturan Aplikasi</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="site_title" class="form-label">Judul Website (Title Tag)</label>
            <input type="text" class="form-control" id="site_title" name="site_title"
                   value="{{ old('site_title', $settings['site_title']->value ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="header_title" class="form-label">Judul Header (Navbar Text)</label>
            <input type="text" class="form-control" id="header_title" name="header_title"
                   value="{{ old('header_title', $settings['header_title']->value ?? 'Sigma') }}" required>
        </div>

        <div class="mb-3">
            <label for="logo" class="form-label">Logo Website</label><br>
            @if(!empty($settings['logo_path']->value))
                <img src="{{ asset('storage/' . $settings['logo_path']->value) }}" alt="Logo" style="max-height: 100px; margin-bottom:10px;">
                <br>
            @endif
            <input type="file" id="logo" name="logo" accept="image/*">
            <small class="form-text text-muted">Kosongkan jika tidak ingin mengganti logo.</small>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Pengaturan</button>
    </form>
</div>
@endsection
