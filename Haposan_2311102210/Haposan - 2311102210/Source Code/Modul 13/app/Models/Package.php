<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    
    protected $fillable = ['name', 'price', 'description'];

    // Menandakan 1 Package berhak memiliki banyak Booking
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
