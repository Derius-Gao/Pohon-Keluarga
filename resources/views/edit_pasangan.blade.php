
@extends('layout')

@section('title', 'Edit Pasangan')

@section('content')
<div class="container mt-4">
    <h2>Edit Pasangan</h2>
    <form action="{{ route('pasangan.update', $pasangan->id_pasangan) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Suami</label>
            <select name="id_suami" class="form-control" required>
                <option value="">-- Pilih Suami --</option>
                @foreach($users as $user)
                    <option value="{{ $user->id_user }}" {{ $pasangan->id_suami == $user->id_user ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Istri</label>
            <select name="id_istri" class="form-control" required>
                <option value="">-- Pilih Istri --</option>
                @foreach($users as $user)
                    <option value="{{ $user->id_user }}" {{ $pasangan->id_istri == $user->id_user ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Tanggal Menikah</label>
            <input type="date" name="tanggal_menikah" class="form-control" value="{{ $pasangan->tanggal_menikah }}" required>
        </div>
        <div class="mb-3">
            <label>Status</label>
            <input type="text" name="status" class="form-control" value="{{ $pasangan->status }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('pasangan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection