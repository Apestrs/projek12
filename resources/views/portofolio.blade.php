<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT Semesta Pusat Kreasi - Portofolio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-out forwards',
                    },
                    keyframes: {
                        fadeIn: {
                            'from': { opacity: '0' },
                            'to': { opacity: '1' }
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="font-sans bg-gray-50">
<?php $logo = asset('images/logosamping.png'); ?>

<!-- Navbar Portofolio -->
<header class="fixed top-0 left-0 w-full bg-white shadow-lg z-50">
    <div class="max-w-7xl mx-auto px-6 py-3 flex items-center justify-between relative">
        <!-- Kiri: Logo -->
        <div class="flex items-center">
            <a href="/" class="flex items-center">
                <img src="<?php echo $logo; ?>" alt="Semesta Pusat Kreasi" class="h-12">
            </a>
        </div>
        
        <!-- Tengah: Menu -->
        <nav class="hidden md:flex space-x-6 text-gray-800 font-medium absolute left-1/2 transform -translate-x-1/2">
            <a href="/" class="hover:text-blue-600 transition-colors duration-300">
                Beranda
            </a>
            <a href="/tentangkami" class="hover:text-blue-600 transition-colors duration-300">
                Tentang Kami
            </a>
            <!-- Link aktif: Portofolio -->
            <a href="/portofolio" class="text-blue-600 border-b-2 border-blue-600 pb-1">
                Portofolio
            </a>
            <a href="/hubungikami" class="hover:text-blue-600 transition-colors duration-300">
                Hubungi Kami
            </a>
        </nav>
        
        <!-- Kanan: Logout & Mobile Menu -->
        <div class="flex items-center space-x-4">
            <?php if(auth()->check()): ?>
                <form id="logout-form" action="<?php echo route('logout'); ?>" method="POST" class="hidden">
                    <?php echo csrf_field(); ?>
                </form>
                <button type="submit" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                   class="text-red-600 font-medium hover:text-red-800 transition-colors duration-300">
                   Logout
                </button>
            <?php endif; ?>
            
            <!-- Mobile menu button -->
            <button class="md:hidden focus:outline-none text-gray-800" id="mobile-menu-button">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </div>
</header>

<!-- Portfolio Hero -->
<section class="relative bg-gradient-to-r from-blue-700 to-purple-700 text-white py-24 mt-16">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Portofolio Proyek Kami</h1>
        <p class="text-xl max-w-3xl mx-auto">
            Jelajahi berbagai proyek infrastruktur telekomunikasi yang telah kami selesaikan di seluruh Indonesia.
        </p>
    </div>
</section>

<!-- Search and Filter Section -->
<section class="max-w-7xl mx-auto px-6 py-8">
    <div class="bg-white p-6 rounded-lg shadow-md mb-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <!-- Search Box -->
            <div class="relative flex-1">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-search text-gray-400"></i>
                </div>
                <input type="text" id="search-input" placeholder="Cari proyek..." 
                       class="pl-10 pr-4 py-2 w-full border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
            </div>
            
            <!-- Sort Options -->
            <div class="flex items-center space-x-4">
                <span class="text-gray-600">Urutkan:</span>
                <select id="sort-select" class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500">
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
<section class="max-w-7xl mx-auto px-6 py-8">
    <div id="projects-container" class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php foreach($projects as $project): ?>
        <div class="project-card animate-fade-in bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">
            <!-- Project Image -->
            <div class="overflow-hidden">
                <?php if($project->documentation): ?>
                    <?php
                    $imagePath = 'storage/' . $project->documentation;
                    if (file_exists(public_path($imagePath))) {
                        echo '<img src="' . asset($imagePath) . '" alt="Dokumentasi" class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-105">';
                    } else {
                        echo '<div class="w-full h-64 bg-gray-200 flex items-center justify-center text-gray-500">Gambar tidak ditemukan</div>';
                    }
                    ?>
                <?php else: ?>
                    <div class="w-full h-64 bg-gray-200 flex items-center justify-center text-gray-500">
                        <i class="fas fa-image fa-3x opacity-30"></i>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Project Details -->
            <div class="p-6">
                <div class="flex justify-between items-start mb-2">
                    <h3 class="text-xl font-bold text-gray-800 project-name"><?php echo $project->project_name; ?></h3>
                    <span class="inline-block px-2 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-800"><?php echo $project->durasi; ?> hari</span>
                </div>
                
                <div class="flex items-center text-gray-600 mb-3">
                    <i class="fas fa-map-marker-alt mr-2 text-blue-500"></i>
                    <span class="project-location"><?php echo $project->lokasi; ?></span>
                </div>
                
                <div class="flex items-center text-gray-600 mb-4">
                    <i class="fas fa-users mr-2 text-blue-500"></i>
                    <span><?php echo $project->jumlah_tenaga_kerja; ?> tenaga kerja</span>
                </div>
                
                <p class="text-gray-600 mb-4 line-clamp-3 project-description"><?php echo $project->deskripsi; ?></p>
                
                <div class="flex justify-end">
                    <span class="text-sm text-gray-500 project-date"><?php echo date('M Y', strtotime($project->created_at)); ?></span>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    
    <!-- Pagination -->
    <div class="mt-12 flex justify-center">
        <nav class="inline-flex rounded-md shadow">
            <?php
            // Assuming you're using Laravel's paginate(6) in your controller
            echo $projects->links('pagination::tailwind');
            ?>
        </nav>
    </div>
    
    <!-- Empty State -->
    <div id="empty-state" class="hidden text-center py-12">
        <i class="fas fa-search fa-4x text-gray-300 mb-4"></i>
        <h3 class="text-xl font-medium text-gray-700 mb-2">Proyek tidak ditemukan</h3>
        <p class="text-gray-500">Coba gunakan kata kunci lain atau filter yang berbeda.</p>
    </div>
</section>

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
            </ul>
        </div>
    </div>
    
    <div class="border-t border-gray-800 mt-10 pt-6 text-center text-sm text-gray-400">
        <p>&copy; <?php echo date('Y'); ?> Semesta Pusat Kreasi. Seluruh hak dilindungi.</p>
    </div>
</footer>

<script>
    // Mobile menu toggle
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
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