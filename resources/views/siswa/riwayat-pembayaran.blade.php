<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Pembayaran | EduPay</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800">

@extends('layouts.siswa')

@section('title', 'Riwayat Pembayaran')

@section('content')

<div class="max-w-7xl mx-auto mt-10 px-4">

    <!-- HEADER -->
    <div class="mb-8">
        <h1 class="text-2xl font-bold">
            Riwayat Pembayaran <span style="color:#c62828;">SPP</span>
        </h1>
        <p class="text-sm text-gray-500 mt-1">
            Daftar seluruh pembayaran SPP yang pernah kamu lakukan
        </p>
    </div>

    <!-- TABLE CARD -->
    <div class="bg-white rounded-xl shadow border border-gray-100 overflow-hidden">

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-100 text-gray-600 uppercase font-semibold">
                    <tr>
                        <th class="px-6 py-4 text-left font-semibold">No</th>
                        <th class="px-6 py-4 text-left font-semibold">Tanggal</th>
                        <th class="px-6 py-4 text-left font-semibold">Bulan</th>
                        <th class="px-6 py-4 text-left font-semibold">Tahun</th>
                        <th class="px-6 py-4 text-left font-semibold">Nominal</th>
                        <th class="px-6 py-4 text-left font-semibold">Petugas</th>
                        <th class="px-6 py-4 text-left font-semibold">Status</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">

                    @forelse ($riwayat as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">
                                {{ $loop->iteration }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $item->tanggal_bayar 
                                    ? \Carbon\Carbon::parse($item->tanggal_bayar)->format('d M Y') 
                                    : '-' }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $item->bulan_bayar }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $item->tahun_bayar }}
                            </td>

                            <td class="px-6 py-4 font-semibold text-gray-800">
                                Rp {{ number_format($item->jumlah_bayar ?? 0, 0, ',', '.') }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $item->petugas->nama_petugas ?? '-' }}
                            </td>

                            <td class="px-6 py-4">
                                @if ($item->tanggal_bayar)
                                    <span class="inline-block px-3 py-1 text-xs font-semibold
                                        bg-green-100 text-green-700 rounded-full">
                                        Lunas
                                    </span>
                                @else
                                    <span class="inline-block px-3 py-1 text-xs font-semibold
                                        bg-red-100 text-red-700 rounded-full">
                                        Belum Lunas
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-10 text-center text-gray-500">
                                Belum ada riwayat pembayaran
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>

    </div>
</div>

@endsection


</body>
</html>
