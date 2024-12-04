@extends('layouts.app')

@push('styles')
<style>
/* Modern Gradient Animations */
.bg-gradient-modern {
    background: linear-gradient(-45deg, #134e5e, #71b280, #2c5364, #203a43);
    background-size: 400% 400%;
    animation: gradientFlow 15s ease infinite;
}

@keyframes gradientFlow {
    0% { background-position: 0% 50% }
    50% { background-position: 100% 50% }
    100% { background-position: 0% 50% }
}

/* Enhanced 3D Transform Effects */
.card-3d {
    transform-style: preserve-3d;
    perspective: 1000px;
    transition: all 0.6s cubic-bezier(0.23, 1, 0.32, 1);
}

.card-3d:hover {
    transform: rotateY(10deg) rotateX(10deg) translateY(-10px);
    box-shadow: 20px 20px 60px rgba(0, 0, 0, 0.2);
}

/* Smooth Scroll Reveal */
.scroll-reveal {
    opacity: 0;
    transform: translateY(30px);
    transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
}

.scroll-reveal.active {
    opacity: 1;
    transform: translateY(0);
}

/* Floating Elements Animation */
.float-element {
    animation: floating 6s ease-in-out infinite;
}

@keyframes floating {
    0%, 100% { transform: translateY(0px) }
    50% { transform: translateY(-20px) }
}

/* Interactive Background Effect */
.interactive-bg {
    position: relative;
    overflow: hidden;
}

.interactive-bg::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 50%);
    transform-origin: center;
    animation: rotateGradient 20s linear infinite;
}

@keyframes rotateGradient {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

/* Glass Morphism Effect */
.glass-effect {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
}

/* Text Animation */
.text-animate {
    background: linear-gradient(90deg, #000, #000, #000);
    background-size: 200% auto;
    background-clip: text;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    animation: textShine 3s linear infinite;
}

.hero-pattern {
    background-color: #1a1a1a;
    background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
                      url('{{ asset("images/bamboo-bg.jpg") }}');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
}

.section-pattern-light {
    background-color: #ffffff;
    background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M54.627 0l.83.828-1.415 1.415L51.8 0h2.827zM5.373 0l-.83.828L5.96 2.243 8.2 0H5.374zM48.97 0l3.657 3.657-1.414 1.414L46.143 0h2.828zM11.03 0L7.372 3.657 8.787 5.07 13.857 0H11.03zm32.284 0L49.8 6.485 48.384 7.9l-7.9-7.9h2.83zM16.686 0L10.2 6.485 11.616 7.9l7.9-7.9h-2.83zM22.343 0L13.857 8.485 15.272 9.9l8.485-8.485h-1.414zM32 0l-9.9 9.9 1.415 1.415L33.414 0H32zM0 0c1.837 4.382 4.382 6.927 8.485 8.485L0 16.97V0zm0 3.414L6.485 9.9 7.9 8.484 0 .586v2.828zm0 5.656l5.657 5.657 1.414-1.415L0 6.244v2.828zm0 5.657l4.243 4.242L5.657 17.556 0 11.9v2.828zm0 5.657l2.828 2.83-1.414 1.413L0 17.556v2.828zm0 5.657l1.414 1.414 1.414-1.414L0 23.213v2.83zM0 28.284L4.242 32.5 2.828 33.915 0 31.087v-2.803zm0 5.657L7.07 41.113 5.657 42.527 0 36.87v-2.83zm0 5.657L9.9 47.77l-1.415 1.414L0 42.527v-2.83zm0 5.657L12.728 53.4l-1.414 1.414L0 48.184v-2.83zm0 5.657L15.556 59.07l-1.414 1.414L0 53.84v-2.83zM0 64L.707 64.707 2.121 63.293 0 61.172V64zm0-2.828L2.828 64h-2.83L0 61.172zm5.657 2.828L9.9 64h-2.83L5.657 62.586zM11.313 64L16.97 64h-2.83L11.313 61.172zm5.657 0L22.626 64h-2.83L16.97 61.172zm5.657 0L28.284 64h-2.83L22.627 61.172zm5.657 0L33.94 64h-2.83L28.284 61.172zm5.657 0L39.598 64h-2.83L33.94 61.172zm5.657 0L45.255 64h-2.83L39.598 61.172zm5.657 0L50.912 64h-2.83L45.255 61.172zm5.657 0L56.57 64h-2.83L50.912 61.172zm5.657 0L62.226 64h-2.83L56.57 61.172zm5.657 0L64 62.586V64h-1.773z' fill='%2322c55e' fill-opacity='0.05' fill-rule='evenodd'/%3E%3C/svg%3E");
}

.section-pattern-dark {
    background-color: #134e5e;
    background-image: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)),
                      url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M54.627 0l.83.828-1.415 1.415L51.8 0h2.827zM5.373 0l-.83.828L5.96 2.243 8.2 0H5.374zM48.97 0l3.657 3.657-1.414 1.414L46.143 0h2.828zM11.03 0L7.372 3.657 8.787 5.07 13.857 0H11.03zm32.284 0L49.8 6.485 48.384 7.9l-7.9-7.9h2.83zM16.686 0L10.2 6.485 11.616 7.9l7.9-7.9h-2.83zM22.343 0L13.857 8.485 15.272 9.9l8.485-8.485h-1.414zM32 0l-9.9 9.9 1.415 1.415L33.414 0H32zM0 0c1.837 4.382 4.382 6.927 8.485 8.485L0 16.97V0zm0 3.414L6.485 9.9 7.9 8.484 0 .586v2.828zm0 5.656l5.657 5.657 1.414-1.415L0 6.244v2.828zm0 5.657l4.243 4.242L5.657 17.556 0 11.9v2.828zm0 5.657l2.828 2.83-1.414 1.413L0 17.556v2.828zm0 5.657l1.414 1.414 1.414-1.414L0 23.213v2.83zM0 28.284L4.242 32.5 2.828 33.915 0 31.087v-2.803zm0 5.657L7.07 41.113 5.657 42.527 0 36.87v-2.83zm0 5.657L9.9 47.77l-1.415 1.414L0 42.527v-2.83zm0 5.657L12.728 53.4l-1.414 1.414L0 48.184v-2.83zm0 5.657L15.556 59.07l-1.414 1.414L0 53.84v-2.83zM0 64L.707 64.707 2.121 63.293 0 61.172V64zm0-2.828L2.828 64h-2.83L0 61.172zm5.657 2.828L9.9 64h-2.83L5.657 62.586zM11.313 64L16.97 64h-2.83L11.313 61.172zm5.657 0L22.626 64h-2.83L16.97 61.172zm5.657 0L28.284 64h-2.83L22.627 61.172zm5.657 0L33.94 64h-2.83L28.284 61.172zm5.657 0L39.598 64h-2.83L33.94 61.172zm5.657 0L45.255 64h-2.83L39.598 61.172zm5.657 0L50.912 64h-2.83L45.255 61.172zm5.657 0L56.57 64h-2.83L50.912 61.172zm5.657 0L62.226 64h-2.83L56.57 61.172zm5.657 0L64 62.586V64h-1.773z' fill='%23ffffff' fill-opacity='0.05' fill-rule='evenodd'/%3E%3C/svg%3E");
}
@keyframes textShine {
    to { background-position: 200% center; }
}

