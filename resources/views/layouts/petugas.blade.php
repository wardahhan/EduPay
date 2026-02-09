<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Panel Petugas | EduPay')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-100 text-gray-800">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-white shadow-lg flex flex-col fixed inset-y-0 left-0">
        <div class="px-6 py-5 border-b">
            <h1 class="text-2xl font-bold text-red-600">EduPay</h1>
            <p class="text-sm text-gray-500">Panel Petugas</p>
        </div>

        <nav class="px-4 py-6 space-y-3 flex-1 text-[15px]">

            <!-- Dashboard -->
            <a href="/petugas/dashboard"
   class="flex items-center gap-3 px-4 py-2 rounded-lg
   {{ request()->is('petugas/dashboard') ? 'bg-red-600 text-white font-medium' : 'hover:bg-gray-100' }}">


                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="2"
                          d="M3 3h18v18H3z" />
                </svg>

                Dashboard
            </a>

            <!-- Entri Pembayaran -->
            <a href="/petugas/pembayaran"
   class="flex items-center gap-3 px-4 py-2 rounded-lg
   {{ request()->is('petugas/pembayaran') ? 'bg-red-600 text-white font-medium' : 'hover:bg-gray-100' }}">


                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="2"
                          d="M12 8c-3.866 0-7 1.343-7 3s3.134 3 7 3
                             7-1.343 7-3-3.134-3-7-3z" />
                </svg>

                Entri Pembayaran
            </a>

            <!-- History Pembayaran -->
            <a href="/petugas/history-pembayaran"
   class="flex items-center gap-3 px-4 py-2 rounded-lg
   {{ request()->is('petugas/history-pembayaran') || request()->is('petugas/pembayaran/*')
      ? 'bg-red-600 text-white font-medium'
      : 'hover:bg-gray-100' }}">


                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="2"
                          d="M8 7V3m8 4V3M5 11h14M7 15h10M7 19h6" />
                </svg>

                History Pembayaran
            </a>

            <!-- Cetak Bukti Pembayaran -->
            <a href="/petugas/history-pembayaran"
   class="flex items-center gap-3 px-4 py-2 rounded-lg
   {{ request()->is('petugas/cetak-bukti/*')
      ? 'bg-red-600 text-white font-medium'
      : 'hover:bg-gray-100' }}">


                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="2"
                          d="M6 9V2h12v7M6 18h12v4H6zM6 14h12" />
                </svg>

                Cetak Bukti Pembayaran
            </a>

        </nav>

        <!-- LOGOUT -->
    <div class="px-4 py-4 border-t">
        <a href="/logout"
           class="flex items-center gap-3 px-4 py-2 rounded-lg font-semibold text-red-600 hover:bg-red-50">
            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" stroke-width="2"
                 viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M17 16l4-4m0 0l-4-4m4 4H7"/>
            </svg>
            Logout
        </a>
    </div>
    </aside>

    <!-- CONTENT -->
    <main class="flex-1 ml-64 p-6">
        @yield('content')
    </main>

</div>

</body>
</html>
