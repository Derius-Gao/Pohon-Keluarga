@extends('layout')

@section('title', 'Edit Marga')

@section('content')
<div class="container mt-4">
    <h2>Edit Marga</h2>
    <form action="{{ route('marga.update', $marga->id_marga) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nama Marga</label>
            <input type="text" name="nama_marga" class="form-control" value="{{ $marga->nama_marga }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('marga.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection