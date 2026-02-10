<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Spp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    // ===============================
    // INDEX
    // ===============================
    public function index(Request $request)
    {
        $perPage = $request->perPage ?? 10;

        $siswa = Siswa::with(['kelas', 'spp'])
            ->when($request->search, function ($query) use ($request) {
                $query->where(function ($q) use ($request) {
                    $q->where('nama', 'like', '%' . $request->search . '%')
                      ->orWhere('nis', 'like', '%' . $request->search . '%');
                });
            })
            ->orderBy('nama', 'asc')
            ->paginate($perPage)
            ->withQueryString();

        return view('admin.siswa-index-dashboard', compact('siswa'));
    }

    // ===============================
    // CREATE
    // ===============================
    public function create()
    {
        $kelas = Kelas::orderBy('nama_kelas')->get();
        $spp   = Spp::orderBy('tahun', 'desc')->get();

        return view('admin.siswa-create-dashboard', compact('kelas', 'spp'));
    }

    // ===============================
    // STORE
    // ===============================
    public function store(Request $request)
    {
        $request->validate([
            'nis'      => 'required|digits:8|unique:siswa,nis',
            'nama'     => 'required|string|max:100',
            'alamat'   => 'required|string',
            'no_telp'  => 'required|digits_between:10,12',
            'id_kelas' => 'required|exists:kelas,id_kelas',
            'id_spp'   => 'required|exists:spp,id_spp',
            'bantuan'  => 'required|string|max:30',
        ], [
            'nis.required'      => 'NIS wajib diisi',
            'nis.digits'        => 'NIS harus 8 angka',
            'nis.unique'        => 'NIS sudah terdaftar',
            'no_telp.required' => 'Nomor telepon wajib diisi',
            'no_telp.digits_between' =>
                'Nomor telepon harus 10–12 digit angka',
        ]);

        // BUAT USER LOGIN SISWA
        $user = User::create([
            'username' => $request->nis,
            'password' => Hash::make('123'),
            'role'     => 'siswa',
        ]);

        // SIMPAN DATA SISWA
        Siswa::create([
            'nis'      => $request->nis,
            'nama'     => $request->nama,
            'alamat'   => $request->alamat,
            'no_telp'  => $request->no_telp,
            'id_kelas' => $request->id_kelas,
            'id_spp'   => $request->id_spp,
            'bantuan'  => $request->bantuan,
            'id_user'  => $user->id_user,
        ]);

        return redirect('/admin/siswa')
            ->with('success', '✅ Data siswa berhasil ditambahkan');
    }

    // ===============================
    // UPDATE
    // ===============================
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'     => 'required|string|max:100',
            'alamat'   => 'required|string',
            'no_telp'  => 'required|digits_between:10,12',
            'id_kelas' => 'required|exists:kelas,id_kelas',
            'id_spp'   => 'required|exists:spp,id_spp',
            'bantuan'  => 'required|string|max:30',
        ], [
            'no_telp.digits_between' =>
                'Nomor telepon harus 10–12 digit angka',
        ]);

        $siswa = Siswa::findOrFail($id);

        $siswa->update([
            'nama'     => $request->nama,
            'alamat'   => $request->alamat,
            'no_telp'  => $request->no_telp,
            'id_kelas' => $request->id_kelas,
            'id_spp'   => $request->id_spp,
            'bantuan'  => $request->bantuan,
        ]);

        return redirect('/admin/siswa')
            ->with('success', '✏️ Data siswa berhasil diperbarui');
    }

    // ===============================
    // DELETE
    // ===============================
    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);

        if ($siswa->id_user) {
            User::where('id_user', $siswa->id_user)->delete();
        }

        $siswa->delete();

        return redirect('/admin/siswa')
            ->with('success', '🗑️ Data siswa berhasil dihapus');
    }
}
