@extends('layout')


@section('content')
<div class="container mt-4">
    <h2>Data Marga</h2>

    <form method="GET" action="{{ route('marga.index') }}" class="mb-3 row g-2 align-items-center">
        <div class="col-auto">
            <select name="per_page" class="form-select">
                @foreach ([5,10,25,50,100,200] as $size)
                    <option value="{{ $size }}" {{ $perPage == $size ? 'selected' : '' }}>{{ $size }} per halaman</option>
                @endforeach
            </select>
        </div>
        <div class="col-auto">
            <button class="btn btn-primary" type="submit">Tampilkan</button>
            <a href="{{ route('marga.index') }}" class="btn btn-secondary">Reset</a>
                <a href="{{ route('marga.create') }}" class="btn btn-success">Tambah Marga</a>
        </div>
    </form>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nomor Marga</th>
                <th>Nama Marga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($margas as $marga)
            <tr>
                <td>{{ $marga->id_marga }}</td>
                <td>{{ $marga->nama_marga }}</td>
                <td>
                    <a href="{{ route('marga.edit', $marga->id_marga) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('marga.destroy', $marga->id_marga) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center">Data marga tidak ditemukan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div>
        {{ $margas->links() }}
    </div>
</div>
@endsection
