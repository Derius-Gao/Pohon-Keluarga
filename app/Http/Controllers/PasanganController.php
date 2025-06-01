<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasangan;
use App\Models\User;
use App\Models\LogActivity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request as RequestFacade; // Alias supaya tidak bentrok dengan Request $request

class PasanganController extends Controller
{
    protected function logActivity($aksi)
    {
        LogActivity::create([
            'id_user' => auth()->id(),
            'username' => auth()->user()->name,
            'aksi' => $aksi,
            'timestamp' => now(),
            'ip_address' => RequestFacade::ip(),
        ]);
    }

public function index(Request $request)
{
    $user = auth()->user();
    $perPage = $request->input('per_page', 10);
    $perPage = min(max((int)$perPage, 5), 200);

    if ($user->level === 'admin' || $user->level === 'superadmin') {
        $query = Pasangan::with(['suami', 'istri']);
        $this->logActivity('Melihat semua data pasangan');
    } else {
        $query = Pasangan::with(['suami', 'istri'])
                        ->where('created_by', $user->id_user);
        $this->logActivity('Melihat data pasangan sendiri');
    }

    $pasangans = $query->orderBy('id_pasangan', 'desc')
                      ->paginate($perPage)
                      ->appends($request->except('page'));

    return view('pasangan', compact('pasangans', 'perPage'));
}


    public function create()
    {
        $users = User::all();
        $this->logActivity('Membuka halaman tambah pasangan');
        return view('create_pasangan', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_suami' => 'required|exists:users,id_user',
            'id_istri' => 'required|exists:users,id_user|different:id_suami',
            'tanggal_menikah' => 'required|date',
            'status' => 'required',
        ]);

        Pasangan::create(array_merge($request->all(), [
            'created_by' => auth()->user()->id_user,
        ]));

        $this->logActivity('Menambahkan pasangan baru');

        return redirect()->route('pasangan.index');
    }

    public function edit($id_pasangan)
    {
        $pasangan = Pasangan::findOrFail($id_pasangan);
        $users = User::all();
        $this->logActivity("Membuka halaman edit pasangan dengan ID {$id_pasangan}");
        return view('edit_pasangan', compact('pasangan', 'users'));
    }

    public function update(Request $request, $id_pasangan)
    {
        $request->validate([
            'id_suami' => 'required|exists:users,id_user',
            'id_istri' => 'required|exists:users,id_user|different:id_suami',
            'tanggal_menikah' => 'required|date',
            'status' => 'required',
        ]);

        $pasangan = Pasangan::findOrFail($id_pasangan);

        $pasangan->update($request->except('created_by'));

        $this->logActivity("Memperbarui data pasangan dengan ID {$id_pasangan}");

        return redirect()->route('pasangan.index');
    }

    public function destroy($id_pasangan)
    {
        $pasangan = Pasangan::findOrFail($id_pasangan);
        $pasangan->delete();

        $this->logActivity("Menghapus data pasangan dengan ID {$id_pasangan}");

        return redirect()->route('pasangan.index');
    }
}
