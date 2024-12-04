@extends('layouts.app')

@push('styles')
<style>
/* Background Pattern */
.bg-gradient-pattern {
    background-color: #ffffff;
    background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M54.627 0l.83.828-1.415 1.415L51.8 0h2.827zM5.373 0l-.83.828L5.96 2.243 8.2 0H5.374zM48.97 0l3.657 3.657-1.414 1.414L46.143 0h2.828zM11.03 0L7.372 3.657 8.787 5.07 13.857 0H11.03z' fill='%2322c55e' fill-opacity='0.05'/%3E%3C/svg%3E");
}

/* Image Gallery Animation */
.main-image {
    transition: transform 0.5s ease;
}

.main-image:hover {
    transform: scale(1.02);
}

/* Product Info Card */
.product-info-card {
    backdrop-filter: blur(10px);
    background: rgba(255, 255, 255, 0.95);
    border: 1px solid rgba(255, 255, 255, 0.2);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
}

/* Input Styles */
.custom-input {
    transition: all 0.3s ease;
    background: rgba(255, 255, 255, 0.9);
    border: 2px solid transparent;
}

.custom-input:focus {
    border-color: #22c55e;
    box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.2);
    background: white;
}

/* WhatsApp Button Animation */
.whatsapp-btn {
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
    background: linear-gradient(45deg, #22c55e, #16a34a);
}

.whatsapp-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(45deg, #16a34a, #22c55e);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.whatsapp-btn:hover::before {
    opacity: 1;
}

.whatsapp-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 20px rgba(34, 197, 94, 0.4);
}

/* Related Products Card */
.related-card {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    transform-style: preserve-3d;
}

.related-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
}

.related-card img {
    transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
}

.related-card:hover img {
    transform: scale(1.1);
}

/* Price Animation */
@keyframes priceUpdate {
    0% { transform: translateY(-10px); opacity: 0; }
    100% { transform: translateY(0); opacity: 1; }
}

.price-update {
    animation: priceUpdate 0.3s ease-out;
}
</style>
@endpush

@section('content')
<div class="min-h-screen bg-gradient-pattern py-12">
    <div class="container mx-auto px-4">
        <!-- Breadcrumb -->
        <nav class="mb-8" aria-label="Breadcrumb">
            <ol class="flex space-x-2 text-gray-600">
                <li><a href="{{ route('home') }}" class="hover:text-green-600 transition-colors">Beranda</a></li>
                <li class="flex items-center space-x-2">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    <a href="{{ route('products.index') }}" class="hover:text-green-600 transition-colors">Produk</a>
                </li>
                <li class="flex items-center space-x-2">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="text-gray-400">{{ $product->name }}</span>
                </li>
            </ol>
        </nav>

        <!-- Product Detail -->
        <div class="grid md:grid-cols-2 gap-12" data-aos="fade-up">
            <!-- Image Section -->
            <div class="space-y-4">
                <div class="relative overflow-hidden rounded-2xl shadow-2xl">
                    <!-- Gambar Utama -->
                    <img src="{{ asset('storage/images/' . ($product->image ?? 'placeholder.jpg')) }}" 
                         alt="{{ $product->name }}" 
                         class="w-full h-[500px] object-cover main-image">
                    <div class="absolute top-4 right-4 bg-green-500 text-white px-4 py-1 rounded-full text-sm font-semibold">
                        {{ ucfirst($product->category) }}
                    </div>
                </div>
            </div>

            <!-- Product Info -->
            <div class="product-info-card rounded-2xl p-8">
                <h1 class="text-4xl font-bold mb-4" data-aos="fade-up">{{ $product->name }}</h1>
                <p class="text-green-600 text-3xl font-bold mb-6 price-update" id="price-display" data-aos="fade-up" data-aos-delay="100">
                    Rp {{ number_format($product->price) }}
                </p>
                <div class="prose prose-lg mb-8" data-aos="fade-up" data-aos-delay="200">
                    <p class="text-gray-600">{{ $product->description }}</p>
                </div>

                <form id="whatsapp-form" class="space-y-6" data-aos="fade-up" data-aos-delay="300">
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Jumlah</label>
                        <input type="number" id="quantity" name="quantity" min="1" value="1" 
                               class="custom-input w-full rounded-lg p-3" oninput="updatePrice()">
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Nama</label>
                        <input type="text" id="name" name="name" required 
                               class="custom-input w-full rounded-lg p-3"
                               placeholder="Masukkan nama Anda">
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Nomor HP</label>
                        <input type="text" id="phone" name="phone" required 
                               class="custom-input w-full rounded-lg p-3"
                               placeholder="Contoh: 08123456789">
                    </div>

                    <button type="button" id="whatsapp-button" 
                            class="whatsapp-btn w-full py-4 px-6 rounded-lg text-white font-medium flex items-center justify-center space-x-2">
                        <i class="fab fa-whatsapp text-xl"></i>
                        <span>Pesan via WhatsApp</span>
                    </button>
                </form>
            </div>
        </div>

        <!-- Related Products -->
        <div class="mt-24" data-aos="fade-up">
            <h2 class="text-3xl font-bold mb-8">Produk Terkait</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                @foreach($relatedProducts as $related)
                <div class="related-card bg-white rounded-xl overflow-hidden shadow-lg" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('storage/images/' . ($related->image ?? 'placeholder.jpg')) }}" 
                             alt="{{ $related->name }}" 
                             class="w-full h-48 object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 transition-opacity group-hover:opacity-100"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-lg mb-2">{{ $related->name }}</h3>
                        <p class="text-green-600 font-semibold mb-4">Rp {{ number_format($related->price) }}</p>
                        <a href="{{ route('products.show', $related->slug) }}" 
                           class="block bg-green-600 text-white text-center py-2 px-4 rounded-lg hover:bg-green-700 transition-colors">
                            Lihat Detail
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
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

    // Price update function
    function updatePrice() {
        var quantity = document.getElementById('quantity').value;
        var pricePerUnit = {{ $product->price }};
        var totalPrice = pricePerUnit * quantity;
        var formattedPrice = totalPrice.toLocaleString('id-ID');
        
        var priceDisplay = document.getElementById('price-display');
        priceDisplay.innerText = 'Rp ' + formattedPrice;
        priceDisplay.classList.remove('price-update');
        void priceDisplay.offsetWidth; // Trigger reflow
        priceDisplay.classList.add('price-update');
    }

    // WhatsApp functionality
    document.getElementById('whatsapp-button').addEventListener('click', function() {
        var productName = "{{ $product->name }}";
        var productPrice = document.getElementById('price-display').innerText;
        var quantity = document.getElementById('quantity').value;
        var customerName = document.getElementById('name').value;
        var phone = document.getElementById('phone').value;

        if (!customerName || !phone) {
            alert("Mohon lengkapi nama dan nomor HP Anda!");
            return;
        }

        var message = `Halo, saya ingin membeli produk berikut:\n\n`;
        message += `Produk: ${productName}\n`;
        message += `Jumlah: ${quantity}\n`;
        message += `Total Harga: ${productPrice}\n\n`;
        message += `Nama: ${customerName}\n`;
        message += `Nomor HP: ${phone}`;

        var whatsappPhone = '6283119968872';
        var whatsappURL = `https://wa.me/${whatsappPhone}?text=${encodeURIComponent(message)}`;
        window.open(whatsappURL, '_blank');
    });

    // Initial price update
    updatePrice();
});
</script>
@endpush
@endsection
