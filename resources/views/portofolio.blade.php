<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>PT Semesta Pusat Kreasi - Portofolio</title>
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
                padding-bottom: 60px;
            }
            .hero-title {
                font-size: 2rem;
            }
            .hero-subtitle {
                font-size: 1.1rem;
            }
        }
        
        /* Project card adjustments */
        .project-card {
            transition: all 0.3s ease;
        }
        .project-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body class="font-sans bg-gray-50">
<?php $logo = asset('images/logosamping.png'); ?>

<!-- Navbar Responsive -->
<header class="fixed top-0 left-0 w-full bg-white shadow-lg z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-3 flex items-center justify-between">
        <!-- Logo -->
        <div class="flex items-center">
            <a href="/" class="flex items-center">
                <img src="<?php echo $logo; ?>" alt="Semesta Pusat Kreasi" class="h-10 md:h-12">
            </a>
        </div>
        
        <!-- Desktop Menu -->
        <nav class="hidden md:flex space-x-6 text-gray-800 font-medium">
            <a href="/" class="hover:text-blue-600 transition-colors duration-300">Beranda</a>
            <a href="/tentangkami" class="hover:text-blue-600 transition-colors duration-300">Tentang Kami</a>
            <a href="/portofolio" class="text-blue-600 border-b-2 border-blue-600 pb-1">Portofolio</a>
            <a href="/hubungikami" class="hover:text-blue-600 transition-colors duration-300">Hubungi Kami</a>
        </nav>
        
        <!-- Mobile Menu Button & Logout -->
        <div class="flex items-center space-x-4">
            <?php if(auth()->check()): ?>
                <form id="logout-form" action="<?php echo route('logout'); ?>" method="POST" class="hidden">
                    <?php echo csrf_field(); ?>
                </form>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                   class="hidden md:block text-red-600 font-medium hover:text-red-800 transition-colors duration-300">
                   Logout
                </a>
            <?php endif; ?>
            
            <button id="mobile-menu-button" class="md:hidden text-gray-800 focus:outline-none">
                <i class="fas fa-bars text-xl"></i>
            </button>
        </div>
    </div>
    
    <!-- Mobile Menu -->
    <div id="mobile-menu" class="mobile-menu md:hidden bg-white w-full px-4 border-t">
        <div class="flex flex-col space-y-2 py-4">
            <a href="/" class="py-2 px-3 hover:bg-blue-50 rounded transition-colors">Beranda</a>
            <a href="/tentangkami" class="py-2 px-3 hover:bg-blue-50 rounded transition-colors">Tentang Kami</a>
            <a href="/portofolio" class="py-2 px-3 bg-blue-50 text-blue-600 rounded font-medium">Portofolio</a>
            <a href="/hubungikami" class="py-2 px-3 hover:bg-blue-50 rounded transition-colors">Hubungi Kami</a>
            
            <?php if(auth()->check()): ?>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                   class="py-2 px-3 text-red-600 hover:bg-red-50 rounded transition-colors">
                   Logout
                </a>
            <?php endif; ?>
        </div>
    </div>
</header>

<!-- Portfolio Hero -->
<section class="relative bg-gradient-to-r from-blue-700 to-purple-700 text-white pt-24 md:pt-24 pb-16 md:pb-24 mt-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 text-center">
        <h1 class="text-3xl md:text-5xl font-bold mb-4 hero-title">Portofolio Proyek Kami</h1>
        <p class="text-lg md:text-xl max-w-3xl mx-auto hero-subtitle">
            Jelajahi berbagai proyek infrastruktur telekomunikasi yang telah kami selesaikan di seluruh Indonesia.
        </p>
    </div>
</section>

<!-- Search and Filter Section -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 py-6 md:py-8">
    <div class="bg-white p-4 md:p-6 rounded-lg shadow-md mb-6 md:mb-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <!-- Search Box -->
            <div class="relative flex-1">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-search text-gray-400"></i>
                </div>
                <input type="text" id="search-input" placeholder="Cari proyek..." 
                       class="pl-10 pr-4 py-2 w-full border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-sm md:text-base">
            </div>
            
            <!-- Sort Options -->
            <div class="flex items-center space-x-2 md:space-x-4">
                <span class="text-gray-600 text-sm md:text-base">Urutkan:</span>
                <select id="sort-select" class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500 text-sm md:text-base">
                    <option value="newest">Terbaru</option>
                    <option value="oldest">Terlama</option>
                    <option value="name_asc">Nama (A-Z)</option>
                    <option value="name_desc">Nama (Z-A)</option>
                </select>
            </div>
        </div>
    </div>
