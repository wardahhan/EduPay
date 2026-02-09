<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Pembayaran;
use Carbon\Carbon;

class SiswaDashboardController extends Controller
{
    // ======================
    // DASHBOARD SISWA
    // ======================
    public function index()
    {
        $user = Auth::user();
        $siswa = $user->siswa;

        if (!$siswa) {
            abort(404, 'Data siswa tidak ditemukan');
        }

        $bulanSekarang = Carbon::now()->translatedFormat('F');

        $pembayaranBulanIni = Pembayaran::where('id_siswa', $siswa->id_siswa)
            ->whereMonth('tanggal_bayar', now()->month)
            ->whereYear('tanggal_bayar', now()->year)
            ->first();

        $statusBulanIni = $pembayaranBulanIni ? 'Lunas' : 'Belum Lunas';

        $totalDibayar = Pembayaran::where('id_siswa', $siswa->id_siswa)
            ->sum('jumlah_bayar');

        $pembayaranTerakhir = Pembayaran::where('id_siswa', $siswa->id_siswa)
            ->orderBy('tanggal_bayar', 'desc')
            ->take(5)
            ->get();

        return view('dashboard.siswa-dashboard', compact(
            'siswa',
            'bulanSekarang',
            'statusBulanIni',
            'totalDibayar',
            'pembayaranTerakhir'
        ));
    }

    // ======================
    // RIWAYAT PEMBAYARAN SISWA
    // ======================
public function riwayatPembayaran()
{
    $user = Auth::user();
    $siswa = $user->siswa;

    if (!$siswa) {
        abort(404, 'Data siswa tidak ditemukan');
    }

    $tahun = now()->year;

    // Ambil pembayaran siswa tahun ini
    $pembayaran = Pembayaran::with('petugas')
        ->where('id_siswa', $siswa->id_siswa)
        ->where('tahun_bayar', $tahun)
        ->get()
        ->keyBy('bulan_bayar');

    $bulanList = [
        'Januari','Februari','Maret','April','Mei','Juni',
        'Juli','Agustus','September','Oktober','November','Desember'
    ];

    $riwayat = [];

    foreach ($bulanList as $bulan) {
        if (isset($pembayaran[$bulan])) {
            // SUDAH BAYAR
            $riwayat[] = $pembayaran[$bulan];
        } else {
            // BELUM BAYAR
            $riwayat[] = (object)[
                'bulan_bayar'   => $bulan,
                'tahun_bayar'   => $tahun,
                'tanggal_bayar' => null,
                'jumlah_bayar'  => null,
                'petugas'       => null,
            ];
        }
    }

    return view('siswa.riwayat-pembayaran', compact('riwayat'));
}

public function profil()
{
    $user = Auth::user();
    $siswa = $user->siswa;

    if (!$siswa) {
        abort(404, 'Data siswa tidak ditemukan');
    }

    return view('siswa.profile', compact('siswa'));
}

}
