<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami | PT Teknik Semesta</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Mobile menu styles */
        .mobile-menu {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }
        .mobile-menu.open {
            max-height: 1000px;
        }
        
        /* Prevent horizontal scrolling */
        html, body {
            width: 100%;
            overflow-x: hidden;
        }
        
        /* Adjust hero section for mobile */
        @media (max-width: 768px) {
            .hero-section {
                padding-top: 100px;
                padding-bottom: 80px;
            }
            .hero-title {
                font-size: 2rem;
            }
            .hero-subtitle {
                font-size: 1.1rem;
            }
        }
        
        /* Image responsive */
        img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body class="font-sans">
<?php $logo = 'images/logosamping.png'; ?>

<!-- Navbar Responsive -->
<header class="fixed top-0 left-0 w-full bg-white shadow-lg z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-3 flex items-center justify-between">
        <!-- Logo -->
        <div class="flex items-center">
            <a href="/" class="flex items-center">
                <img src="<?php echo $logo; ?>" alt="PT Teknik Semesta" class="h-10 md:h-12">
            </a>
        </div>
        
        <!-- Desktop Menu -->
        <nav class="hidden md:flex space-x-6 text-gray-800 font-medium">
            <a href="/" class="hover:text-blue-600 transition-colors duration-300">Beranda</a>
            <a href="/tentangkami" class="text-blue-600 border-b-2 border-blue-600 pb-1">Tentang Kami</a>
            <a href="/portofolio" class="hover:text-blue-600 transition-colors duration-300">Portofolio</a>
            <a href="/hubungikami" class="hover:text-blue-600 transition-colors duration-300">Hubungi Kami</a>
        </nav>
        
       <!-- Bagian Kanan: Tombol Logout/Mobile Menu -->
       <div class="flex items-center space-x-4">
            <?php if(auth()->check()): ?>
                <form id="logout-form" action="<?php echo route('logout'); ?>" method="POST" style="display: none;">
                    <?php echo csrf_field(); ?>
                </form>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                   class="hidden md:block text-red-600 font-semibold hover:text-red-700 transition-colors duration-300">
                    Logout
                </a>
            <?php endif; ?>
            
            <!-- Tombol Hamburger untuk Mobile -->
            <button id="mobile-menu-button" class="md:hidden text-gray-700 focus:outline-none">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>
    </div>
    
    <!-- Mobile Menu -->
    <div id="mobile-menu" class="mobile-menu md:hidden bg-white w-full px-4 border-t">
        <div class="flex flex-col space-y-2 py-4">
            <a href="/" class="py-2 px-3 hover:bg-blue-50 rounded transition-colors">Beranda</a>
            <a href="/tentangkami" class="py-2 px-3 bg-blue-50 text-blue-600 rounded font-medium">Tentang Kami</a>
            <a href="/portofolio" class="py-2 px-3 hover:bg-blue-50 rounded transition-colors">Portofolio</a>
            <a href="/hubungikami" class="py-2 px-3 hover:bg-blue-50 rounded transition-colors">Hubungi Kami</a>
            
            <?php if(auth()->check()): ?>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                   class="py-2 px-3 text-red-600 hover:bg-red-50 rounded transition-colors">
                   <i class="fas fa-sign-out-alt mr-2"></i> Keluar
                </a>
            <?php endif; ?>
        </div>
    </div>
</header>

<!-- Hero Section -->
<section class="bg-[linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)),url('/images/foto7.JPG')] bg-cover bg-center text-white pt-24 md:pt-16 pb-16 md:pb-32">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <h1 class="text-3xl md:text-5xl font-bold mb-4 md:mb-6 hero-title">Tentang PT Teknik Semesta</h1>
        <p class="text-lg md:text-2xl max-w-3xl mx-auto leading-relaxed hero-subtitle">
            Spesialis Infrastruktur Telekomunikasi untuk Indonesia yang Terhubung
        </p>
    </div>
</section>

