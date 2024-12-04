@extends('layouts.app')

@push('styles')
<style>
/* Modern Gradient Backgrounds */
.hero-gradient {
    background: linear-gradient(135deg, #1a5f7a, #2d8b74, #57b894);
    background-size: 300% 300%;
    animation: gradientFlow 15s ease infinite;
}

@keyframes gradientFlow {
    0% { background-position: 0% 50% }
    50% { background-position: 100% 50% }
    100% { background-position: 0% 50% }
}

/* Smooth Reveal Animation */
.reveal-on-scroll {
    opacity: 0;
    transform: translateY(30px);
    transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
}

.reveal-on-scroll.active {
    opacity: 1;
    transform: translateY(0);
}

/* 3D Card Effect */
.card-3d {
    transform-style: preserve-3d;
    perspective: 1000px;
    transition: all 0.6s cubic-bezier(0.23, 1, 0.32, 1);
}

.card-3d:hover {
    transform: translateY(-10px) rotateX(10deg);
    box-shadow: 0 20px 40px rgba(0,0,0,0.2);
}

/* Team Member Card - Updated Styles */
.team-card {
    position: relative;
    overflow: hidden;
    transition: all 0.5s ease;
    flex: 0 0 300px;
    margin: 0 15px;
    border-radius: 16px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.team-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(45deg, rgba(34,197,94,0.9), rgba(21,128,61,0.9));
    opacity: 0;
    transition: all 0.5s ease;
}

.team-card:hover::before {
    opacity: 1;
}

.team-card img {
    width: 100%;
    height: 400px;
    object-fit: cover;
    object-position: center;
}

.team-info {
    position: absolute;
    bottom: -100%;
    left: 0;
    width: 100%;
    padding: 2rem;
    color: white;
    transition: all 0.5s ease;
    background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
}

.team-card:hover .team-info {
    bottom: 0;
}

/* Team Slider */
.team-slider-container {
    width: 100%;
    position: relative;
    padding: 20px 0;
    z-index: 20; /* Add higher z-index */
    margin-bottom: 40px; /* Add margin bottom to create space */
}

.slider-wrapper {
    overflow: hidden;
    position: relative;
    padding: 20px 0;
}

.team-slider {
    display: flex;
    transition: transform 0.3s ease;
    margin: 0 -15px;
    cursor: grab;
    user-select: none;
    -webkit-user-select: none;
    -moz-user-select: none;
}

.team-slider:active {
    cursor: grabbing;
}

.team-card-wrapper {
    display: flex;
    flex-wrap: nowrap;
}

/* Team Member Card */
.team-card {
    position: relative;
    flex: 0 0 300px;
    margin: 0 15px;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    background: #fff;
    height: 400px; /* Fixed height */
    transform: translateZ(0); /* Force GPU acceleration */
}

.team-card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    transition: transform 0.5s ease;
}

.team-card:hover img {
    transform: scale(1.05);
}

.team-info {
    position: absolute;
    bottom: -100%;
    left: 0;
    width: 100%;
    padding: 2rem;
    background: linear-gradient(to top, rgba(0,0,0,0.9), rgba(0,0,0,0.7), transparent);
    color: white;
    transition: bottom 0.3s ease;
}

.team-card:hover .team-info {
    bottom: 0;
}

/* Slider Controls */
.slider-button {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 44px;
    height: 44px;
    border-radius: 50%;
    background: rgba(34, 197, 94, 0.9);
    color: white;
    border: none;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    z-index: 30;
    box-shadow: 0 2px 4px rgba(0,0,0,0.2);
}

.slider-button:hover {
    background: rgba(21, 128, 61, 0.9);
    transform: translateY(-50%) scale(1.1);
}

.slider-button:active {
    transform: translateY(-50%) scale(0.95);
}

.slider-button.prev {
    left: 20px;
}

.slider-button.next {
    right: 20px;
}

.slider-button i {
    font-size: 20px;
    line-height: 1;
}

/* Timeline Section */
.timeline {
    position: relative;
}

.timeline::before {
    content: '';
    position: absolute;
    top: 0;
    left: 50%;
    width: 2px;
    height: 100%;
    background: #22c55e;
    transform: translateX(-50%);
}

.timeline-item {
    position: relative;
    margin: 2rem 0;
}

.timeline-content {
    position: relative;
    width: calc(50% - 30px);
}

.timeline-item:nth-child(odd) .timeline-content {
    margin-left: auto;
}

.timeline-dot {
    position: absolute;
    left: 50%;
    top: 50%;
    width: 20px;
    height: 20px;
    background: #22c55e;
    border-radius: 50%;
    transform: translate(-50%, -50%);
}

