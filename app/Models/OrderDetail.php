<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = [
        'order_id', 
        'product_id', 
        'quantity', 
        'price'
    ];

    // Relasi dengan order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Relasi dengan product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
