<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semesta Pusat Kreasi - Solusi Telekomunikasi Terdepan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Update Font Awesome ke versi terbaru -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fadeInUp {
            animation: fadeInUp 1s ease-out forwards;
        }
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        .service-card:hover .service-icon {
            transform: rotateY(180deg);
        }
        .client-logo {
            transition: all 0.3s ease;
            max-height: 80px;
            width: auto;
        }
        .client-logo:hover {
            transform: scale(1.1);
            filter: brightness(0) saturate(100%) invert(27%) sepia(51%) saturate(2878%) hue-rotate(226deg) brightness(104%) contrast(97%);
        }
        .social-icon {
            transition: all 0.3s ease;
        }
        .social-icon:hover {
            transform: translateY(-3px);
        }
        /* Mobile menu styles */
        .mobile-menu {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }
        .mobile-menu.open {
            max-height: 500px;
        }
    </style>
</head>
<body class="font-sans">
<?php $logo = 'images/logosamping.png'; ?>

<!-- Navbar Responsive -->
<header class="fixed top-0 left-0 w-full bg-white shadow-lg z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-3 flex items-center justify-between relative">
        <!-- Bagian Kiri: Logo -->
        <div class="flex items-center">
            <a href="/" class="flex items-center">
                <img src="<?php echo $logo; ?>" alt="Semesta Pusat Kreasi" class="h-10 md:h-12">
            </a>
        </div>
        
        <!-- Menu Desktop -->
        <nav class="hidden md:flex space-x-6 text-gray-800 font-medium absolute left-1/2 transform -translate-x-1/2">
            <a href="/" class="pb-1 border-b-2 border-transparent hover:text-blue-600 transition-colors duration-300">Beranda</a>
            <a href="/tentangkami" class="pb-1 border-b-2 border-transparent hover:text-blue-600 transition-colors duration-300">Tentang Kami</a>
            <div class="relative">
                <?php if(auth()->check()): ?>
                    <button class="dropdown-button pb-1 border-b-2 border-transparent hover:text-blue-600 focus:outline-none transition-colors duration-300">
                        Portofolio ▾
                    </button>
                    <div class="dropdown-menu absolute left-0 mt-2 w-48 bg-white shadow-lg rounded-lg hidden">
                        <a href="/project" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition-colors duration-300">
                            Project Perusahaan
                        </a>
                        <a href="/layanan" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition-colors duration-300">
                            Layanan Perusahaan
                        </a>
                    </div>
                <?php else: ?>
                    <a href="/portofolio" class="pb-1 border-b-2 border-transparent hover:text-blue-600 transition-colors duration-300">Portofolio</a>
                <?php endif; ?>
            </div>
            <a href="/hubungikami" class="pb-1 border-b-2 border-transparent hover:text-blue-600 transition-colors duration-300">Hubungi Kami</a>
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
    <div id="mobile-menu" class="mobile-menu md:hidden bg-white w-full px-4">
        <div class="flex flex-col space-y-3 py-4 border-t">
            <a href="/" class="py-2 text-gray-700 hover:text-blue-600 transition-colors">Beranda</a>
            <a href="/tentangkami" class="py-2 text-gray-700 hover:text-blue-600 transition-colors">Tentang Kami</a>
            
            <?php if(auth()->check()): ?>
                <div class="flex flex-col">
                    <button id="mobile-dropdown-button" class="py-2 text-left text-gray-700 hover:text-blue-600 transition-colors flex justify-between items-center">
                        Portofolio <i class="fas fa-chevron-down ml-2 text-sm"></i>
                    </button>
                    <div id="mobile-dropdown-menu" class="hidden pl-4">
                        <a href="/project" class="block py-2 text-gray-700 hover:text-blue-600 transition-colors">Project Perusahaan</a>
                        <a href="/layanan" class="block py-2 text-gray-700 hover:text-blue-600 transition-colors">Layanan Perusahaan</a>
                    </div>
                </div>
            <?php else: ?>
                <a href="/portofolio" class="py-2 text-gray-700 hover:text-blue-600 transition-colors">Portofolio</a>
            <?php endif; ?>
            
            <a href="/hubungikami" class="py-2 text-gray-700 hover:text-blue-600 transition-colors">Hubungi Kami</a>
            
            <?php if(auth()->check()): ?>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                   class="py-2 text-red-600 font-semibold hover:text-red-700 transition-colors">
                    Logout
                </a>
            <?php endif; ?>
        </div>
    </div>
</header>

