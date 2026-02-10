<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil Siswa | EduPay</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800">

@extends('layouts.siswa')

@section('title', 'Profil Siswa')

@section('content')
<div class="max-w-5xl mx-auto mt-6 md:mt-10 px-3 md:px-4 lg:px-6">

    <!-- HEADER -->
    <div class="mb-6 md:mb-8">
    <div class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-3">
        <h1 class="text-xl md:text-2xl font-bold text-gray-800">
            Profil <span class="text-[#c62828]">Siswa</span>
        </h1>

        <!-- STATUS -->
        <span class="inline-flex items-center gap-1.5
                     text-xs font-semibold
                     px-3 py-1 rounded-full
                     bg-green-500 text-white
                     shadow-sm">
            ● Aktif
        </span>
    </div>

    <p class="text-xs md:text-sm text-gray-500 mt-1">
        Informasi data diri siswa
    </p>
</div>


    <!-- CARD PROFIL -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200">

        <!-- HEADER CARD -->
        <div class="px-4 md:px-6 py-4 border-b bg-gray-50 rounded-t-2xl">
            <h2 class="font-semibold text-gray-700">
                Data Pribadi
            </h2>
        </div>

        <!-- CONTENT -->
        <div class="p-4 md:p-6 grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6 text-sm">

            <!-- NIS -->
            <div>
                <p class="text-gray-500 mb-1">NIS</p>
                <p class="font-semibold text-gray-800">
                    {{ $siswa->nis }}
                </p>
            </div>

            <!-- NAMA -->
            <div>
                <p class="text-gray-500 mb-1">Nama Lengkap</p>
                <p class="font-semibold text-gray-800">
                    {{ $siswa->nama }}
                </p>
            </div>

            <!-- KELAS -->
            <div>
                <p class="text-gray-500 mb-1">Kelas</p>
                <p class="font-semibold text-gray-800">
                    {{ $siswa->kelas->nama_kelas ?? '-' }}
                </p>
            </div>

            <!-- NO TELP -->
            <div>
                <p class="text-gray-500 mb-1">No. Telepon</p>
                <p class="font-semibold text-gray-800">
                    {{ $siswa->no_telp ?? '-' }}
                </p>
            </div>

            <!-- ALAMAT -->
            <div class="md:col-span-2">
                <p class="text-gray-500 mb-1">Alamat</p>
                <p class="font-semibold text-gray-800 leading-relaxed">
                    {{ $siswa->alamat ?? '-' }}
                </p>
            </div>

        </div>
    </div>

</div>
@endsection


</body>
</html>
