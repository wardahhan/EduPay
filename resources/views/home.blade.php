<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduPay | Aplikasi Pembayaran SPP</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap');
        body { font-family: 'Plus Jakarta Sans', sans-serif; scroll-behavior: smooth; }
        .gradient-bg { background: linear-gradient(135deg, #fff5f5 0%, #ffffff 100%); }
    </style>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#c62828',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-white text-gray-800">

<nav class="bg-white/80 backdrop-blur-md fixed w-full z-50 border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <span class="text-2xl font-extrabold text-primary tracking-tight">EduPay</span>
        <a href="/login" class="text-white bg-primary hover:bg-red-700 font-bold rounded-full text-sm px-8 py-2.5 transition shadow-lg shadow-red-200">
            Masuk ke Sistem
        </a>
    </div>
</nav>

<section id="beranda" class="relative pt-40 pb-24 overflow-hidden gradient-bg">
  <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-2 gap-12 items-center relative z-10">

    <!-- Konten Teks -->
    <div>
      <div class="inline-block px-4 py-2 bg-red-100 text-primary rounded-full text-xs font-bold mb-6 tracking-wide uppercase">
        ✨ Solusi Digital SPP Sekolah
      </div>
      <h1 class="text-4xl md:text-4.5xl font-extrabold text-gray-900 leading-tight mb-4">
        Kelola SPP <span class="text-primary">EduPay</span> Jadi Lebih Mudah
      </h1>
      <p class="text-base text-gray-600 mb-8 leading-relaxed max-w-md">
        Aplikasi pembayaran SPP terpadu untuk mempermudah transaksi siswa dan pengelolaan laporan keuangan sekolah secara akurat.
      </p>
      <div class="flex flex-wrap gap-4">
        <a href="/login" class="px-8 py-4 bg-primary text-white rounded-2xl font-bold shadow-xl hover:scale-105 transition transform active:scale-95 text-center">
          Masuk Sekarang
        </a>
      </div>
    </div>

    <!-- Konten Diagram -->
    <div class="relative flex justify-center">
      <!-- Background Blur -->
      <div class="absolute -top-20 -right-10 w-96 h-96 bg-red-200 rounded-full blur-3xl opacity-30"></div>
      <div class="absolute -top-40 -left-20 w-80 h-80 bg-primary rounded-full blur-3xl opacity-20"></div>

      <!-- Diagram Hero -->
      <canvas id="heroChart" class="relative z-10 w-full max-w-lg rounded-2xl shadow-1xl"></canvas>
    </div>

  </div>
</section>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('heroChart').getContext('2d');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei'],
        datasets: [
          {
            label: 'Lunas',
            data: [120, 150, 180, 130, 200],
            backgroundColor: '#2563EB', // biru
            borderRadius: 8
          },
          {
            label: 'Belum Lunas',
            data: [30, 25, 40, 20, 35],
            backgroundColor: '#EF4444', // merah
            borderRadius: 8
          },
          {
            label: 'Dispensasi',
            data: [10, 15, 12, 18, 10],
            backgroundColor: '#F59E0B', // kuning/oranye
            borderRadius: 8
          }
        ]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'bottom',
                labels: {
                    font: { size: 14, weight: 'bold' }
                }
            },
            tooltip: {
                callbacks: {
                    label: function(context) {
                        return context.dataset.label + ': ' + context.raw + ' siswa';
                    }
                },
                padding: 10
            }
        },
        scales: {
            x: {
                grid: { display: false },
                ticks: { font: { size: 14 } }
            },
            y: {
                beginAtZero: true,
                ticks: { stepSize: 50, font: { size: 14 } },
                grid: { color: 'rgba(0,0,0,0.05)' }
            }
        }
    }
});
</script>



<section class="py-12 bg-white border-y border-gray-100">
  <div class="max-w-7xl mx-auto px-6">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
      
      <div>
        <h2 class="text-4xl font-extrabold text-primary mb-1">
          <span class="counter" data-target="10">0</span>+
        </h2>
        <p class="text-gray-500 font-medium">Sekolah Aktif</p>
      </div>
      
      <div>
        <h2 class="text-4xl font-extrabold text-primary mb-1">
          <span class="counter" data-target="24">0</span>/7
        </h2>
        <p class="text-gray-500 font-medium">Support Digital</p>
      </div>
      
      <div>
        <h2 class="text-4xl font-extrabold text-primary mb-1">
          <span class="counter" data-target="100">0</span>+
        </h2>
        <p class="text-gray-500 font-medium">Transaksi Harian</p>
      </div>
      
      <div>
        <h2 class="text-4xl font-extrabold text-primary mb-1">
          <span class="counter" data-target="99.9">0</span>%
        </h2>
        <p class="text-gray-500 font-medium">Sistem Aman</p>
      </div>
      
    </div>
  </div>
