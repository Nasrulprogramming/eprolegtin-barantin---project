<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminManagementController extends Controller
{
    public function index()
    {
        $admins = Admin::all();
        return view('admin.manage', compact('admins'));
    }

    public function create()
    {
        return view('admin.manage.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:6|confirmed',
        ]);

        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.manage')->with('success', 'Admin baru berhasil ditambahkan.');
    }

    public function destroy(Admin $admin)
    {
        $admin->delete();
        return redirect()->route('admin.manage')->with('success', 'Admin berhasil dihapus.');
    }

    public function resetForm($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.manage.reset', compact('admin'));
    }

    public function resetPassword(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|min:6|confirmed',
        ]);

        $admin = Admin::findOrFail($id);
        $admin->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.manage')->with('success', 'Password admin berhasil direset.');
    }
}
