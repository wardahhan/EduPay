<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin | EduPay</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#c62828',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100 text-gray-800">

<div class="flex min-h-screen">

@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')

@endsection


    <main class="pt-16 md:pt-6 md:ml-64 min-h-screen flex flex-col">

        <header class="bg-white shadow px-4 md:px-8 py-3 md:py-4 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3 sm:gap-4">
            <div>
                <h2 class="text-lg md:text-xl font-semibold">Dashboard Admin</h2>
                <p class="text-xs md:text-sm text-gray-500">
                    Ringkasan aktivitas dan pemasukan SPP
                </p>
            </div>

            <div class="flex items-center gap-3">
                <div class="text-right">
                    <p class="text-xs md:text-sm font-semibold">Admin EduPay</p>
                    <p class="text-xs text-gray-500">Administrator</p>
                </div>
                <div class="w-10 h-10 rounded-full bg-primary flex items-center justify-center flex-shrink-0">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                         stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M4.5 20.25a7.5 7.5 0 0115 0"/>
                    </svg>
                </div>
            </div>
        </header>

       <section class="p-4 md:p-8 flex-grow">

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 mb-8 md:mb-10">

        <div class="bg-white p-6 rounded-xl shadow flex items-center gap-4">
            <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-blue-100 text-blue-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1
                             m8-4a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
            </div>
            <div>
                <p class="text-sm text-gray-500">Total Siswa</p>
                <p class="text-3xl font-bold text-primary">{{ $totalSiswa ?? 0 }}</p>
            </div>
        </div>

        <div class="bg-white p-6 rounded-xl shadow flex items-center gap-4">
            <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-purple-100 text-purple-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
            </div>
            <div>
                <p class="text-sm text-gray-500">Total Petugas</p>
                <p class="text-3xl font-bold text-primary">{{ $totalPetugas ?? 0 }}</p>
            </div>
        </div>

        <div class="bg-white p-6 rounded-xl shadow flex items-center gap-4">
            <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-green-100 text-green-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2h10"/>
                </svg>
            </div>
            <div>
                <p class="text-sm text-gray-500">Transaksi Hari Ini</p>
                <p class="text-3xl font-bold text-primary">{{ $transaksiHariIni ?? 0 }}</p>
            </div>
        </div>

        <div class="bg-white p-6 rounded-xl shadow flex items-center gap-4">
            <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-yellow-100 text-yellow-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3 21h18M7 17V9m5 8V5m5 12v-4"/>
                </svg>
            </div>
            <div>
                <p class="text-sm text-gray-500">Pemasukan Bulan Ini</p>
                <p class="text-xl font-bold text-primary">
                    Rp {{ number_format($pemasukanBulanIni ?? 0,0,',','.') }}
                </p>
            </div>
        </div>

    </div>
    <div class="bg-white rounded-xl shadow p-6 mb-10">
        <h3 class="text-lg font-semibold mb-4">Statistik Pemasukan</h3>

        <table class="w-full text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 text-left">Keterangan</th>
                    <th class="p-3 text-right">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-t">
                    <td class="p-3">Total Pemasukan</td>
                    <td class="p-3 text-right font-semibold text-primary">
                        Rp {{ number_format($totalPemasukan ?? 0,0,',','.') }}
                    </td>
                </tr>
                <tr class="border-t">
                    <td class="p-3">Pemasukan Bulan Ini</td>
                    <td class="p-3 text-right">
                        Rp {{ number_format($pemasukanBulanIni ?? 0,0,',','.') }}
                    </td>
                </tr>
                <tr class="border-t">
                    <td class="p-3">Transaksi Hari Ini</td>
                    <td class="p-3 text-right">
                        {{ $transaksiHariIni ?? 0 }} Transaksi
                    </td>
                </tr>
            </tbody>
        </table>
    </div>


    <div class="bg-white rounded-xl shadow p-6">
        <h3 class="text-lg font-semibold mb-4">Pembayaran Terbaru</h3>

        <table class="w-full text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3">Tanggal</th>
                    <th class="p-3">Siswa</th>
                    <th class="p-3">Bulan</th>
                    <th class="p-3">Nominal</th>
                    <th class="p-3">Petugas</th>
                </tr>
            </thead>
            <tbody>
                @forelse($recentPayments ?? [] as $p)
                <tr class="border-t">
                    <td class="p-3 text-center">{{ $p->tanggal_bayar }}</td>
                    <td class="p-3 text-center">{{ $p->siswa->nama }}</td>
                    <td class="p-3 text-center">{{ $p->bulan_bayar }}</td>
                    <td class="p-3 text-center font-semibold">
                        Rp {{ number_format($p->jumlah_bayar,0,',','.') }}
                    </td>
                    <td class="p-3 text-center">
                        {{ $p->petugas?->nama_petugas ?? '—' }}
                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="5" class="p-4 text-center text-gray-500">
                        Belum ada transaksi
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</section>

        <footer class="text-center py-6 text-sm text-gray-500">
    © 2026 EduPay — Sistem Pembayaran SPP
        </footer>


    </main>
</div>


</body>
</html>