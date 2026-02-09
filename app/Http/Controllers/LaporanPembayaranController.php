<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Exports\LaporanPembayaranExport;
use Illuminate\Http\Request;

class LaporanPembayaranController extends Controller
{
    // ===============================
    // INDEX LAPORAN PEMBAYARAN
    // ===============================
    public function index(Request $request)
    {
        $perPage = $request->perPage ?? 10;

        $pembayaran = Pembayaran::with([
                'siswa.kelas',
                'petugas',
                'spp'
            ])
            // 🔍 SEARCH NIS / NAMA SISWA
            ->when($request->search, function ($query) use ($request) {
                $query->whereHas('siswa', function ($q) use ($request) {
                    $q->where('nis', 'like', '%' . $request->search . '%')
                      ->orWhere('nama', 'like', '%' . $request->search . '%');
                });
            })

            // 📅 FILTER BULAN (PAKAI bulan_bayar)
            ->when($request->bulan, function ($query) use ($request) {
                $query->where('bulan_bayar', $request->bulan);
            })

            // 📅 FILTER TAHUN (PAKAI tahun_bayar)
            ->when($request->tahun, function ($query) use ($request) {
                $query->where('tahun_bayar', $request->tahun);
            })

            // ⬇️ URUTKAN TERBARU
            ->orderBy('tanggal_bayar', 'desc')

            // 📄 PAGINATION
            ->paginate($perPage)
            ->withQueryString();

        return view('admin.laporan-pembayaran-index', compact('pembayaran'));
    }

public function exportExcel(Request $request)
{
    $export = new LaporanPembayaranExport();
    $data = $export->export($request);

    return response()->streamDownload(function () use ($data) {

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // =====================
        // HEADER
        // =====================
        $headers = array_keys($data[0]);
        $col = 'A';

        foreach ($headers as $header) {
            $sheet->setCellValue($col.'1', $header);
            $sheet->getStyle($col.'1')->getFont()->setBold(true);
            $sheet->getColumnDimension($col)->setAutoSize(true);
            $col++;
        }

        // =====================
        // DATA
        // =====================
        $row = 2;
        foreach ($data as $item) {
            $col = 'A';
            foreach ($item as $value) {
                $sheet->setCellValueExplicit(
                    $col.$row,
                    $value,
                    \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING
                );
                $col++;
            }
            $row++;
        }

        // BORDER
        $sheet->getStyle(
            'A1:' . chr(64 + count($headers)) . ($row - 1)
        )->getBorders()->getAllBorders()->setBorderStyle(
            \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
        );

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');

    }, 'laporan-pembayaran.xlsx');
}
}
