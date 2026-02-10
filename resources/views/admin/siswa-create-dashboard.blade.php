<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Siswa | EduPay</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

@extends('layouts.admin')

@section('title', 'Kelola Siswa')

@section('content')

<div class="min-h-screen bg-gray-100 py-6 md:py-10 px-3 md:px-6 flex justify-center">

    <div class="w-full max-w-4xl md:max-w-5xl">

        <!-- HEADER -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8 gap-4">
            <div>
                <h1 class="text-xl md:text-2xl font-bold text-red-700 flex items-center gap-2">
                    Tambah Data Siswa
                </h1>
                <p class="text-sm text-gray-500 mt-1">
                    Lengkapi data siswa dan kategori bantuan
                </p>
            </div>

            <a href="/admin/siswa"
               class="bg-gray-200 hover:bg-gray-300 text-gray-700
                      px-4 py-2 rounded-lg font-medium mt-4 sm:mt-0">
                ← Kembali
            </a>
        </div>

        <!-- CARD -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100">

            <form method="POST" action="/admin/siswa" class="p-4 md:p-8 space-y-8 md:space-y-10">
                @csrf

                <!-- SECTION: IDENTITAS -->
                <div class="-mt-4">
                    <h2 class="text-sm font-semibold text-red-700 mb-2 uppercase tracking-wide">
                        Identitas Siswa
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div>
                            <label class="text-sm text-gray-600">NIS / NISN</label>
                            <input type="text" name="nis"
                                value="{{ old('nis') }}"
                                class="w-full mt-1 rounded-lg px-4 py-2.5 border
                                    focus:ring-2 focus:ring-red-300
                                    @error('nis') border-red-500 @enderror">

                            @error('nis')
                                <p class="text-xs text-red-600 mt-1 ml-1">
                                    NIS / NISN wajib diisi
                                </p>
                            @enderror

                        </div>

                        <div>
                            <label class="text-sm text-gray-600">Nama Siswa </label>
                            <<input type="text" name="nama"
                                value="{{ old('nama') }}"
                                class="w-full mt-1 rounded-lg px-4 py-2.5 border
                                    focus:ring-2 focus:ring-red-300
                                    @error('nama') border-red-500 @enderror">

                            @error('nama')
                                <p class="text-xs text-red-600 mt-1 ml-1">
                                    Nama siswa wajib diisi
                                </p>
                            @enderror
                        </div>

                        <div>
                            <label class="text-sm text-gray-600">Kelas</label>
                                <select name="id_kelas"
                                    class="w-full mt-1 rounded-lg px-4 py-2.5 border
                                        focus:ring-2 focus:ring-red-300
                                        @error('id_kelas') border-red-500 @enderror">
                                    <option value="">Pilih kelas</option>
                                    @foreach($kelas as $k)
                                        <option value="{{ $k->id_kelas }}"
                                            {{ old('id_kelas') == $k->id_kelas ? 'selected' : '' }}>
                                            {{ $k->nama_kelas }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('id_kelas')
                                    <p class="text-xs text-red-600 mt-1 ml-1">
                                        Kelas wajib dipilih
                                    </p>
                                @enderror
                        </div>

                        <div>
                            <label class="text-sm text-gray-600">No. Telp</label>
                                <input type="text" name="no_telp"
                                    value="{{ old('no_telp') }}"
                                    class="w-full mt-1 rounded-lg px-4 py-2.5 border
                                        focus:ring-2 focus:ring-red-300
                                        @error('no_telp') border-red-500 @enderror">

                                @error('no_telp')
                                    <p class="text-xs text-red-600 mt-1 ml-1">
                                        Nomor telepon wajib diisi
                                    </p>
                                @enderror
                            </div>

                        <div class="md:col-span-2">
                            <label class="text-sm text-gray-600">Alamat</label>
                            <textarea name="alamat" rows="2"
                                class="w-full mt-1 rounded-lg px-4 py-2.5 border
                                    focus:ring-2 focus:ring-red-300
                                    @error('alamat') border-red-500 @enderror">{{ old('alamat') }}</textarea>

                            @error('alamat')
                                <p class="text-xs text-red-600 mt-1 ml-1">
                                    Alamat wajib diisi
                                </p>
                            @enderror
                        </div>

                    </div>
                </div>

                <!-- SECTION: BANTUAN & SPP -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

<!-- KATEGORI BANTUAN -->
<div>
    <label class="text-sm text-gray-600">Kategori Bantuan</label>
    <select id="bantuan" name="bantuan"
        class="w-full mt-1 rounded-lg px-4 py-2.5 border focus:ring-2 focus:ring-red-300">
        <option value="">Pilih kategori</option>
        <option value="Lengkap">Lengkap</option>
        <option value="Kurang Mampu">Kurang Mampu</option>
        <option value="KIP">KIP</option>
        <option value="Yatim / Piatu">Yatim / Piatu</option>
    </select>
</div>

<!-- SPP -->
<div>
    <label class="text-sm text-gray-600">SPP</label>
    <select id="spp" name="id_spp"
        class="w-full mt-1 rounded-lg px-4 py-2.5 border focus:ring-2 focus:ring-red-300">
        <option value="">Pilih SPP</option>
        @foreach($spp as $s)
            <option value="{{ $s->id_spp }}" data-bantuan="{{ $s->bantuan }}">
                {{ $s->tahun }} - Rp {{ number_format($s->nominal,0,',','.') }} ({{ $s->bantuan }})
            </option>
        @endforeach
    </select>
</div>
</div>

                <!-- ACTION -->
                <div class="flex justify-end gap-3 pt-6 border-t">
                    <a href="/admin/siswa"
                       class="px-5 py-2 rounded-lg bg-gray-100 text-gray-600 hover:bg-gray-200">
                        Batal
                    </a>

                    <button type="submit"
                        class="px-6 py-2 rounded-lg bg-red-600 hover:bg-red-700 text-white font-semibold">
                        Simpan Data
                    </button>
                </div>

            </form>
        </div>

        <p class="text-center text-xs text-gray-400 mt-8">
            © 2026 EduPay
        </p>

    </div>
</div>

<script>
const bantuanSelect = document.getElementById('bantuan');
const sppSelect = document.getElementById('spp');

function filterAndSelectSPP() {
    const selectedBantuan = bantuanSelect.value;
    let found = false;

    Array.from(sppSelect.options).forEach(option => {
        if(option.value === "") return; // skip placeholder
        if(option.dataset.bantuan === selectedBantuan) {
            option.style.display = 'block';
            if(!found) {
                // otomatis pilih opsi pertama yang sesuai
                option.selected = true;
                found = true;
            }
        } else {
            option.style.display = 'none';
            option.selected = false;
        }
    });

    if(!found) {
        // jika tidak ada SPP yang sesuai, pilih placeholder
        sppSelect.value = "";
    }
}

// jalankan saat kategori bantuan berubah
bantuanSelect.addEventListener('change', filterAndSelectSPP);

// optional: panggil saat page load
filterAndSelectSPP();
</script>



@endsection

</body>
</html>
