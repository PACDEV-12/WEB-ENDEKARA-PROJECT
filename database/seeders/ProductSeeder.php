<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Contoh: Menyimpan gambar menggunakan Storage
        $this->storeImage('dompet1.jpeg');
        $this->storeImage('lilin1.jpeg');
        $this->storeImage('keranjang.jpeg');
        $this->storeImage('sokasi1.jpeg');
        $this->storeImage('kepet1.jpeg');


        Product::create([
            'name' => 'Sokasi Bali',
            'slug' => 'sokasi-bali',
            'description' => 'Sokasi Bali adalah wadah bambu tradisional yang digunakan untuk menyimpan makanan atau bahan alami.',
            'price' => 130000,
            'stock' => 15,
            'image' => 'sokasi1.jpeg',
            'category' => 'sokasi',
        ]);

        Product::create([
            'name' => 'Kipas Bambu Bali',
            'slug' => 'kipas-bambu-bali',
            'description' => 'Kipas Bambu Bali adalah kerajinan tangan tradisional yang terbuat dari bambu, digunakan sebagai alat pendingin alami dengan desain khas Bali.',
            'price' => 45000, // Ganti harga sesuai kebutuhan
            'stock' => 20, // Ganti stok sesuai kebutuhan
            'image' => 'kepet1.jpeg', // Ganti dengan nama gambar yang sesuai
            'category' => 'kepet',
        ]);

        Product::create([
            'name' => 'Keranjang Bambu',
            'slug' => 'keranjang-bambu',
            'description' => 'Keranjang bambu yang terbuat dari bahan alami dengan desain elegan, ideal untuk menyimpan barang atau sebagai dekorasi rumah.',
            'price' => 30000,
            'stock' => 15,
            'image' => 'lilin1.jpeg',
            'category' => 'keranjang',
        ]);

        // Menambahkan data produk
        Product::create([
            'name' => 'Dompet Bambu',
            'slug' => 'dompet-bambu',
            'description' => 'Dompet bambu handmade untuk gaya hidup ramah lingkungan.',
            'price' => 64000,
            'stock' => 10,
            'image' => 'dompet1.jpeg', // Nama gambar
            'category' => 'dompet',
        ]);

        Product::create([
            'name' => 'Hampers Bali',
            'slug' => 'Hampers-bali',
            'description' => 'Hampers Bali adalah paket hadiah istimewa yang dikemas dengan menggunakan bambu berkualitas tinggi. Didesain secara tradisional dengan sentuhan khas Bali, hampers ini cocok untuk berbagai acara spesial seperti pernikahan, ulang tahun, dan perayaan lainnya.',
            'price' => 150000, // Ganti harga sesuai kebutuhan
            'stock' => 20, // Ganti stok sesuai kebutuhan
            'image' => 'hampers.jpeg', // Ganti dengan nama gambar yang sesuai
            'category' => 'lainnya',
        ]);

        Product::create([
            'name' => 'Tudung Jajan Endek',
            'slug' => 'tudung-jajan-endek',
            'description' => 'Tudung Jajan Endek adalah penutup makanan tradisional Bali yang terbuat dari bambu berkualitas tinggi dan dihiasi dengan kain endek Bali. Digunakan secara luas dalam acara pernikahan dan perayaan lainnya, tudung jajan ini berfungsi untuk menjaga makanan tetap terjaga kebersihannya dan memberikan sentuhan khas Bali pada setiap hidangan.',
            'price' => 80000, // Ganti harga sesuai kebutuhan
            'stock' => 20, // Ganti stok sesuai kebutuhan
            'image' => 'tudung.jpeg', // Ganti dengan nama gambar yang sesuai
            'category' => 'tudung saji',
        ]);

        Product::create([
            'name' => 'Ingke Bali',
            'slug' => 'ingke-bali',
            'description' => 'Ingke Bali adalah tempat wadah makan tradisional yang terbuat dari bambu berkualitas tinggi. Didesain dengan sentuhan khas Bali, ingke ini sempurna untuk menyajikan hidangan dalam berbagai acara spesial seperti pernikahan, ulang tahun, dan perayaan lainnya.',
            'price' => 30000, // Ganti harga sesuai kebutuhan
            'stock' => 20, // Ganti stok sesuai kebutuhan
            'image' => 'ingke.jpeg', // Ganti dengan nama gambar yang sesuai
            'category' => 'lainnya',
        ]);

        Product::create([
            'name' => 'Packaging Bali',
            'slug' => 'packaging-bali',
            'description' => 'Packaging Bali adalah kemasan tradisional yang dibuat dari bambu berkualitas tinggi. Didesain dengan sentuhan khas Bali, packaging ini cocok digunakan untuk membungkus berbagai jenis produk seperti makanan, souvenir, atau hadiah dalam acara spesial seperti pernikahan, ulang tahun, dan perayaan lainnya.',
            'price' => 8000, // Ganti harga sesuai kebutuhan
            'stock' => 20, // Ganti stok sesuai kebutuhan
            'image' => 'packaging.jpeg', // Ganti dengan nama gambar yang sesuai
            'category' => 'lainnya',
        ]);

        Product::create([
            'name' => 'Wadah Lilin',
            'slug' => 'wadah-lilin',
            'description' => 'Wadah lilin elegan dari bambu alami, cocok untuk dekorasi.',
            'price' => 25000,
            'stock' => 15,
            'image' => 'lilin2.jpeg',
            'category' => 'wadah lilin',
        ]);



    }

    /**
     * Fungsi untuk menyimpan gambar ke dalam storage/public/images
     */
    private function storeImage($imageName)
    {
        // Pastikan file gambar ada di folder yang sesuai (misal di folder 'public/images')
        $imagePath = public_path('images/' . $imageName);

        if (file_exists($imagePath)) {
            Storage::disk('public')->put('images/' . $imageName, file_get_contents($imagePath));
        }
    }
}


