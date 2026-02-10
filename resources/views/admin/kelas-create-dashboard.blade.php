<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Kelas | EduPay</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>
</head>

@extends('layouts.admin')

@section('title', 'Kelola Kelas')

@section('content')

<body class="bg-gray-100 text-gray-800">

<div class="min-h-screen flex items-center justify-center px-3 md:px-4 py-6 md:py-8">

    <div class="w-full max-w-lg bg-white rounded-xl shadow-lg p-4 md:p-8">

        <!-- HEADER -->
        <div class="mb-6">
            <h1 class="text-xl md:text-2xl font-bold flex items-center gap-2">
                Tambah Data Kelas
            </h1>
            <p class="text-sm text-gray-500 mt-1">
                Tambahkan kelas dan kompetensi keahlian baru
            </p>
        </div>

        <!-- FORM -->
        <form method="POST" action="/admin/kelas" class="space-y-5">
            @csrf

            <!-- NAMA KELAS -->
            <div>
                <label class="block text-sm font-semibold mb-1">
                    Nama Kelas
                </label>
                <input type="text"
                       name="nama_kelas"
                       value="{{ old('nama_kelas') }}"
                       placeholder="Contoh: XII RPL 1"
                       class="w-full p-3 border rounded-lg
                              focus:ring-2 focus:ring-red-500 focus:outline-none">

                @error('nama_kelas')
                    <p class="text-xs text-red-600 mt-1 ml-1">
                            Nama Kelas wajib diisi
                        </p>
                    @enderror
            </div>

            <!-- KOMPETENSI -->
            <div>
                <label class="block text-sm font-semibold mb-1">
                    Kompetensi Keahlian
                </label>
                <input type="text"
                       name="kompetensi_keahlian"
                       value="{{ old('kompetensi_keahlian') }}"
                       placeholder="Contoh: Rekayasa Perangkat Lunak"
                       class="w-full p-3 border rounded-lg
                              focus:ring-2 focus:ring-red-500 focus:outline-none">

                @error('kompetensi_keahlian')
                    <p class="text-xs text-red-600 mt-1 ml-1">
                            Kompetensi Keahlian wajib diisi
                        </p>
                    @enderror
            </div>

            <!-- BUTTON -->
            <div class="flex justify-between items-center pt-4">

                <a href="/admin/kelas"
                   class="text-sm font-semibold text-gray-600 hover:text-gray-800">
                    ← Kembali ke Data Kelas
                </a>

                <button type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white
                               px-6 py-2 rounded-lg font-semibold shadow">
                    Simpan Data
                </button>

            </div>
        </form>

    </div>

</div>


@endsection

</body>
</html>
