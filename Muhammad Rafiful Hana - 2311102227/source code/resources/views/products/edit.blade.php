{{-- resources/views/products/edit.blade.php --}}
@extends('layouts.app')

@section('title', 'Edit Produk')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8 col-md-10">
        <div class="card-brutal">
            <div class="card-header-brutal">
                <h5><i class="fas fa-edit" style="color: #c0392b;"></i> Edit Produk</h5>
                <a href="{{ route('products.index') }}" class="btn-brutal btn-brutal-sm">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>

            @if ($errors->any())
                <div class="alert-brutal alert-brutal-danger">
                    <i class="fas fa-exclamation-triangle"></i> 
                    <ul style="margin-top: 0.5rem; padding-left: 1.5rem;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('products.update', $product) }}" method="POST">
                @csrf
                @method('PUT')

                <div style="margin-bottom: 1.2rem;">
                    <label for="nama_produk" style="display: block; font-weight: 700; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 0.3rem;">
                        <i class="fas fa-tag"></i> Nama Produk
                    </label>
                    <input type="text" class="form-control-brutal @error('nama_produk') is-invalid @enderror" 
                           id="nama_produk" name="nama_produk" value="{{ old('nama_produk', $product->nama_produk) }}" 
                           placeholder="Masukkan nama produk" required>
                    @error('nama_produk')
                        <div style="color: #c0392b; font-size: 0.8rem; margin-top: 0.3rem;">{{ $message }}</div>
                    @enderror
                </div>

                <div style="margin-bottom: 1.2rem;">
                    <label for="deskripsi" style="display: block; font-weight: 700; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 0.3rem;">
                        <i class="fas fa-align-left"></i> Deskripsi
                    </label>
                    <textarea class="form-control-brutal @error('deskripsi') is-invalid @enderror" 
                              id="deskripsi" name="deskripsi" rows="4" 
                              placeholder="Deskripsi produk (opsional)">{{ old('deskripsi', $product->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <div style="color: #c0392b; font-size: 0.8rem; margin-top: 0.3rem;">{{ $message }}</div>
                    @enderror
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.2rem;">
                    <div>
                        <label for="harga" style="display: block; font-weight: 700; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 0.3rem;">
                            <i class="fas fa-money-bill-wave"></i> Harga (Rp)
                        </label>
                        <input type="number" class="form-control-brutal @error('harga') is-invalid @enderror" 
                               id="harga" name="harga" value="{{ old('harga', $product->harga) }}" 
                               placeholder="0" required min="0">
                        @error('harga')
                            <div style="color: #c0392b; font-size: 0.8rem; margin-top: 0.3rem;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="stok" style="display: block; font-weight: 700; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 0.3rem;">
                            <i class="fas fa-cubes"></i> Stok
                        </label>
                        <input type="number" class="form-control-brutal @error('stok') is-invalid @enderror" 
                               id="stok" name="stok" value="{{ old('stok', $product->stok) }}" 
                               placeholder="0" required min="0">
                        @error('stok')
                            <div style="color: #c0392b; font-size: 0.8rem; margin-top: 0.3rem;">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div style="display: flex; gap: 1rem; justify-content: flex-end; margin-top: 1.5rem; flex-wrap: wrap;">
                    <a href="{{ route('products.index') }}" class="btn-brutal">
                        <i class="fas fa-times"></i> Batal
                    </a>
                    <button type="submit" class="btn-brutal btn-brutal-success">
                        <i class="fas fa-save"></i> Update Produk
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection