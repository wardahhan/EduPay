<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Petugas | EduPay</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

@extends('layouts.admin')

@section('title', 'Edit Petugas | EduPay')

@section('content')

<div class="bg-gray-100 min-h-screen flex items-center justify-center px-4">

    <div class="w-full max-w-xl">

        <!-- HEADER -->
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-red-700">
                    Edit Petugas
                </h1>
                <p class="text-sm text-gray-500">
                    Perbarui data petugas EduPay
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

            <form method="POST" action="/admin/petugas/{{ $petugas->id_petugas }}">
                @csrf
                @method('PUT')

                <!-- NAMA PETUGAS -->
                <div class="mb-6">
                    <label class="block text-sm font-semibold mb-1">
                        Nama Petugas
                    </label>

                    <input type="text"
                           name="nama_petugas"
                           value="{{ old('nama_petugas', $petugas->nama_petugas) }}"
                           class="w-full px-4 py-3 rounded-xl border
                                  focus:outline-none focus:ring-2
                                  {{ $errors->has('nama_petugas')
                                      ? 'border-red-500 focus:ring-red-200'
                                      : 'focus:ring-red-300' }}">

                    @error('nama_petugas')
                        <p class="text-xs text-red-600 mt-1 ml-1">
                            Nama petugas wajib diisi
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
                           value="{{ old('no_telp', $petugas->no_telp) }}"
                           placeholder="08xxxxxxxxxx"
                           class="w-full px-4 py-3 rounded-xl border
                                  focus:outline-none focus:ring-2
                                  {{ $errors->has('no_telp')
                                      ? 'border-red-500 focus:ring-red-200'
                                      : 'focus:ring-red-300' }}">

                    @error('no_telp')
                        <p class="text-xs text-red-600 mt-1 ml-1">
                            Nomor telepon harus 10–12 digit angka
                        </p>
                    @enderror
                </div>

                <!-- USERNAME -->
                <div class="mb-6">
                    <label class="block text-sm font-semibold mb-1">
                        Username
                    </label>

                    <input type="text"
                           name="username"
                           value="{{ old('username', $petugas->user->username) }}"
                           class="w-full px-4 py-3 rounded-xl border
                                  focus:outline-none focus:ring-2
                                  {{ $errors->has('username')
                                      ? 'border-red-500 focus:ring-red-200'
                                      : 'focus:ring-red-300' }}">

                    @error('username')
                        <p class="text-xs text-red-600 mt-1 ml-1">
                            Username sudah digunakan
                        </p>
                    @enderror
                </div>

                <!-- LEVEL & PASSWORD -->
                <div class="mb-6 grid grid-cols-1 md:grid-cols-2 gap-4">

                    <!-- LEVEL -->
                    <div>
                        <label class="block text-sm font-semibold mb-1">
                            Level Akses
                        </label>

                        <select name="level"
                                class="w-full px-4 py-3 rounded-xl border
                                       focus:outline-none focus:ring-2
                                       {{ $errors->has('level')
                                           ? 'border-red-500 focus:ring-red-200'
                                           : 'focus:ring-red-300' }}">
                            <option value="">-- Pilih Level --</option>
                            <option value="petugas"
                                {{ old('level', $petugas->user->role) == 'petugas' ? 'selected' : '' }}>
                                Petugas
                            </option>
                            <option value="admin"
                                {{ old('level', $petugas->user->role) == 'admin' ? 'selected' : '' }}>
                                Admin
                            </option>
                        </select>

                        @error('level')
                            <p class="text-xs text-red-600 mt-1 ml-1">
                                Level wajib dipilih
                            </p>
                        @enderror
                    </div>

                    <!-- PASSWORD -->
                    <div>
                        <label class="block text-sm font-semibold mb-1">
                            Password Baru
                        </label>

                        <input type="password"
                               name="password"
                               placeholder="Kosongkan jika tidak diubah"
                               class="w-full px-4 py-3 rounded-xl border
                                      focus:outline-none focus:ring-2
                                      {{ $errors->has('password')
                                          ? 'border-red-500 focus:ring-red-200'
                                          : 'focus:ring-red-300' }}">

                        @error('password')
                            <p class="text-xs text-red-600 mt-1 ml-1">
                                Password minimal 6 karakter
                            </p>
                        @enderror
                    </div>

                </div>

                <!-- ACTION -->
                <div class="flex justify-end gap-3">
                    <a href="/admin/petugas"
                       class="px-5 py-2 rounded-lg bg-gray-300 hover:bg-gray-400 font-medium">
                        Batal
                    </a>

                    <button type="submit"
                            class="px-6 py-2 rounded-lg bg-red-600 hover:bg-red-700
                                   text-white font-semibold shadow">
                        Update Data
                    </button>
                </div>

            </form>
        </div>

        <p class="text-center text-xs text-gray-400 mt-6">
            © 2026 EduPay — Edit Data Petugas
        </p>

    </div>
</div>

@endsection


</body>
</html>