/* Stats Counter Animation */
@keyframes countUp {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

.stat-count {
    animation: countUp 1s ease-out forwards;
}

/* Glass Effect */
.glass-card {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
}
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="hero-gradient text-white min-h-screen relative overflow-hidden" style="background-image: url('{{ asset('storage/images/aboutbackground.jpg') }}'); background-size: cover; background-position: center;">
    <div class="absolute inset-0 bg-black/65"></div>
    <div class="container mx-auto px-4 py-24 relative z-10">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div class="reveal-on-scroll">
                <h1 class="text-6xl font-bold mb-6 leading-tight">Keindahan Tradisi Anyaman Bambu yang Memukau</h1>
                <p class="text-xl mb-8 text-gray-100">Menggabungkan warisan budaya dengan inovasi, kami menciptakan kerajinan bambu yang berkualitas tinggi seperti dompet, wadah lilin, kepet, sokasi, keranjang, dan tudung saji, setiap karya mewakili cerita dan tradisi leluhur yang terus kami jaga dan kembangkan.</p>
                <div class="flex space-x-4">
                    <a href="#story" class="bg-green-600 text-white px-8 py-4 rounded-full hover:bg-green-700 transition duration-300">
                        Cerita Kami
                    </a>
                    <a href="#products" class="bg-white/10 backdrop-blur text-white px-8 py-4 rounded-full hover:bg-white/20 transition duration-300">
                        Lihat Produk Kami
                    </a>
                </div>
            </div>
            <div class="reveal-on-scroll hidden md:block">
                <img src="{{ asset('storage/images/about.jpeg') }}" alt="Kerajinan Anyaman Bambu" class="w-full h-auto rounded-2xl shadow-2xl transform scale-80 hover:scale-105 transition duration-500">
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-4xl font-bold text-center mb-16">Tim Pengrajin Kami</h2>
        <div class="team-slider-container relative">
            <!-- Slider Buttons -->
            <button class="slider-button prev absolute left-0 top-1/2 transform -translate-y-1/2 bg-green-600 text-white rounded-full p-3 shadow-lg">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="slider-button next absolute right-0 top-1/2 transform -translate-y-1/2 bg-green-600 text-white rounded-full p-3 shadow-lg">
                <i class="fas fa-chevron-right"></i>
            </button>

            <!-- Slider Wrapper -->
            <div class="slider-wrapper overflow-hidden">
                <div class="team-slider flex space-x-4 transition-transform duration-500">
                    @foreach([
                        ['Dian Suastini', 'Produksi', 'Dian Suastini.jpeg'],
                        ['Lani Ernawati', 'Finance', 'Lani Ernawati.jpeg'],
                        ['Dina Permatasari', 'Founder', 'dina.jpeg'],
                        ['Padma Yanti', 'Marketing', 'padma yanti.jpeg'],
                        ['Arya', 'Desainer', 'arya.jpg'],
                    ] as [$name, $role, $img])
                    <div class="team-card flex-shrink-0 w-full sm:w-1/2 md:w-1/4 lg:w-1/5 bg-white p-6 rounded-xl shadow-lg">
                        <img src="{{ asset('storage/images/' . $img) }}" alt="{{ $name }}" class="w-full h-56 object-cover rounded-t-lg mb-4">
                        <div class="team-info text-center">
                            <h3 class="text-2xl font-bold mb-2">{{ $name }}</h3>
                            <p class="mb-4">{{ $role }}</p>
                            <div class="flex justify-center space-x-4">
                                <a href="#" class="text-white hover:text-gray-200 transition-colors">
                                    <i class="fab fa-linkedin text-xl"></i>
                                </a>
                                <a href="#" class="text-white hover:text-gray-200 transition-colors">
                                    <i class="fab fa-instagram text-xl"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Values Section -->
<section class="py-20 bg-gradient-to-r from-teal-400 to-indigo-600 text-white">
    <div class="container mx-auto px-4">
        <h2 class="text-4xl font-bold text-center mb-16">Perjalanan dan Nilai Kami</h2>
        <div class="grid md:grid-cols-3 gap-8">
            @foreach([
                ['Kualitas', 'Mengutamakan kualitas dalam setiap detail produk.', 'fas fa-star text-yellow-400'],
                ['Keberlanjutan', 'Komitmen terhadap praktik ramah lingkungan.', 'fas fa-leaf text-green-500'],
                ['Inovasi', 'Terus berinovasi dalam desain dan teknik.', 'fas fa-lightbulb text-orange-400']
            ] as [$title, $desc, $icon])
            <div class="card-3d p-8 rounded-2xl bg-white shadow-xl hover:shadow-2xl transition duration-300" data-aos="fade-up">
                <i class="{{ $icon }} text-5xl mb-6"></i>
                <h3 class="text-2xl font-bold mb-4 text-gray-800">{{ $title }}</h3>
                <p class="text-gray-600">{{ $desc }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Story Timeline -->
<section id="story" class="py-20 bg-gradient-to-r from-teal-400 to-indigo-600 text-white mb-0">
    <div class="container mx-auto px-4">
        <div class="timeline">
            @foreach([
                ['2024', 'Memulai Usaha', 'Memulai usaha kerajinan bambu dengan produk-produk seperti dompet, wadah lilin, kepet, sokasi, keranjang, dan tudung saji.'],
                ['2024', 'Produk Pertama', 'Menghasilkan produk pertama yang mulai diterima dengan baik oleh pasar.'],
                ['2024', 'Pengembangan Produk', 'Terus mengembangkan berbagai produk bambu dengan sentuhan desain modern dan inovatif.'],
                ['2024', 'Mencapai Target', 'Sudah menghasilkan produk yang diminati dan terus berkembang.']
            ] as [$year, $title, $desc])
            <div class="timeline-item" data-aos="fade-up" data-aos-duration="1500">
                <div class="timeline-dot bg-gradient-to-r from-teal-400 to-indigo-600 shadow-lg"></div>
                <div class="timeline-content p-6 rounded-2xl bg-white bg-opacity-80 shadow-lg">
                    <span class="text-teal-600 font-bold text-2xl">{{ $year }}</span>
                    <h3 class="text-2xl font-bold mb-2 text-gray-800">{{ $title }}</h3>
                    <p class="text-gray-600">{{ $desc }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize AOS
    AOS.init({
        duration: 800,
        once: true,
        offset: 100
    });

    // Scroll Reveal Animation
    const scrollElements = document.querySelectorAll('.reveal-on-scroll');
    
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

    // Stats Counter Animation
    const stats = document.querySelectorAll('.stat-count');
    stats.forEach(stat => {
        const value = stat.innerText;
        stat.style.opacity = '0';
        
        if (elementInView(stat)) {
            setTimeout(() => {
                stat.style.opacity = '1';
                stat.classList.add('animate');
            }, 300);
        }
    });

    // Team Slider Manual Navigation
    let currentIndex = 0;
    const teamSlider = document.querySelector('.team-slider');
    const totalCards = document.querySelectorAll('.team-card').length;
    const cardWidth = 330; // 300px card width + 30px margins
    const prevButton = document.querySelector('.slider-button.prev');
    const nextButton = document.querySelector('.slider-button.next');
    
    // Manual Navigation with Buttons
    const moveSlider = (direction) => {
        if (direction === 'next' && currentIndex < totalCards - 1) {
            currentIndex++;
        } else if (direction === 'prev' && currentIndex > 0) {
            currentIndex--;
        }
        updateSliderPosition();
        updateButtonStates();
    };

    // Update slider position
    const updateSliderPosition = () => {
        teamSlider.style.transform = `translateX(-${currentIndex * cardWidth}px)`;
    };

    // Update button states (disable at ends)
    const updateButtonStates = () => {
        prevButton.disabled = currentIndex === 0;
        nextButton.disabled = currentIndex === totalCards - 1;
        
        // Update button opacity for visual feedback
        prevButton.style.opacity = currentIndex === 0 ? '0.5' : '1';
        nextButton.style.opacity = currentIndex === totalCards - 1 ? '0.5' : '1';
    };

    // Button Click Events
    prevButton.addEventListener('click', () => moveSlider('prev'));
    nextButton.addEventListener('click', () => moveSlider('next'));

    // Drag to Slide Functionality
    let isDragging = false;
    let startPos = 0;
    let currentTranslate = 0;
    let prevTranslate = 0;
    let animationID = 0;

    function touchStart(event) {
        startPos = getPositionX(event);
        isDragging = true;
        animationID = requestAnimationFrame(animation);
        teamSlider.style.cursor = 'grabbing';
    }

    function touchEnd() {
        isDragging = false;
        cancelAnimationFrame(animationID);
        teamSlider.style.cursor = 'grab';

        const movedBy = currentTranslate - prevTranslate;
        
        // Determine if should move to next/prev slide based on move amount
        if (Math.abs(movedBy) > cardWidth / 4) {
            if (movedBy > 0 && currentIndex > 0) {
                currentIndex--;
            } else if (movedBy < 0 && currentIndex < totalCards - 1) {
                currentIndex++;
            }
        }

        updateSliderPosition();
        updateButtonStates();
    }

    function touchMove(event) {
        if (isDragging) {
            const currentPosition = getPositionX(event);
            const moveBy = currentPosition - startPos;
            
            // Calculate new position with boundaries
            const newTranslate = -currentIndex * cardWidth + moveBy;
            const maxTranslate = 0;
            const minTranslate = -(totalCards - 1) * cardWidth;
            
            currentTranslate = Math.max(Math.min(newTranslate, maxTranslate), minTranslate);
        }
    }

    function animation() {
        if (isDragging) {
            teamSlider.style.transform = `translateX(${currentTranslate}px)`;
            requestAnimationFrame(animation);
        }
    }

    function getPositionX(event) {
        return event.type.includes('mouse') ? event.pageX : event.touches[0].pageX;
    }

    // Event Listeners
    teamSlider.addEventListener('mousedown', touchStart);
    teamSlider.addEventListener('touchstart', touchStart);
    teamSlider.addEventListener('mousemove', touchMove);
    teamSlider.addEventListener('touchmove', touchMove);
    window.addEventListener('mouseup', touchEnd);
    teamSlider.addEventListener('touchend', touchEnd);
    
    // Prevent context menu on long press
    teamSlider.addEventListener('contextmenu', e => e.preventDefault());

    // Initial button states
    updateButtonStates();
});
</script>
@endpush
@endsection