<script>
    // Toggle mobile menu
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        
        mobileMenuButton.addEventListener('click', function() {
            mobileMenu.classList.toggle('open');
        });
        
        // Mobile dropdown menu
        const mobileDropdownButton = document.getElementById('mobile-dropdown-button');
        if (mobileDropdownButton) {
            mobileDropdownButton.addEventListener('click', function() {
                const dropdownMenu = document.getElementById('mobile-dropdown-menu');
                dropdownMenu.classList.toggle('hidden');
                this.querySelector('i').classList.toggle('fa-chevron-down');
                this.querySelector('i').classList.toggle('fa-chevron-up');
            });
        }
        
        // Desktop dropdown menu
        const desktopDropdownButton = document.querySelector('.dropdown-button');
        if (desktopDropdownButton) {
            desktopDropdownButton.addEventListener('click', function(e) {
                e.stopPropagation();
                const dropdownMenu = this.nextElementSibling;
                dropdownMenu.classList.toggle('hidden');
            });
            
            // Hide dropdown when clicking outside
            document.addEventListener('click', function(e) {
                const dropdownMenu = document.querySelector('.dropdown-menu');
                if (dropdownMenu && !dropdownMenu.contains(e.target) && !desktopDropdownButton.contains(e.target)) {
                    dropdownMenu.classList.add('hidden');
                }
            });
        }
        
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
                // Close mobile menu if open
                mobileMenu.classList.remove('open');
            });
        });
    });
</script>

<!-- Hero Section -->
<section class="relative w-full min-h-screen flex items-center justify-center bg-gradient-to-r from-blue-700 to-purple-700 text-white pt-16 md:pt-20">
    <div class="absolute inset-0 bg-black bg-opacity-40"></div>
    <div class="max-w-6xl mx-auto px-6 text-center relative z-10 animate-fadeInUp">
        <h1 class="text-3xl md:text-6xl font-bold mb-6">Membangun Jaringan, Menghubungkan Indonesia</h1>
        <p class="text-lg md:text-2xl mb-8 max-w-3xl mx-auto leading-relaxed">
            Sebagai pelopor infrastruktur telekomunikasi, kami berkomitmen memberikan solusi terbaik untuk konektivitas masa depan.
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="/hubungikami" class="bg-white text-blue-600 px-6 py-3 md:px-8 md:py-3 rounded-lg font-bold shadow-lg hover:bg-blue-50 hover:shadow-xl transition-all">
                <i class="fas fa-phone-alt mr-2"></i> Hubungi Kami
            </a>
            <a href="/portofolio" class="bg-transparent border-2 border-white text-white px-6 py-3 md:px-8 md:py-3 rounded-lg font-bold hover:bg-white hover:text-blue-600 transition-all">
                <i class="fas fa-briefcase mr-2"></i> Lihat Portofolio
            </a>
        </div>
    </div>
    
    <div class="absolute bottom-10 left-0 right-0 flex justify-center">
        <a href="#about" class="text-white animate-bounce">
            <i class="fas fa-chevron-down text-2xl"></i>
        </a>
    </div>
</section>

<!-- About Section -->
<section id="about" class="py-12 md:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="flex flex-col lg:flex-row items-center gap-8 md:gap-12">
            <div class="lg:w-1/2">
            <img src="images/gambar13.jpg" alt="Digital Partner Award 2023" class="w-full h-auto">
            </div>
            <div class="lg:w-1/2 mt-6 md:mt-0">
                <h2 class="text-2xl md:text-4xl font-bold text-gray-800 mb-4 md:mb-6">Tentang Semesta Pusat Kreasi</h2>
                <p class="text-gray-600 mb-4 md:mb-6 leading-relaxed">
                    Sejak berdiri pada tahun 2010, Semesta Pusat Kreasi telah menjadi mitra terpercaya dalam pembangunan infrastruktur telekomunikasi di seluruh Indonesia. Dengan tim ahli yang berpengalaman, kami telah menyelesaikan lebih dari 500 proyek strategis nasional.
                </p>
                <div class="grid grid-cols-2 gap-3 md:gap-4 mb-6 md:mb-8">
                    <div class="bg-blue-50 p-3 md:p-4 rounded-lg">
                        <h3 class="text-blue-600 font-bold text-lg md:text-xl mb-1 md:mb-2">500+</h3>
                        <p class="text-gray-600 text-sm md:text-base">Proyek Terselesaikan</p>
                    </div>
                    <div class="bg-blue-50 p-3 md:p-4 rounded-lg">
                        <h3 class="text-blue-600 font-bold text-lg md:text-xl mb-1 md:mb-2">25+</h3>
                        <p class="text-gray-600 text-sm md:text-base">Kota Terjangkau</p>
                    </div>
                    <div class="bg-blue-50 p-3 md:p-4 rounded-lg">
                        <h3 class="text-blue-600 font-bold text-lg md:text-xl mb-1 md:mb-2">150+</h3>
                        <p class="text-gray-600 text-sm md:text-base">Tim Profesional</p>
                    </div>
                    <div class="bg-blue-50 p-3 md:p-4 rounded-lg">
                        <h3 class="text-blue-600 font-bold text-lg md:text-xl mb-1 md:mb-2">10+</h3>
                        <p class="text-gray-600 text-sm md:text-base">Tahun Pengalaman</p>
                    </div>
                </div>
                <a href="/tentangkami" class="inline-block bg-blue-600 text-white px-5 py-2 md:px-6 md:py-2 rounded-md hover:bg-blue-700 transition-colors">
                    Pelajari Lebih Lanjut
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Client Showcase -->
<section class="py-12 md:py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-8 md:mb-12">
            <h2 class="text-2xl md:text-4xl font-bold text-gray-800 mb-3 md:mb-4">Klien yang Mempercayai Kami</h2>
            <p class="text-gray-600 max-w-2xl mx-auto text-sm md:text-base">Bekerja sama dengan berbagai perusahaan ternama di Indonesia</p>
        </div>
        
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4 md:gap-8 items-center">
            <!-- Logo 1 -->
            <div class="flex justify-center p-2">
                <img src="images/telkom.png" alt="Telkom Indonesia" class="client-logo h-12 md:h-16">
            </div>
            
            <!-- Logo 2 -->
            <div class="flex justify-center p-2">
                <img src="images/xl.png" alt="XL Axiata" class="client-logo h-12 md:h-16">
            </div>
            
            <!-- Logo 3 -->
            <div class="flex justify-center p-2">
                <img src="images/indosat.png" alt="Indosat Ooredoo" class="client-logo h-12 md:h-16">
            </div>
            
            <!-- Logo 4 -->
            <div class="flex justify-center p-2">
                <img src="images/huawei.png" alt="Huawei" class="client-logo h-12 md:h-16">
            </div>
            
            <!-- Logo 5 -->
            <div class="flex justify-center p-2">
                <img src="images/zte.png" alt="ZTE Corporation" class="client-logo h-12 md:h-16">
            </div>
        </div>
    </div>
