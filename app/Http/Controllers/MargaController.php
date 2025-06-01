<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Marga;
use App\Models\LogActivity;
use Illuminate\Support\Facades\Request as RequestFacade;

class MargaController extends Controller
{
    protected function logActivity($aksi)
    {
        LogActivity::create([
            'id_user' => Auth::id(),
            'username' => Auth::user()->name,
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
        $query = Marga::query();
        $this->logActivity("Melihat semua data marga");
    } elseif ($user->level === 'kp') {
        $query = Marga::where('created_by', $user->id_user);
        $this->logActivity("Melihat data marga yang dibuat");
    } else {
        abort(403, 'Anda tidak memiliki akses.');
    }

    $data = $query->orderBy('id_marga', 'desc')
                  ->paginate($perPage)
                  ->appends($request->except('page'));

    return view('marga', ['margas' => $data, 'perPage' => $perPage]);
}

    public function create()
    {
        $this->logActivity("Membuka halaman tambah marga");
        return view('create_marga');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_marga' => 'required|string|max:255',
        ]);

        $userId = auth()->user()->id_user;
        $exists = Marga::where('created_by', $userId)->exists();

        if ($exists) {
            return redirect()->back()->with('error', 'Anda sudah memiliki data marga, tidak bisa tambah lagi.');
        }

        $data = new Marga;
        $data->nama_marga = $request->nama_marga;
        $data->created_by = $userId;
        $data->save();

        $user = User::find($userId);
        if ($user) {
            $user->id_marga = $data->id_marga;
            $user->save();
        }

        $this->logActivity("Menambahkan marga baru: {$data->nama_marga}");

        return redirect()->route('marga.index')->with('success', 'Marga berhasil ditambahkan dan dihubungkan ke user.');
    }

    public function edit($id_marga)
    {
        $marga = Marga::findOrFail($id_marga);
        $this->logActivity("Membuka halaman edit marga dengan ID {$id_marga}");
        return view('edit_marga', compact('marga'));
    }

    public function update(Request $request, $id_marga)
    {
        $request->validate([
            'nama_marga' => 'required',
        ]);
        $marga = Marga::findOrFail($id_marga);
        $oldName = $marga->nama_marga;
        $marga->nama_marga = $request->nama_marga;
        $marga->save();

        $this->logActivity("Memperbarui marga ID {$id_marga} dari '{$oldName}' menjadi '{$request->nama_marga}'");

        return redirect()->route('marga.index');
    }

    public function destroy($id_marga)
    {
        $marga = Marga::findOrFail($id_marga);
        $name = $marga->nama_marga;
        $marga->delete();

        $this->logActivity("Menghapus marga '{$name}' dengan ID {$id_marga}");

        return redirect()->route('marga.index');
    }
}
