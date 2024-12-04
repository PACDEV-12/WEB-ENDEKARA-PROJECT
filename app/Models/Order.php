<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'customer_id', 
        'total_amount', 
        'status'
    ];

    // Status pesanan
    const STATUS_PENDING = 'pending';
    const STATUS_PROCESSED = 'diproses';
    const STATUS_SHIPPED = 'dikirim';
    const STATUS_COMPLETED = 'selesai';

    // Relasi dengan customer
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // Relasi dengan order details
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}