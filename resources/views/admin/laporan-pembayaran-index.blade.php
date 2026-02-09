<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Pembayaran | EduPay</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800">

@extends('layouts.admin')

@section('title', 'Kelola Laporan')

@section('content')

<div class="max-w-6xl mx-auto px-6 py-8">

    <!-- HEADER -->
    <div class="flex items-center justify-between mb-5">
        <div>
            <h1 class="text-2xl font-bold flex items-center gap-2">
                Laporan Pembayaran
                <span class="bg-red-100 text-red-700 text-xs px-2 py-0.5 rounded-full">
                    {{ $pembayaran->total() }} Data
                </span>
            </h1>
            <p class="text-xs text-gray-500 mt-1">
                Rekap pembayaran SPP siswa
            </p>
        </div>

        <!-- BUTTON EXPORT -->
        <a href="{{ route('admin.laporan.export', request()->query()) }}"
   class="bg-green-600 text-white px-4 py-2 rounded font-bold">
    💾 Export Excel
      </a>

    </div>

    <!-- FILTER -->
    <form method="GET"
          class="bg-white rounded-lg shadow px-6 py-4 mb-6
                 flex flex-wrap items-center justify-between gap-4">

        <div class="relative w-full md:w-80">
            <input type="text"
                   name="search"
                   value="{{ request('search') }}"
                   placeholder="Cari NIS / Nama..."
                   class="w-full border rounded-md pl-9 pr-3 py-2 text-sm">
            <span class="absolute left-3 top-2.5 text-gray-400 text-sm">🔍</span>
        </div>

        <div class="flex items-center gap-2 text-sm">
            <select name="bulan">
                <option value="">Semua Bulan</option>
                @foreach ([
                    'Januari','Februari','Maret','April','Mei','Juni',
                    'Juli','Agustus','September','Oktober','November','Desember'
                ] as $bulan)
                    <option value="{{ $bulan }}" {{ request('bulan')==$bulan?'selected':'' }}>
                        {{ $bulan }}
                    </option>
                @endforeach
            </select>


            <select name="tahun" class="border rounded-md px-3 py-2">
                <option value="">Semua Tahun</option>
                @for($t=date('Y');$t>=2020;$t--)
                    <option value="{{ $t }}" {{ request('tahun') == $t ? 'selected' : '' }}>
                        {{ $t }}
                    </option>
                @endfor
            </select>

            <button class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md">
                Filter
            </button>
        </div>
    </form>

    <!-- TABLE -->
    <div class="bg-white rounded-lg shadow overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                <tr>
                    <th class="px-6 py-4 text-left">Tanggal</th>
                    <th class="px-6 py-4 text-left">NIS/NISN</th>
                    <th class="px-6 py-4 text-left">Nama</th>
                    <th class="px-6 py-4 text-left">Bulan</th>
                    <th class="px-6 py-4 text-left">Jumlah</th>
                    <th class="px-6 py-4 text-left">Petugas</th>
                </tr>
            </thead>

            <tbody class="divide-y">
                @forelse($pembayaran as $p)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">
                        {{ date('d M Y', strtotime($p->tanggal_bayar)) }}
                    </td>
                    <td class="px-5 py-3 font-medium">
                        {{ $p->siswa->nis ?? '-' }}
                    </td>
                    <td class="px-5 py-3">
                        {{ $p->siswa->nama ?? '-' }}
                    </td>
                    <td class="px-5 py-3">
                        {{ $p->bulan_bayar }}
                    </td>
                    <td class="px-5 py-3 font-semibold text-green-600">
                        Rp {{ number_format($p->jumlah_bayar,0,',','.') }}
                    </td>
                    <td class="px-5 py-3">
                        {{ $p->petugas->nama_petugas ?? '-' }}
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-5 py-6 text-center text-gray-500">
                        Belum ada data pembayaran
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- PAGINATION -->
    <div class="flex flex-col md:flex-row md:justify-between md:items-center mt-5 text-sm gap-3">

        <p class="text-gray-500">
            Menampilkan
            <span class="font-medium">{{ $pembayaran->firstItem() }}</span>
            –
            <span class="font-medium">{{ $pembayaran->lastItem() }}</span>
            dari
            <span class="font-medium">{{ $pembayaran->total() }}</span>
            data
        </p>

        <div class="flex gap-1">
            @if ($pembayaran->onFirstPage())
                <span class="px-3 py-1 border rounded text-gray-400">«</span>
            @else
                <a href="{{ $pembayaran->previousPageUrl() }}"
                   class="px-3 py-1 border rounded hover:bg-gray-100">«</a>
            @endif

            @foreach ($pembayaran->getUrlRange(1, $pembayaran->lastPage()) as $page => $url)
                @if ($page == $pembayaran->currentPage())
                    <span class="px-3 py-1 border rounded bg-red-600 text-white">
                        {{ $page }}
                    </span>
                @else
                    <a href="{{ $url }}"
                       class="px-3 py-1 border rounded hover:bg-gray-100">
                        {{ $page }}
                    </a>
                @endif
            @endforeach

            @if ($pembayaran->hasMorePages())
                <a href="{{ $pembayaran->nextPageUrl() }}"
                   class="px-3 py-1 border rounded hover:bg-gray-100">»</a>
            @else
                <span class="px-3 py-1 border rounded text-gray-400">»</span>
            @endif
        </div>
    </div>

    <p class="text-center text-xs text-gray-400 mt-6">
        © 2026 EduPay — Laporan Pembayaran
    </p>

</div>

@endsection

</body>
</html>
