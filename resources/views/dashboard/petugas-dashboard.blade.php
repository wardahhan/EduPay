<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Petugas | EduPay</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800">

@extends('layouts.petugas')

@section('title', 'Dashboard Petugas')

@section('content')

<header class="bg-white shadow-sm px-4 md:px-8 py-3 md:py-4 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 -mx-4 md:-mx-6 -mt-6 md:-mt-6 mb-6 md:mb-8 border-b border-gray-100">

    <div class="leading-tight">
        <h2 class="text-lg md:text-xl font-bold text-gray-800">
            Dashboard Petugas
        </h2>
        <p class="text-xs md:text-sm text-gray-500">
            {{ now()->translatedFormat('l, d F Y') }}
        </p>
    </div>

    <div class="flex items-center gap-3 sm:gap-4">

        <div class="text-right leading-tight">
            <p class="text-xs md:text-sm font-semibold text-gray-800">
                {{ auth()->user()->petugas->nama_petugas }}
            </p>
            <p class="text-xs text-gray-500">
                Petugas
            </p>
        </div>

        <div class="w-10 h-10 rounded-full bg-red-600 text-white
                    flex items-center justify-center font-bold text-sm shadow-sm flex-shrink-0">
            {{ strtoupper(substr(auth()->user()->petugas->nama_petugas, 0, 1)) }}
        </div>

    </div>
</header>



<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6 mb-8 md:mb-12">

    <div class="bg-white rounded-2xl shadow p-6 flex items-center gap-4">
        <div class="w-14 h-14 rounded-xl bg-red-50 flex items-center justify-center">
            <svg class="w-7 h-7 text-red-600" fill="none" stroke="currentColor" stroke-width="1.8"
                 viewBox="0 0 24 24">
                <rect x="2" y="5" width="20" height="14" rx="2" />
                <line x1="2" y1="10" x2="22" y2="10" />
            </svg>
        </div>
        <div>
            <p class="text-sm text-gray-500">Pembayaran Hari Ini</p>
            <h3 class="text-3xl font-bold text-gray-800">
                {{ $pembayaranHariIni }}
            </h3>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow p-6 flex items-center gap-4">
        <div class="w-14 h-14 rounded-xl bg-blue-50 flex items-center justify-center">
            <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" stroke-width="1.8"
                 viewBox="0 0 24 24">
                <circle cx="12" cy="8" r="4" />
                <path d="M4 20c0-4 16-4 16 0" />
            </svg>
        </div>
        <div>
            <p class="text-sm text-gray-500">Total Siswa</p>
            <h3 class="text-3xl font-bold text-gray-800">
                {{ $totalSiswa }}
            </h3>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow p-6 flex items-center gap-4">
        <div class="w-14 h-14 rounded-xl bg-green-50 flex items-center justify-center">
            <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" stroke-width="1.8"
                 viewBox="0 0 24 24">
                <path d="M7 2h8l4 4v16H7z" />
                <line x1="9" y1="13" x2="15" y2="13" />
                <line x1="9" y1="17" x2="15" y2="17" />
            </svg>
        </div>
        <div>
            <p class="text-sm text-gray-500">Transaksi Bulan Ini</p>
            <h3 class="text-3xl font-bold text-gray-800">
                {{ $transaksiBulanIni }}
            </h3>
        </div>
    </div>

</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    <div class="bg-white rounded-2xl shadow p-6 hover:shadow-lg transition hover:-translate-y-1">
        <div class="w-12 h-12 rounded-lg bg-red-100 flex items-center justify-center mb-5">
            <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 1v22m5-18H9a4 4 0 000 8h6a4 4 0 010 8H6"/>
            </svg>
        </div>

        <h3 class="text-lg font-semibold mb-2">Entri Pembayaran</h3>
        <p class="text-sm text-gray-500 mb-5">
            Catat pembayaran SPP siswa berdasarkan bulan dan tahun.
        </p>

        <a href="/petugas/pembayaran"
           class="inline-flex items-center font-bold text-red-600 hover:text-red-700">
            Mulai Entri <span class="ml-2">→</span>
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow p-6 hover:shadow-lg transition hover:-translate-y-1">
        <div class="w-12 h-12 rounded-lg bg-blue-100 flex items-center justify-center mb-5">
            <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                <circle cx="12" cy="7" r="4"/>
                <path d="M5.5 21a6.5 6.5 0 0113 0"/>
            </svg>
        </div>

        <h3 class="text-lg font-semibold mb-2">Lihat History Pembayaran</h3>
        <p class="text-sm text-gray-500 mb-5">
            Cek riwayat pembayaran siswa secara lengkap.
        </p>

        <a href="/petugas/history-pembayaran"
           class="inline-flex items-center font-bold text-blue-600 hover:text-blue-700">
            Lihat History <span class="ml-2">→</span>
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow p-6 hover:shadow-lg transition hover:-translate-y-1">
        <div class="w-12 h-12 rounded-lg bg-green-100 flex items-center justify-center mb-5">
            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" stroke-width="2"
                 viewBox="0 0 24 24">
                <path d="M7 3h10v18H7z"/>
                <line x1="9" y1="7" x2="15" y2="7"/>
                <line x1="9" y1="11" x2="15" y2="11"/>
            </svg>
        </div>

        <h3 class="text-lg font-semibold mb-2">Cetak Bukti Pembayaran</h3>
        <p class="text-sm text-gray-500 mb-5">
            Cetak bukti pembayaran siswa yang telah dilakukan.
        </p>

        <a href="/petugas/history-pembayaran"
           class="inline-flex items-center font-bold text-green-600 hover:text-green-700">
            Cetak Bukti <span class="ml-2">→</span>
        </a>
    </div>



</div>

<p class="text-center text-xs text-gray-400 mt-16">
    © 2026 EduPay — Dashboard Petugas
</p>

@endsection

</body>
</html>