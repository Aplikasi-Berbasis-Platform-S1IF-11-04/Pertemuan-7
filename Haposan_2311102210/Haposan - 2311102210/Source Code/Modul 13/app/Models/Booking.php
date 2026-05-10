<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'booking_code', 'customer_name', 'customer_email', 'package_id', 'booking_date', 'total_price'
    ];

    // Menandakan spesifikasi Booking ini merupakan milik 1 Package mutlak
    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
