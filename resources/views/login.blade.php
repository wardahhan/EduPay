<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login | EduPay</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#c62828',
                        soft: '#f4f6f8'
                    }
                }
            }
        }
    </script>
</head>

<body class="min-h-screen bg-soft flex items-center justify-center px-4">

<div class="w-full max-w-5xl bg-white rounded-[26px] shadow-2xl overflow-hidden">

    <div class="grid grid-cols-1 md:grid-cols-2 min-h-[480px]">

        <!-- KIRI -->
        <div class="relative hidden md:flex items-center p-10 text-white overflow-hidden">

            <!-- Background -->
            <div class="absolute inset-0 bg-gradient-to-br from-red-800 via-red-700 to-red-900"></div>

            <!-- GARIS ABSTRAK (DIPERTEGAS) -->
            <svg class="absolute inset-0 w-full h-full" viewBox="0 0 800 600" fill="none">
                <path d="M-200 140 C220 40 420 320 900 220"
                      stroke="rgba(255,255,255,0.45)" stroke-width="1.8"/>
                <path d="M-200 260 C300 160 520 420 900 340"
                      stroke="rgba(255,255,255,0.35)" stroke-width="1.6"/>
                <path d="M-200 380 C340 300 580 540 900 500"
                      stroke="rgba(255,255,255,0.25)" stroke-width="1.4"/>

                <!-- garis tipis kedua biar kelihatan -->
                <path d="M-200 160 C220 60 420 340 900 240"
                      stroke="rgba(255,255,255,0.15)" stroke-width="1"/>
            </svg>

            <!-- KONTEN -->
            <div class="relative z-10 max-w-sm">

                <!-- IKON BINTANG -->
                <svg class="w-10 h-10 mb-6 opacity-90" viewBox="0 0 24 24" fill="none">
                    <path d="M12 2 L12 22 M2 12 L22 12 M4 4 L20 20 M20 4 L4 20"
                          stroke="white" stroke-width="1.6" stroke-linecap="round"/>
                </svg>

                <h1 class="text-3xl font-bold leading-tight mb-4">
                    Hello EduPay!
                </h1>

                <p class="text-sm text-white/90 leading-relaxed">
                    Kelola pembayaran SPP dengan sistem modern,
                    otomatis, dan terintegrasi untuk sekolah
                    masa kini.
                </p>

                <p class="mt-10 text-xs text-white/60">
                    © 2026 EduPay. All rights reserved.
                </p>
            </div>
        </div>

        <!-- KANAN -->
        <div class="flex items-center justify-center px-8 py-8">

            <!-- ⬇️ tinggi form dikunci -->
            <div class="w-full max-w-sm max-h-[420px] overflow-hidden">

                <!-- LOGO -->
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-8 h-8 rounded-lg bg-primary flex items-center justify-center text-white font-bold">
                        E
                    </div>
                    <span class="text-base font-semibold text-gray-800">EduPay</span>
                </div>

                <h2 class="text-xl font-bold text-gray-800 mb-1">
                    Welcome Back!
                </h2>
                <p class="text-sm text-gray-500 mb-6">
                    Silakan login untuk melanjutkan ke sistem.
                </p>

                @if (session('error'))
    <div class="mb-4 rounded-xl bg-red-50 border border-red-200 px-4 py-3">
        <p class="text-[12px] text-red-700 font-medium flex items-center gap-2">
            <span class="text-red-600">⚠</span>
            {{ session('error') }}
        </p>
    </div>
@endif


                <form method="POST" action="/login" class="space-y-4">
                    @csrf

                    <!-- USERNAME -->
                    <div>
                        <label class="block text-[11px] font-bold text-gray-700 uppercase mb-1 ml-1">
                            Username
                        </label>

                        <input type="text" name="username"
                               value="{{ old('username') }}"
                               placeholder="Masukkan username"
                               class="w-full px-4 py-3 rounded-xl border bg-gray-50
                               @error('username') border-red-500 @else border-gray-200 focus:border-red-500 @enderror
                               focus:ring-4 focus:ring-red-500/10 focus:outline-none transition-all">

                        @error('username')
                            <p class="text-[11px] text-red-600 mt-1 ml-1 leading-tight">
                                Isi username terlebih dahulu
                            </p>
                        @enderror
                    </div>

                    <!-- PASSWORD -->
                    <div>
                        <label class="block text-[11px] font-bold text-gray-700 uppercase mb-1 ml-1">
                            Password
                        </label>

                        <input type="password" name="password"
                               value="{{ old('password') }}"
                               placeholder="Masukkan password"
                               class="w-full px-4 py-3 rounded-xl border bg-gray-50
                               @error('password') border-red-500 @else border-gray-200 focus:border-red-500 @enderror
                               focus:ring-4 focus:ring-red-500/10 focus:outline-none transition-all">

                        @error('password')
                            <p class="text-[11px] text-red-600 mt-1 ml-1 leading-tight">
                                Password wajib diisi
                            </p>
                        @enderror
                    </div>

                    <button type="submit"
                            class="w-full py-3 rounded-xl bg-primary text-white
                                   font-semibold text-sm hover:bg-red-700
                                   transition active:scale-95 shadow-md mt-3">
                        Login
                    </button>
                </form>

                <p class="mt-5 text-[11px] text-gray-400 text-center">
                    © 2026 EduPay
                </p>

            </div>
        </div>

    </div>
</div>

</body>
</html>
