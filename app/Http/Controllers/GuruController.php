<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    public function index()
    {
        $gurus = User::where('opsi', 'guru')->get();
        return view('pagesadmin.data.guru.dataguru', compact('gurus'));
    }

    public function create()
    {
        return view('pagesadmin.data.guru.create'); // ganti dengan view khusus guru
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nip' => 'required|string|unique:users,nip',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'sekolah' => 'required|string',
            'alamat' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user = new User();
        $user->nama_lengkap = $request->nama_lengkap;
        $user->nip = $request->nip;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->opsi = 'guru'; // default guru
        $user->sekolah = $request->sekolah;
        $user->alamat = $request->alamat;

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('foto_user', 'public');
            $user->foto = $path;
        }

        $user->save();

        return redirect()->route('guru.index')->with('success', 'Guru berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $user = User::where('opsi', 'guru')->findOrFail($id);
        return view('pagesadmin.data.guru.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::where('opsi', 'guru')->findOrFail($id);

        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nip' => 'required|string|unique:users,nip,' . $id,
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:8',
            'sekolah' => 'required|string',
            'alamat' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user->nama_lengkap = $request->nama_lengkap;
        $user->nip = $request->nip;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->sekolah = $request->sekolah;
        $user->alamat = $request->alamat;

        if ($request->hasFile('foto')) {
            if ($user->foto && Storage::exists('public/' . $user->foto)) {
                Storage::delete('public/' . $user->foto);
            }
            $path = $request->file('foto')->store('foto_user', 'public');
            $user->foto = $path;
        }

        $user->save();

        return redirect()->route('guru.index')->with('success', 'Guru berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $user = User::where('opsi', 'guru')->findOrFail($id);

        if ($user->foto && Storage::exists('public/' . $user->foto)) {
            Storage::delete('public/' . $user->foto);
        }

        $user->delete();

        return redirect()->route('guru.index')->with('success', 'Guru berhasil dihapus.');
    }
}
