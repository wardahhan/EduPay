<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>EduPay | Data Siswa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-100 text-gray-800">
    
@extends('layouts.admin')

@section('title', 'Kelola Siswa')

@section('content')

<div class="max-w-6xl mx-auto px-3 md:px-4 lg:px-6 py-6 md:py-10">

    <!-- HEADER -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
        <div>
    <div class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-3">
        <h1 class="text-xl md:text-2xl font-bold flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-3">
            Data Siswa
        </h1>

        <!-- BADGE TOTAL DATA -->
        <span class="text-xs bg-red-100 text-red-600
                     px-3 py-1 rounded-full font-semibold">
            {{ $siswa->total() }} Data
        </span>
    </div>

    <!-- DESKRIPSI (DI BAWAH JUDUL) -->
    <p class="text-sm text-gray-500 mt-1">
        Kelola data siswa
    </p>
</div>


        <div class="flex gap-2 mt-4 md:mt-0">

            <a href="/admin/siswa/tambah"
               class="bg-red-600 hover:bg-red-700 text-white
                      px-5 py-2 rounded-lg shadow font-semibold">
                + Tambah Siswa
            </a>
        </div>
    </div>

    <!-- ALERT -->
    @if(session('success'))
        <div class="mb-6 bg-green-100 border border-green-300
                    text-green-700 px-4 py-3 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <!-- SEARCH & FILTER -->
    <form method="GET"
          class="bg-white rounded-xl shadow p-4 mb-4
                 flex flex-col md:flex-row
                 md:items-center md:justify-between gap-4">

        <!-- SEARCH -->
        <div class="relative w-full md:w-72">
            <input type="text"
                   name="search"
                   value="{{ request('search') }}"
                   placeholder="Cari NIS / Nama siswa..."
                   class="w-full border rounded-lg pl-10 pr-4 py-2 text-sm
                          focus:ring-2 focus:ring-red-500 focus:outline-none">
            <span class="absolute left-3 top-2.5 text-gray-400">🔍</span>
        </div>

        <!-- FILTER -->
        <div class="flex items-center gap-2 text-sm">
            <span>Tampilkan</span>

            <select name="perPage"
                    onchange="this.form.submit()"
                    class="border rounded px-2 py-1">
                <option value="10" {{ request('perPage') == 10 ? 'selected' : '' }}>10</option>
                <option value="25" {{ request('perPage') == 25 ? 'selected' : '' }}>25</option>
                <option value="50" {{ request('perPage') == 50 ? 'selected' : '' }}>50</option>
            </select>

            <span>data</span>
        </div>
    </form>

    <!-- TABLE -->
    <div class="bg-white rounded-xl shadow overflow-x-auto">
        <table class="min-w-full text-sm">
            <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                <tr>
                    <th class="px-6 py-4 text-left">NIS / NISN</th>
                    <th class="px-6 py-4 text-left">Nama</th>
                    <th class="px-6 py-4 text-left">Kelas</th>
                    <th class="px-6 py-4 text-left">Bantuan</th>
                    <th class="px-6 py-4 text-left">SPP</th>
                    <th class="px-6 py-4 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y">
                @forelse($siswa as $s)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4 font-medium">{{ $s->nis }}</td>

                    <td class="px-6 py-4">{{ $s->nama }}</td>

                    <td class="px-6 py-4">
                        <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs">
                            {{ $s->kelas->nama_kelas ?? '-' }}
                        </span>
                    </td>

                    <td class="px-6 py-4">
                        <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs">
                        {{ $s->bantuan ?? '-' }}
                        </span>
                    </td>

                    <td class="px-6 py-4 font-semibold text-green-600">
                        Rp {{ number_format($s->spp->nominal ?? 0,0,',','.') }}
                    </td>


                    <td class="px-6 py-4">
    <div class="flex justify-center items-center gap-2">

        <!-- VIEW -->
        <a href="/admin/siswa/{{ $s->id_siswa }}"
           title="Detail"
           class="p-2 rounded-md
                  bg-blue-50
                  text-blue-600
                  hover:bg-blue-100
                  transition">
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="w-5 h-5"
                 fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M2.458 12C3.732 7.943 7.523 5 12 5
                         c4.478 0 8.268 2.943 9.542 7
                         -1.274 4.057-5.064 7-9.542 7
                         -4.477 0-8.268-2.943-9.542-7z"/>
            </svg>
        </a>

        <!-- EDIT -->
        <a href="/admin/siswa/{{ $s->id_siswa }}/edit"
           title="Edit"
           class="p-2 rounded-md
                  bg-green-50
                  text-green-600
                  hover:bg-green-100
                  transition">
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="w-5 h-5"
                 fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M15.232 5.232l3.536 3.536M9 11l6-6
                         3 3-6 6H9v-3z"/>
            </svg>
        </a>

        <!-- DELETE -->
        <form action="/admin/siswa/{{ $s->id_siswa }}"
              method="POST">
            @csrf
            @method('DELETE')
            <button type="button"
                    title="Hapus"
                    onclick="confirmDelete(this)"
                    class="p-2 rounded-md
                           bg-red-50
                           text-red-600
                           hover:bg-red-100
                           transition">
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-5 h-5"
                     fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862
                             a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6
                             M9 7h6m2 0H7m6-4h-2a1 1 0 00-1 1v1h4V4
                             a1 1 0 00-1-1z"/>
            </svg>
        </button>
        </form>

    </div>
</td>

                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-6 py-8 text-center text-gray-500">
                        Data siswa belum tersedia
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- PAGINATION (TETAP) -->
    <div class="flex flex-col md:flex-row md:justify-between md:items-center
                mt-6 text-sm gap-3">

        <p class="text-gray-500">
            Menampilkan
            <span class="font-medium">{{ $siswa->firstItem() }}</span>
            –
            <span class="font-medium">{{ $siswa->lastItem() }}</span>
            dari
            <span class="font-medium">{{ $siswa->total() }}</span>
            data
        </p>

        <div class="flex gap-1">
            @if ($siswa->onFirstPage())
                <span class="px-3 py-1 border rounded text-gray-400">«</span>
            @else
                <a href="{{ $siswa->previousPageUrl() }}"
                   class="px-3 py-1 border rounded hover:bg-gray-100">«</a>
            @endif

            @foreach ($siswa->getUrlRange(1, $siswa->lastPage()) as $page => $url)
                @if ($page == $siswa->currentPage())
                    <span class="px-3 py-1 border rounded bg-red-600 text-white">
                        {{ $page }}
                    </span>
                @else
                    <a href="{{ $url }}"
                       class="px-3 py-1 border rounded hover:bg-gray-100">
                        {{ $page }}
                    </a>
                @endif
            @endforeach

            @if ($siswa->hasMorePages())
                <a href="{{ $siswa->nextPageUrl() }}"
                   class="px-3 py-1 border rounded hover:bg-gray-100">»</a>
            @else
                <span class="px-3 py-1 border rounded text-gray-400">»</span>
            @endif
        </div>
    </div>

    <!-- FOOTER -->
    <p class="text-center text-sm text-gray-500 mt-8">
        © 2026 EduPay — Manajemen Data Siswa
    </p>

</div>

<!-- DELETE POPUP -->
<script>
function confirmDelete(button) {
    const form = button.closest('form');

    Swal.fire({
        title: 'Hapus Data Siswa?',
        text: 'Data siswa yang dihapus tidak dapat dikembalikan.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, hapus',
        cancelButtonText: 'Batal',
        confirmButtonColor: '#dc2626',
        cancelButtonColor: '#9ca3af',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
    });
}
</script>

@endsection


</body>
</html>
