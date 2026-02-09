<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Petugas | EduPay</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-100 text-gray-800">

@extends('layouts.admin')

@section('title', 'Kelola Petugas')

@section('content')

<div class="max-w-6xl mx-auto px-6 py-10">

    <!-- HEADER -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
        <div>
            <div class="flex items-center gap-3">
                <h1 class="text-2xl font-bold flex items-center gap-3">
                    Data Petugas
                </h1>

                <span class="text-xs bg-red-100 text-red-600
                             px-3 py-1 rounded-full font-semibold">
                    {{ $petugas->total() }} Data
                </span>
            </div>

            <p class="text-sm text-gray-500 mt-1">
                Kelola data petugas yang bertugas
            </p>
        </div>

        <div class="flex gap-2 mt-4 md:mt-0">
            <a href="/admin/petugas/tambah"
               class="bg-red-600 hover:bg-red-700 text-white
                      px-5 py-2 rounded-lg shadow font-semibold">
                + Tambah Petugas
            </a>
        </div>
    </div>

    <!-- SEARCH -->
    <form method="GET"
          class="bg-white rounded-xl shadow p-4 mb-4
                 flex flex-col md:flex-row
                 md:items-center md:justify-between gap-4">

        <div class="relative w-full md:w-72">
            <input type="text"
                   name="search"
                   value="{{ request('search') }}"
                   placeholder="Cari nama petugas..."
                   class="w-full border rounded-lg pl-10 pr-4 py-2 text-sm
                          focus:ring-2 focus:ring-red-500 focus:outline-none">
            <span class="absolute left-3 top-2.5 text-gray-400">🔍</span>
        </div>

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
        <table class="w-full text-sm">
            <thead class="bg-gray-100 text-gray-600 uppercase">
                <tr>
                    <th class="px-6 py-4 text-left">No</th>
                    <th class="px-6 py-4 text-left">Nama</th>
                    <th class="px-6 py-4 text-left">Username</th>
                    <th class="px-6 py-4 text-left">No Telp</th>
                    <th class="px-6 py-4 text-left">Level</th>
                    <th class="px-6 py-4 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y">
                @forelse($petugas as $p)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4">
                        {{ ($petugas->currentPage() - 1) * $petugas->perPage() + $loop->iteration }}
                    </td>
                    <td class="px-6 py-4 font-semibold">{{ $p->nama_petugas }}</td>
                    <td class="px-6 py-4">{{ $p->user->username ?? '-' }}</td>
                    <td class="px-6 py-4">{{ $p->no_telp }}</td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 text-xs rounded-full
                            {{ $p->level == 'admin'
                                ? 'bg-blue-100 text-blue-700'
                                : 'bg-green-100 text-green-700' }}">
                            {{ ucfirst($p->level) }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                     <div class="flex items-center justify-center gap-2">
                        <!-- EDIT -->
                        <a href="/admin/petugas/{{ $p->id_petugas }}/edit"
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
                        <form action="/admin/petugas/{{ $p->id_petugas }}"
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
                @empty
                <tr>
                    <td colspan="6"
                        class="px-6 py-8 text-center text-gray-500">
                        Data petugas belum tersedia
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
        </div>

        <!-- PAGINATION UI -->
<div class="flex flex-col md:flex-row md:justify-between md:items-center mt-6 text-sm gap-3">

    <!-- INFO DATA -->
    <p class="text-gray-500">
        Menampilkan
        <span class="font-medium">{{ $petugas->firstItem() }}</span>
        –
        <span class="font-medium">{{ $petugas->lastItem() }}</span>
        dari
        <span class="font-medium">{{ $petugas->total() }}</span>
        data petugas
    </p>

    <!-- LINK PAGINATION -->
    <div class="flex gap-1">
        {{-- Previous --}}
        @if ($petugas->onFirstPage())
            <span class="px-3 py-1 border rounded text-gray-400 cursor-not-allowed">«</span>
        @else
            <a href="{{ $petugas->previousPageUrl() }}"
               class="px-3 py-1 border rounded hover:bg-gray-100">«</a>
        @endif

        {{-- Page Numbers --}}
        @foreach ($petugas->getUrlRange(1, $petugas->lastPage()) as $page => $url)
            @if ($page == $petugas->currentPage())
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

        {{-- Next --}}
        @if ($petugas->hasMorePages())
            <a href="{{ $petugas->nextPageUrl() }}"
               class="px-3 py-1 border rounded hover:bg-gray-100">»</a>
        @else
            <span class="px-3 py-1 border rounded text-gray-400 cursor-not-allowed">»</span>
        @endif
    </div>

</div>
    

    <!-- FOOTER -->
    <p class="text-center text-sm text-gray-500 mt-8">
        © 2026 EduPay — Manajemen Data Petugas
    </p>

</div>

<script>
function confirmDelete(button) {
    const form = button.closest('form');

    Swal.fire({
        title: 'Konfirmasi Penghapusan',
        text: 'Data petugas akan dihapus permanen',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal',
        confirmButtonColor: '#dc2626'
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