</section>

<!-- Technology Section -->
<section class="py-12 md:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-12 md:mb-16">
            <h2 class="text-2xl md:text-4xl font-bold text-gray-800 mb-3 md:mb-4">Teknologi yang Kami Gunakan</h2>
            <p class="text-gray-600 max-w-2xl mx-auto text-sm md:text-base">Mengadopsi teknologi terkini untuk solusi terbaik</p>
        </div>
        
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4 md:gap-6">
            <div class="bg-gray-50 p-4 md:p-6 rounded-xl flex flex-col items-center">
                <div class="w-12 h-12 md:w-16 md:h-16 bg-blue-100 rounded-full flex items-center justify-center mb-3 md:mb-4">
                    <i class="fas fa-satellite text-xl md:text-2xl text-blue-600"></i>
                </div>
                <h3 class="text-sm md:text-lg font-semibold text-gray-800 text-center">5G Technology</h3>
            </div>
            <div class="bg-gray-50 p-4 md:p-6 rounded-xl flex flex-col items-center">
                <div class="w-12 h-12 md:w-16 md:h-16 bg-blue-100 rounded-full flex items-center justify-center mb-3 md:mb-4">
                    <i class="fas fa-broadcast-tower text-xl md:text-2xl text-blue-600"></i>
                </div>
                <h3 class="text-sm md:text-lg font-semibold text-gray-800 text-center">Microwave</h3>
            </div>
            <div class="bg-gray-50 p-4 md:p-6 rounded-xl flex flex-col items-center">
                <div class="w-12 h-12 md:w-16 md:h-16 bg-blue-100 rounded-full flex items-center justify-center mb-3 md:mb-4">
                    <i class="fas fa-network-wired text-xl md:text-2xl text-blue-600"></i>
                </div>
                <h3 class="text-sm md:text-lg font-semibold text-gray-800 text-center">Fiber Optic</h3>
            </div>
            <div class="bg-gray-50 p-4 md:p-6 rounded-xl flex flex-col items-center">
                <div class="w-12 h-12 md:w-16 md:h-16 bg-blue-100 rounded-full flex items-center justify-center mb-3 md:mb-4">
                    <i class="fas fa-cloud text-xl md:text-2xl text-blue-600"></i>
                </div>
                <h3 class="text-sm md:text-lg font-semibold text-gray-800 text-center">Cloud Computing</h3>
            </div>
            <div class="bg-gray-50 p-4 md:p-6 rounded-xl flex flex-col items-center">
                <div class="w-12 h-12 md:w-16 md:h-16 bg-blue-100 rounded-full flex items-center justify-center mb-3 md:mb-4">
                    <i class="fas fa-shield-alt text-xl md:text-2xl text-blue-600"></i>
                </div>
                <h3 class="text-sm md:text-lg font-semibold text-gray-800 text-center">Cyber Security</h3>
            </div>
            <div class="bg-gray-50 p-4 md:p-6 rounded-xl flex flex-col items-center">
                <div class="w-12 h-12 md:w-16 md:h-16 bg-blue-100 rounded-full flex items-center justify-center mb-3 md:mb-4">
                    <i class="fas fa-wifi text-xl md:text-2xl text-blue-600"></i>
                </div>
                <h3 class="text-sm md:text-lg font-semibold text-gray-800 text-center">WiFi 6</h3>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-gray-900 text-white py-8 md:py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 grid md:grid-cols-4 gap-8">
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
</body>
</html>