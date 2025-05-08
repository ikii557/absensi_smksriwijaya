<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = User::where('opsi', 'siswa')->get();
        return view('pagesadmin.data.siswa.datasiswa', compact('siswas'));
    }

    public function create()
    {
        return view('pagesadmin.data.siswa.create'); // view khusus siswa
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nis' => 'required|string|unique:users,nis',
            'nisn' => 'required|string|unique:users,nisn',
            'kelas' => 'required|in:X,XI,XII',
            'jurusan' => 'required|in:dkv,akl,tkr',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'sekolah' => 'required|string',
            'alamat' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user = new User();
        $user->nama_lengkap = $request->nama_lengkap;
        $user->nis = $request->nis;
        $user->nisn = $request->nisn;
        $user->kelas = $request->kelas;
        $user->jurusan = $request->jurusan;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->opsi = 'siswa'; // default siswa
        $user->sekolah = $request->sekolah;
        $user->alamat = $request->alamat;

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('foto_user', 'public');
            $user->foto = $path;
        }

        $user->save();

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $user = User::where('opsi', 'siswa')->findOrFail($id);
        return view('pagesadmin.data.siswa.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::where('opsi', 'siswa')->findOrFail($id);

        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nis' => 'required|string|unique:users,nis,' . $id,
            'nisn' => 'required|string|unique:users,nisn,' . $id,
            'kelas' => 'required|in:X,XI,XII',
            'jurusan' => 'required|in:dkv,akl,tkr',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:8',
            'sekolah' => 'required|string',
            'alamat' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user->nama_lengkap = $request->nama_lengkap;
        $user->nis = $request->nis;
        $user->nisn = $request->nisn;
        $user->kelas = $request->kelas;
        $user->jurusan = $request->jurusan;
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

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $user = User::where('opsi', 'siswa')->findOrFail($id);

        if ($user->foto && Storage::exists('public/' . $user->foto)) {
            Storage::delete('public/' . $user->foto);
        }

        $user->delete();

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil dihapus.');
    }
}
