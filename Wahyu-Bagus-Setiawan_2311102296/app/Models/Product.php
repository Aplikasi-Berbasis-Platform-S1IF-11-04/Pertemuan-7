<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'base_price', 'category'];

    public function skus(): HasMany
    {
        return $this->hasMany(ProductSku::class, 'product_id');
    }
}