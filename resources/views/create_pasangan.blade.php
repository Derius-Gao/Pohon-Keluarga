@extends('layout')

@section('title', 'Tambah Pasangan')

@section('content')
<div class="container mt-4">
    <h2>Tambah Pasangan</h2>
    <form action="{{ route('pasangan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Suami</label>
            <select name="id_suami" class="form-control" required>
                <option value="">-- Pilih Suami --</option>
                @foreach($users as $user)
                    <option value="{{ $user->id_user }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Istri</label>
            <select name="id_istri" class="form-control" required>
                <option value="">-- Pilih Istri --</option>
                @foreach($users as $user)
                    <option value="{{ $user->id_user }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Tanggal Menikah</label>
            <input type="date" name="tanggal_menikah" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Status</label>
            <input type="text" name="status" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('pasangan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection