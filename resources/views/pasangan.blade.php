@extends('layout')

@section('title', 'Data Pasangan')

@section('content')
<div class="container mt-4">
    <h2>Data Pasangan</h2>

    <form method="GET" action="{{ route('pasangan.index') }}" class="mb-3 row g-2 align-items-center">
        <div class="col-auto">
            <select name="per_page" class="form-select">
                @foreach ([5,10,25,50,100,200] as $size)
                    <option value="{{ $size }}" {{ $perPage == $size ? 'selected' : '' }}>{{ $size }} per halaman</option>
                @endforeach
            </select>
        </div>
        <div class="col-auto">
            <button class="btn btn-primary" type="submit">Tampilkan</button>
            <a href="{{ route('pasangan.index') }}" class="btn btn-secondary">Reset</a>
                <a href="{{ route('pasangan.create') }}" class="btn btn-success">Tambah Pasangan</a>
        </div>
    </form>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID Pasangan</th>
                <th>Suami</th>
                <th>Istri</th>
                <th>Tanggal Menikah</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pasangans as $p)
            <tr>
                <td>{{ $p->id_pasangan }}</td>
                <td>{{ $p->suami->name ?? '-' }}</td>
                <td>{{ $p->istri->name ?? '-' }}</td>
                <td>{{ $p->tanggal_menikah }}</td>
                <td>{{ $p->status }}</td>
                <td>
                    <a href="{{ route('pasangan.edit', $p->id_pasangan) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('pasangan.destroy', $p->id_pasangan) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Data pasangan tidak ditemukan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div>
        {{ $pasangans->links() }}
    </div>
</div>
@endsection
