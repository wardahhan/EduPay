<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use App\Models\User;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    // ===============================
    // INDEX (SEARCH + PAGINATION + RELASI USER)
    // ===============================
    public function index(Request $request)
    {
        $search  = $request->search;
        $perPage = $request->perPage ?? 10;

        $petugas = Petugas::with('user')
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('nama_petugas', 'like', "%{$search}%")
                      ->orWhere('no_telp', 'like', "%{$search}%");
                });
            })
            ->orderBy('nama_petugas', 'asc')
            ->paginate($perPage)
            ->withQueryString();

        return view('admin.petugas-index-dashboard', compact('petugas'));
    }

    // ===============================
    // CREATE
    // ===============================
    public function create()
    {
        return view('admin.petugas-create-dashboard');
    }

    // SHOW

    public function show($id)
{
    $petugas = Petugas::findOrFail($id);

    return view('admin.petugas-show', compact('petugas'));
}

    // ===============================
    // STORE
    // ===============================
    public function store(Request $request)
    {
        $request->validate([
            'nama_petugas' => 'required|string|max:100',
            'no_telp'      => 'required|string|max:20',
            'username'     => 'required|unique:users,username',
            'password'     => 'required|min:6'
        ]);

        // 1️⃣ BUAT USER LOGIN
        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role'     => 'petugas'
        ]);

        // 2️⃣ BUAT DATA PETUGAS
        Petugas::create([
            'nama_petugas' => $request->nama_petugas,
            'no_telp'      => $request->no_telp,
            'level'        => 'petugas',
            'id_user'      => $user->id_user
        ]);

        return redirect('/admin/petugas')
            ->with('success', '✅ Data petugas berhasil ditambahkan');
    }



    // ===============================
    // EDIT
    // ===============================
    public function edit($id)
    {
        $petugas = Petugas::with('user')->findOrFail($id);
        return view('admin.petugas-edit-dashboard', compact('petugas'));
    }

    // ===============================
    // UPDATE
    // ===============================
    public function update(Request $request, $id)
    {
        $petugas = Petugas::with('user')->findOrFail($id);

        $request->validate([
            'nama_petugas' => 'required|string|max:100',
            'no_telp'      => 'required|string|max:20',
            'username'     => 'required|unique:users,username,' . $petugas->id_user . ',id_user',
            'password'     => 'nullable|min:6'
        ]);

        // UPDATE PETUGAS
        $petugas->update([
            'nama_petugas' => $request->nama_petugas,
            'no_telp'      => $request->no_telp
        ]);

        // UPDATE USER
        $userData = ['username' => $request->username];

        if ($request->password) {
            $userData['password'] = Hash::make($request->password);
        }

        $petugas->user->update($userData);

        return redirect('/admin/petugas')
            ->with('success', '✏️ Data petugas berhasil diupdate');
    }

    // ===============================
    // DELETE
    // ===============================
    public function destroy($id)
    {
        $petugas = Petugas::findOrFail($id);

        // HAPUS USER LOGIN (CASCADE AMAN)
        if ($petugas->id_user) {
            User::where('id_user', $petugas->id_user)->delete();
        }

        $petugas->delete();

        return redirect('/admin/petugas')
            ->with('success', '🗑️ Data petugas berhasil dihapus');
    }

    // ===============================
    // HALAMAN PEMBAYARAN PETUGAS
    // ===============================
    public function pembayaran()
    {
        $siswa = Siswa::with('kelas')
            ->orderBy('nama', 'asc')
            ->get();

        return view('petugas.pembayaran', compact('siswa'));
    }
}