</section>

<!-- Portfolio Grid -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 py-6 md:py-8">
    <div id="projects-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
        <?php foreach($projects as $project): ?>
        <div class="project-card bg-white rounded-lg shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg">
            <!-- Project Image -->
            <div class="overflow-hidden">
                <?php if($project->documentation): ?>
                    <?php
                    $imagePath = 'storage/' . $project->documentation;
                    if (file_exists(public_path($imagePath))) {
                        echo '<img src="' . asset($imagePath) . '" alt="Dokumentasi" class="w-full h-48 md:h-64 object-cover transition-transform duration-500 hover:scale-105">';
                    } else {
                        echo '<div class="w-full h-48 md:h-64 bg-gray-200 flex items-center justify-center text-gray-500">Gambar tidak ditemukan</div>';
                    }
                    ?>
                <?php else: ?>
                    <div class="w-full h-48 md:h-64 bg-gray-200 flex items-center justify-center text-gray-500">
                        <i class="fas fa-image fa-3x opacity-30"></i>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Project Details -->
            <div class="p-4 md:p-6">
                <div class="flex justify-between items-start mb-2">
                    <h3 class="text-lg md:text-xl font-bold text-gray-800 project-name"><?php echo $project->project_name; ?></h3>
                    <span class="inline-block px-2 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-800"><?php echo $project->durasi; ?> hari</span>
                </div>
                
                <div class="flex items-center text-gray-600 mb-2 md:mb-3 text-sm md:text-base">
                    <i class="fas fa-map-marker-alt mr-2 text-blue-500 text-sm"></i>
                    <span class="project-location"><?php echo $project->lokasi; ?></span>
                </div>
                
                <div class="flex items-center text-gray-600 mb-3 md:mb-4 text-sm md:text-base">
                    <i class="fas fa-users mr-2 text-blue-500 text-sm"></i>
                    <span><?php echo $project->jumlah_tenaga_kerja; ?> tenaga kerja</span>
                </div>
                
                <p class="text-gray-600 mb-3 md:mb-4 line-clamp-3 text-sm md:text-base project-description"><?php echo $project->deskripsi; ?></p>
                
                <div class="flex justify-end">
                    <span class="text-xs md:text-sm text-gray-500 project-date"><?php echo date('M Y', strtotime($project->created_at)); ?></span>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    
    <!-- Pagination -->
    <div class="mt-8 md:mt-12 flex justify-center">
        <nav class="inline-flex rounded-md shadow">
            <?php
            // Assuming you're using Laravel's paginate(6) in your controller
            echo $projects->links('pagination::tailwind');
            ?>
        </nav>
    </div>
    
    <!-- Empty State -->
    <div id="empty-state" class="hidden text-center py-8 md:py-12">
        <i class="fas fa-search fa-3x md:fa-4x text-gray-300 mb-3 md:mb-4"></i>
        <h3 class="text-lg md:text-xl font-medium text-gray-700 mb-1 md:mb-2">Proyek tidak ditemukan</h3>
        <p class="text-gray-500 text-sm md:text-base">Coba gunakan kata kunci lain atau filter yang berbeda.</p>
    </div>
</section>