<!-- Main Content -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 mt-8">
    <!-- Mobile Sidebar Menu (only shown on mobile) -->
    <div class="md:hidden mb-6 bg-white shadow rounded-lg overflow-hidden">
        <div class="p-4 border-b">
            <h2 class="font-bold text-gray-800">Menu Tentang Kami</h2>
        </div>
        <div class="divide-y">
            <a href="#tentang" class="block px-4 py-3 hover:bg-blue-50 transition-colors flex items-center">
                <i class="fas fa-info-circle mr-3 text-blue-500 w-5"></i> Tentang Kami
            </a>
            <a href="#visi-misi" class="block px-4 py-3 hover:bg-blue-50 transition-colors flex items-center">
                <i class="fas fa-bullseye mr-3 text-blue-500 w-5"></i> Visi & Misi
            </a>
            <a href="#budaya" class="block px-4 py-3 hover:bg-blue-50 transition-colors flex items-center">
                <i class="fas fa-heart mr-3 text-blue-500 w-5"></i> Budaya Perusahaan
            </a>
            <a href="#prestasi" class="block px-4 py-3 hover:bg-blue-50 transition-colors flex items-center">
                <i class="fas fa-trophy mr-3 text-blue-500 w-5"></i> Prestasi
            </a>
            <a href="#galeri" class="block px-4 py-3 hover:bg-blue-50 transition-colors flex items-center">
                <i class="fas fa-images mr-3 text-blue-500 w-5"></i> Galeri
            </a>
            <a href="#kontak" class="block px-4 py-3 hover:bg-blue-50 transition-colors flex items-center">
                <i class="fas fa-envelope mr-3 text-blue-500 w-5"></i> Kontak
            </a>
        </div>
    </div>

    <!-- Desktop Layout -->
    <div class="md:flex md:space-x-6">
        <!-- Desktop Sidebar (hidden on mobile) -->
        <aside class="hidden md:block md:w-1/4 bg-white shadow-lg rounded-lg p-6 mb-6 md:mb-0 sticky top-28 h-fit">
            <h2 class="text-xl font-bold mb-6 text-gray-800 border-b pb-2">Menu Tentang Kami</h2>
            <ul class="space-y-3">
                <li><a href="#tentang" class="hover:text-blue-600 block text-gray-700 py-2 px-3 rounded hover:bg-blue-50 transition-all duration-300 flex items-center">
                    <i class="fas fa-info-circle mr-2 text-blue-500"></i> Tentang Kami
                </a></li>
                <li><a href="#visi-misi" class="hover:text-blue-600 block text-gray-700 py-2 px-3 rounded hover:bg-blue-50 transition-all duration-300 flex items-center">
                    <i class="fas fa-bullseye mr-2 text-blue-500"></i> Visi & Misi
                </a></li>
                <li><a href="#budaya" class="hover:text-blue-600 block text-gray-700 py-2 px-3 rounded hover:bg-blue-50 transition-all duration-300 flex items-center">
                    <i class="fas fa-heart mr-2 text-blue-500"></i> Budaya Perusahaan
                </a></li>
                <li><a href="#prestasi" class="hover:text-blue-600 block text-gray-700 py-2 px-3 rounded hover:bg-blue-50 transition-all duration-300 flex items-center">
                    <i class="fas fa-trophy mr-2 text-blue-500"></i> Prestasi
                </a></li>
                <li><a href="#galeri" class="hover:text-blue-600 block text-gray-700 py-2 px-3 rounded hover:bg-blue-50 transition-all duration-300 flex items-center">
                    <i class="fas fa-images mr-2 text-blue-500"></i> Galeri
                </a></li>
                <li><a href="#kontak" class="hover:text-blue-600 block text-gray-700 py-2 px-3 rounded hover:bg-blue-50 transition-all duration-300 flex items-center">
                    <i class="fas fa-envelope mr-2 text-blue-500"></i> Kontak
                </a></li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="md:w-3/4">
            <!-- Tentang Kami Section -->
            <section id="tentang" class="py-8 md:py-12 bg-white rounded-lg shadow-sm p-6 md:p-8 mb-6 md:mb-8">
                <h2 class="text-2xl md:text-3xl font-bold mb-4 md:mb-6 text-gray-800 border-b pb-2">Tentang Kami</h2>
                <div class="flex flex-col md:flex-row gap-6 md:gap-8">
                    <div class="md:w-2/3">
                        <p class="text-gray-700 leading-relaxed mb-4 md:mb-6">
                            <span class="font-semibold text-blue-600">PT Teknik Semesta</span> adalah perusahaan spesialis infrastruktur telekomunikasi yang berkomitmen untuk membangun jaringan konektivitas terbaik di seluruh Indonesia.
                        </p>
                        <p class="text-gray-700 leading-relaxed mb-4 md:mb-6">
                            Didirikan pada tahun 2010, kami telah tumbuh menjadi mitra terpercaya dalam pembangunan infrastruktur telekomunikasi dengan lebih dari 500 proyek terselesaikan.
                        </p>
                        <div class="grid grid-cols-2 gap-3 md:gap-4 mb-4 md:mb-6">
                            <div class="bg-blue-50 p-3 md:p-4 rounded-lg">
                                <h3 class="font-bold text-blue-600 text-sm md:text-base mb-1 md:mb-2">Proyek Terselesaikan</h3>
                                <p class="text-2xl md:text-3xl font-bold text-gray-800">500+</p>
                                <p class="text-xs md:text-sm text-gray-600">Seluruh Indonesia</p>
                            </div>
                            <div class="bg-blue-50 p-3 md:p-4 rounded-lg">
                                <h3 class="font-bold text-blue-600 text-sm md:text-base mb-1 md:mb-2">Tahun Berdiri</h3>
                                <p class="text-2xl md:text-3xl font-bold text-gray-800">2010</p>
                                <p class="text-xs md:text-sm text-gray-600">Lebih dari 13 tahun</p>
                            </div>
                        </div>
                    </div>
                    <div class="md:w-1/3">
                        <img src="images/foto1.JPG" alt="Kantor PT Teknik Semesta" class="rounded-lg shadow-md w-full h-auto">
                    </div>
                </div>
            </section>

            <!-- Visi & Misi Section -->
            <section id="visi-misi" class="py-8 md:py-12 bg-blue-50 rounded-lg p-6 md:p-8 mb-6 md:mb-8">
                <h2 class="text-2xl md:text-3xl font-bold mb-6 md:mb-8 text-gray-800 border-b pb-2">Visi & Misi Perusahaan</h2>
                
                <div class="grid md:grid-cols-2 gap-6 md:gap-8">
                    <!-- Visi -->
                    <div class="bg-white p-4 md:p-6 rounded-lg shadow-sm">
                        <div class="flex items-center mb-3 md:mb-4">
                            <div class="bg-blue-100 p-2 md:p-3 rounded-full mr-3 md:mr-4">
                                <i class="fas fa-eye text-blue-600 text-lg md:text-xl"></i>
                            </div>
                            <h3 class="text-xl md:text-2xl font-bold text-gray-800">Visi</h3>
                        </div>
                        <p class="text-gray-700 leading-relaxed">
                            "Menjadi penyedia solusi infrastruktur telekomunikasi terdepan di Indonesia dengan kualitas dan inovasi terbaik"
                        </p>
                    </div>
                    
                    <!-- Misi -->
                    <div class="bg-white p-4 md:p-6 rounded-lg shadow-sm">
                        <div class="flex items-center mb-3 md:mb-4">
                            <div class="bg-blue-100 p-2 md:p-3 rounded-full mr-3 md:mr-4">
                                <i class="fas fa-bullseye text-blue-600 text-lg md:text-xl"></i>
                            </div>
                            <h3 class="text-xl md:text-2xl font-bold text-gray-800">Misi</h3>
                        </div>
                        <ul class="space-y-2 md:space-y-3 text-gray-700">
                            <li class="flex items-start">
                                <i class="fas fa-check text-blue-500 mt-1 mr-2 text-sm md:text-base"></i>
                                <span>Membangun infrastruktur telekomunikasi berkualitas tinggi</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-blue-500 mt-1 mr-2 text-sm md:text-base"></i>
                                <span>Mengutamakan keselamatan kerja dan ramah lingkungan</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-blue-500 mt-1 mr-2 text-sm md:text-base"></i>
                                <span>Memberikan solusi terbaik untuk kebutuhan pelanggan</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-blue-500 mt-1 mr-2 text-sm md:text-base"></i>
                                <span>Berkontribusi pada pembangunan infrastruktur digital Indonesia</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>

            <!-- Budaya Perusahaan Section -->
            <section id="budaya" class="py-8 md:py-12 bg-blue-50 rounded-lg p-6 md:p-8 mb-6 md:mb-8">
                <h2 class="text-2xl md:text-3xl font-bold mb-6 md:mb-8 text-gray-800 border-b pb-2">Budaya Perusahaan</h2>
                <p class="text-gray-700 leading-relaxed mb-6 max-w-3xl">
                    Budaya perusahaan kami menjadi fondasi dalam setiap tindakan dan keputusan untuk memberikan yang terbaik bagi klien dan mitra kerja.
                </p>
                
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">
                    <!-- Profesional -->
                    <div class="bg-white p-4 md:p-6 rounded-lg shadow-sm">
                        <div class="flex items-center mb-3">
                            <div class="bg-blue-100 p-2 md:p-3 rounded-full mr-3">
                                <i class="fas fa-user-tie text-blue-600 text-lg md:text-xl"></i>
                            </div>
                            <h3 class="text-lg md:text-xl font-bold text-gray-800">Profesional</h3>
                        </div>
                        <p class="text-gray-700 text-sm md:text-base">
                            Selalu bekerja dengan standar profesional tinggi dan etika kerja yang baik.
                        </p>
                    </div>
                    
                    <!-- Inovatif -->
                    <div class="bg-white p-4 md:p-6 rounded-lg shadow-sm">
                        <div class="flex items-center mb-3">
                            <div class="bg-blue-100 p-2 md:p-3 rounded-full mr-3">
                                <i class="fas fa-lightbulb text-blue-600 text-lg md:text-xl"></i>
                            </div>
                            <h3 class="text-lg md:text-xl font-bold text-gray-800">Inovatif</h3>
                        </div>
                        <p class="text-gray-700 text-sm md:text-base">
                            Terus mencari solusi kreatif untuk tantangan teknis di lapangan.
                        </p>
                    </div>
                    
                    <!-- Kolaboratif -->
                    <div class="bg-white p-4 md:p-6 rounded-lg shadow-sm">
                        <div class="flex items-center mb-3">
                            <div class="bg-blue-100 p-2 md:p-3 rounded-full mr-3">
                                <i class="fas fa-people-arrows text-blue-600 text-lg md:text-xl"></i>
                            </div>
                            <h3 class="text-lg md:text-xl font-bold text-gray-800">Kolaboratif</h3>
                        </div>
                        <p class="text-gray-700 text-sm md:text-base">
                            Bekerja sama sebagai tim untuk mencapai hasil terbaik.
                        </p>
                    </div>
                    
                    <!-- Berintegritas -->
                    <div class="bg-white p-4 md:p-6 rounded-lg shadow-sm">
                        <div class="flex items-center mb-3">
                            <div class="bg-blue-100 p-2 md:p-3 rounded-full mr-3">
                                <i class="fas fa-shield-alt text-blue-600 text-lg md:text-xl"></i>
                            </div>
                            <h3 class="text-lg md:text-xl font-bold text-gray-800">Berintegritas</h3>
                        </div>
                        <p class="text-gray-700 text-sm md:text-base">
                            Jujur, transparan, dan bertanggung jawab dalam semua tindakan.
                        </p>
                    </div>
                    
                    <!-- Berorientasi Hasil -->
                    <div class="bg-white p-4 md:p-6 rounded-lg shadow-sm">
                        <div class="flex items-center mb-3">
                            <div class="bg-blue-100 p-2 md:p-3 rounded-full mr-3">
                                <i class="fas fa-bullseye text-blue-600 text-lg md:text-xl"></i>
                            </div>
                            <h3 class="text-lg md:text-xl font-bold text-gray-800">Berorientasi Hasil</h3>
                        </div>
                        <p class="text-gray-700 text-sm md:text-base">
                            Fokus pada penyelesaian proyek dengan kualitas terbaik tepat waktu.
                        </p>
                    </div>
                </div>
            </section>

            <!-- Prestasi Section -->
            <section id="prestasi" class="py-8 md:py-12 bg-white rounded-lg shadow-sm p-6 md:p-8 mb-6 md:mb-8">
                <h2 class="text-2xl md:text-3xl font-bold mb-6 text-gray-800 border-b pb-2">Prestasi & Penghargaan</h2>
                <p class="text-gray-700 leading-relaxed mb-6 max-w-3xl">
                    Berbagai penghargaan telah kami raih sebagai bukti komitmen kami dalam memberikan layanan infrastruktur telekomunikasi terbaik.
                </p>
                
                <div class="space-y-4 md:space-y-6">
                    <!-- Prestasi 1 -->
                    <div class="flex flex-col md:flex-row gap-4 md:gap-6 border-b pb-4 md:pb-6">
                        <div class="md:w-1/4">
                            <div class="bg-blue-50 p-3 rounded-lg h-full flex items-center justify-center">
                                <img src="images/gambar10.jpg" alt="Mitra Terbaik Telkom 2022" class="w-full h-auto">
                            </div>
                        </div>
                        <div class="md:w-3/4">
                            <h3 class="text-lg md:text-xl font-bold text-gray-800 mb-1 md:mb-2">Mitra Terbaik Telkom 2022</h3>
                            <p class="text-sm md:text-base text-gray-600 mb-2">Dianugerahkan oleh PT Telkom Indonesia</p>
                            <p class="text-gray-700 text-sm md:text-base">
                                Penghargaan sebagai mitra terbaik dalam pembangunan infrastruktur jaringan Telkom.
                            </p>
                        </div>
                    </div>
                    
                    <!-- Prestasi 2 -->
                    <div class="flex flex-col md:flex-row gap-4 md:gap-6 border-b pb-4 md:pb-6">
                        <div class="md:w-1/4">
                            <div class="bg-blue-50 p-3 rounded-lg h-full flex items-center justify-center">
                                <img src="images/gambar12.jpg" alt="Digital Partner Award 2023" class="w-full h-auto">
                            </div>
                        </div>
                        <div class="md:w-3/4">
                            <h3 class="text-lg md:text-xl font-bold text-gray-800 mb-1 md:mb-2">Digital Partner Award 2023</h3>
                            <p class="text-sm md:text-base text-gray-600 mb-2">Dianugerahkan oleh PT Telkom Indonesia</p>
                            <p class="text-gray-700 text-sm md:text-base">
                                Penghargaan untuk kontribusi luar biasa dalam transformasi digital Telkom Indonesia.
                            </p>
                        </div>
                    </div>
                    
                    <!-- Prestasi 3 -->
                    <div class="flex flex-col md:flex-row gap-4 md:gap-6">
                        <div class="md:w-1/4">
                            <div class="bg-blue-50 p-3 rounded-lg h-full flex items-center justify-center">
                                <img src="images/gambar15.jpg" alt="Infrastructure Excellence Award 2021" class="w-full h-auto">
                            </div>
                        </div>
                        <div class="md:w-3/4">
                            <h3 class="text-lg md:text-xl font-bold text-gray-800 mb-1 md:mb-2">Infrastructure Excellence Award 2021</h3>
                            <p class="text-sm md:text-base text-gray-600 mb-2">Dianugerahkan oleh PT Telkom Indonesia</p>
                            <p class="text-gray-700 text-sm md:text-base">
                                Penghargaan untuk pencapaian tertinggi dalam pembangunan infrastruktur telekomunikasi.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Galeri Section -->
            <section id="galeri" class="py-8 md:py-12 bg-white rounded-lg shadow-sm p-6 md:p-8 mb-6 md:mb-8">
                <h2 class="text-2xl md:text-3xl font-bold mb-6 text-gray-800 border-b pb-2">Galeri</h2>
                <p class="text-gray-700 leading-relaxed mb-6 max-w-3xl">
                    Dokumentasi kegiatan dan pencapaian PT Teknik Semesta dalam membangun infrastruktur telekomunikasi di seluruh Indonesia.
                </p>
                
                <div class="grid grid-cols-2 md:grid-cols-3 gap-3 md:gap-4">
                    <div class="overflow-hidden rounded-lg">
                        <img src="images/foto11.JPG" alt="Galeri 1" class="w-full h-auto">
                    </div>
                    <div class="overflow-hidden rounded-lg">
                        <img src="images/foto2.JPG" alt="Galeri 2" class="w-full h-auto">
                    </div>
                    <div class="overflow-hidden rounded-lg">
                        <img src="images/foto3.JPG" alt="Galeri 3" class="w-full h-auto">
                    </div>
                    <div class="overflow-hidden rounded-lg">
                        <img src="images/foto10.JPG" alt="Galeri 4" class="w-full h-auto">
                    </div>
                    <div class="overflow-hidden rounded-lg">
                        <img src="images/foto8.JPG" alt="Galeri 5" class="w-full h-auto">
                    </div>
                    <div class="overflow-hidden rounded-lg">
                        <img src="images/foto9.JPG" alt="Galeri 6" class="w-full h-auto">
                    </div>
                </div>
            </section>

            <!-- Kontak Section -->
            <section id="kontak" class="py-8 md:py-12 bg-blue-50 rounded-lg p-6 md:p-8 mb-6 md:mb-8">
                <h2 class="text-2xl md:text-3xl font-bold mb-6 text-gray-800 border-b pb-2">Kontak Kami</h2>
                <p class="text-gray-700 leading-relaxed mb-6 max-w-3xl">
                    Kami selalu terbuka untuk berkomunikasi dengan klien, mitra, dan calon tenaga profesional. Hubungi kami melalui saluran berikut:
                </p>
                
                <div class="flex flex-col md:grid md:grid-cols-2 gap-6 md:gap-8">
                    <!-- Info Kontak -->
                    <div class="bg-white p-4 md:p-6 rounded-lg shadow-sm">
                        <h3 class="text-lg md:text-xl font-bold mb-3 md:mb-4 text-gray-800">Informasi Kontak</h3>
                        
                        <div class="space-y-3 md:space-y-4">
                            <div class="flex items-start">
                                <div class="bg-blue-100 p-2 rounded-full mr-3">
                                    <i class="fas fa-map-marker-alt text-blue-600"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800 text-sm md:text-base">Alamat Kantor Pusat</h4>
                                    <p class="text-gray-700 text-sm md:text-base">Jl. Telekomunikasi No. 123, Jakarta Selatan 12550, Indonesia</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <div class="bg-blue-100 p-2 rounded-full mr-3">
                                    <i class="fas fa-phone-alt text-blue-600"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800 text-sm md:text-base">Telepon</h4>
                                    <p class="text-gray-700 text-sm md:text-base">+62 21 1234 5678</p>
                                    <p class="text-gray-700 text-sm md:text-base">+62 811 222 333 (Layanan 24 Jam)</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <div class="bg-blue-100 p-2 rounded-full mr-3">
                                    <i class="fas fa-envelope text-blue-600"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800 text-sm md:text-base">Email</h4>
                                    <p class="text-gray-700 text-sm md:text-base">info@tekniksemesta.co.id</p>
                                    <p class="text-gray-700 text-sm md:text-base">hrd@tekniksemesta.co.id</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Form Kontak -->
                    <div class="bg-white p-4 md:p-6 rounded-lg shadow-sm">
                        <h3 class="text-lg md:text-xl font-bold mb-3 md:mb-4 text-gray-800">Kirim Pesan</h3>
                        <form class="space-y-3 md:space-y-4">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                                <input type="text" id="name" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-sm md:text-base">
                            </div>
                            
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                <input type="email" id="email" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-sm md:text-base">
                            </div>
                            
                            <div>
                                <label for="subject" class="block text-sm font-medium text-gray-700 mb-1">Subjek</label>
                                <input type="text" id="subject" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-sm md:text-base">
                            </div>
                            
                            <div>
                                <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Pesan</label>
                                <textarea id="message" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-sm md:text-base"></textarea>
                            </div>
                            
                            <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition-colors duration-300 font-medium text-sm md:text-base">
                                Kirim Pesan
                            </button>
                        </form>
                    </div>
                </div>
            </section>
        </main>
    </div>
