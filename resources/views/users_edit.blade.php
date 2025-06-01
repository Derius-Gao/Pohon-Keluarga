@extends('layout')

@section('title', 'Edit User')

@section('content')

<div class="container mt-4">
    <h2>Edit User</h2>
    <form action="{{ route('users.update', $user->id_user) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="mb-3">
            <label>Password (Kosongkan jika tidak ingin mengganti)</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="mb-3">
            <label>Level</label>
            <select name="level" class="form-control" required>
                @php
                    $levels = ['user' => 'User', 'kp' => 'Kepala Keluarga', 'admin' => 'Admin', 'superadmin' => 'Superadmin'];
                @endphp
                @foreach($levels as $key => $label)
                    <option value="{{ $key }}" {{ old('level', $user->level) == $key ? 'selected' : '' }}>
                        {{ $label }}
                    </option>
                @endforeach
            </select>
        </div>
<div class="mb-3">
    <label>Ayah</label>
    <select name="id_ayah" class="form-control">
        <option value="">-- Pilih Ayah --</option>
        @foreach($ayahList as $ayah)
            <option value="{{ $ayah->id_user }}" {{ old('id_ayah') == $ayah->id_user ? 'selected' : '' }}>
                {{ $ayah->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label>Ibu</label>
    <select name="id_ibu" class="form-control">
        <option value="">-- Pilih Ibu --</option>
        @foreach($ibuList as $ibu)
            <option value="{{ $ibu->id_user }}" {{ old('id_ibu') == $ibu->id_user ? 'selected' : '' }}>
                {{ $ibu->name }}
            </option>
        @endforeach
    </select>
</div>

    <div class="mb-3">
    <label>Foto</label>
    <input type="file" class="form-control" name="foto" accept="image/*">
</div>
<div class="mb-3">
    <label>Jenis Kelamin</label><br>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki" value="laki-laki"
        {{ old('jenis_kelamin', $user->jenis_kelamin ?? '') == 'laki-laki' ? 'checked' : '' }}>
        <label class="form-check-label" for="laki">Laki-laki</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="perempuan"
        {{ old('jenis_kelamin', $user->jenis_kelamin ?? '') == 'perempuan' ? 'checked' : '' }}>
        <label class="form-check-label" for="perempuan">Perempuan</label>
    </div>
    @error('jenis_kelamin')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>


        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

@endsection
