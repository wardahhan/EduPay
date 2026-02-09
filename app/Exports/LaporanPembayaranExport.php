<?php

namespace App\Exports;

use App\Models\Pembayaran;

class LaporanPembayaranExport
{
    public function export($request)
    {
        $query = Pembayaran::with([
            'siswa.kelas',
            'petugas'
        ]);

        // 🔍 Search NIS / Nama Siswa
        if (!empty($request->search)) {
            $query->whereHas('siswa', function ($q) use ($request) {
                $q->where('nis', 'like', '%' . $request->search . '%')
                  ->orWhere('nama', 'like', '%' . $request->search . '%');
            });
        }

        // 📅 Filter Bulan
        if (!empty($request->bulan)) {
            $query->where('bulan_bayar', $request->bulan);
        }

        // 📅 Filter Tahun (konsisten pakai tahun_bayar)
        if (!empty($request->tahun)) {
            $query->where('tahun_bayar', $request->tahun);
        }

        return $query->orderBy('tanggal_bayar', 'desc')
            ->get()
            ->map(function ($p) {
                return [
                    'Tanggal Bayar' => "'" . date('d-m-Y', strtotime($p->tanggal_bayar)),
                    'NIS'           => "'" . (optional($p->siswa)->nis ?? '-'),
                    'Nama Siswa'    => optional($p->siswa)->nama ?? '-',
                    'Kelas'         => optional(optional($p->siswa)->kelas)->nama_kelas ?? '-',
                    'Bulan'         => $p->bulan_bayar,
                    'Tahun'         => $p->tahun_bayar,
                    'Jumlah Bayar'  => number_format($p->jumlah_bayar, 0, ',', '.'),
                    'Bantuan'       => optional($p->siswa)->bantuan ?? '-',
                    'Petugas'       => optional($p->petugas)->nama_petugas ?? '-',
                ];
            })
            ->toArray();
    }
}