</section>

<section id="layanan" class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex flex-col lg:flex-row gap-16">
            <div class="lg:w-1/3">
                <p class="text-primary font-bold tracking-widest uppercase text-xs mb-4">Tentang EduPay</p>
                <h2 class="text-3xl font-bold text-gray-900 mb-6 leading-tight">Digitalisasi Administrasi SPP Sekolah</h2>
                <p class="text-gray-600 mb-8 text-sm leading-relaxed">
                    EduPay dirancang untuk memenuhi standar kompetensi digital sekolah. Kami menyediakan platform aman bagi admin untuk mengelola data siswa, petugas untuk entri transaksi, hingga siswa untuk memantau history pembayaran mereka secara mandiri.
                </p>
            </div>
            
            <div id="fitur" class="lg:w-2/3 grid sm:grid-cols-2 gap-8">
                <div class="p-8 rounded-3xl bg-red-50 hover:bg-red-100 transition group">
                    <div class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center mb-6 shadow-sm group-hover:scale-110 transition">
                        <i class="fa-solid fa-users text-primary"></i>
                    </div>
                    <h3 class="text-lg font-bold mb-3">Manajemen Data</h3>
                    <p class="text-gray-600 text-sm">Kemudahan CRUD data Siswa, Petugas, Kelas, hingga data SPP dalam satu panel Administrator.</p>
                </div>
                <div class="p-8 rounded-3xl bg-orange-50 hover:bg-orange-100 transition group">
                    <div class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center mb-6 shadow-sm group-hover:scale-110 transition">
                        <i class="fa-solid fa-money-bill-transfer text-orange-500"></i>
                    </div>
                    <h3 class="text-lg font-bold mb-3">Entri Transaksi</h3>
                    <p class="text-gray-600 text-sm">Proses pembayaran yang cepat oleh petugas dengan pencatatan otomatis ke dalam basis data.</p>
                </div>
                <div class="p-8 rounded-3xl bg-blue-50 hover:bg-blue-100 transition group">
                    <div class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center mb-6 shadow-sm group-hover:scale-110 transition">
                        <i class="fa-solid fa-clock-rotate-left text-blue-500"></i>
                    </div>
                    <h3 class="text-lg font-bold mb-3">History Pembayaran</h3>
                    <p class="text-gray-600 text-sm">Siswa dapat melihat riwayat pembayaran secara transparan untuk memastikan iuran telah terdata.</p>
                </div>
                <div class="p-8 rounded-3xl bg-purple-50 hover:bg-purple-100 transition group">
                    <div class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center mb-6 shadow-sm group-hover:scale-110 transition">
                        <i class="fa-solid fa-file-invoice text-purple-500"></i>
                    </div>
                    <h3 class="text-lg font-bold mb-3">Laporan Otomatis</h3>
                    <p class="text-gray-600 text-sm">Generate laporan keuangan pembayaran SPP secara komunikatif untuk memudahkan pengolahan data.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="testimoni" class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-2xl font-bold text-center mb-16 italic text-gray-700">"Apa Kata Mereka?"</h2>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                <p class="text-gray-600 text-sm italic mb-8">"Dulu sering lupa sudah bayar bulan apa saja, sekarang tinggal cek history di EduPay, semua kelihatan jelas!"</p>
                <div class="flex items-center gap-4">
                    <img src="https://api.dicebear.com/7.x/pixel-art/svg?seed=student4" class="w-10 h-10 rounded-full">
                    <div>
                        <h4 class="font-bold text-sm">Randi Pratama</h4>
                        <p class="text-xs text-gray-400 uppercase">Siswa Kelas XII RPL</p>
                    </div>
                </div>
            </div>
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                <p class="text-gray-600 text-sm italic mb-8">"Proses bayar di loket jadi lebih cepat karena petugas tinggal input nominal dan langsung sinkron ke akun saya."</p>
                <div class="flex items-center gap-4">
                    <img src="https://api.dicebear.com/7.x/croodles/svg?seed=student5
