<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Pembayaran | EduPay</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">

@extends('layouts.petugas')

@section('title', 'Detail Pembayaran')

@section('content')

<div class="max-w-3xl mx-auto mt-10">

    <!-- CARD -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100">

        <!-- HEADER -->
        <div class="px-8 py-5 border-b bg-gray-50 rounded-t-2xl">
            <h1 class="text-xl font-semibold text-red-700">
                Detail Pembayaran SPP
            </h1>
            <p class="text-sm text-gray-500 mt-1">
                Informasi lengkap transaksi pembayaran siswa
            </p>
        </div>

        <!-- CONTENT -->
        <div class="p-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-5 text-sm">

                <div>
                    <p class="text-gray-500">Nama Siswa</p>
                    <p class="font-medium text-gray-800">
                        {{ $pembayaran->siswa->nama }}
                    </p>
                </div>

                <div>
                    <p class="text-gray-500">NIS</p>
                    <p class="font-medium text-gray-800">
                        {{ $pembayaran->siswa->nis }}
                    </p>
                </div>

                <div>
                    <p class="text-gray-500">Bulan Dibayar</p>
                    <p class="font-medium text-gray-800">
                        {{ $pembayaran->bulan_bayar }}
                    </p>
                </div>

                <div>
                    <p class="text-gray-500">Tahun Dibayar</p>
                    <p class="font-medium text-gray-800">
                        {{ $pembayaran->tahun_bayar }}
                    </p>
                </div>

                <div>
                    <p class="text-gray-500">Tanggal Bayar</p>
                    <p class="font-medium text-gray-800">
                        {{ \Carbon\Carbon::parse($pembayaran->tanggal_bayar)->format('d-m-Y') }}
                    </p>
                </div>

                <div>
                    <p class="text-gray-500">Jumlah Bayar</p>
                    <p class="font-semibold text-green-600 text-base">
                        Rp {{ number_format($pembayaran->jumlah_bayar, 0, ',', '.') }}
                    </p>
                </div>

            </div>
        </div>

        <!-- ACTION -->
        <div class="px-8 py-4 border-t bg-gray-50 rounded-b-2xl
                    flex justify-end gap-3">

            <a href="{{ route('petugas.history-pembayaran') }}"
               class="px-5 py-2 rounded-lg text-sm
                      bg-gray-200 hover:bg-gray-300 transition">
                Kembali
            </a>

            <a href="{{ url('/petugas/cetak-bukti/'.$pembayaran->id_pembayaran) }}"
               class="px-5 py-2 rounded-lg text-sm font-semibold
                      bg-red-600 text-white hover:bg-red-700
                      transition shadow hover:shadow-md">
                Cetak Bukti
            </a>
        </div>

    </div>
</div>

@endsection

</body>
</html>
