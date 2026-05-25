<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\ProductSku;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class InventorySeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Wahyu Bagus Setiawan',
            'email' => 'wahyu@example.com',
            'password' => Hash::make('password123'),
        ]);

        $p1 = Product::create(['name' => 'Mechanical Keyboard G-Pro', 'category' => 'Peripherals', 'base_price' => 1200000]);
        ProductSku::create(['product_id' => $p1->id, 'sku_code' => 'KBD-GPRO-BLUE', 'variant_name' => 'Blue Clicky Switch', 'stock_quantity' => 15]);
        ProductSku::create(['product_id' => $p1->id, 'sku_code' => 'KBD-GPRO-RED', 'variant_name' => 'Red Linear Switch', 'stock_quantity' => 4]);

        $p2 = Product::create(['name' => 'Ultra Slim Hoodie Elite', 'category' => 'Apparel', 'base_price' => 450000]);
        ProductSku::create(['product_id' => $p2->id, 'sku_code' => 'HD-ELT-BLK-L', 'variant_name' => 'Jet Black - Size L', 'stock_quantity' => 25]);
        ProductSku::create(['product_id' => $p2->id, 'sku_code' => 'HD-ELT-WHT-M', 'variant_name' => 'Snow White - Size M', 'stock_quantity' => 0]);
    }
}