" class="w-10 h-10 rounded-full">
                    <div>
                        <h4 class="font-bold text-sm">Siska Amelia</h4>
                        <p class="text-xs text-gray-400 uppercase">Siswi Kelas XI TKJ</p>
                    </div>
                </div>
            </div>
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                <p class="text-gray-600 text-sm italic mb-8">"Tampilannya keren dan mudah dipakai. Bayar SPP jadi nggak terasa membosankan lagi lewat platform digital ini."</p>
                <div class="flex items-center gap-4">
                    <img src="https://api.dicebear.com/7.x/pixel-art/svg?seed=student6
" class="w-10 h-10 rounded-full">
                    <div>
                        <h4 class="font-bold text-sm">Fajar Shidiq</h4>
                        <p class="text-xs text-gray-400 uppercase">Siswa Kelas X Multimedia</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="faq" class="py-24 bg-white">
    <div class="max-w-4xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-gray-900">Pertanyaan Umum (FAQ)</h2>
            <p class="text-gray-500 mt-4">Pelajari lebih lanjut mengenai penggunaan sistem EduPay.</p>
        </div>
        
        <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white text-primary" data-inactive-classes="text-gray-500">
            <div class="border-b border-gray-100 mb-2">
                <h2 id="accordion-flush-heading-1">
                    <button type="button" class="flex items-center justify-between w-full py-6 font-bold text-left transition-all duration-300 hover:text-primary group" data-accordion-target="#accordion-flush-body-1" aria-expanded="false" aria-controls="accordion-flush-body-1">
                        <span>Siapa saja yang bisa mengakses sistem EduPay?</span>
                        <svg data-accordion-icon class="w-3 h-3 shrink-0 transition-transform duration-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                        </svg>
                    </button>
                </h2>
                <div id="accordion-flush-body-1" class="hidden overflow-hidden transition-all duration-500 ease-in-out" aria-labelledby="accordion-flush-heading-1">
                    <div class="pb-6 text-sm text-gray-600 leading-relaxed">
                        Sistem ini memiliki tiga tingkat hak akses utama: <span class="font-semibold text-gray-800">Administrator</span> untuk pengelolaan data penuh, <span class="font-semibold text-gray-800">Petugas</span> untuk melayani transaksi pembayaran, dan <span class="font-semibold text-gray-800">Siswa</span> untuk memantau riwayat pembayaran mereka sendiri.
                    </div>
                </div>
            </div>

            <div class="border-b border-gray-100 mb-2">
                <h2 id="accordion-flush-heading-2">
                    <button type="button" class="flex items-center justify-between w-full py-6 font-bold text-left text-gray-500 transition-all duration-300 hover:text-primary group" data-accordion-target="#accordion-flush-body-2" aria-expanded="false" aria-controls="accordion-flush-body-2">
                        <span>Bagaimana cara siswa melihat bukti pembayaran?</span>
                        <svg data-accordion-icon class="w-3 h-3 shrink-0 transition-transform duration-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                        </svg>
                    </button>
                </h2>
                <div id="accordion-flush-body-2" class="hidden overflow-hidden transition-all duration-500 ease-in-out" aria-labelledby="accordion-flush-heading-2">
                    <div class="pb-6 text-sm text-gray-600 leading-relaxed">
                        Siswa dapat masuk ke sistem menggunakan akun mereka (NISN) untuk mengakses panel pribadi. Di sana terdapat fitur histori yang menampilkan detail tanggal, bulan, dan nominal transaksi yang telah dibayarkan secara transparan.
                    </div>
                </div>
            </div>

            <div class="border-b border-gray-100 mb-2">
                <h2 id="accordion-flush-heading-3">
                    <button type="button" class="flex items-center justify-between w-full py-6 font-bold text-left text-gray-500 transition-all duration-300 hover:text-primary group" data-accordion-target="#accordion-flush-body-3" aria-expanded="false" aria-controls="accordion-flush-body-3">
                        <span>Apakah admin bisa membuat laporan otomatis?</span>
                        <svg data-accordion-icon class="w-3 h-3 shrink-0 transition-transform duration-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                        </svg>
                    </button>
                </h2>
                <div id="accordion-flush-body-3" class="hidden overflow-hidden transition-all duration-500 ease-in-out" aria-labelledby="accordion-flush-heading-3">
                    <div class="pb-6 text-sm text-gray-600 leading-relaxed">
                        Tentu saja. Administrator dilengkapi dengan fitur <span class="italic font-medium text-gray-800">Generate Laporan</span> yang dapat menghasilkan rekapitulasi transaksi pembayaran dengan cepat, komunikatif, dan mudah diolah untuk keperluan laporan keuangan sekolah.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-16">
    <div class="max-w-5xl mx-auto px-6">
        <div class="bg-primary rounded-[2.5rem] p-10 md:p-14 text-center text-white relative overflow-hidden shadow-xl shadow-red-100">
            <div class="relative z-10">
                <h2 class="text-3xl font-bold mb-4">Siap Digitalisasi SPP Sekolah?</h2>
                <p class="text-red-100 mb-8 text-base max-w-xl mx-auto opacity-90">
                    Tinggalkan cara manual. Kelola data siswa, transaksi petugas, dan laporan keuangan dalam satu sistem yang aman dan terintegrasi.
                </p>
                <div class="flex justify-center">
                    <a href="/login" class="bg-white text-primary px-10 py-3.5 rounded-xl font-bold hover:bg-gray-50 transition-all transform hover:scale-105 shadow-md">
                        Masuk ke Dashboard
                    </a>
                </div>
            </div>

            <div class="absolute -bottom-12 -left-12 w-48 h-48 bg-red-500 rounded-full opacity-40"></div>
            <div class="absolute -top-12 -right-12 w-32 h-32 bg-red-400 rounded-full opacity-25"></div>
        </div>
    </div>
