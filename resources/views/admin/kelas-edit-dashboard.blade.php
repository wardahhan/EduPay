<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Kelas | EduPay</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>
</head>

@extends('layouts.admin')

@section('title', 'Kelola Kelas')

@section('content')

<body class="bg-gray-100 text-gray-800">

<div class="min-h-screen flex items-center justify-center px-4">

    <div class="w-full max-w-lg bg-white rounded-xl shadow-lg p-8">

        <!-- HEADER -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold flex items-center gap-2">
                Edit Data Kelas
            </h1>
            <p class="text-sm text-gray-500 mt-1">
                Perbarui informasi kelas dan kompetensi keahlian
            </p>
        </div>

        <!-- FORM -->
        <form method="POST" action="/admin/kelas/{{ $kelas->id_kelas }}" class="space-y-5">
            @csrf
            @method('PUT')

            <!-- NAMA KELAS -->
            <div>
                <label class="block text-sm font-semibold mb-1">
                    Nama Kelas
                </label>
                <input type="text"
                       name="nama_kelas"
                       value="{{ old('nama_kelas', $kelas->nama_kelas) }}"
                       class="w-full p-3 border rounded-lg
                              focus:ring-2 focus:ring-red-500 focus:outline-none">

                @error('nama_kelas')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- KOMPETENSI -->
            <div>
                <label class="block text-sm font-semibold mb-1">
                    Kompetensi Keahlian
                </label>
                <input type="text"
                       name="kompetensi_keahlian"
                       value="{{ old('kompetensi_keahlian', $kelas->kompetensi_keahlian) }}"
                       class="w-full p-3 border rounded-lg
                              focus:ring-2 focus:ring-red-500 focus:outline-none">

                @error('kompetensi_keahlian')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
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
                    Update Data
                </button>

            </div>
        </form>


    </div>

</div>

@endsection

</body>
</html>
