<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Entri Pembayaran | EduPay</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen font-sans text-gray-800">

@extends('layouts.petugas')

@section('title', 'Entri Pembayaran')

@section('content')

<div class="max-w-4xl mx-auto mt-6 md:mt-10 px-4 md:px-6">

    <!-- HEADER -->
    <div class="mb-6 md:mb-8 text-center">
        <h1 class="text-2xl md:text-3xl font-extrabold text-red-700 mb-2">
            Entri Pembayaran SPP
        </h1>
        <p class="text-gray-500 text-xs md:text-sm">
            Petugas mencatat transaksi pembayaran SPP siswa dengan cepat dan akurat
        </p>
    </div>

    <!-- FORM -->
    <div class="bg-white rounded-2xl shadow-lg p-4 md:p-8">
        <form method="POST" action="{{ route('petugas.pembayaran.store') }}">
            @csrf

            <!-- SISWA -->
            <div class="mb-4 md:mb-5">
                <label class="block text-sm font-semibold mb-2">Siswa</label>
                <select name="id_siswa" id="id_siswa"
                        class="w-full border border-gray-300 rounded-lg px-3 md:px-4 py-2 md:py-2.5 text-sm md:text-base focus:ring-2 focus:ring-red-500 focus:outline-none @error('id_siswa') border-red-500 @enderror">
                    <option value="">-- Pilih Siswa --</option>
                    @foreach($siswa as $s)
                        <option value="{{ $s->id_siswa }}" {{ old('id_siswa') == $s->id_siswa ? 'selected' : '' }}>
                            {{ $s->nis }} - {{ $s->nama }}
                        </option>
                    @endforeach
                </select>
                @error('id_siswa')
                    <p class="text-red-600 text-sm mt-1">
                        Perhatian: {{ $message }}. Silakan pilih siswa yang ingin dibayarkan.
                    </p>
                @enderror
            </div>

            <!-- KATEGORI BANTUAN -->
            <div class="mb-4 md:mb-5">
                <label class="block text-sm font-semibold mb-2">Kategori Bantuan</label>
                <select name="bantuan" id="bantuan"
                        class="w-full rounded-lg px-3 md:px-4 py-2 md:py-2.5 text-sm md:text-base border focus:outline-none focus:ring-2
                               {{ $errors->has('bantuan') ? 'border-red-500 focus:ring-red-300' : 'border-gray-300 focus:ring-red-500' }}">
                    <option value="">-- Pilih Kategori --</option>
                    <option value="Lengkap" {{ old('bantuan') == 'Lengkap' ? 'selected' : '' }}>Lengkap</option>
                    <option value="Kurang Mampu" {{ old('bantuan') == 'Kurang Mampu' ? 'selected' : '' }}>Kurang Mampu</option>
                    <option value="KIP" {{ old('bantuan') == 'KIP' ? 'selected' : '' }}>KIP</option>
                    <option value="Yatim / Piatu" {{ old('bantuan') == 'Yatim / Piatu' ? 'selected' : '' }}>Yatim / Piatu</option>
                </select>
                @error('bantuan')
                    <p class="text-xs text-red-600 mt-1 ml-1">Kategori wajib dipilih</p>
                @enderror
            </div>

            <!-- SPP DROPDOWN OTOMATIS FILTER -->
            <div class="mb-4 md:mb-5">
                <label class="block text-sm font-semibold mb-2">Tahun SPP & Nominal</label>
                <select name="id_spp" id="id_spp"
                        class="w-full border border-gray-300 rounded-lg px-3 md:px-4 py-2 md:py-2.5 text-sm md:text-base focus:ring-2 focus:ring-red-500 focus:outline-none @error('id_spp') border-red-500 @enderror">
                    <option value="">-- Pilih Tahun SPP --</option>
                    @foreach($spp as $sp)
                        <option value="{{ $sp->id_spp }}"
                                data-bantuan="{{ $sp->bantuan }}"
                                data-nominal="{{ $sp->nominal }}"
                                {{ old('id_spp') == $sp->id_spp ? 'selected' : '' }}>
                            {{ $sp->tahun }} - Rp {{ number_format($sp->nominal,0,',','.') }} ({{ $sp->bantuan }})
                        </option>
                    @endforeach
                </select>
                @error('id_spp')
                    <p class="text-red-600 text-sm mt-1">
                        Perhatian: {{ $message }}. Silakan pilih tahun SPP yang sesuai.
                    </p>
                @enderror
            </div>

            <!-- TANGGAL BAYAR -->
            <div class="mb-4 md:mb-5">
                <label class="block text-sm font-semibold mb-2">Tanggal Bayar</label>
                <input type="date"
                       name="tanggal_bayar"
                       value="{{ old('tanggal_bayar', date('Y-m-d')) }}"
                       class="w-full border border-gray-300 rounded-lg px-3 md:px-4 py-2 md:py-2.5 text-sm md:text-base focus:ring-2 focus:ring-red-500 focus:outline-none @error('tanggal_bayar') border-red-500 @enderror">
                @error('tanggal_bayar')
                    <p class="text-red-600 text-sm mt-1">
                        Perhatian: {{ $message }}. Silakan isi tanggal pembayaran.
                    </p>
                @enderror
            </div>

            <!-- BULAN & TAHUN -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 md:gap-4 mb-6">
                <div>
                    <label class="block text-sm font-semibold mb-1">Bulan Dibayar</label>
                    <select name="bulan_bayar"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-red-500 focus:outline-none @error('bulan_bayar') border-red-500 @enderror">
                        <option value="">-- Pilih Bulan --</option>
                        @foreach([
                            'Januari','Februari','Maret','April','Mei','Juni',
                            'Juli','Agustus','September','Oktober','November','Desember'
                        ] as $bulan)
                            <option value="{{ $bulan }}"
                                {{ old('bulan_bayar') == $bulan ? 'selected' : '' }}
                                @if(isset($riwayat_bayar[old('id_siswa')][$bulan])) disabled class="bg-green-200" @endif>
                                {{ $bulan }}
                                @if(isset($riwayat_bayar[old('id_siswa')][$bulan])) (Lunas) @endif
                            </option>
                        @endforeach
                    </select>
                    @error('bulan_bayar')
                        <p class="text-red-600 text-sm mt-1">
                            Perhatian: {{ $message }}. Silakan pilih bulan pembayaran.
                        </p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-1">Tahun Dibayar</label>
                    <input type="number"
                           name="tahun_bayar"
                           value="{{ old('tahun_bayar', date('Y')) }}"
                           class="w-full border border-gray-300 rounded-lg px-3 md:px-4 py-2 md:py-2.5 text-sm md:text-base focus:ring-2 focus:ring-red-500 focus:outline-none @error('tahun_bayar') border-red-500 @enderror">
                    @error('tahun_bayar')
                        <p class="text-red-600 text-sm mt-1">
                            Perhatian: {{ $message }}. Silakan isi tahun pembayaran.
                        </p>
                    @enderror
                </div>
            </div>

            <!-- BUTTON -->
            <div class="flex flex-col sm:flex-row sm:justify-end gap-2 sm:gap-3">
                <a href="{{ route('petugas.dashboard') }}"
                   class="px-4 md:px-5 py-2 md:py-2.5 rounded-lg bg-gray-200 hover:bg-gray-300 transition text-sm md:text-base text-center">
                    Batal
                </a>

                <button type="submit"
                        class="px-4 md:px-6 py-2 md:py-2.5 rounded-lg bg-red-600 hover:bg-red-700 text-white font-semibold transition shadow-md hover:shadow-lg text-sm md:text-base">
                    Simpan Pembayaran
                </button>
            </div>

        </form>
    </div>
</div>

<!-- SCRIPT: Filter dropdown SPP otomatis sesuai bantuan -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const bantuanSelect = document.getElementById('bantuan');
        const sppSelect = document.getElementById('id_spp');

        function filterSpp() {
            const selectedBantuan = bantuanSelect.value;
            Array.from(sppSelect.options).forEach(option => {
                if(option.value === "") return; // skip placeholder
                option.style.display = (option.dataset.bantuan === selectedBantuan) ? 'block' : 'none';
            });

            // Reset value jika yang lama tidak sesuai
            if(sppSelect.selectedOptions[0].dataset.bantuan !== selectedBantuan) {
                sppSelect.value = "";
            }
        }

        bantuanSelect.addEventListener('change', filterSpp);

        // Trigger saat halaman load jika ada old value
        filterSpp();
    });
</script>

@endsection
</body>
</html>
