<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class ForgotPasswordController extends Controller
{
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Email tidak ditemukan.']);
        }

        // Generate token & expiry
        $token = Str::random(64);
        $user->reset_token = hash('sha256', $token);
        $user->reset_token_expiry = Carbon::now()->addMinutes(20);
        $user->save();

        $resetLink = url("/reset-password?token={$token}");

        // Kirim email
        Mail::send('emails.reset_password', ['resetLink' => $resetLink, 'user' => $user], function($message) use ($user) {
            $message->to($user->email);
            $message->subject('Reset Password Anda');
        });

        return back()->with('success', 'Link reset password telah dikirim ke email Anda.');
    }

    public function showResetForm(Request $request)
    {
        $token = $request->token;
        if (!$token) {
            return redirect()->route('login')->withErrors('Token tidak ditemukan.');
        }
        return view('auth.reset_password', ['token' => $token]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $tokenHash = hash('sha256', $request->token);
        $user = User::where('reset_token', $tokenHash)->first();

        if (!$user) {
            return redirect()->route('login')->withErrors('Token tidak valid.');
        }

        if (Carbon::now()->greaterThan($user->reset_token_expiry)) {
            return redirect()->route('login')->withErrors('Token telah kadaluwarsa.');
        }

        // Update password & hapus token
        $user->password = Hash::make($request->password);
        $user->reset_token = null;
        $user->reset_token_expiry = null;
        $user->save();

        return redirect()->route('login')->with('success', 'Password berhasil diperbarui. Silakan login.');
    }
}
