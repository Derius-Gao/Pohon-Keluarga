<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Marga;
use App\Models\LogActivity;
use Illuminate\Support\Facades\Request  as RequestFacade;

class UserController extends Controller
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
        $query = User::query();

        if ($user->level === 'superadmin') {
            // lihat semua user
        } elseif ($user->level === 'admin') {
            $query->where('level', '!=', 'superadmin');
        } else {
            $query->where('id_user', $user->id_user);
        }
        $this->logActivity("Membuka tabel user");
        $perPage = $request->input('per_page', 10);
        $perPage = min(max((int)$perPage, 5), 200);

        $users = $query->orderBy('created_at', 'desc')
            ->paginate($perPage)
            ->appends($request->except('page'));

        return view('users', compact('users'));
    }

    public function store(Request $request)
    {
        if (!in_array(auth()->user()->level, ['admin','superadmin','kp'])) {
            return response()->json(['success'=>false,'message'=>'Tidak diizinkan'], 403);
        }
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'id_ayah' => 'nullable|integer|exists:users,id_user',
            'id_ibu' => 'nullable|integer|exists:users,id_user',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'id_marga' => 'required|integer|exists:marga,id_marga',
            'foto' => 'nullable|image|max:2048'
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('foto_user', 'public');
        }

        $margaId = $request->id_marga;
        if (empty($margaId) && $request->filled('id_ayah')) {
            $ayah = User::find($request->id_ayah);
            if ($ayah && $ayah->id_marga) {
                $margaId = $ayah->id_marga;
            }
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => 'user',
            'id_ayah' => $request->id_ayah ?: null,
            'id_ibu' => $request->id_ibu ?: null,
            'foto' => $fotoPath,
            'jenis_kelamin' => $request->jenis_kelamin,
            'id_marga' => $margaId,
        ]);
        $this->logActivity("Menambahkan user baru: {$user->name} (ID: {$user->id_user})");

        if ($request->ajax()) {
            return response()->json(['success'=>true]);
        }
        return redirect()->route('users.index');
    }

    public function create()
    {
        $ayahList = User::where('jenis_kelamin', 'laki-laki')->get();
        $ibuList = User::where('jenis_kelamin', 'perempuan')->get();
        $margas = Marga::all();
        return view('users_create', compact('ayahList', 'ibuList', 'margas'));
    }

    public function edit($id_user)
    {
        $user = User::findOrFail($id_user);
        $ayahList = User::where('jenis_kelamin', 'laki-laki')->where('id_user', '!=', $id_user)->get();
        $ibuList = User::where('jenis_kelamin', 'perempuan')->where('id_user', '!=', $id_user)->get();
        $margas = Marga::all();
        return view('users_edit', compact('user', 'ayahList', 'ibuList', 'margas'));
    }

    public function update(Request $request, $id_user)
    {
        if (!in_array(auth()->user()->level, ['admin','superadmin','kp'])) {
            return response()->json(['success'=>false,'message'=>'Tidak diizinkan'], 403);
        }
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id_user . ',id_user',
            'password' => 'nullable|min:6',
            'id_ayah' => 'nullable|integer|exists:users,id_user',
            'id_ibu' => 'nullable|integer|exists:users,id_user',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'id_marga' => 'required|integer|exists:marga,id_marga',
            'foto' => 'nullable|image|max:2048'
        ]);
        $user = User::findOrFail($id_user);

        if ($request->hasFile('foto')) {
            if ($user->foto && Storage::disk('public')->exists($user->foto)) {
                Storage::disk('public')->delete($user->foto);
            }
            $fotoPath = $request->file('foto')->store('foto_user', 'public');
            $user->foto = $fotoPath;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->level = 'user';
        $user->id_ayah = $request->id_ayah ?: null;
        $user->id_ibu = $request->id_ibu ?: null;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->id_marga = $request->id_marga;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        $this->logActivity("Mengupdate user: {$user->name} (ID: {$user->id_user})");

        if ($request->ajax()) {
            return response()->json(['success'=>true]);
        }
        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        if (!in_array(auth()->user()->level, ['admin','superadmin','kp'])) {
            return response()->json(['success'=>false,'message'=>'Tidak diizinkan'], 403);
        }
        $user = User::findOrFail($id);
        $userName = $user->name;
        $userId = $user->id_user;
        if ($user->foto && Storage::disk('public')->exists($user->foto)) {
            Storage::disk('public')->delete($user->foto);
        }
        $this->logActivity("Menghapus user: {$userName} (ID: {$userId})");
        $user->delete();

        // Tambahan: jika request AJAX, balas JSON
        if (request()->ajax()) {
            return response()->json(['success'=>true]);
        }
        return redirect()->route('users.index')->with('success', 'User berhasil dihapus.');
    }
}