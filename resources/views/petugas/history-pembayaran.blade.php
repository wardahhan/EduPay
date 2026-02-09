<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'History Pembayaran | EduPay')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

@extends('layouts.petugas')

@section('title', 'History Pembayaran')

@section('content')

<!-- HEADER -->
<div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
    <div>
        <div class="flex items-center gap-3">
            <h1 class="text-2xl font-bold text-red-700">
                History Pembayaran
            </h1>
            <span class="text-xs bg-red-100 text-red-600 px-3 py-1 rounded-full">
                Total {{ $pembayaran->total() }} Data
            </span>
        </div>
        <p class="text-sm text-gray-500 mt-1">
            Daftar pembayaran SPP yang telah diinput petugas
        </p>
    </div>
</div>

<!-- SEARCH & FILTER -->
<form method="GET"
      class="bg-white rounded-xl shadow p-4 mb-4
             flex flex-col md:flex-row
             md:items-center md:justify-between gap-4">

    <!-- SEARCH -->
    <div class="relative w-full md:w-80">
        <input type="text"
               name="search"
               value="{{ request('search') }}"
               placeholder="Cari nama siswa..."
               class="w-full border rounded-lg pl-10 pr-4 py-2 text-sm
                      focus:ring-2 focus:ring-red-500 focus:outline-none">
        <span class="absolute left-3 top-2.5 text-gray-400">🔍</span>
    </div>

    <!-- FILTER -->
    <div class="flex flex-wrap items-center gap-3 text-sm">

        <select name="bulan"
                class="border rounded px-3 py-2"
                onchange="this.form.submit()">
            <option value="">Semua Bulan</option>
            @foreach (['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'] as $bulan)
                <option value="{{ $bulan }}" {{ request('bulan') == $bulan ? 'selected' : '' }}>
                    {{ $bulan }}
                </option>
            @endforeach
        </select>

        <select name="perPage"
                class="border rounded px-3 py-2"
                onchange="this.form.submit()">
            <option value="10" {{ request('perPage') == 10 ? 'selected' : '' }}>10</option>
            <option value="25" {{ request('perPage') == 25 ? 'selected' : '' }}>25</option>
            <option value="50" {{ request('perPage') == 50 ? 'selected' : '' }}>50</option>
        </select>

        <span class="text-gray-500">data</span>
    </div>
</form>

<!-- TABLE -->
<div class="bg-white rounded-xl shadow overflow-x-auto">

    <table class="w-full text-sm">
        <thead class="bg-gray-100 text-gray-700">
            <tr>
                <th class="px-4 py-3 text-left">No</th>
                <th class="px-4 py-3 text-left">Nama Siswa</th>
                <th class="px-4 py-3 text-left">Bulan</th>
                <th class="px-4 py-3 text-left">Tahun</th>
                <th class="px-4 py-3 text-left">Tanggal Bayar</th>
                <th class="px-4 py-3 text-left">Jumlah</th>
                <th class="px-4 py-3 text-center">Aksi</th>
            </tr>
        </thead>

<tbody class="divide-y">
    @forelse ($pembayaran as $item)
        <tr class="hover:bg-gray-50">
            <td class="px-4 py-3">
                {{ $loop->iteration + $pembayaran->firstItem() - 1 }}
            </td>

            <td class="px-4 py-3 font-medium">
                {{ $item->siswa->nama }}
            </td>

            <td class="px-4 py-3">
                {{ $item->bulan_bayar }}
            </td>

            <td class="px-4 py-3">
                {{ $item->tahun_bayar }}
            </td>

            <td class="px-4 py-3">
                {{ \Carbon\Carbon::parse($item->tanggal_bayar)->format('d-m-Y') }}
            </td>

            <!-- Jumlah -->
            <td class="px-4 py-3 font-semibold text-green-600">
                Rp {{ number_format($item->jumlah_bayar, 0, ',', '.') }}
            </td>

                    <td class="px-4 py-3 text-center">
                        <a href="{{ url('/petugas/pembayaran/'.$item->id_pembayaran) }}"
   class="inline-flex items-center gap-2 px-3 py-1 rounded-lg
          bg-blue-100 text-blue-700 hover:bg-blue-200
          transition">

    <!-- ICON EYE (PROFESSIONAL) -->
    <svg xmlns="http://www.w3.org/2000/svg"
         class="w-4 h-4"
         fill="none"
         viewBox="0 0 24 24"
         stroke="currentColor"
         stroke-width="2">
        <path stroke-linecap="round"
              stroke-linejoin="round"
              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
        <path stroke-linecap="round"
              stroke-linejoin="round"
              d="M2.458 12C3.732 7.943 7.523 5 12 5
                 c4.477 0 8.268 2.943 9.542 7
                 -1.274 4.057-5.065 7-9.542 7
                 -4.477 0-8.268-2.943-9.542-7z" />
    </svg>

    <span>Lihat</span>
</a>

                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="px-4 py-6 text-center text-gray-500">
                        Belum ada data pembayaran
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- PAGINATION -->
<div class="flex flex-col md:flex-row md:justify-between md:items-center
            mt-6 text-sm gap-3">

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

@endsection

</body>
</html>
