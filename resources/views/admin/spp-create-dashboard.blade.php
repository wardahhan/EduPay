<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data SPP | EduPay</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

@extends('layouts.admin')

@section('title', 'Kelola SPP')

@section('content')

<body class="bg-gray-100 text-gray-800">

<div class="min-h-screen flex items-center justify-center px-4">

    <div class="w-full max-w-xl">

        <!-- HEADER -->
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-red-700 flex items-center gap-2">
                    Tambah Data SPP
                </h1>
                <p class="text-sm text-gray-500">
                    Masukkan tahun dan nominal SPP baru
                </p>
            </div>

            <a href="/admin/spp"
               class="bg-gray-200 hover:bg-gray-300 text-gray-700
                      px-4 py-2 rounded-lg font-medium">
                ← Kembali
            </a>
        </div>

        <!-- CARD -->
        <div class="bg-white rounded-2xl shadow p-8">

            <form method="POST" action="/admin/spp">
                @csrf

                <!-- TAHUN -->
                <div class="mb-6">
                    <label class="block text-sm font-semibold mb-2">
                        Tahun SPP
                    </label>

                    <input type="number"
                           name="tahun"
                           value="{{ old('tahun') }}"
                           placeholder="Contoh: 2026"
                           class="w-full rounded-xl px-4 py-3 border
                           focus:outline-none
                           focus:ring-2
                           {{ $errors->has('tahun')
                               ? 'border-red-500 focus:ring-red-300'
                               : 'border-gray-300 focus:ring-red-300' }}"
                           >

                    @error('tahun')
                        <p class="text-xs text-red-600 mt-1 ml-1">
                            Tahun SPP wajib diisi
                        </p>
                    @enderror
                </div>

                <!-- NOMINAL -->
                <div class="mb-8">
                    <label class="block text-sm font-semibold mb-2">
                        Nominal SPP
                    </label>

                    <input type="number"
                           name="nominal"
                           value="{{ old('nominal') }}"
                           placeholder="Contoh: 150000"
                           class="w-full rounded-xl px-4 py-3 border
                           focus:outline-none
                           focus:ring-2
                           {{ $errors->has('nominal')
                               ? 'border-red-500 focus:ring-red-300'
                               : 'border-gray-300 focus:ring-red-300' }}"
                           >

                    @error('nominal')
                        <p class="text-xs text-red-600 mt-1 ml-1">
                            Nominal SPP wajib diisi
                        </p>
                    @enderror

                    <p class="text-xs text-gray-500 mt-1">
                        Nominal dalam rupiah (tanpa titik/koma)
                    </p>
                </div>

                <!-- KATEGORI BANTUAN -->
<div class="mb-6">
    <label class="block text-sm font-semibold mb-2">
        Kategori Bantuan
    </label>

    <select name="bantuan"
        class="w-full rounded-xl px-4 py-3 border
               focus:outline-none focus:ring-2
               {{ $errors->has('bantuan')
                    ? 'border-red-500 focus:ring-red-300'
                    : 'border-gray-300 focus:ring-red-300' }}">
        <option value="">-- Pilih Kategori --</option>
        <option value="Lengkap" {{ old('bantuan') == 'Lengkap' ? 'selected' : '' }}>Lengkap</option>
        <option value="Kurang Mampu" {{ old('bantuan') == 'Kurang Mampu' ? 'selected' : '' }}>Kurang Mampu</option>
        <option value="KIP" {{ old('bantuan') == 'KIP' ? 'selected' : '' }}>KIP</option>
        <option value="Yatim / Piatu" {{ old('bantuan') == 'Yatim / Piatu' ? 'selected' : '' }}>Yatim / Piatu</option>
    </select>

    @error('bantuan')
        <p class="text-xs text-red-600 mt-1 ml-1">
            Kategori wajib dipilih
        </p>
    @enderror
</div>

                <!-- ACTION -->
                <div class="flex justify-end gap-3">
                    <a href="/admin/spp"
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

        <!-- FOOTER -->
        <p class="text-center text-xs text-gray-400 mt-6">
            © 2026 EduPay — Tambah Data SPP
        </p>

    </div>
</div>

@endsection

</body>
</html>
