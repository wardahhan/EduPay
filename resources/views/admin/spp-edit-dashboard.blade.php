<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data SPP | EduPay</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

@extends('layouts.admin')

@section('title', 'Edit Data SPP')

@section('content')

<div class="min-h-screen flex items-center justify-center px-4 bg-gradient-to-br from-gray-100 via-gray-50 to-red-50">

    <div class="w-full max-w-xl">

        <!-- HEADER -->
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-red-700 flex items-center gap-2">
                    Edit Data SPP
                </h1>
                <p class="text-sm text-gray-500">
                    Perbarui tahun, nominal, dan kategori bantuan dengan benar
                </p>
            </div>

            <a href="/admin/spp"
               class="inline-flex items-center gap-1 bg-white border border-gray-300 hover:bg-gray-100 text-gray-700 px-4 py-2 rounded-xl font-medium shadow-sm">
                ← Kembali
            </a>
        </div>

        <!-- CARD -->
        <div class="bg-white rounded-3xl shadow-lg p-8">

            <form method="POST" action="/admin/spp/{{ $spp->id_spp }}">
                @csrf
                @method('PUT')

                <!-- TAHUN -->
                <div class="mb-6">
                    <label class="block text-sm font-semibold mb-2">Tahun SPP</label>
                    <input type="number"
                           name="tahun"
                           value="{{ old('tahun', $spp->tahun) }}"
                           placeholder="Contoh: 2026"
                           class="w-full border rounded-xl px-4 py-3 focus:ring-2 focus:ring-red-300 focus:outline-none transition duration-200"
                           required>
                    @error('tahun')
                        <p class="text-xs text-red-600 mt-1 ml-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- NOMINAL -->
                <div class="mb-6">
                    <label class="block text-sm font-semibold mb-2">Nominal SPP</label>
                    <input type="number"
                           name="nominal"
                           value="{{ old('nominal', $spp->nominal) }}"
                           placeholder="Contoh: 500000"
                           class="w-full border rounded-xl px-4 py-3 focus:ring-2 focus:ring-red-300 focus:outline-none transition duration-200"
                           required>
                    <p class="text-xs text-gray-500 mt-1">Masukkan nominal dalam rupiah tanpa titik atau koma</p>
                    @error('nominal')
                        <p class="text-xs text-red-600 mt-1 ml-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- KATEGORI BANTUAN -->
                <div class="mb-8">
                    <label class="block text-sm font-semibold mb-2">Kategori Bantuan</label>
                    <select name="bantuan"
                        class="w-full rounded-xl px-4 py-3 border focus:outline-none focus:ring-2
                               {{ $errors->has('bantuan') ? 'border-red-500 focus:ring-red-300' : 'border-gray-300 focus:ring-red-300' }}">
                        <option value="">-- Pilih Kategori --</option>
                        <option value="Lengkap" {{ old('bantuan', $spp->bantuan) == 'Lengkap' ? 'selected' : '' }}>Lengkap</option>
                        <option value="Kurang Mampu" {{ old('bantuan', $spp->bantuan) == 'Kurang Mampu' ? 'selected' : '' }}>Kurang Mampu</option>
                        <option value="KIP" {{ old('bantuan', $spp->bantuan) == 'KIP' ? 'selected' : '' }}>KIP</option>
                        <option value="Yatim / Piatu" {{ old('bantuan', $spp->bantuan) == 'Yatim / Piatu' ? 'selected' : '' }}>Yatim / Piatu</option>
                    </select>
                    @error('bantuan')
                        <p class="text-xs text-red-600 mt-1 ml-1">Kategori wajib dipilih</p>
                    @enderror
                </div>

                <!-- ACTION -->
                <div class="flex justify-end gap-3">
                    <a href="/admin/spp"
                       class="px-5 py-2 rounded-xl bg-gray-200 hover:bg-gray-300 font-medium transition">
                        Batal
                    </a>
                    <button type="submit"
                            class="px-6 py-2 rounded-xl bg-red-600 hover:bg-red-700 text-white font-semibold shadow transition">
                        Update Data
                    </button>
                </div>

            </form>
        </div>

        <!-- FOOTER -->
        <p class="text-center text-xs text-gray-400 mt-6">
            © 2026 EduPay — Edit Data SPP
        </p>

    </div>
</div>

@endsection


</body>
</html>
