@extends('layout')

@section('title', 'Tabel User')

@section('content')

<div class="mt-4 mb-4 w-100 px-3">
    <h2>Daftar User</h2>

    <form method="GET" action="{{ route('users.index') }}" class="mb-3 row g-2 align-items-center">
        <div class="col-auto">
            <select name="per_page" class="form-select">
                @foreach ([5,10,25,50,100,200] as $size)
                    <option value="{{ $size }}" {{ request('per_page', 10) == $size ? 'selected' : '' }}>
                        {{ $size }} per halaman
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-auto">
            <button class="btn btn-primary" type="submit">Tampilkan</button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Reset</a>
             <a href="{{ route('users.create') }}" class="btn btn-success">Tambah User</a>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-light text-center">
                <tr>
                    <th>ID User</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Dibuat</th>
                    <th>Ayah</th>
                    <th>Ibu</th>
                    <th>Foto</th>
                    <th>Jenis Kelamin</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                <tr>
                    <td class="text-center">{{ $user->id_user }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->ayah?->name ?? '-' }}</td>
                    <td>{{ $user->ibu?->name ?? '-' }}</td>
                    <td>
                        @if ($user->foto)
                            <a href="{{ asset('storage/' . $user->foto) }}" target="_blank" class="btn btn-info btn-sm">Lihat Foto</a>
                        @else
                            <span class="text-muted">Belum Ada</span>
                        @endif
                    </td>
                    <td>{{ $user->jenis_kelamin ?? '-' }}</td>
                    <td>
                        <a href="{{ route('users.edit', $user->id_user) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('users.destroy', $user->id_user) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus user ini?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="text-center">Data user tidak ditemukan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div>
        {{ $users->links() }}
    </div>
</div>

@endsection