</style>
@endpush

@section('content')
<section class="relative min-h-screen flex items-center overflow-hidden">
    <video autoplay muted loop class="absolute w-full h-full object-cover scale-105 transform transition-transform duration-1000">
        <source src="{{ asset('storage/videos/bali.mp4') }}" type="video/mp4">
    </video>
    <!-- Background Gradient -->
    <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/50 to-transparent"></div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-4xl scroll-reveal">
        <h1 class="text-7xl md:text-9xl font-bold text-white mb-8 leading-tight">
            Keindahan <br>
             <span class="text-emerald-400">Tradisi</span> Anyaman
        </h1>
            <p class="text-xl md:text-2xl text-white/90 mb-12 font-light">
                Menghadirkan warisan budaya dalam sentuhan modern untuk ruang hunian Anda
            </p>
            <div class="flex flex-wrap gap-6">
                <a href="#explore" class="group relative px-8 py-4 bg-emerald-500 text-white rounded-full overflow-hidden glass-effect">
                    <span class="relative z-10">Jelajahi Koleksi</span>
                    <div class="absolute inset-0 bg-emerald-600/50 transform scale-x-0 group-hover:scale-x-100 transition-transform origin-left"></div>
                </a>
                <a href="#story" class="px-8 py-4 border-2 border-white/50 text-white rounded-full hover:bg-white/10 transition-all duration-300 glass-effect">
                    Cerita Kami
                </a>
            </div>
        </div>
    </div>
</section>


