<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hubungi Kami | PT Semesta Pusat Kreasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-blue-700 via-purple-600 to-indigo-700 text-white font-sans min-h-screen">

<?php $logo = '/images/logosamping.png'; ?>

<!-- Navbar Hubungi Kami -->
<header class="fixed top-0 left-0 w-full bg-white shadow-lg z-50">
    <div class="max-w-7xl mx-auto px-6 py-3 flex items-center justify-between relative">
        <!-- Kiri: Logo -->
        <div class="flex-shrink-0">
            <a href="/" class="flex items-center">
                <img src="<?php echo $logo; ?>" alt="PT Semesta Pusat Kreasi" class="h-12">
            </a>
        </div>
        
        <!-- Tengah: Menu -->
        <nav class="hidden md:flex space-x-6 text-gray-800 font-medium absolute left-1/2 transform -translate-x-1/2">
            <a href="/" class="relative hover:text-blue-600 transition-colors duration-300">
                Beranda
                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 transition-all duration-300 group-hover:w-full"></span>
            </a>
            <a href="/tentangkami" class="relative hover:text-blue-600 transition-colors duration-300">
                Tentang Kami
                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 transition-all duration-300 group-hover:w-full"></span>
            </a>
            <a href="/portofolio" class="relative hover:text-blue-600 transition-colors duration-300">
                Portofolio
                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 transition-all duration-300 group-hover:w-full"></span>
            </a>
            <!-- Link aktif: Hubungi Kami -->
            <a href="/hubungikami" class="relative text-blue-600 font-semibold">
                Hubungi Kami
                <span class="absolute bottom-0 left-0 w-full h-0.5 bg-blue-600"></span>
            </a>
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
    <div class="md:hidden hidden bg-white shadow-lg" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="/" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50">Beranda</a>
            <a href="/tentangkami" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50">Tentang Kami</a>
            <a href="/portofolio" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50">Portofolio</a>
            <a href="/hubungikami" class="block px-3 py-2 rounded-md text-base font-medium text-white bg-blue-600">Hubungi Kami</a>
        </div>
    </div>
</header>

<!-- Hero Section --> 
<div class="relative pt-32 pb-20 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-blue-800/30 via-purple-900/20 to-indigo-900/30"></div>
    <div class="max-w-4xl mx-auto px-4 text-center relative z-10">
        <h1 class="text-5xl md:text-6xl font-bold mb-6 animate-fade-in-up">Hubungi Kami</h1>
        <p class="text-xl text-blue-100 max-w-2xl mx-auto mb-8">Tim kami siap membantu menjawab pertanyaan dan mendukung kebutuhan Anda.</p>
        
        <!-- Floating contact icons -->
        <div class="flex justify-center space-x-6 mt-10">
            <a href="tel:+622112345678" class="bg-white/20 p-5 rounded-full hover:bg-blue-600 transition-all duration-300 hover:scale-110 hover:rotate-6" data-tooltip-target="tooltip-telepon">
                <i class="fas fa-phone-alt text-2xl"></i>
            </a>
            <a href="mailto:info@semestapusatkreasi.com" class="bg-white/20 p-5 rounded-full hover:bg-blue-600 transition-all duration-300 hover:scale-110 hover:rotate-6" data-tooltip-target="tooltip-email">
                <i class="fas fa-envelope text-2xl"></i>
            </a>
            <a href="https://wa.me/6281234567890" class="bg-white/20 p-5 rounded-full hover:bg-blue-600 transition-all duration-300 hover:scale-110 hover:rotate-6" data-tooltip-target="tooltip-whatsapp">
                <i class="fab fa-whatsapp text-2xl"></i>
            </a>
        </div>
    </div>
    
    <!-- Floating decorative elements -->
    <div class="absolute top-20 left-10 w-16 h-16 rounded-full bg-blue-400/20 blur-xl"></div>
    <div class="absolute bottom-10 right-20 w-24 h-24 rounded-full bg-purple-400/20 blur-xl"></div>
    <div class="absolute top-1/3 right-1/4 w-12 h-12 rounded-full bg-indigo-400/30 blur-lg"></div>
</div>

