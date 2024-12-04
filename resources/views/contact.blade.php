@extends('layouts.app')

@section('content')
<style>
/* CSS untuk halaman kontak */
.contact-card {
    transition: transform 0.6s ease-in-out, box-shadow 0.6s ease;
}

.contact-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
}

.info-item {
    transition: all 0.3s ease;
}

.info-item:hover {
    transform: scale(1.05);
}

.contact-form input,
.contact-form textarea {
    transition: all 0.3s ease;
}

.contact-form input:focus,
.contact-form textarea:focus {
    scale: 1.02;
    box-shadow: 0 10px 20px -5px rgba(34, 197, 94, 0.2);
}

.submit-btn {
    transition: all 0.4s ease;
}

.submit-btn:hover {
    transform: scale(1.05);
    box-shadow: 0 15px 30px -10px rgba(34, 197, 94, 0.4);
}

.map-container {
    transition: transform 0.5s ease;
}

.map-container:hover {
    transform: scale(1.02);
}

/* Animasi judul */
@keyframes float {
    0% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
    100% { transform: translateY(0px); }
}
</style>

<div class="min-h-screen bg-gradient-to-br from-green-50 via-white to-green-50 py-16">
    <div class="container mx-auto px-4">
        <!-- Header Section -->
        <div class="text-center mb-16 animate-[float_4s_ease-in-out_infinite]">
            <h1 class="text-5xl font-bold text-green-800 mb-4">Hubungi Kami</h1>
            <p class="text-xl text-green-600">Kami Siap Membantu Anda</p>
        </div>

        <div class="grid md:grid-cols-2 gap-12">
            <!-- Contact Information Card -->
            <div class="contact-card bg-white rounded-2xl p-8 shadow-2xl">
                <div class="space-y-8">
                    <div class="info-item flex items-center p-4 bg-green-50 rounded-xl">
                        <i class="fas fa-map-marker-alt text-3xl text-green-600 mr-6"></i>
                        <div>
                            <h3 class="font-semibold text-lg text-green-800">Lokasi</h3>
                            <p>Singaraja, Banjar Dinas Pangussari, Desa Tigawasa.</p>
                        </div>
                    </div>

                    <div class="info-item flex items-center p-4 bg-green-50 rounded-xl">
                        <i class="fas fa-phone text-3xl text-green-600 mr-6"></i>
                        <div>
                            <h3 class="font-semibold text-lg text-green-800">Telepon</h3>
                            <p>+62 831-1996-8872</p>
                        </div>
                    </div>

                    <div class="info-item flex items-center p-4 bg-green-50 rounded-xl">
                        <i class="fas fa-envelope text-3xl text-green-600 mr-6"></i>
                        <div>
                            <h3 class="font-semibold text-lg text-green-800">Email</h3>
                            <p>dina.permatasari@undiksha.ac.id</p>
                        </div>
                    </div>

                    <div class="info-item p-4 bg-green-50 rounded-xl">
                        <h3 class="font-semibold text-lg text-green-800 mb-3">Jam Operasional</h3>
                        <div class="space-y-2">
                            <p>Senin - Jumat: 09.00 - 17.00 WIB</p>
                            <p>Sabtu: 10.00 - 15.00 WIB</p>
                            <p>Minggu & Libur: Tutup</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="contact-card bg-white rounded-2xl p-8 shadow-2xl">
                <form method="POST" action="{{ route('contact.send') }}" class="contact-form space-y-6">
                    @csrf
                    <div>
                        <label class="block text-green-800 font-semibold mb-2">Nama Lengkap</label>
                        <input type="text" name="name" required 
                               class="w-full px-4 py-3 rounded-xl border-2 border-green-200 focus:border-green-500 
                                      focus:ring focus:ring-green-200 focus:ring-opacity-50">
                    </div>

                    <div>
                        <label class="block text-green-800 font-semibold mb-2">Email</label>
                        <input type="email" name="email" required 
                               class="w-full px-4 py-3 rounded-xl border-2 border-green-200 focus:border-green-500 
                                      focus:ring focus:ring-green-200 focus:ring-opacity-50">
                    </div>

                    <div>
                        <label class="block text-green-800 font-semibold mb-2">Nomor Telepon</label>
                        <input type="tel" name="phone" required 
                               class="w-full px-4 py-3 rounded-xl border-2 border-green-200 focus:border-green-500 
                                      focus:ring focus:ring-green-200 focus:ring-opacity-50">
                    </div>

                    <div>
                        <label class="block text-green-800 font-semibold mb-2">Pesan</label>
                        <textarea name="message" rows="5" required 
                                  class="w-full px-4 py-3 rounded-xl border-2 border-green-200 focus:border-green-500 
                                         focus:ring focus:ring-green-200 focus:ring-opacity-50"></textarea>
                    </div>

                    <button type="submit" 
                            class="submit-btn w-full bg-gradient-to-r from-green-600 to-green-500 text-white 
                                   font-bold py-4 rounded-xl hover:from-green-700 hover:to-green-600 
                                   focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">
                        Kirim Pesan
                    </button>
                </form>
            </div>
        </div>

        <!-- Map Section -->
        <div class="mt-16">
            <div class="map-container rounded-2xl overflow-hidden shadow-2xl">
            <div style="position:relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; height: auto;">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d191500.69713416573!2d115.0397079047146!3d-8.279905612627273!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd184eb916cdc15%3A0x5030bfbca830620!2sTigawasa%2C%20Kec.%20Banjar%2C%20Kabupaten%20Buleleng%2C%20Bali!5e0!3m2!1sid!2sid!4v1733239958776!5m2!1sid!2sid" 
        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;" 
        allowfullscreen="" 
        loading="lazy" 
        referrerpolicy="no-referrer-when-downgrade">
    </iframe>
</div>

            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add smooth scroll behavior
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
});
</script>
@endpush
@endsection