<section id="explore" class="py-32 bg-gradient-modern">
    <div class="container mx-auto px-4">
        <h2 class="text-5xl font-bold text-center mb-20 text-white scroll-reveal">Produk Terbaru</h2>
        <div class="grid md:grid-cols-4 gap-8">
            @foreach($featuredProducts as $product)
            <div class="card-3d group cursor-pointer scroll-reveal">
                <a href="{{ route('products.show', $product->slug) }}">
                    <div class="relative overflow-hidden rounded-3xl">
                        <!-- Menggunakan asset() untuk path gambar -->
                        <img src="{{ asset('storage/images/' . ($product->image ?? 'placeholder.jpg')) }}" 
     alt="{{ $product->name }}" 
     class="w-full h-64 object-cover" 
     loading="lazy">

                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        <div class="absolute bottom-0 p-8 transform translate-y-10 group-hover:translate-y-0 transition-transform duration-500">
                            <h3 class="text-2xl font-bold text-white mb-3">{{ $product->name }}</h3>
                            <p class="text-white/90 text-sm">Rp {{ number_format($product->price) }}</p>
                            <p class="text-white/90 text-sm">Lihat Koleksi →</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>




<!-- Story Section with Enhanced Animation -->
<section id="story" class="py-32 interactive-bg">
    <div class="container mx-auto px-4">
        <div class="grid md:grid-cols-2 gap-16 items-center">
            <!-- Left Side (Text) -->
            <div class="space-y-8 scroll-reveal text-center md:text-left">
                <h2 class="text-5xl font-bold mb-8 text-animate text-emerald-600">Cerita di Balik Setiap Anyaman Bambu</h2>
                <p class="text-lg text-gray-600 mb-8">
                    Setiap produk kami terbuat dari bambu pilihan dan dikerjakan dengan keahlian tinggi oleh pengrajin lokal. Produk kami tidak hanya memiliki keunikan, tetapi juga memiliki nilai budaya yang mendalam, merangkai kearifan lokal dalam setiap anyaman yang dihasilkan.
                </p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-12 justify-center mx-auto">
                    <div class="text-center p-6 glass-effect rounded-2xl float-element">
                        <div class="text-5xl font-bold text-emerald-600">5</div>
                        <div class="text-sm mt-2">Pengrajin Terampil</div>
                    </div>
                    <div class="text-center p-6 glass-effect rounded-2xl float-element" style="animation-delay: 0.2s">
                        <div class="text-5xl font-bold text-emerald-600">50+</div>
                        <div class="text-sm mt-2">Produk Terjual</div>
                    </div>
                </div>
            </div>

            <!-- Right Side (Images) -->
            <div class="relative space-y-6">
                <!-- Gambar pertama (Sokasi2) -->
                <img src="{{ asset('storage/images/sokasi2.jpeg') }}" alt="Story Image 1" class="rounded-3xl transform translate-y-12 card-3d shadow-xl w-full md:w-3/4 lg:w-2/3 mx-auto">
            </div>
        </div>
    </div>
</section>


@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Enhanced Scroll Animation
    const scrollElements = document.querySelectorAll('.scroll-reveal');
    
    const elementInView = (el, offset = 150) => {
        const elementTop = el.getBoundingClientRect().top;
        return (elementTop <= (window.innerHeight || document.documentElement.clientHeight) - offset);
    };

    const displayScrollElement = element => {
        element.classList.add('active');
    };

    const handleScrollAnimation = () => {
        scrollElements.forEach((el) => {
            if (elementInView(el)) {
                displayScrollElement(el);
            }
        });
    };

    // Initial check
    handleScrollAnimation();
    
    // Throttled scroll handler
    let ticking = false;
    window.addEventListener('scroll', () => {
        if (!ticking) {
            window.requestAnimationFrame(() => {
                handleScrollAnimation();
                ticking = false;
            });
            ticking = true;
        }
    });

    // Parallax effect for hero section
    const parallaxElements = document.querySelectorAll('.parallax');
    window.addEventListener('scroll', () => {
        const scrolled = window.pageYOffset;
        parallaxElements.forEach((el) => {
            const speed = el.dataset.speed || 0.5;
            el.style.transform = `translateY(${scrolled * speed}px)`;
        });
    });

    // 3D Card Effect
    document.querySelectorAll('.card-3d').forEach(card => {
        card.addEventListener('mousemove', e => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            const centerX = rect.width / 2;
            const centerY = rect.height / 2;
            
            const rotateX = (y - centerY) / 20;
            const rotateY = (centerX - x) / 20;
            
            card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
        });
        
        card.addEventListener('mouseleave', () => {
            card.style.transform = 'perspective(1000px) rotateX(0) rotateY(0)';
        });
    });
});
</script>
@endpush
@endsection