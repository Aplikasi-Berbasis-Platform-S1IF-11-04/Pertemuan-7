@extends('layouts.app')

@section('title', 'Inventory Dashboard')

@section('content')

<div class="mb-4">

    <h1 class="inventory-title">
        📊 Inventory Dashboard
    </h1>

    <p class="text-light opacity-75">
        Monitoring produk, stok, dan SKU perusahaan.
    </p>

</div>

<div class="row g-4 mb-4">

    <div class="col-md-4">
        <div class="stat-card">
            <h6 class="text-light opacity-75">Total Produk</h6>
            <h2 class="fw-bold">
                {{ $inventoryData->count() }}
            </h2>
        </div>
    </div>

    <div class="col-md-4">
        <div class="stat-card">
            <h6 class="text-light opacity-75">Total SKU</h6>
            <h2 class="fw-bold">
                {{ $inventoryData->sum(fn($product) => $product->skus->count()) }}
            </h2>
        </div>
    </div>

    <div class="col-md-4">
        <div class="stat-card">
            <h6 class="text-light opacity-75">Total Stok</h6>
            <h2 class="fw-bold">
                {{ $inventoryData->sum(fn($product) => $product->skus->sum('stock_quantity')) }}
            </h2>
        </div>
    </div>

</div>

<div class="glass-card p-4">

    <div class="table-responsive">

        <table class="table align-middle">

            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>SKU Variants</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>

            <tbody>

            @forelse($inventoryData as $product)

                <tr>

                    <td>
                        <div class="fw-bold fs-6">
                            {{ $product->name }}
                        </div>

                        <small class="text-light opacity-75">
                            Product ID: #{{ $product->id }}
                        </small>
                    </td>

                    <td>
                        <span class="badge bg-light text-dark rounded-pill px-3 py-2">
                            {{ $product->category }}
                        </span>
                    </td>

                    <td class="fw-semibold">
                        Rp {{ number_format($product->base_price, 0, ',', '.') }}
                    </td>

                    <td>

                        @foreach($product->skus as $sku)

                            <div class="mb-2 p-2 rounded"
                                 style="background:rgba(255,255,255,0.05);">

                                <div class="d-flex justify-content-between">

                                    <div>
                                        <code class="fw-bold">
                                            {{ $sku->sku_code }}
                                        </code>

                                        <div class="small mt-1">
                                            {{ $sku->variant_name }}
                                        </div>
                                    </div>

                                    <div>
                                        @if($sku->stock_quantity > 10)
                                            <span class="badge badge-soft-success rounded-pill px-3 py-2">
                                                Stock: {{ $sku->stock_quantity }}
                                            </span>
                                        @elseif($sku->stock_quantity > 0)
                                            <span class="badge badge-soft-warning rounded-pill px-3 py-2">
                                                Low: {{ $sku->stock_quantity }}
                                            </span>
                                        @else
                                            <span class="badge badge-soft-danger rounded-pill px-3 py-2">
                                                Empty
                                            </span>
                                        @endif
                                    </div>

                                </div>

                            </div>

                        @endforeach

                    </td>

                    <td class="text-center">

                        @if($product->skus->sum('stock_quantity') > 0)

                            <span class="badge bg-success rounded-pill px-4 py-2">
                                Available
                            </span>

                        @else

                            <span class="badge bg-danger rounded-pill px-4 py-2">
                                Out of Stock
                            </span>

                        @endif

                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="5" class="text-center py-5">
                        Tidak ada data inventory.
                    </td>
                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection