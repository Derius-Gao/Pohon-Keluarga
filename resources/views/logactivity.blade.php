@extends('layout')

@section('title', 'Log Activity')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Log Activity</h2>

    <form method="GET" action="{{ route('logactivity.index') }}" class="mb-3 row g-2 align-items-center">
        <div class="col-auto">
            <input
                type="text"
                name="username"
                class="form-control"
                placeholder="Cari Username..."
                value="{{ request('username') }}"
            >
        </div>
        <div class="col-auto">
            <select name="per_page" class="form-select">
                @foreach ([5,10,25,50,100] as $size)
                    <option value="{{ $size }}" {{ request('per_page', 10) == $size ? 'selected' : '' }}>{{ $size }} per halaman</option>
                @endforeach
            </select>
        </div>
        <div class="col-auto">
            <button class="btn btn-primary" type="submit">Filter</button>
            <a href="{{ route('logactivity.index') }}" class="btn btn-secondary">Reset</a>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-light text-center">
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Aksi</th>
                    <th>Timestamp</th>
                    <th>IP Address</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($logs as $log)
                    <tr>
                        <td class="text-center">{{ $log->id_activity }}</td>
                        <td>{{ $log->username }}</td>
                        <td>{{ $log->aksi }}</td>
                        <td>{{ \Carbon\Carbon::parse($log->timestamp)->format('d-m-Y H:i:s') }}</td>
                        <td>{{ $log->ip_address }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada log activity ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div>
        {{ $logs->links() }}
    </div>
</div>
@endsection
