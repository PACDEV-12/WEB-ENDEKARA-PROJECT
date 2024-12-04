<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sovenir Bambu - Anyaman Bambu untuk Hunian Anda">
    <meta name="keywords" content="anyaman bambu, kerajinan tangan, dekorasi bambu, produk bambu, koleksi bambu">
    <meta name="author" content="Sovenir Bambu">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('images/apple-touch-icon.png') }}">

    <title>{{ $title ?? 'Sovenir Bambu - Anyaman Bambu' }}</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- AOS (Animate On Scroll) -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Swiper JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

    <!-- GSAP for Advanced Animations -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

    <!-- Custom Styles for your app (if any) -->
    <link rel="stylesheet" href="{{ mix('dist/assets/app.css') }}">

    <!-- Base Styles -->
    <style>
        /* Smooth Scroll Behavior */
        html {
            scroll-behavior: smooth;
        }

        /* Modern Gradient Animation */
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

        /* Glass Effect */
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }

        /* 3D Card Effect */
        .card-3d {
            transform-style: preserve-3d;
            perspective: 1000px;
            transition: all 0.6s cubic-bezier(0.23, 1, 0.32, 1);
        }

        .card-3d:hover {
            transform: rotateY(10deg) rotateX(10deg) translateY(-10px);
            box-shadow: 20px 20px 60px rgba(0, 0, 0, 0.2);
        }

        /* Team Card Hover Effects */
        .team-slide {
            transition: transform 0.5s ease;
            transform-style: preserve-3d;
        }

        .team-slide:hover {
            transform: translateY(-10px);
        }

        .team-info-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
            padding: 2rem;
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.3s ease;
        }

        .team-slide:hover .team-info-overlay {
            opacity: 1;
            transform: translateY(0);
        }

        /* Loading Spinner */
        .loading-spinner {
            width: 50px;
            height: 50px;
            border: 5px solid #f3f3f3;
            border-top: 5px solid #22c55e;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>

    @stack('styles')
</head>