<!-- Form Hubungi Kami -->
<div class="max-w-6xl mx-auto px-4 pb-16 -mt-10 relative z-20">
    <div class="bg-white rounded-xl shadow-2xl overflow-hidden transition-all duration-300 hover:shadow-3xl">
        <div class="grid md:grid-cols-2">
            <!-- Informasi Kontak -->
            <div class="bg-gradient-to-br from-blue-600 to-purple-600 p-10 text-white relative overflow-hidden">
                <div class="absolute -right-20 -top-20 w-64 h-64 rounded-full bg-white/10"></div>
                <div class="absolute -left-10 -bottom-10 w-40 h-40 rounded-full bg-white/10"></div>
                <div class="relative z-10">
                    <h2 class="text-3xl font-bold mb-8">Informasi Kontak</h2>
                    
                    <div class="space-y-8">
                        <div class="flex items-start space-x-5">
                            <div class="bg-white/20 p-4 rounded-full flex-shrink-0 hover:bg-blue-600 transition-all duration-300 hover:scale-110 hover:rotate-6">
                                <i class="fas fa-map-marker-alt text-xl"></i>
                            </div>
                            <div>
                                <h4 class="text-xl font-semibold mb-1">Alamat Kantor</h4>
                                <p class="text-blue-100">Jl. Telekomunikasi No. 123, Jakarta Selatan, Indonesia 12345</p>
                                <button class="mt-2 text-blue-200 hover:text-white flex items-center text-sm">
                                    <i class="fas fa-map-marked-alt mr-1"></i> Lihat di Peta
                                </button>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-5">
                            <div class="bg-white/20 p-4 rounded-full flex-shrink-0 hover:bg-blue-600 transition-all duration-300 hover:scale-110 hover:rotate-6">
                                <i class="fas fa-envelope text-xl"></i>
                            </div>
                            <div>
                                <h4 class="text-xl font-semibold mb-1">Email</h4>
                                <p class="text-blue-100">info@semestapusatkreasi.com</p>
                                <p class="text-blue-100">support@semestapusatkreasi.com</p>
                                <button class="mt-2 text-blue-200 hover:text-white flex items-center text-sm">
                                    <i class="fas fa-paper-plane mr-1"></i> Kirim Email
                                </button>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-5">
                            <div class="bg-white/20 p-4 rounded-full flex-shrink-0 hover:bg-blue-600 transition-all duration-300 hover:scale-110 hover:rotate-6">
                                <i class="fas fa-phone-alt text-xl"></i>
                            </div>
                            <div>
                                <h4 class="text-xl font-semibold mb-1">Telepon</h4>
                                <p class="text-blue-100">+62 21 1234 5678 (Office)</p>
                                <p class="text-blue-100">+62 812 3456 7890 (WhatsApp)</p>
                                <button class="mt-2 text-blue-200 hover:text-white flex items-center text-sm">
                                    <i class="fas fa-phone-volume mr-1"></i> Hubungi Sekarang
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-12">
                        <h4 class="text-xl font-semibold mb-4">Ikuti Kami</h4>
                        <div class="flex space-x-4">
                            <a href="#" class="bg-white/20 p-3 rounded-full hover:bg-blue-500 transition-all duration-300 hover:scale-110" data-tooltip-target="tooltip-facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="bg-white/20 p-3 rounded-full hover:bg-sky-400 transition-all duration-300 hover:scale-110" data-tooltip-target="tooltip-twitter">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="bg-white/20 p-3 rounded-full hover:bg-blue-700 transition-all duration-300 hover:scale-110" data-tooltip-target="tooltip-linkedin">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="#" class="bg-white/20 p-3 rounded-full hover:bg-pink-600 transition-all duration-300 hover:scale-110" data-tooltip-target="tooltip-instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" class="bg-white/20 p-3 rounded-full hover:bg-red-600 transition-all duration-300 hover:scale-110" data-tooltip-target="tooltip-youtube">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Form Kontak -->
            <div class="p-10 bg-white">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Kirim Pesan</h2>
                <p class="text-gray-600 mb-8">Isi formulir di bawah ini dan kami akan segera merespons</p>
                
                <form method="POST" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                            <input type="text" name="name" required 
                                   class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300">
                        </div>
                        
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Alamat Email <span class="text-red-500">*</span></label>
                            <input type="email" name="email" required 
                                   class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300">
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Nomor Telepon</label>
                        <input type="tel" name="phone" 
                               class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300">
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Subjek</label>
                        <select name="subject" class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300">
                            <option value="">Pilih subjek...</option>
                            <option value="general">Pertanyaan Umum</option>
                            <option value="project">Penawaran Proyek</option>
                            <option value="support">Dukungan Teknis</option>
                            <option value="partnership">Kemitraan</option>
                            <option value="career">Karir</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Pesan Anda <span class="text-red-500">*</span></label>
                        <textarea name="message" rows="5" required 
                                  class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300"></textarea>
                    </div>
                    
                    <div class="flex items-center">
                        <input type="checkbox" id="consent" name="consent" required class="w-4 h-4 text-blue-600 rounded focus:ring-blue-500">
                        <label for="consent" class="ml-2 text-sm text-gray-600">Saya setuju dengan <a href="#" class="text-blue-600 hover:underline">kebijakan privasi</a> dan <a href="#" class="text-blue-600 hover:underline">persyaratan layanan</a></label>
                    </div>
                    
                    <button type="submit" 
                            class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white py-4 px-6 rounded-lg font-semibold hover:shadow-lg transition-all duration-300 hover:-translate-y-1 flex items-center justify-center">
                        <i class="fas fa-paper-plane mr-2"></i> Kirim Pesan
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- FAQ Section -->
<div class="max-w-4xl mx-auto px-6 py-16">
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-white mb-4">Pertanyaan Umum</h2>
        <p class="text-xl text-blue-100 max-w-2xl mx-auto">Temukan jawaban untuk pertanyaan yang sering diajukan.</p>
    </div>
    
    <div class="space-y-4">
        <div class="bg-white/10 backdrop-blur-sm rounded-lg overflow-hidden">
            <button class="w-full flex justify-between items-center p-6 text-left focus:outline-none faq-button">
                <span class="text-lg font-medium text-white">Bagaimana cara menghubungi tim dukungan?</span>
                <i class="fas fa-chevron-down text-blue-200 transition-transform duration-300"></i>
            </button>
            <div class="px-6 pb-6 text-blue-100 hidden faq-content">
                <p>Anda dapat menghubungi tim dukungan kami melalui telepon di +62 21 1234 5678, email ke support@semestapusatkreasi.com, atau melalui formulir kontak di halaman ini. Tim kami tersedia Senin-Jumat pukul 08.00-17.00 WIB.</p>
            </div>
        </div>
        
        <div class="bg-white/10 backdrop-blur-sm rounded-lg overflow-hidden">
            <button class="w-full flex justify-between items-center p-6 text-left focus:outline-none faq-button">
                <span class="text-lg font-medium text-white">Berapa lama waktu respons untuk permintaan penawaran?</span>
                <i class="fas fa-chevron-down text-blue-200 transition-transform duration-300"></i>
            </button>
            <div class="px-6 pb-6 text-blue-100 hidden faq-content">
                <p>Kami biasanya merespons permintaan penawaran dalam waktu 1-2 hari kerja. Untuk proyek yang lebih kompleks, mungkin diperlukan waktu hingga 3-5 hari kerja untuk memberikan penawaran yang komprehensif.</p>
            </div>
        </div>
        
        <div class="bg-white/10 backdrop-blur-sm rounded-lg overflow-hidden">
            <button class="w-full flex justify-between items-center p-6 text-left focus:outline-none faq-button">
                <span class="text-lg font-medium text-white">Apakah tersedia dukungan darurat setelah jam kerja?</span>
                <i class="fas fa-chevron-down text-blue-200 transition-transform duration-300"></i>
            </button>
            <div class="px-6 pb-6 text-blue-100 hidden faq-content">
                <p>Ya, untuk klien prioritas kami menyediakan layanan dukungan darurat 24/7 melalui nomor khusus +62 812 3456 7890 (WhatsApp). Mohon informasikan kebutuhan dukungan darurat Anda untuk mendapatkan akses ke layanan ini.</p>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="bg-gray-900 text-white py-12">
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-4 gap-8">
        <div class="md:col-span-2">
            <div class="flex items-center mb-4">
                <img src="<?php echo $logo; ?>" alt="Semesta Pusat Kreasi" class="h-12 mr-3 bg-transparent">
                <span class="text-xl font-bold">Semesta Pusat Kreasi</span>
            </div>
            <p class="text-gray-300 text-sm mb-4">
                Perusahaan spesialis infrastruktur telekomunikasi yang berkomitmen untuk membangun jaringan konektivitas terbaik di seluruh Indonesia.
            </p>
            <div class="flex space-x-4">
                <a href="#" class="w-10 h-10 rounded-full bg-gray-700 flex items-center justify-center hover:bg-blue-600 transition-all duration-300 hover:-translate-y-1">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="w-10 h-10 rounded-full bg-gray-700 flex items-center justify-center hover:bg-blue-400 transition-all duration-300 hover:-translate-y-1">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="w-10 h-10 rounded-full bg-gray-700 flex items-center justify-center hover:bg-pink-600 transition-all duration-300 hover:-translate-y-1">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#" class="w-10 h-10 rounded-full bg-gray-700 flex items-center justify-center hover:bg-blue-700 transition-all duration-300 hover:-translate-y-1">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                <a href="#" class="w-10 h-10 rounded-full bg-gray-700 flex items-center justify-center hover:bg-red-600 transition-all duration-300 hover:-translate-y-1">
                    <i class="fab fa-youtube"></i>
                </a>
            </div>
        </div>
        
        <div>
            <h3 class="text-lg font-semibold mb-4">Tautan Cepat</h3>
            <ul class="space-y-2 text-gray-300">
                <li><a href="/" class="hover:text-white transition-colors duration-300">Beranda</a></li>
                <li><a href="/tentangkami" class="hover:text-white transition-colors duration-300">Tentang Kami</a></li>
                <li><a href="/portofolio" class="hover:text-white transition-colors duration-300">Portofolio</a></li>
                <li><a href="/hubungikami" class="hover:text-white transition-colors duration-300">Hubungi Kami</a></li>
            </ul>
        </div>
        
        <div>
            <h3 class="text-lg font-semibold mb-4">Kontak Kami</h3>
            <ul class="space-y-3 text-gray-300">
                <li class="flex items-start">
                    <i class="fas fa-map-marker-alt mt-1 mr-3 text-blue-400"></i>
                    <span>Gedung Semesta, Jl. Telekomunikasi No. 123, Jakarta Selatan</span>
                </li>
                <li class="flex items-center">
                    <i class="fas fa-phone-alt mr-3 text-blue-400"></i>
                    <span>(021) 1234-5678</span>
                </li>
                <li class="flex items-center">
                    <i class="fas fa-envelope mr-3 text-blue-400"></i>
                    <span>info@semestapusatkreasi.co.id</span>
                </li>
                <li class="flex items-center">
                    <i class="fab fa-whatsapp mr-3 text-blue-400"></i>
                    <span>+62 856 4306 0946</span>
                </li>
            </ul>
        </div>
    </div>
    
    <div class="border-t border-gray-800 mt-10 pt-6 text-center text-sm text-gray-400">
        <p>&copy; <?php echo date('Y'); ?> Semesta Pusat Kreasi. Seluruh hak dilindungi.</p>
    </div>
