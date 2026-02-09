<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Siswa | EduPay</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100">

@extends('layouts.admin')

@section('title', 'Detail Siswa')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-6">

    <!-- HEADER -->
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-semibold text-gray-800">Detail Siswa</h1>
            <p class="text-sm text-gray-500 mt-0.5">Informasi lengkap dan riwayat pembayaran SPP</p>
        </div>
        <a href="/admin/siswa"
           class="px-3 py-1.5 rounded-lg bg-gray-200 text-gray-700 hover:bg-gray-300 text-sm">
            ← Kembali
        </a>
    </div>

    <!-- SISWA CARD -->
    <div class="rounded-xl shadow border border-red-200 overflow-hidden mb-6">

        <!-- ATAS (MERAH) -->
        <div class="flex items-center gap-4 px-4 py-3 bg-red-700 border-b border-red-800">
            <div class="w-14 h-14 rounded-full bg-red-800 flex items-center justify-center text-white text-xl font-semibold">
                {{ strtoupper(substr($siswa->nama, 0, 1)) }}
            </div>
            <div>
                <h2 class="text-lg font-semibold text-white">{{ $siswa->nama }}</h2>
                <p class="text-sm text-white">
                    NIS: <span class="font-medium">{{ $siswa->nis }}</span>
                </p>
                <p class="text-sm text-white">
                    Status: <span class="font-medium">{{ $siswa->bantuan ?? '-' }}</span>
                </p>
            </div>
        </div>

        <!-- BAWAH (PUTIH) -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 px-4 py-4 text-gray-800 text-sm bg-white">
            <div class="space-y-2">
                <p><span class="font-medium">Kelas:</span> {{ $siswa->kelas->nama_kelas ?? '-' }}</p>
                <p><span class="font-medium">Alamat:</span> {{ $siswa->alamat ?? '-' }}</p>
            </div>
            <div class="space-y-2">
                <p><span class="font-medium">No. Telepon:</span> {{ $siswa->no_telp ?? '-' }}</p>
                <p>
                    <span class="font-medium">SPP:</span>
                    <span class="text-green-600 font-semibold">
                        Rp {{ number_format($siswa->spp->nominal ?? 0, 0, ',', '.') }}
                    </span>
                </p>

            </div>
        </div>
    </div>

    <!-- RIWAYAT PEMBAYARAN -->
    <div class="bg-white rounded-xl shadow border border-gray-200 overflow-x-auto px-2 md:px-4">
        <table class="min-w-full table-auto divide-y divide-gray-200 text-sm text-gray-700">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left">No</th>
                    <th class="px-4 py-3 text-left">Bulan</th>
                    <th class="px-4 py-3 text-left">Tahun</th>
                    <th class="px-4 py-3 text-left">Nominal</th>
                    <th class="px-4 py-3 text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($siswa->pembayaran as $key => $pembayaran)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2">{{ $key + 1 }}</td>
                    <td class="px-4 py-2">{{ $pembayaran->bulan_bayar }}</td>
                    <td class="px-4 py-2">{{ $pembayaran->tahun_bayar }}</td>
                    <td class="px-4 py-2">
                        Rp {{ number_format($pembayaran->jumlah_bayar, 0, ',', '.') }}
                    </td>
                    <td class="px-4 py-2 text-center align-middle">
                        @if($pembayaran->tanggal_bayar)
                            <span class="inline-flex justify-center items-center min-w-[70px] px-3 py-0.5 rounded-full text-xs font-semibold bg-green-100 text-green-800">
                                Lunas
                            </span>
                        @else
                            <span class="inline-flex justify-center items-center min-w-[90px] px-3 py-0.5 rounded-full text-xs font-semibold bg-red-100 text-red-800">
                                Belum Bayar
                            </span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-4 py-4 text-center text-gray-500">
                        Belum ada riwayat pembayaran
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <p class="text-center text-xs text-gray-400 mt-4">© 2026 EduPay</p>
</div>
@endsection

</body>
</html>
