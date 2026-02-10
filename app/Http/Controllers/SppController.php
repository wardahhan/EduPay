<?php

namespace App\Http\Controllers;

use App\Models\Spp;
use Illuminate\Http\Request;

class SppController extends Controller
{
    // ===============================
    // INDEX
    // ===============================
    public function index(Request $request)
    {
        $search  = $request->search;
        $perPage = $request->perPage ?? 10;

        $spp = Spp::when($search, function ($query) use ($search) {
                    $query->where('tahun', 'like', "%{$search}%")
                          ->orWhere('nominal', 'like', "%{$search}%")
                          ->orWhere('bantuan', 'like', "%{$search}%");
                })
                ->orderBy('tahun', 'desc')
                ->paginate($perPage)
                ->withQueryString();

        return view('admin.spp-index-dashboard', compact('spp'));
    }

    // ===============================
    // CREATE
    // ===============================
    public function create()
    {
        return view('admin.spp-create-dashboard');
    }

    // ===============================
    // STORE
    // ===============================
    public function store(Request $request)
{
    $request->validate([
        'tahun'   => 'required|digits:4',
        'nominal' => 'required|numeric|min:0',
        'bantuan' => 'required|string|max:30',
    ], [
        'tahun.required'   => 'Tahun wajib diisi',
        'tahun.digits'     => 'Tahun harus 4 angka',
        'nominal.required' => 'Nominal wajib diisi',
        'bantuan.required' => 'Kategori bantuan wajib dipilih',
    ]);

    // ❌ CEK DUPLIKAT TAHUN + NOMINAL + BANTUAN
    $cek = Spp::where('tahun', $request->tahun)
            ->where('nominal', $request->nominal)
            ->where('bantuan', $request->bantuan)
            ->exists();

    if ($cek) {
        return back()
            ->withInput()
            ->withErrors([
    'nominal' => 'Nominal dengan kategori bantuan ini sudah ada pada tahun tersebut'
]);

    }

    Spp::create([
        'tahun'   => $request->tahun,
        'nominal' => $request->nominal,
        'bantuan' => $request->bantuan,
    ]);

    return redirect('/admin/spp')
        ->with('success', '✅ Data SPP berhasil ditambahkan');
}

    // ===============================
    // EDIT
    // ===============================
    public function edit($id)
    {
        $spp = Spp::findOrFail($id);
        return view('admin.spp-edit-dashboard', compact('spp'));
    }

    // ===============================
    // UPDATE
    // ===============================
    public function update(Request $request, $id)
    {
        $request->validate([
            'tahun'   => 'required|digits:4',
            'nominal' => 'required|numeric|min:0',
            'bantuan' => 'required|string|max:30',
        ]);

        $spp = Spp::findOrFail($id);

$cek = Spp::where('tahun', $request->tahun)
        ->where('nominal', $request->nominal)
        ->where('bantuan', $request->bantuan)
        ->where('id_spp', '!=', $id)
        ->exists();

if ($cek) {
    return back()
        ->withInput()
        ->withErrors([
            'nominal' => 'Nominal dengan kategori bantuan ini sudah ada pada tahun tersebut'
        ]);
}

        $spp->update([
            'tahun'   => $request->tahun,
            'nominal' => $request->nominal,
            'bantuan' => $request->bantuan,
        ]);

        return redirect('/admin/spp')
            ->with('success', '✏️ Data SPP berhasil diperbarui');
    }

    // ===============================
    // DELETE
    // ===============================
    public function destroy($id)
    {
        Spp::findOrFail($id)->delete();

        return redirect('/admin/spp')
            ->with('success', '🗑️ Data SPP berhasil dihapus');
    }
}