</footer>

<!-- Floating Contact Button -->
<div class="fixed bottom-8 right-8 z-50">
    <div class="relative group">
        <button class="w-16 h-16 rounded-full bg-green-500 text-white shadow-lg flex items-center justify-center hover:bg-green-600 transition-all duration-300">
            <i class="fab fa-whatsapp text-2xl"></i>
        </button>
        <div class="absolute bottom-full right-0 mb-4 w-64 bg-white rounded-lg shadow-lg p-4 hidden group-hover:block transition-all duration-300">
            <p class="text-gray-800 text-sm mb-2">Butuh bantuan cepat? Chat via WhatsApp:</p>
            <a href="https://wa.me/6285643060946" class="block bg-green-500 text-white py-2 px-4 rounded text-center hover:bg-green-600 transition-colors duration-300">Chat Sekarang</a>
        
        
        
        
        
        
        
        </div> 
    </div>
</div>

<script>
    // Mobile menu toggle
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    });
    
    // FAQ accordion
    document.querySelectorAll('.faq-button').forEach(button => {
        button.addEventListener('click', () => {
            const answer = button.nextElementSibling;
            const icon = button.querySelector('i');
            
            answer.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');
        });
    });
    
    // Tooltip functionality
    const tooltips = document.querySelectorAll('[data-tooltip-target]');
    tooltips.forEach(tooltip => {
        const tooltipText = tooltip.getAttribute('data-tooltip-target').replace('tooltip-', '');
        const tooltipEl = document.createElement('div');
        
        tooltipEl.id = `tooltip-${tooltipText}`;
        tooltipEl.className = 'absolute invisible opacity-0 bg-gray-900 text-white text-xs py-1 px-2 rounded whitespace-nowrap z-50 transition-opacity duration-300';
        tooltipEl.textContent = tooltipText.charAt(0).toUpperCase() + tooltipText.slice(1);
        
        tooltip.appendChild(tooltipEl);
        
        tooltip.addEventListener('mouseenter', () => {
            tooltipEl.classList.remove('invisible', 'opacity-0');
            tooltipEl.classList.add('visible', 'opacity-100');
        });
        
        tooltip.addEventListener('mouseleave', () => {
            tooltipEl.classList.add('invisible', 'opacity-0');
            tooltipEl.classList.remove('visible', 'opacity-100');
        });
    });
</script>

<!-- Tailwind Config for Animation -->
<script>
    tailwind.config = {
        theme: {
            extend: {
                animation: {
                    'fade-in-up': 'fadeInUp 1.5s ease-out forwards',
                    'floating': 'floating 6s ease-in-out infinite',
                    'pulse': 'pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite'
                },
                keyframes: {
                    fadeInUp: {
                        '0%': { opacity: '0', transform: 'translateY(30px)' },
                        '100%': { opacity: '1', transform: 'translateY(0)' }
                    },
                    floating: {
                        '0%, 100%': { transform: 'translateY(0px)' },
                        '50%': { transform: 'translateY(-15px)' }
                    },
                    pulse: {
                        '0%, 100%': { opacity: '1' },
                        '50%': { opacity: '0.8' }
                    }
                }
            }
        }
    }
</script>
</body>
</html>