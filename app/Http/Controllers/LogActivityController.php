<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LogActivity;
use Illuminate\Support\Facades\Auth;

class LogActivityController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        $query = LogActivity::query();

        // Filter berdasarkan username jika ada input
        if ($request->filled('username')) {
            $query->where('username', 'like', '%' . $request->username . '%');
        }

        // Filter berdasarkan level user
        if ($user->level == 'superadmin') {
            // Superadmin bisa lihat semua
            // tidak ada filter tambahan
        } elseif ($user->level == 'admin') {
            // Admin bisa lihat semua kecuali milik superadmin
            $query->whereHas('user', function($q) {
                $q->where('level', '!=', 'superadmin');
            });
        } else {
            // KP dan user hanya bisa lihat log mereka sendiri
            $query->where('id_user', $user->id_user);
        }

        $perPage = $request->input('per_page', 10); // default 10 row per halaman
        $logs = $query->orderBy('timestamp', 'desc')->paginate($perPage)->withQueryString();

        return view('logactivity', compact('logs'));
    }
}
