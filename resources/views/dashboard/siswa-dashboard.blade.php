<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Siswa | EduPay</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#c62828',
                        soft: '#f4f6f8'
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-soft min-h-screen text-gray-800">

@extends('layouts.siswa')

@section('title', 'Dashboard Siswa')

@section('content')

<main class="p-6 md:p-10">

    <!-- HEADER -->
    <div class="mb-8">
        <h1 class="text-2xl font-bold">
    Halo,
    <span class="text-primary">
        {{ Auth::user()->siswa->nama }}
    </span>
</h1>
        <p class="text-sm text-gray-500">
            Selamat datang di dashboard pembayaran SPP kamu.
        </p>
    </div>

    <!-- SUMMARY -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">

        <!-- Bulan -->
        <div class="bg-white rounded-2xl p-6 shadow-sm">
            <p class="text-xs text-gray-500 mb-1">SPP Bulan Ini</p>
            <h3 class="text-xl font-bold">
                {{ $bulanSekarang }}
            </h3>
        </div>

        <!-- Status -->
        <div class="bg-white rounded-2xl p-6 shadow-sm">
            <p class="text-xs text-gray-500 mb-1">Status Pembayaran</p>

            @if($statusBulanIni === 'Lunas')
                <span class="inline-block mt-1 px-3 py-1 text-xs font-semibold bg-green-100 text-green-700 rounded-full">
                    Lunas
                </span>
            @else
                <span class="inline-block mt-1 px-3 py-1 text-xs font-semibold bg-red-100 text-red-700 rounded-full">
                    Belum Lunas
                </span>
            @endif
        </div>

        <!-- Total -->
        <div class="bg-white rounded-2xl p-6 shadow-sm">
            <p class="text-xs text-gray-500 mb-1">Total Dibayar</p>
            <h3 class="text-xl font-bold text-primary">
                Rp {{ number_format($totalDibayar, 0, ',', '.') }}
            </h3>
        </div>

    </div>

    

    <!-- TABLE -->
    <div class="bg-white rounded-2xl shadow-sm overflow-hidden">

        <div class="p-6 border-b">
            <h2 class="text-lg font-bold">
                Riwayat Pembayaran
            </h2>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-50 text-gray-500">
                    <tr>
                        <th class="text-left px-6 py-4">Tanggal</th>
                        <th class="text-left px-6 py-4">Bulan</th>
                        <th class="text-left px-6 py-4">Nominal</th>
                        <th class="text-left px-6 py-4">Status</th>
                    </tr>
                </thead>

                <tbody class="divide-y">

                    @forelse ($pembayaranTerakhir as $p)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">
                                {{ \Carbon\Carbon::parse($p->tanggal_bayar)->format('d M Y') }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $p->bulan_bayar }}
                            </td>
                            <td class="px-6 py-4 font-semibold">
                                Rp {{ number_format($p->jumlah_bayar, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 text-xs rounded-full bg-green-100 text-green-700">
                                    Lunas
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-6 text-center text-gray-500">
                                Belum ada data pembayaran
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>

    </div>

</main>

@endsection

</body>
</html>
