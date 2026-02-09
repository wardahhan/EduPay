<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Bukti Pembayaran | EduPay</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>

@extends('layouts.petugas')

@section('title', 'Cetak Bukti Pembayaran')

@section('content')

<style>
@media print {
    body {
        background: white !important;
    }

    aside, nav, header, footer, .no-print {
        display: none !important;
    }

    main {
        margin: 0 !important;
        padding: 0 !important;
    }

    .print-area {
        box-shadow: none !important;
        border: none !important;
        margin: 0 auto !important;
        width: 100% !important;
        max-width: 380px !important; /* STRUK LEBIH BESAR */
    }
}
</style>

<div class="print-area max-w-md mx-auto bg-white mt-10
            rounded-xl shadow border border-gray-200 p-7 text-base">

    <!-- HEADER -->
    <div class="text-center mb-5">
        <h1 class="text-2xl font-extrabold tracking-wide text-red-600">
            EDUPAY
        </h1>

        <p class="text-sm text-gray-500 mt-1">
            Sistem Pembayaran SPP Sekolah
        </p>

        <div class="border-t border-dashed my-4"></div>

        <p class="text-sm text-gray-500">
            {{ \Carbon\Carbon::now('Asia/Jakarta')->translatedFormat('d F Y, H:i') }} WIB
        </p>
    </div>

    <!-- DATA -->
    <table class="w-full text-sm">
        <tr>
            <td class="py-1 text-gray-500">Nama</td>
            <td class="py-1 text-right font-medium">
                {{ $pembayaran->siswa->nama }}
            </td>
        </tr>
        <tr>
            <td class="py-1 text-gray-500">NIS</td>
            <td class="py-1 text-right">
                {{ $pembayaran->siswa->nis }}
            </td>
        </tr>
        <tr>
            <td class="py-1 text-gray-500">Bulan</td>
            <td class="py-1 text-right">
                {{ $pembayaran->bulan_bayar }}
            </td>
        </tr>
        <tr>
            <td class="py-1 text-gray-500">Tahun</td>
            <td class="py-1 text-right">
                {{ $pembayaran->tahun_bayar }}
            </td>
        </tr>
        <tr>
            <td class="py-1 text-gray-500">Tanggal</td>
            <td class="py-1 text-right">
                {{ \Carbon\Carbon::parse($pembayaran->tanggal_bayar)->format('d-m-Y') }}
            </td>
        </tr>
    </table>

    <div class="border-t border-dashed my-4"></div>

    <!-- TOTAL -->
    <div class="flex justify-between items-center font-bold text-lg">
    <span>Total Bayar</span>
    <span class="text-green-600">
        Rp {{ number_format($pembayaran->jumlah_bayar, 0, ',', '.') }}
    </span>
</div>


    <div class="border-t border-dashed my-4"></div>

    <!-- FOOTER -->
    <div class="text-center text-xs text-gray-500 leading-relaxed">
    <p class="font-semibold text-green-600 tracking-wide">
        *** PEMBAYARAN LUNAS ***
    </p>
    <p class="mt-2">
        Bukti ini sah tanpa tanda tangan.<br>
        Simpan struk sebagai arsip.
    </p>
</div>


    <!-- BUTTON -->
    <div class="flex justify-center gap-4 mt-7 no-print">
        <button onclick="window.print()"
                class="px-5 py-2 rounded-lg
                       bg-red-600 text-white hover:bg-red-700 transition">
            Cetak Struk
        </button>

        <a href="{{ route('petugas.history-pembayaran') }}"
           class="px-5 py-2 rounded-lg
                  bg-gray-200 hover:bg-gray-300 transition">
            Kembali
        </a>
    </div>
</div>


@endsection


</body>
</html>
