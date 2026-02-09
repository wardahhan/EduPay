<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Siswa | EduPay')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800">

<!-- TOPBAR MOBILE -->
<header class="md:hidden fixed top-0 inset-x-0 bg-white shadow z-50
               flex items-center justify-between px-4 py-3">
    <h1 class="font-bold text-red-600">EduPay</h1>

    <button onclick="toggleSidebar()" class="p-2 rounded hover:bg-gray-100">
        <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" stroke-width="2"
             viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
    </button>
</header>

<!-- OVERLAY MOBILE -->
<div id="overlay"
     onclick="toggleSidebar()"
     class="fixed inset-0 bg-black/40 hidden z-40 md:hidden"></div>

<!-- SIDEBAR -->
<aside id="sidebar"
       class="fixed inset-y-0 left-0 w-64 bg-white shadow-lg z-50
              transform -translate-x-full md:translate-x-0
              transition-transform duration-300
              flex flex-col">

    <!-- BRAND -->
    <div class="px-6 py-5 border-b">
        <h1 class="text-2xl font-bold text-red-600">EduPay</h1>
        <p class="text-sm text-gray-500">Panel Siswa</p>
    </div>

    <!-- MENU -->
    <nav class="flex-1 overflow-y-auto px-4 py-6 space-y-6 text-[15px]">

        <!-- MENU UTAMA -->
        <div>
            <p class="text-xs font-semibold text-gray-400 uppercase mb-2">
                Menu Utama
            </p>

            <!-- DASHBOARD -->
            <a href="/siswa/dashboard"
               class="flex items-center gap-3 px-4 py-2 rounded-lg font-medium transition
               {{ request()->is('siswa/dashboard')
                    ? 'bg-red-600 text-white'
                    : 'text-gray-700 hover:bg-gray-100' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3 12l2-2 7-7 7 7 2 2M5 10v10h4v-6h6v6h4V10"/>
                </svg>
                Dashboard
            </a>

            <!-- RIWAYAT PEMBAYARAN -->
            <a href="/siswa/riwayat-pembayaran"
               class="flex items-center gap-3 px-4 py-2 rounded-lg transition
               {{ request()->is('siswa/riwayat-pembayaran*')
                    ? 'bg-red-600 text-white'
                    : 'text-gray-700 hover:bg-gray-100' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M9 12h6m-6 4h6M7 4h10a2 2 0 012 2v12a2 2 0 01-2 2H7a2 2 0 01-2-2V6a2 2 0 012-2z"/>
                </svg>
                Riwayat Pembayaran
            </a>
        </div>

        <!-- AKUN -->
        <div>
            <p class="text-xs font-semibold text-gray-400 uppercase mb-2">
                Akun
            </p>

            <!-- PROFIL -->
            <a href="/siswa/profil"
               class="flex items-center gap-3 px-4 py-2 rounded-lg transition
               {{ request()->is('siswa/profil*')
                    ? 'bg-red-600 text-white'
                    : 'text-gray-700 hover:bg-gray-100' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M5.121 17.804A13.937 13.937 0 0112 15c2.5 0 4.847.655 6.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                Profil
            </a>
        </div>

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
<main class="pt-16 md:pt-6 md:ml-64 p-6 min-h-screen">
    @yield('content')
</main>

<script>
function toggleSidebar() {
    document.getElementById('sidebar').classList.toggle('-translate-x-full');
    document.getElementById('overlay').classList.toggle('hidden');
}
</script>

</body>
</html>
