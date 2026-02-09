<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Petugas | EduPay</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

@extends('layouts.admin')

@section('title', 'Kelola Petugas')

@section('content')

<div class="bg-gray-100 min-h-screen flex items-center justify-center px-4">

    <div class="w-full max-w-xl">

    <!-- HEADER -->
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-red-700 flex items-center gap-2">
                Tambah Petugas
            </h1>
            <p class="text-sm text-gray-500">
                Tambahkan petugas baru ke sistem EduPay
            </p>
        </div>

        <a href="/admin/petugas"
           class="bg-gray-200 hover:bg-gray-300 text-gray-700
                  px-4 py-2 rounded-lg font-medium">
            ← Kembali
        </a>
    </div>

    <!-- CARD FORM -->
    <div class="bg-white rounded-2xl shadow p-8">

        <form method="POST" action="/admin/petugas">
            @csrf

            <!-- NAMA PETUGAS -->
            <div class="mb-6">
                <label class="block text-sm font-semibold mb-1">
                    Nama Petugas
                </label>

                <input type="text"
                       name="nama_petugas"
                       value="{{ old('nama_petugas') }}"
                       placeholder="Contoh: Andi Pratama"
                       class="w-full px-4 py-3 rounded-xl border
                              focus:outline-none focus:ring-2
                              {{ $errors->has('nama_petugas')
                                  ? 'border-red-500 focus:ring-red-200'
                                  : 'focus:ring-red-300' }}">

              @error('nama_petugas')
                <p class="text-xs text-red-600 mt-1 ml-1">
                    Nama Petugas wajib diisi
                </p>
              @enderror
            </div>

            <!-- NO TELP -->
            <div class="mb-6">
                <label class="block text-sm font-semibold mb-1">
                    Nomor Telepon
                </label>

                <input type="text"
                       name="no_telp"
                       value="{{ old('no_telp') }}"
                       placeholder="08xxxxxxxxxx"
                       class="w-full px-4 py-3 rounded-xl border
                              focus:outline-none focus:ring-2 focus:ring-red-300">
            </div>

            <!-- USERNAME -->
            <div class="mb-6">
                <label class="block text-sm font-semibold mb-1">
                    Username
                </label>

                <input type="text"
                       name="username"
                       value="{{ old('username') }}"
                       placeholder="username login"
                       class="w-full px-4 py-3 rounded-xl border
                              focus:outline-none focus:ring-2 focus:ring-red-300">
            </div>

            <!-- PASSWORD & LEVEL -->
            <div class="mb-6 grid grid-cols-1 md:grid-cols-2 gap-4">

                <!-- LEVEL -->
                <div>
                    <label class="block text-sm font-semibold mb-1">
                        Level Akses
                    </label>

                    <select name="level"
                            class="w-full px-4 py-3 rounded-xl border
                                   focus:outline-none focus:ring-2 focus:ring-red-300">
                        <option value="">-- Pilih Level --</option>
                        <option value="petugas">Petugas</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>

                <!-- PASSWORD -->
                <div>
                    <label class="block text-sm font-semibold mb-1">
                        Password
                    </label>

                    <input type="password"
                           name="password"
                           placeholder="Password login"
                           class="w-full px-4 py-3 rounded-xl border
                                  focus:outline-none focus:ring-2 focus:ring-red-300">
                </div>

            </div>

            <!-- ACTION -->
            <div class="flex justify-end gap-3">
                <a href="/admin/petugas"
                   class="px-5 py-2 rounded-lg bg-gray-300
                          hover:bg-gray-400 font-medium">
                    Batal
                </a>

                <button type="submit"
                        class="px-6 py-2 rounded-lg bg-red-600
                               hover:bg-red-700 text-white font-semibold shadow">
                    Simpan Data
                </button>
            </div>

        </form>
    </div>

    <p class="text-center text-xs text-gray-400 mt-6">
        © 2026 EduPay — Tambah Data Petugas
    </p>

</div>

@endsection


</body>
</html>
