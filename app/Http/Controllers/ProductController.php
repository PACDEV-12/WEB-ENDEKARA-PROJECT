<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Menampilkan daftar produk berdasarkan kategori, dengan pagination
     */
    public function index(Request $request)
    {
        // Ambil kategori dari parameter request
        $selectedCategory = $request->get('kategori'); 

        // Validasi kategori jika diperlukan (untuk memastikan hanya kategori yang valid yang dapat diakses)
        $validCategories = ['dompet', 'wadah lilin', 'keranjang', 'sokasi']; // Sesuaikan dengan kategori yang valid
        if ($selectedCategory && !in_array($selectedCategory, $validCategories)) {
            abort(404); // Menampilkan halaman 404 jika kategori tidak valid
        }

        // Ambil produk berdasarkan kategori, jika ada, dan lakukan pagination
        $products = Product::category($selectedCategory)->paginate(12); // 12 produk per halaman

        return view('products.index', compact('products', 'selectedCategory'));
    }

    /**
     * Menampilkan detail produk beserta produk terkait
     */
    public function show($slug)
    {
        // Mencari produk berdasarkan slug
        $product = Product::where('slug', $slug)->firstOrFail();

        // Mengambil produk terkait (dalam kategori yang sama)
        $relatedProducts = $product->relatedProducts(); // Produk terkait diambil dengan limit default 4

        return view('products.show', [
            'product' => $product,
            'relatedProducts' => $relatedProducts,
        ]);
    }
}
