<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Package extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name', 'slug', 'description', 'price', 'down_payment',
        'duration_hours', 'edited_photos', 'location_type',
        'inclusions', 'thumbnail', 'is_active', 'sort_order'
    ];
    
    protected $casts = [
        'inclusions' => 'array',
        'price' => 'decimal:2',
        'down_payment' => 'decimal:2',
        'is_active' => 'boolean'
    ];
    
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
    
    public function getFormattedPriceAttribute()
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }
    
    public function getFormattedDownPaymentAttribute()
    {
        if ($this->down_payment) {
            return 'Rp ' . number_format($this->down_payment, 0, ',', '.');
        }
        return null;
    }
}