</section>

<footer class="bg-white border-t border-gray-100 pt-16 pb-8">
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-4 gap-12 mb-16">
        <div>
            <h3 class="text-2xl font-bold text-primary mb-6">EduPay</h3>
            <p class="text-gray-400 text-sm leading-relaxed">
                Aplikasi Pembayaran SPP berbasis web untuk tugas praktik kejuruan Rekayasa Perangkat Lunak 2025/2026.
            </p>
        </div>
        <div>
            <h4 class="font-bold mb-6">Navigasi</h4>
            <ul class="text-gray-500 space-y-4 text-sm font-medium">
                <li><a href="#beranda" class="hover:text-primary transition">Beranda</a></li>
                <li><a href="#layanan" class="hover:text-primary transition">Layanan Kami</a></li>
                <li><a href="#fitur" class="hover:text-primary transition">Fitur Aplikasi</a></li>
            </ul>
        </div>
        <div>
            <h4 class="font-bold mb-6">Network</h4>
            <ul class="text-gray-500 space-y-4 text-sm font-medium">
                <li><a href="#" class="hover:text-primary transition">Sistem Sekolah</a></li>
                <li><a href="#" class="hover:text-primary transition">E-Learning</a></li>
                <li><a href="#" class="hover:text-primary transition">Database Siswa</a></li>
            </ul>
        </div>
        <div>
            <h4 class="font-bold mb-6">Ikuti Kami</h4>
            <div class="flex space-x-4">
                <a href="#" class="w-10 h-10 rounded-full border border-gray-200 flex items-center justify-center hover:bg-primary hover:text-white transition shadow-sm">
                    <i class="fa-brands fa-facebook-f"></i>
                </a>
                <a href="#" class="w-10 h-10 rounded-full border border-gray-200 flex items-center justify-center hover:bg-primary hover:text-white transition shadow-sm">
                    <i class="fa-brands fa-x-twitter"></i>
                </a>
                <a href="#" class="w-10 h-10 rounded-full border border-gray-200 flex items-center justify-center hover:bg-primary hover:text-white transition shadow-sm">
                    <i class="fa-brands fa-instagram"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="text-center text-gray-400 text-sm border-t border-gray-50 pt-8">
        &copy; 2026 EduPay — All Rights Reserved.
    </div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>

<!-- Script Count Up -->
<script>
  const counters = document.querySelectorAll('.counter');

  counters.forEach(counter => {
    const updateCount = () => {
      const target = +counter.getAttribute('data-target');
      let count = +counter.innerText;

      // Tentukan kecepatan animasi
      const speed = 200; // semakin kecil semakin cepat
      const increment = target / speed;

      if(count < target) {
        counter.innerText = Math.ceil(count + increment);
        setTimeout(updateCount, 15);
      } else {
        counter.innerText = target;
      }
    };

    updateCount();
  });
</script>

</body>
</html>