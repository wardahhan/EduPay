<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class KelasController extends Controller
{
    // ===============================
    // TAMPILKAN DATA KELAS
    // ===============================
    public function index(Request $request)
    {
        $search  = $request->search;
        $perPage = $request->perPage ?? 10;

        $kelas = Kelas::when($search, function ($query) use ($search) {
                        $query->where('nama_kelas', 'like', "%{$search}%")
                              ->orWhere('kompetensi_keahlian', 'like', "%{$search}%");
                    })
                    ->orderBy('nama_kelas')
                    ->paginate($perPage)
                    ->withQueryString();

        return view('admin.kelas-index-dashboard', compact('kelas'));
    }

    // ===============================
    // FORM TAMBAH KELAS
    // ===============================
    public function create()
    {
        return view('admin.kelas-create-dashboard');
    }

    // ===============================
    // SIMPAN DATA KELAS
    // ===============================
    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => [
                'required',
                'string',
                'max:50',
                'regex:/^[^-]+$/', // ❌ tidak boleh ada "-"
            ],
            'kompetensi_keahlian' => [
                'required',
                'string',
                'max:100',
                Rule::unique('kelas')->where(function ($query) use ($request) {
                    return $query->where('nama_kelas', $request->nama_kelas);
                }),
            ],
        ], [
            'nama_kelas.required' => 'Nama kelas wajib diisi',
            'nama_kelas.regex' => 'Nama kelas tidak boleh mengandung tanda "-"',
            'kompetensi_keahlian.required' => 'Kompetensi keahlian wajib diisi',
            'kompetensi_keahlian.unique' =>
                'Kelas dengan kompetensi tersebut sudah terdaftar',
        ]);

        Kelas::create([
            'nama_kelas' => $request->nama_kelas,
            'kompetensi_keahlian' => $request->kompetensi_keahlian,
        ]);

        return redirect('/admin/kelas')
            ->with('success', '✅ Data kelas berhasil ditambahkan');
    }

    // ===============================
    // FORM EDIT KELAS
    // ===============================
    public function edit($id)
    {
        $kelas = Kelas::findOrFail($id);
        return view('admin.kelas-edit-dashboard', compact('kelas'));
    }

    // ===============================
    // UPDATE DATA KELAS
    // ===============================
    public function update(Request $request, $id)
    {
        $kelas = Kelas::findOrFail($id);

        $request->validate([
            'nama_kelas' => [
                'required',
                'string',
                'max:50',
                'regex:/^[^-]+$/', // ❌ tetap dikunci saat update
            ],
            'kompetensi_keahlian' => [
                'required',
                'string',
                'max:100',
                Rule::unique('kelas')
                    ->where(function ($query) use ($request) {
                        return $query->where('nama_kelas', $request->nama_kelas);
                    })
                    ->ignore($kelas->id),
            ],
        ], [
            'nama_kelas.required' => 'Nama kelas wajib diisi',
            'nama_kelas.regex' => 'Nama kelas tidak boleh mengandung tanda "-"',
            'kompetensi_keahlian.required' => 'Kompetensi keahlian wajib diisi',
            'kompetensi_keahlian.unique' =>
                'Kelas dengan kompetensi tersebut sudah terdaftar',
        ]);

        $kelas->update([
            'nama_kelas' => $request->nama_kelas,
            'kompetensi_keahlian' => $request->kompetensi_keahlian,
        ]);

        return redirect('/admin/kelas')
            ->with('success', '✏️ Data kelas berhasil diupdate');
    }

    // ===============================
    // HAPUS DATA KELAS
    // ===============================
    public function destroy($id)
    {
        Kelas::findOrFail($id)->delete();

        return redirect('/admin/kelas')
            ->with('success', '🗑️ Data kelas berhasil dihapus');
    }
}
