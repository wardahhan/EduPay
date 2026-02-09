<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Petugas;
use App\Models\Pembayaran;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Gunakan timezone Indonesia
        $today = Carbon::now('Asia/Jakarta');

        $totalSiswa   = Siswa::count();
        $totalPetugas = Petugas::count();

        // Transaksi hari ini
        $transaksiHariIni = Pembayaran::whereDate(
            'tanggal_bayar',
            $today->toDateString()
        )->count();

        // Pemasukan bulan ini
        $pemasukanBulanIni = Pembayaran::whereMonth(
                'tanggal_bayar',
                $today->month
            )
            ->whereYear(
                'tanggal_bayar',
                $today->year
            )
            ->sum('jumlah_bayar');

        // Total pemasukan keseluruhan
        $totalPemasukan = Pembayaran::sum('jumlah_bayar');

        // Pembayaran terbaru (dengan relasi)
        $recentPayments = Pembayaran::with(['siswa', 'petugas'])
            ->orderBy('tanggal_bayar', 'desc')
            ->limit(5)
            ->get();

        return view('dashboard.admin-dashboard', compact(
            'totalSiswa',
            'totalPetugas',
            'transaksiHariIni',
            'pemasukanBulanIni',
            'totalPemasukan',
            'recentPayments'
        ));
    }
}
