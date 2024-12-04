<!DOCTYPE html>
<html lang="id">
<head>
    @include('layouts.partials.head')
    <title>{{ $title ?? 'Sovenir Anyaman Bambu' }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Swiper JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    
    <!-- AOS - Animate On Scroll -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>

    <style>
        /* Base Styles */
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        /* Smooth Scroll */
        html {
            scroll-behavior: smooth;
        }

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

        /* Glass Effect */
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }

        /* Enhanced ScrollTop Button */
        #scrollTopBtn {
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease-in-out;
            background: rgba(5, 150, 105, 0.9);
            backdrop-filter: blur(4px);
        }

        #scrollTopBtn.visible {
            opacity: 1;
            visibility: visible;
        }

        #scrollTopBtn:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(5, 150, 105, 0.2);
        }

        /* Loading Animation */
        .loader {
            border-top-color: #059669;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>

    @stack('styles')
</head>
<body class="min-h-screen bg-gray-50 text-gray-800 flex flex-col">
    <!-- Loading Screen -->
    <div id="loader" class="fixed inset-0 z-50 flex items-center justify-center bg-white">
        <div class="w-16 h-16 border-4 border-gray-200 border-t-emerald-500 rounded-full loader"></div>
    </div>

    <!-- Navbar -->
    @include('layouts.partials.navbar')

    <!-- Main Content -->
    <main class="flex-grow transition-all ease-in-out duration-300">
        @yield('content')
    </main>

    <!-- Footer -->
    @include('layouts.partials.footer')

    <!-- Enhanced Scroll to Top Button -->
    <button id="scrollTopBtn" 
            class="fixed bottom-8 right-8 p-4 rounded-full shadow-lg focus:outline-none z-50 glass-effect">
        <i class="fas fa-arrow-up text-white"></i>
    </button>

    @stack('scripts')

    <!-- Core JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize AOS
            AOS.init({
                duration: 1000,
                once: true,
                offset: 100
            });

            // Hide loader when page is loaded
            window.addEventListener('load', function() {
                document.getElementById('loader').style.opacity = '0';
                setTimeout(() => {
                    document.getElementById('loader').style.display = 'none';
                }, 500);
            });

            // Enhanced scroll to top functionality
            const scrollBtn = document.getElementById('scrollTopBtn');
            
            window.onscroll = function() {
                if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
                    scrollBtn.classList.add('visible');
                } else {
                    scrollBtn.classList.remove('visible');
                }

                // Update navbar background based on scroll
                const navbar = document.querySelector('nav');
                if (window.scrollY > 50) {
                    navbar.classList.add('glass-effect');
                } else {
                    navbar.classList.remove('glass-effect');
                }
            };

            scrollBtn.onclick = function() {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            };

            // Scroll reveal animation
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

            // Initial check for elements
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
        });
    </script>
</body>
</html>