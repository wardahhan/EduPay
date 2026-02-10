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

<div class="min-h-screen flex items-center justify-center px-4 bg-gray-100 text-gray-800">

    <div class="w-full max-w-xl">

        <!-- HEADER -->
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-red-700">
                    Tambah Data Kelas
                </h1>
                <p class="text-sm text-gray-500">
                    Tambahkan kelas dan kompetensi keahlian baru
                </p>
            </div>

            <a href="{{ url('/admin/kelas') }}"
               class="bg-gray-200 hover:bg-gray-300 text-gray-700
                      px-4 py-2 rounded-lg font-medium">
                ← Kembali
            </a>
        </div>

        <!-- CARD -->
        <div class="bg-white rounded-2xl shadow p-8">

            <form method="POST" action="{{ url('/admin/kelas') }}" class="space-y-6">
                @csrf

                <!-- NAMA KELAS -->
                <div>
                    <label class="block text-sm font-semibold mb-2">
                        Nama Kelas
                    </label>

                    <input type="text"
                           name="nama_kelas"
                           value="{{ old('nama_kelas') }}"
                           placeholder="Contoh: X RPL 2"
                           class="w-full rounded-xl px-4 py-3 border
                           focus:outline-none focus:ring-2
                           {{ $errors->has('nama_kelas')
                                ? 'border-red-500 focus:ring-red-300'
                                : 'border-gray-300 focus:ring-red-300' }}">

                    @error('nama_kelas')
                        <p class="text-xs text-red-600 mt-1 ml-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- KOMPETENSI KEAHLIAN -->
                <div>
                    <label class="block text-sm font-semibold mb-2">
                        Kompetensi Keahlian
                    </label>

                    <input type="text"
                           name="kompetensi_keahlian"
                           value="{{ old('kompetensi_keahlian') }}"
                           placeholder="Contoh: Rekayasa Perangkat Lunak"
                           class="w-full rounded-xl px-4 py-3 border
                           focus:outline-none focus:ring-2
                           {{ $errors->has('kompetensi_keahlian')
                                ? 'border-red-500 focus:ring-red-300'
                                : 'border-gray-300 focus:ring-red-300' }}">

                    @error('kompetensi_keahlian')
                        <p class="text-xs text-red-600 mt-1 ml-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- ACTION -->
                <div class="flex justify-end gap-3 pt-4">
                    <a href="{{ url('/admin/kelas') }}"
                       class="px-5 py-2 rounded-lg bg-gray-300
                              hover:bg-gray-400 font-medium">
                        Batal
                    </a>

                    <button type="submit"
                            class="px-6 py-2 rounded-lg bg-red-600
                                   hover:bg-red-700 text-white
                                   font-semibold shadow">
                        Simpan Data
                    </button>
                </div>

            </form>
        </div>

        <!-- FOOTER -->
        <p class="text-center text-xs text-gray-400 mt-6">
            © 2026 EduPay — Tambah Data Kelas
        </p>

    </div>
</div>

@endsection



</body>
</html>
