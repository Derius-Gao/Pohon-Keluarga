<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Marga;
use Illuminate\Support\Facades\Auth;
use App\Models\LogActivity;
use Illuminate\Support\Facades\Request as RequestFacade;

class FamilyTreeController extends Controller
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
        $id_marga = $request->input('id_marga');

        $query = User::with([
            'anakAyah.anakAyah', 'anakAyah.anakIbu',
            'anakIbu.anakAyah', 'anakIbu.anakIbu',
            'marga'
        ]);

        if ($id_marga) {
            $query->where('id_marga', $id_marga);
            $this->logActivity("Melihat pohon keluarga dengan filter marga ID: {$id_marga}");
        } else {
            $this->logActivity("Melihat pohon keluarga tanpa filter");
        }

        $allUsers = $query->get();
        $ayahList = User::where('jenis_kelamin', 'laki-laki')->get();
        $ibuList = User::where('jenis_kelamin', 'perempuan')->get();

        $kepalaKeluarga = $allUsers->filter(function($user) use ($allUsers) {
            return !$allUsers->contains('id_user', $user->id_ayah) && !$allUsers->contains('id_user', $user->id_ibu);
        });

        $margas = Marga::all();
        $loggedInUser = auth()->user();

        return view('familytree', compact('kepalaKeluarga', 'margas', 'id_marga', 'loggedInUser', 'ayahList', 'ibuList'));
    }

    public function getUserDetails($id_user)
    {
        $user = User::with('marga')->findOrFail($id_user);

        $this->logActivity("Melihat detail user ID {$id_user}");

        $data = [
            'id_user' => $user->id_user,
            'name' => $user->name,
            'email' => $user->email,
            'level' => $user->level,
            'jenis_kelamin' => ucfirst($user->jenis_kelamin),
            'foto' => $user->foto ? asset('storage/' . $user->foto) : 'https://via.placeholder.com/100?text=No+Photo',
            'marga' => $user->id_marga ? $user->marga->nama_marga : '-',
        ];

        return response()->json($data);
    }
}
