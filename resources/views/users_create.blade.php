@extends('layout')

@section('title', 'Tambah User')

@section('content')
<div class="container">
    <h2>Tambah User</h2>
    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label>Email address</label>
            <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" class="form-control" name="password" required>
        </div>

        <div class="mb-3">
            <label>Level</label>
            <select name="level" class="form-control" required>
                <option value="user" {{ old('level') == 'user' ? 'selected' : '' }}>User</option>
                <option value="admin" {{ old('level') == 'admin' ? 'selected' : '' }}>Admin</option>
                 <option value="kp" {{ old('level') == 'kp' ? 'selected' : '' }}>Kepala Keluarga</option>
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
<div class="mb-3">
    <label>Marga</label>
    <select name="id_marga" class="form-control" required>
        <option value="">-- Pilih Marga --</option>
        @foreach($margas as $marga)
            <option value="{{ $marga->id_marga }}" {{ old('id_marga') == $marga->id_marga ? 'selected' : '' }}>
                {{ $marga->nama_marga }}
            </option>
        @endforeach
    </select>
    @error('id_marga')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>


        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
