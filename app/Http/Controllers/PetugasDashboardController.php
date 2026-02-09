<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Pembayaran;
use Carbon\Carbon;

class PetugasDashboardController extends Controller
{

    public function index()
    {
        $hariIni = Carbon::today();
        $bulanIni = Carbon::now()->month;
        $tahunIni = Carbon::now()->year;

        $pembayaranHariIni = Pembayaran::whereDate('tanggal_bayar', $hariIni)->count();

        $totalSiswa = Siswa::count();

        $transaksiBulanIni = Pembayaran::whereYear('tanggal_bayar', $tahunIni)
                                        ->whereMonth('tanggal_bayar', $bulanIni)
                                        ->count();

        return view('dashboard.petugas-dashboard', compact(
            'pembayaranHariIni',
            'totalSiswa',
            'transaksiBulanIni'
        ));
    }
}
