<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminPasswordController extends Controller
{
    // untuk halaman ganti password (show form)
    public function showChangeForm()
    {
        return view('admin.auth.change-password');
    }

    // untuk update password
    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:admins,email',
            'old_password' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if (!Hash::check($request->old_password, $admin->password)) {
            return back()->withErrors(['old_password' => 'Password lama tidak sesuai.']);
        }

        $admin->password = Hash::make($request->password);
        $admin->save();

        // 🔔 kirim alert sukses
        return redirect()
            ->route('admin.login')
            ->with('success', 'Password berhasil direset. Silakan login dengan password baru.');
    }
}
