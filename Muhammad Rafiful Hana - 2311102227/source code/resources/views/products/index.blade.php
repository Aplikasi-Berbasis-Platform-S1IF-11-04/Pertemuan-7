{{-- resources/views/products/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('content')
<div class="card-brutal">
    <div class="card-header-brutal">
        <h5><i class="fas fa-boxes" style="color: #c0392b;"></i> Daftar Produk</h5>
        <a href="{{ route('products.create') }}" class="btn-brutal btn-brutal-primary">
            <i class="fas fa-plus"></i> Tambah Produk
        </a>
    </div>

    @if (session('success'))
        <div class="alert-brutal">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert-brutal alert-brutal-danger">
            <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
        </div>
    @endif

    @if ($products->isEmpty())
        <div class="empty-state">
            <i class="fas fa-box-open"></i>
            <h5>Belum ada produk</h5>
            <p style="color: #999;">Mulai tambahkan produk pertama Anda!</p>
            <a href="{{ route('products.create') }}" class="btn-brutal btn-brutal-primary" style="margin-top: 1rem;">
                <i class="fas fa-plus"></i> Tambah Produk
            </a>
        </div>
    @else
        <div style="overflow-x: auto;">
            <table class="table-brutal">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th style="text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $index => $product)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td><strong>{{ $product->nama_produk }}</strong></td>
                            <td>{{ Str::limit($product->deskripsi, 50) ?: '-' }}</td>
                            <td>Rp {{ number_format($product->harga, 0, ',', '.') }}</td>
                            <td>
                                @if ($product->stok > 0)
                                    <span class="badge-brutal badge-brutal-success">{{ $product->stok }}</span>
                                @else
                                    <span class="badge-brutal badge-brutal-danger">Habis</span>
                                @endif
                            </td>
                            <td style="text-align: center;">
                                <div style="display: flex; gap: 0.5rem; justify-content: center; flex-wrap: wrap;">
                                    <a href="{{ route('products.edit', $product) }}" 
                                       class="btn-brutal btn-brutal-warning btn-brutal-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('products.destroy', $product) }}" 
                                          method="POST" 
                                          onsubmit="return confirm('Yakin hapus produk {{ $product->nama_produk }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-brutal btn-brutal-danger btn-brutal-sm">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection