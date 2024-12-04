<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'stock',
        'image',
        'category',
    ];

    // Mendefinisikan boot method untuk otomatis generate slug
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            $slug = Str::slug($product->name);

            // Pastikan slug unik, jika sudah ada maka tambahkan angka unik
            $product->slug = Product::where('slug', $slug)->exists() 
                ? $slug . '-' . uniqid() 
                : $slug;
        });
    }

    // Scope untuk kategori
    public function scopeCategory($query, $category)
    {
        return $query->when($category, function ($q) use ($category) {
            return $q->where('category', $category);
        });
    }

    // Relasi produk terkait berdasarkan kategori yang sama
    public function relatedProducts($limit = 4)
    {
        return self::where('category', $this->category)
            ->where('id', '!=', $this->id)
            ->limit($limit)
            ->get();
    }

    // Relasi ke OrderDetail
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
