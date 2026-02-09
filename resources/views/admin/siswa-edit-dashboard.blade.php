<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>EduPay | Edit Siswa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

@extends('layouts.admin')

@section('title', 'Edit Siswa')

@section('content')
<div class="min-h-screen bg-gray-100 py-10 px-6 flex justify-center">
    <div class="w-full max-w-4xl">

        <!-- HEADER -->
        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-2xl font-bold text-red-700">Edit Data Siswa</h1>
                <p class="text-sm text-gray-500 mt-1">Perbarui data siswa untuk keperluan pembayaran SPP</p>
            </div>
            <a href="/admin/siswa" class="px-4 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-gray-300">← Kembali</a>
        </div>

        <!-- FORM -->
        <div class="bg-white rounded-2xl shadow-sm p-8">
            <form method="POST" action="/admin/siswa/{{ $siswa->id_siswa }}" class="space-y-8">
                @csrf
                @method('PUT')

                <!-- IDENTITAS SISWA -->
                <div>
                    <h2 class="text-sm font-semibold text-red-700 uppercase tracking-wide mb-4">Identitas Siswa</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- NIS -->
                        <div>
                            <label class="text-sm font-medium">NIS / NISN</label>
                            <input type="text" value="{{ $siswa->nis }}" readonly
                                class="w-full mt-1 rounded-lg px-4 py-2.5 border bg-gray-100 text-gray-600 cursor-not-allowed">
                            <p class="text-xs text-gray-500 mt-1">Tidak dapat diubah</p>
                        </div>

                        <!-- NAMA -->
                        <div>
                            <label class="text-sm font-medium">Nama Siswa</label>
                            <input type="text" name="nama" value="{{ old('nama', $siswa->nama) }}"
                                class="w-full mt-1 rounded-lg px-4 py-2.5 border focus:ring-2 focus:ring-red-300">
                            @error('nama') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                        </div>

                        <!-- ALAMAT -->
                        <div class="md:col-span-2">
                            <label class="text-sm font-medium">Alamat</label>
                            <textarea name="alamat" rows="2"
                                class="w-full mt-1 rounded-lg px-4 py-2.5 border focus:ring-2 focus:ring-red-300">{{ old('alamat', $siswa->alamat) }}</textarea>
                            @error('alamat') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                        </div>

                        <!-- NO TELP -->
                        <div>
                            <label class="text-sm font-medium">No. Telp</label>
                            <input type="text" name="no_telp" value="{{ old('no_telp', $siswa->no_telp) }}"
                                class="w-full mt-1 rounded-lg px-4 py-2.5 border focus:ring-2 focus:ring-red-300">
                            @error('no_telp') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                        </div>

                        <!-- KELAS -->
                        <div>
                            <label class="text-sm font-medium">Kelas</label>
                            <select name="id_kelas"
                                class="w-full mt-1 rounded-lg px-4 py-2.5 border focus:ring-2 focus:ring-red-300">
                                @foreach($kelas as $k)
                                    <option value="{{ $k->id_kelas }}" {{ old('id_kelas', $siswa->id_kelas) == $k->id_kelas ? 'selected' : '' }}>
                                        {{ $k->nama_kelas }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_kelas') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                <!-- BANTUAN & SPP -->
                <div>
                    <h2 class="text-sm font-semibold text-red-700 uppercase tracking-wide mb-4">Bantuan & SPP</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- BANTUAN -->
                        <div>
                            <label class="text-sm font-medium">Kategori Bantuan</label>
                            <select name="bantuan"
                                class="w-full mt-1 rounded-lg px-4 py-2.5 border focus:ring-2 focus:ring-red-300">
                                <option value="">Pilih kategori</option>
                                <option value="Lengkap" {{ old('bantuan', $siswa->bantuan) == 'Lengkap' ? 'selected' : '' }}>Lengkap</option>
                                <option value="Kurang Mampu" {{ old('bantuan', $siswa->bantuan) == 'Kurang Mampu' ? 'selected' : '' }}>Kurang Mampu</option>
                                <option value="KIP" {{ old('bantuan', $siswa->bantuan) == 'KIP' ? 'selected' : '' }}>KIP</option>
                                <option value="Yatim / Piatu" {{ old('bantuan', $siswa->bantuan) == 'Yatim / Piatu' ? 'selected' : '' }}>Yatim / Piatu</option>
                            </select>
                            @error('bantuan') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                        </div>

                        <!-- SPP -->
                        <div>
                            <label class="text-sm font-medium">SPP</label>
                            <select name="id_spp"
                                class="w-full mt-1 rounded-lg px-4 py-2.5 border focus:ring-2 focus:ring-red-300">
                                <option value="">Pilih SPP</option>
                                @foreach($spp as $s)
                                    <option value="{{ $s->id_spp }}" {{ old('id_spp', $siswa->id_spp) == $s->id_spp ? 'selected' : '' }}>
                                        {{ $s->tahun }} – Rp {{ number_format($s->nominal,0,',','.') }} ({{ $s->bantuan }})
                                    </option>
                                @endforeach
                            </select>
                            @error('id_spp') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                <!-- ACTION -->
                <div class="flex justify-end gap-3 pt-6 border-t">
                    <a href="/admin/siswa" class="px-5 py-2 rounded-lg bg-gray-200 hover:bg-gray-300">Batal</a>
                    <button type="submit" class="px-6 py-2 rounded-lg bg-red-600 text-white hover:bg-red-700">Update Data</button>
                </div>

            </form>
        </div>

        <p class="text-center text-xs text-gray-400 mt-8">© 2026 EduPay</p>
    </div>
</div>
@endsection


</body>
</html>
