<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'petugas')->get();
        return view('admin.users.index', compact('users'));
    }

    // A simplified create/store for the demo
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'petugas', // Force role
        ]);

        return redirect()->back()->with('success', 'Petugas berhasil ditambahkan.');
    }

    public function destroy(User $user)
    {
        if ($user->role === 'petugas') {
            $user->delete();
        }
        return redirect()->back()->with('success', 'Petugas berhasil dihapus.');
    }
}