</div>

<!-- Footer -->
<footer class="bg-gray-900 text-white py-8 md:py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 grid md:grid-cols-4 gap-6 md:gap-8">
        <div class="md:col-span-2">
            <div class="flex items-center mb-4">
                <img src="<?php echo $logo; ?>" alt="Semesta Pusat Kreasi" class="h-10 md:h-12 mr-3">
                <span class="text-lg md:text-xl font-bold">Semesta Pusat Kreasi</span>
            </div>
            <p class="text-gray-300 text-xs md:text-sm mb-4">
                Perusahaan spesialis infrastruktur telekomunikasi yang berkomitmen untuk membangun jaringan konektivitas terbaik di seluruh Indonesia.
            </p>
            <div class="flex space-x-3 md:space-x-4">
                <a href="#" class="social-icon w-8 h-8 md:w-10 md:h-10 rounded-full bg-gray-700 flex items-center justify-center hover:bg-blue-600 transition-all">
                    <i class="fab fa-facebook-f text-sm md:text-base"></i>
                </a>
                <a href="#" class="social-icon w-8 h-8 md:w-10 md:h-10 rounded-full bg-gray-700 flex items-center justify-center hover:bg-blue-400 transition-all">
                    <i class="fab fa-twitter text-sm md:text-base"></i>
                </a>
                <a href="#" class="social-icon w-8 h-8 md:w-10 md:h-10 rounded-full bg-gray-700 flex items-center justify-center hover:bg-pink-600 transition-all">
                    <i class="fab fa-instagram text-sm md:text-base"></i>
                </a>
                <a href="#" class="social-icon w-8 h-8 md:w-10 md:h-10 rounded-full bg-gray-700 flex items-center justify-center hover:bg-blue-700 transition-all">
                    <i class="fab fa-linkedin-in text-sm md:text-base"></i>
                </a>
                <a href="#" class="social-icon w-8 h-8 md:w-10 md:h-10 rounded-full bg-gray-700 flex items-center justify-center hover:bg-red-600 transition-all">
                    <i class="fab fa-youtube text-sm md:text-base"></i>
                </a>
            </div>
        </div>
        
        <div>
            <h3 class="text-base md:text-lg font-semibold mb-3 md:mb-4">Tautan Cepat</h3>
            <ul class="space-y-2 text-gray-300 text-sm md:text-base">
                <li><a href="/" class="hover:text-white transition-colors">Beranda</a></li>
                <li><a href="/tentangkami" class="hover:text-white transition-colors">Tentang Kami</a></li>
                <li><a href="/portofolio" class="hover:text-white transition-colors">Portofolio</a></li>
                <li><a href="/hubungikami" class="hover:text-white transition-colors">Hubungi Kami</a></li>
            </ul>
        </div>
        
        <div>
            <h3 class="text-base md:text-lg font-semibold mb-3 md:mb-4">Kontak Kami</h3>
            <ul class="space-y-2 md:space-y-3 text-gray-300 text-sm md:text-base">
                <li class="flex items-start">
                    <i class="fas fa-map-marker-alt mt-1 mr-2 md:mr-3 text-blue-400 text-sm md:text-base"></i>
                    <span>Gedung Semesta, Jl. Telekomunikasi No. 123, Jakarta Selatan</span>
                </li>
                <li class="flex items-center">
                    <i class="fas fa-phone-alt mr-2 md:mr-3 text-blue-400 text-sm md:text-base"></i>
                    <span>(021) 1234-5678</span>
                </li>
                <li class="flex items-center">
                    <i class="fas fa-envelope mr-2 md:mr-3 text-blue-400 text-sm md:text-base"></i>
                    <span>info@semestapusatkreasi.co.id</span>
                </li>
            </ul>
        </div>
    </div>
    
    <div class="border-t border-gray-800 mt-8 md:mt-10 pt-4 md:pt-6 text-center text-xs md:text-sm text-gray-400">
        <p>&copy; <?php echo date('Y'); ?> Semesta Pusat Kreasi. Seluruh hak dilindungi.</p>
    </div>
</footer>

<script>
    // Mobile menu toggle
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('open');
    });
    
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Close mobile menu if open
            const mobileMenu = document.getElementById('mobile-menu');
            if (mobileMenu.classList.contains('open')) {
                mobileMenu.classList.remove('open');
            }
            
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
</script>
</body>
</html>