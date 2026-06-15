<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\View\View;

class InventoryController extends Controller
{
    public function index(): View
    {
        $inventoryData = Product::with(['skus' => function($query) {
            $query->orderBy('sku_code', 'asc');
        }])->orderBy('name', 'asc')->get();

        return view('dashboard.inventory', compact('inventoryData'));
    }
}