<!-- Footer -->
<footer class="bg-gray-900 text-white py-8 md:py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 grid grid-cols-1 md:grid-cols-4 gap-6 md:gap-8">
        <div class="md:col-span-2">
            <div class="flex items-center mb-3 md:mb-4">
                <img src="<?php echo $logo; ?>" alt="Semesta Pusat Kreasi" class="h-10 md:h-12 mr-3">
                <span class="text-lg md:text-xl font-bold">Semesta Pusat Kreasi</span>
            </div>
            <p class="text-gray-300 text-xs md:text-sm mb-3 md:mb-4">
                Perusahaan spesialis infrastruktur telekomunikasi yang berkomitmen untuk membangun jaringan konektivitas terbaik di seluruh Indonesia.
            </p>
            <div class="flex space-x-3 md:space-x-4">
                <a href="#" class="w-8 h-8 md:w-10 md:h-10 rounded-full bg-gray-700 flex items-center justify-center hover:bg-blue-600 transition-all duration-300">
                    <i class="fab fa-facebook-f text-sm md:text-base"></i>
                </a>
                <a href="#" class="w-8 h-8 md:w-10 md:h-10 rounded-full bg-gray-700 flex items-center justify-center hover:bg-blue-400 transition-all duration-300">
                    <i class="fab fa-twitter text-sm md:text-base"></i>
                </a>
                <a href="#" class="w-8 h-8 md:w-10 md:h-10 rounded-full bg-gray-700 flex items-center justify-center hover:bg-pink-600 transition-all duration-300">
                    <i class="fab fa-instagram text-sm md:text-base"></i>
                </a>
                <a href="#" class="w-8 h-8 md:w-10 md:h-10 rounded-full bg-gray-700 flex items-center justify-center hover:bg-blue-700 transition-all duration-300">
                    <i class="fab fa-linkedin-in text-sm md:text-base"></i>
                </a>
                <a href="#" class="w-8 h-8 md:w-10 md:h-10 rounded-full bg-gray-700 flex items-center justify-center hover:bg-red-600 transition-all duration-300">
                    <i class="fab fa-youtube text-sm md:text-base"></i>
                </a>
            </div>
        </div>
        
        <div>
            <h3 class="text-base md:text-lg font-semibold mb-2 md:mb-4">Tautan Cepat</h3>
            <ul class="space-y-1 md:space-y-2 text-gray-300 text-sm md:text-base">
                <li><a href="/" class="hover:text-white transition-colors duration-300">Beranda</a></li>
                <li><a href="/tentangkami" class="hover:text-white transition-colors duration-300">Tentang Kami</a></li>
                <li><a href="/portofolio" class="hover:text-white transition-colors duration-300">Portofolio</a></li>
                <li><a href="/hubungikami" class="hover:text-white transition-colors duration-300">Hubungi Kami</a></li>
            </ul>
        </div>
        
        <div>
            <h3 class="text-base md:text-lg font-semibold mb-2 md:mb-4">Kontak Kami</h3>
            <ul class="space-y-2 md:space-y-3 text-gray-300 text-sm md:text-base">
                <li class="flex items-start">
                    <i class="fas fa-map-marker-alt mt-1 mr-2 md:mr-3 text-blue-400 text-sm"></i>
                    <span>Gedung Semesta, Jl. Telekomunikasi No. 123, Jakarta Selatan</span>
                </li>
                <li class="flex items-center">
                    <i class="fas fa-phone-alt mr-2 md:mr-3 text-blue-400 text-sm"></i>
                    <span>(021) 1234-5678</span>
                </li>
                <li class="flex items-center">
                    <i class="fas fa-envelope mr-2 md:mr-3 text-blue-400 text-sm"></i>
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

    // Search functionality
    document.getElementById('search-input').addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        const projectCards = document.querySelectorAll('.project-card');
        let visibleCount = 0;
        
        projectCards.forEach(card => {
            const name = card.querySelector('.project-name').textContent.toLowerCase();
            const location = card.querySelector('.project-location').textContent.toLowerCase();
            const description = card.querySelector('.project-description').textContent.toLowerCase();
            
            if (name.includes(searchTerm) || location.includes(searchTerm) || description.includes(searchTerm)) {
                card.style.display = 'block';
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });
        
        // Show/hide empty state
        const emptyState = document.getElementById('empty-state');
        if (visibleCount === 0 && searchTerm.length > 0) {
            emptyState.classList.remove('hidden');
        } else {
            emptyState.classList.add('hidden');
        }
    });
    
    // Sort functionality
    document.getElementById('sort-select').addEventListener('change', function() {
        const sortValue = this.value;
        const container = document.getElementById('projects-container');
        const projectCards = Array.from(document.querySelectorAll('.project-card'));
        
        projectCards.sort((a, b) => {
            const aName = a.querySelector('.project-name').textContent;
            const bName = b.querySelector('.project-name').textContent;
            const aDate = new Date(a.querySelector('.project-date').textContent);
            const bDate = new Date(b.querySelector('.project-date').textContent);
            
            switch(sortValue) {
                case 'newest':
                    return bDate - aDate;
                case 'oldest':
                    return aDate - bDate;
                case 'name_asc':
                    return aName.localeCompare(bName);
                case 'name_desc':
                    return bName.localeCompare(aName);
                default:
                    return 0;
            }
        });
        
        // Re-append sorted cards
        projectCards.forEach(card => container.appendChild(card));
    });
</script>
</body>
</html>