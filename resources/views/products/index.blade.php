@extends('layouts.app')

@push('styles')
<style>
/* Modern Gradient Background */
.bg-gradient-pattern {
    background-color: #ffffff;
    background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M54.627 0l.83.828-1.415 1.415L51.8 0h2.827zM5.373 0l-.83.828L5.96 2.243 8.2 0H5.374zM48.97 0l3.657 3.657-1.414 1.414L46.143 0h2.828zM11.03 0L7.372 3.657 8.787 5.07 13.857 0H11.03zm32.284 0L49.8 6.485 48.384 7.9l-7.9-7.9h2.83zM16.686 0L10.2 6.485 11.616 7.9l7.9-7.9h-2.83zM22.343 0L13.857 8.485 15.272 9.9l8.485-8.485h-1.414zM32 0l-9.9 9.9 1.415 1.415L33.414 0H32z' fill='%2322c55e' fill-opacity='0.05'/%3E%3C/svg%3E");
}

/* Floating Animation */
.float-animation {
    animation: floating 3s ease-in-out infinite;
}

@keyframes floating {
    0% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
    100% { transform: translateY(0px); }
}

/* Card Hover Effects */
.product-card {
    transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    transform-style: preserve-3d;
    perspective: 1000px;
}

.product-card:hover {
    transform: translateY(-10px) rotateX(5deg);
}

.product-card::after {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(45deg, transparent 60%, rgba(255,255,255,0.2) 100%);
    transition: all 0.3s ease;
    opacity: 0;
}

.product-card:hover::after {
    opacity: 1;
}

/* Image Hover Effect */
.image-container {
    overflow: hidden;
    position: relative;
}

.image-container img {
    transition: transform 0.8s cubic-bezier(0.33, 1, 0.68, 1);
}

.image-container:hover img {
    transform: scale(1.1);
}

.image-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(0,0,0,0.7) 0%, transparent 100%);
    opacity: 0;
    transition: all 0.3s ease;
}

.product-card:hover .image-overlay {
    opacity: 1;
}

/* Category Pills Animation */
.category-pill {
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.category-pill::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    background: rgba(255,255,255,0.2);
    border-radius: 50%;
    transform: translate(-50%, -50%);
    transition: width 0.6s ease, height 0.6s ease;
}

.category-pill:hover::before {
    width: 300px;
    height: 300px;
}

/* Pagination Styling */
.pagination-modern {
    display: flex;
    gap: 0.5rem;
}

.pagination-modern .page-item {
    transition: all 0.3s ease;
}

.pagination-modern .page-link {
    border-radius: 0.5rem;
    position: relative;
    overflow: hidden;
}

.pagination-modern .page-link::after {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(45deg, transparent, rgba(255,255,255,0.2));
    opacity: 0;
    transition: opacity 0.3s ease;
}

.pagination-modern .page-link:hover::after {
    opacity: 1;
}
.product-card a {
    position: relative;
    z-index: 10; /* Pastikan link berada di atas card */
}

.product-card .image-container {
    position: relative;
    cursor: pointer;
}

/* Optional: Tambahkan hover effect untuk link */
.product-card a.inline-flex {
    overflow: hidden;
}

.product-card a.inline-flex:hover i {
    transform: translateX(4px);
}

/* Pastikan tombol wishlist juga bisa diklik */
.product-card button {
    position: relative;
    z-index: 10;
}
</style>
@endpush

@section('content')
<div class="min-h-screen bg-gradient-pattern py-12">
    <!-- Header Section -->
    <div class="container mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-down">
            <h1 class="text-5xl font-bold text-gray-800 mb-4">Katalog Produk</h1>
            <p class="text-gray-600 text-lg">Temukan keindahan anyaman bambu dalam berbagai bentuk</p>
        </div>

        <!-- Filter Section -->
<div class="mb-12 max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="200">
    <form method="get" class="bg-white p-6 rounded-2xl shadow-xl">
        <div class="flex flex-wrap gap-4">
            <div class="flex-1">
                <select name="kategori" class="w-full bg-gray-50 border-2 border-gray-200 rounded-xl p-3 text-gray-700 focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300">
                    <option value="">Semua Kategori</option>
                    @foreach(['dompet', 'wadah lilin', 'kepet', 'sokasi', 'keranjang', 'tudung saji', 'lainnya'] as $category)
                        <option value="{{ $category }}" {{ request('kategori') == $category ? 'selected' : '' }}>
                            {{ ucfirst($category) }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="category-pill bg-green-600 text-white px-8 py-3 rounded-xl shadow-lg hover:bg-green-700 transition-all duration-300 flex items-center space-x-2">
                <i class="fas fa-filter"></i>
                <span>Filter</span>
            </button>
        </div>
    </form>
</div>
        <!-- Products Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            @foreach($products as $index => $product)
            <div class="product-card bg-white rounded-2xl overflow-hidden shadow-xl" 
                 data-aos="fade-up" 
                 data-aos-delay="{{ $index * 100 }}">
                 <div class="image-container">
                 <img src="{{ asset('storage/images/' . ($product->image ?? 'placeholder.jpg')) }}" 
     alt="{{ $product->name }}" 
     class="w-full h-64 object-cover">
            <div class="image-overlay"></div>
        </div>
                <div class="p-6 relative">
                    <div class="absolute -top-4 right-4 bg-green-500 text-white px-4 py-1 rounded-full text-sm font-semibold shadow-lg">
                        {{ ucfirst($product->category) }}
                    </div>
                    <h3 class="font-bold text-xl text-gray-800 mb-2">{{ $product->name }}</h3>
                    <p class="text-green-600 font-bold text-xl mb-4">Rp {{ number_format($product->price) }}</p>
                    <div class="flex justify-between items-center">
                        <a href="{{ route('products.show', $product->slug) }}" 
                           class="group flex items-center space-x-2 text-green-600 hover:text-green-700 transition-colors">
                            <span>Lihat Detail</span>
                            <i class="fas fa-arrow-right transform group-hover:translate-x-2 transition-transform"></i>
                        </a>
                        <button class="float-animation text-gray-400 hover:text-red-500 transition-colors">
                            <i class="fas fa-heart text-xl"></i>
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>


        <!-- Pagination -->
        <div class="mt-12 flex justify-center" data-aos="fade-up">
            {{ $products->links() }}
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize AOS
    AOS.init({
        duration: 800,
        once: true,
        offset: 100
    });

    // Product Cards Hover Effect
    const cards = document.querySelectorAll('.product-card');
    cards.forEach(card => {
        card.addEventListener('mousemove', e => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;

            const centerX = rect.width / 2;
            const centerY = rect.height / 2;

            const rotateX = (y - centerY) / 20;
            const rotateY = (centerX - x) / 20;

            card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateZ(10px)`;
        });

        card.addEventListener('mouseleave', () => {
            card.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) translateZ(0)';
            const imageContainers = document.querySelectorAll('.image-container');
    imageContainers.forEach(container => {
        container.addEventListener('click', (e) => {
            const link = container.closest('.product-card').querySelector('a[href*="products/show"]');
            if (link) {
                link.click();
            }
        });
    });
});
</script>
@endpush
@endsection