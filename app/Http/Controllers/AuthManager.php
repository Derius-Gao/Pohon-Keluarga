<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\LogActivity;
use Illuminate\Support\Facades\Request as RequestFacade;

class AuthManager extends Controller
{
    protected function logActivity($aksi)
    {
        if (Auth::check()) {
            LogActivity::create([
                'id_user' => Auth::id(),
                'username' => Auth::user()->name,
                'aksi' => $aksi,
                'timestamp' => now(),
                'ip_address' => RequestFacade::ip(),
            ]);
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        $credentials = $request->only('email','password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $this->logActivity('Login ke sistem');

            return redirect()->intended('dashboard');
        }

        $this->logActivity("Gagal login dengan email {$request->email}");

        return back()->with('error', 'email atau password salah')->withInput();
    }

    public function logout(Request $request)
    {
        $this->logActivity('Logout dari sistem');

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function register()
    {
        return view('register');
    }

    public function registerAction(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('foto_user', 'public');
        } else {
            $fotoPath = null;
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => 'user',
            'jenis_kelamin' => $request->jenis_kelamin,
            'foto' => $fotoPath,
        ]);

        $this->logActivity("Registrasi user baru dengan email {$request->email}");

        return redirect()->route('login')->with('success', 'Berhasil registrasi, silakan login.');
    }
}
