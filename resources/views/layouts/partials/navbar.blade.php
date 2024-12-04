<nav class="bg-green-600 text-white p-4 shadow-md">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Logo / Brand -->
        <div class="text-xl font-bold">
            <a href="{{ route('home') }}" class="hover:text-green-200">ENDEKARA</a>
        </div>

        <!-- Menu untuk Desktop -->
        <div class="hidden md:flex space-x-6">
            <a href="{{ route('home') }}" class="hover:text-green-200 transition">Beranda</a>
            <a href="{{ route('products.index') }}" class="hover:text-green-200 transition">Produk</a>
            <a href="{{ route('about') }}" class="hover:text-green-200 transition">Tentang</a>
            <a href="{{ route('contact') }}" class="hover:text-green-200 transition">Kontak</a>
        </div>

        <!-- Hamburger Menu untuk Mobile -->
        <div class="md:hidden flex items-center">
            <button id="hamburger" class="text-3xl">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </div>

    <!-- Mobile Menu (Hidden by default) -->
    <div id="mobileMenu" class="md:hidden bg-green-600 text-white space-y-4 p-4 hidden">
        <a href="{{ route('home') }}" class="block hover:text-green-200 transition">Beranda</a>
        <a href="{{ route('products.index') }}" class="block hover:text-green-200 transition">Produk</a>
        <a href="{{ route('about') }}" class="block hover:text-green-200 transition">Tentang</a>
        <a href="{{ route('contact') }}" class="block hover:text-green-200 transition">Kontak</a>
    </div>
</nav>

@push('scripts')
<script>
    // Menangani event hamburger untuk membuka dan menutup menu pada perangkat mobile
    const hamburger = document.getElementById('hamburger');
    const mobileMenu = document.getElementById('mobileMenu');

    hamburger.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>
@endpush
