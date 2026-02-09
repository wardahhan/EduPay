<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Spp;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PembayaranController extends Controller
{
    // =========================
    // FORM ENTRI PEMBAYARAN
    // =========================
    public function create()
    {
        $siswa = Siswa::with('kelas')->orderBy('nama')->get();
        $spp   = Spp::orderBy('tahun')->get();

        // 🔹 Riwayat bayar: bulan yang sudah lunas per siswa
        $riwayat_bayar = Pembayaran::all()->groupBy('id_siswa')->map(function($item) {
            return $item->pluck('bulan_bayar')->toArray();
        });

        return view('petugas.pembayaran', compact('siswa', 'spp', 'riwayat_bayar'));
    }

    // =========================
    // SIMPAN PEMBAYARAN
    // =========================
    public function store(Request $request)
    {
        $request->validate([
            'id_siswa'      => 'required',
            'id_spp'        => 'required',
            'bantuan'       => 'required',
            'tanggal_bayar' => 'required|date',
            'bulan_bayar'   => 'required',
            'tahun_bayar'   => 'required|numeric',
        ]);

        // 🔥 Ambil petugas dari user login
        $petugas = auth()->user()->petugas;

        if (!$petugas) {
            return back()->with('error', 'Akun ini belum terhubung dengan petugas');
        }

        // 🔹 Ambil nominal dari SPP yang dipilih
        $spp = Spp::findOrFail($request->id_spp);

        // 🔹 Cek apakah bulan sudah dibayar
        $sudah_bayar = Pembayaran::where('id_siswa', $request->id_siswa)
            ->where('bulan_bayar', $request->bulan_bayar)
            ->where('tahun_bayar', $request->tahun_bayar)
            ->exists();

        if ($sudah_bayar) {
            return back()->with('error', 'Bulan ini sudah lunas untuk siswa tersebut.');
        }

        // 🔹 Simpan pembayaran
        Pembayaran::create([
            'id_petugas'    => $petugas->id_petugas,
            'id_siswa'      => $request->id_siswa,
            'id_spp'        => $request->id_spp,
            'tanggal_bayar' => $request->tanggal_bayar,
            'bulan_bayar'   => $request->bulan_bayar,
            'tahun_bayar'   => $request->tahun_bayar,
            'jumlah_bayar'  => $spp->nominal,
        ]);

        return redirect()
            ->route('petugas.history-pembayaran')
            ->with('success', 'Pembayaran berhasil disimpan');
    }

    // =========================
    // HISTORY PEMBAYARAN
    // =========================
    public function index(Request $request)
    {
        $pembayaran = Pembayaran::with(['siswa', 'spp', 'petugas'])
            ->when($request->search, function ($q) use ($request) {
                $q->whereHas('siswa', function ($s) use ($request) {
                    $s->where('nama', 'like', '%' . $request->search . '%');
                });
            })
            ->when($request->bulan, function ($q) use ($request) {
                $q->where('bulan_bayar', $request->bulan);
            })
            ->orderBy('tanggal_bayar', 'desc')
            ->paginate($request->perPage ?? 10)
            ->withQueryString();

        return view('petugas.history-pembayaran', compact('pembayaran'));
    }

    // =========================
    // DETAIL PEMBAYARAN
    // =========================
    public function show($id)
    {
        $pembayaran = Pembayaran::with(['siswa', 'spp', 'petugas'])
            ->findOrFail($id);

        return view('petugas.pembayaran-show', compact('pembayaran'));
    }

    // =========================
    // CETAK BUKTI
    // =========================
    public function cetak($id)
    {
        $pembayaran = Pembayaran::with(['siswa', 'spp', 'petugas'])
            ->findOrFail($id);

        return view('petugas.cetak-bukti', compact('pembayaran'));
    }
}
