<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        // Ambil settings yang penting
        $settings = Setting::whereIn('key', ['site_title', 'logo_path', 'header_title'])->get()->keyBy('key');

        return view('settings.index', compact('settings'));
    }

 public function update(Request $request)
{
    $request->validate([
        'logo' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        'header_title' => 'required|string|max:255',
        'site_title' => 'required|string|max:255',
    ]);

    // Jika ada file logo baru, simpan dan update
    if ($request->hasFile('logo')) {
        $logoPath = $request->file('logo')->store('logos', 'public');
        Setting::setValue('logo_path', $logoPath);
    }

    Setting::setValue('header_title', $request->header_title);
    Setting::setValue('site_title', $request->site_title);

    return back()->with('success', 'Pengaturan berhasil diperbarui.');
}


}
