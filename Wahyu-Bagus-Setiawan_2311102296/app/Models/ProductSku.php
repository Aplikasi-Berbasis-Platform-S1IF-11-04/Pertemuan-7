<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductSku extends Model
{
    use HasFactory;

    protected $table = 'product_skus';
    protected $fillable = ['product_id', 'sku_code', 'variant_name', 'stock_quantity'];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}