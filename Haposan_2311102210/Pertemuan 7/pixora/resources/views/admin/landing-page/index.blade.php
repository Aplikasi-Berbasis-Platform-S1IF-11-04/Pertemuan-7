{{-- resources/views/admin/landing-page/index.blade.php --}}
@extends('admin.layouts.app')

@section('title', 'Edit Landing Page')
@section('subtitle', 'Kelola konten halaman utama website')

@section('content')
<div class="space-y-6">
    <!-- Hero Section -->
    <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white">
            <h3 class="text-lg font-bold text-gray-800">
                <i class="fas fa-star text-rose-500 mr-2"></i>
                Hero Section
            </h3>
        </div>
        
        <form method="POST" action="{{ route('admin.landing-page.hero') }}" class="p-6 space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Judul Hero</label>
                <input type="text" name="hero_title" value="{{ $contents['hero_title'] }}" 
                       class="w-full rounded-lg px-4 py-2.5 border border-gray-200 focus:border-rose-500 focus:ring-2 focus:ring-rose-200 transition-all">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Subtitle Hero</label>
                <textarea name="hero_subtitle" rows="2" 
                          class="w-full rounded-lg px-4 py-2.5 border border-gray-200 focus:border-rose-500 focus:ring-2 focus:ring-rose-200 transition-all">{{ $contents['hero_subtitle'] }}</textarea>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Tombol Teks</label>
                    <input type="text" name="hero_button_text" value="{{ $contents['hero_button_text'] }}" 
                           class="w-full rounded-lg px-4 py-2.5 border border-gray-200 focus:border-rose-500 focus:ring-2 focus:ring-rose-200 transition-all">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Tombol Link</label>
                    <input type="text" name="hero_button_link" value="{{ $contents['hero_button_link'] }}" 
                           class="w-full rounded-lg px-4 py-2.5 border border-gray-200 focus:border-rose-500 focus:ring-2 focus:ring-rose-200 transition-all">
                </div>
            </div>
            <div class="pt-3">
                <button type="submit" class="bg-rose-500 text-white px-5 py-2 rounded-lg font-semibold hover:bg-rose-600 transition-all">
                    Simpan Hero Section
                </button>
            </div>
        </form>
    </div>
    
    <!-- About Section -->
    <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white">
            <h3 class="text-lg font-bold text-gray-800">
                <i class="fas fa-info-circle text-rose-500 mr-2"></i>
                About Section
            </h3>
        </div>
        
        <form method="POST" action="{{ route('admin.landing-page.about') }}" class="p-6 space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Judul About</label>
                <input type="text" name="about_title" value="{{ $contents['about_title'] }}" 
                       class="w-full rounded-lg px-4 py-2.5 border border-gray-200 focus:border-rose-500 focus:ring-2 focus:ring-rose-200 transition-all">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Deskripsi About</label>
                <textarea name="about_description" rows="4" 
                          class="w-full rounded-lg px-4 py-2.5 border border-gray-200 focus:border-rose-500 focus:ring-2 focus:ring-rose-200 transition-all">{{ $contents['about_description'] }}</textarea>
            </div>
            <div class="pt-3">
                <button type="submit" class="bg-rose-500 text-white px-5 py-2 rounded-lg font-semibold hover:bg-rose-600 transition-all">
                    Simpan About Section
                </button>
            </div>
        </form>
    </div>
    
    <!-- Features Section -->
    <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white flex justify-between items-center">
            <div>
                <h3 class="text-lg font-bold text-gray-800">
                    <i class="fas fa-list-check text-rose-500 mr-2"></i>
                    Features Section
                </h3>
            </div>
            <button type="button" onclick="addFeature()" class="text-rose-500 hover:text-rose-600 text-sm">
                <i class="fas fa-plus mr-1"></i> Tambah Feature
            </button>
        </div>
        
        <form method="POST" action="{{ route('admin.landing-page.features') }}" id="featuresForm" class="p-6 space-y-4">
            @csrf
            <div id="featuresContainer">
                @foreach($contents['features'] as $index => $feature)
                <div class="feature-item border border-gray-100 rounded-lg p-4 mb-3 bg-gray-50">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                        <input type="text" name="feature_icon[]" value="{{ $feature['icon'] }}" placeholder="Icon (fa-camera)" class="rounded-lg px-3 py-2 border border-gray-200">
                        <input type="text" name="feature_title[]" value="{{ $feature['title'] }}" placeholder="Judul" class="rounded-lg px-3 py-2 border border-gray-200">
                        <input type="text" name="feature_description[]" value="{{ $feature['description'] }}" placeholder="Deskripsi" class="rounded-lg px-3 py-2 border border-gray-200">
                    </div>
                    <button type="button" onclick="removeFeature(this)" class="text-red-500 text-xs mt-2 hover:text-red-600">Hapus</button>
                </div>
                @endforeach
            </div>
            <div class="pt-3">
                <button type="submit" class="bg-rose-500 text-white px-5 py-2 rounded-lg font-semibold hover:bg-rose-600 transition-all">
                    Simpan Features
                </button>
            </div>
        </form>
    </div>
    
    <!-- Testimonials Section -->
    <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white flex justify-between items-center">
            <div>
                <h3 class="text-lg font-bold text-gray-800">
                    <i class="fas fa-comment-dots text-rose-500 mr-2"></i>
                    Testimonials
                </h3>
            </div>
            <button type="button" onclick="addTestimonial()" class="text-rose-500 hover:text-rose-600 text-sm">
                <i class="fas fa-plus mr-1"></i> Tambah Testimonial
            </button>
        </div>
        
        <form method="POST" action="{{ route('admin.landing-page.testimonials') }}" id="testimonialsForm" class="p-6 space-y-4">
            @csrf
            <div id="testimonialsContainer">
                @foreach($contents['testimonials'] as $index => $testimonial)
                <div class="testimonial-item border border-gray-100 rounded-lg p-4 mb-3 bg-gray-50">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                        <input type="text" name="testimonial_name[]" value="{{ $testimonial['name'] }}" placeholder="Nama" class="rounded-lg px-3 py-2 border border-gray-200">
                        <textarea name="testimonial_text[]" placeholder="Testimoni" class="rounded-lg px-3 py-2 border border-gray-200">{{ $testimonial['text'] }}</textarea>
                        <select name="testimonial_rating[]" class="rounded-lg px-3 py-2 border border-gray-200">
                            <option value="5" {{ $testimonial['rating'] == 5 ? 'selected' : '' }}>★★★★★ (5)</option>
                            <option value="4" {{ $testimonial['rating'] == 4 ? 'selected' : '' }}>★★★★☆ (4)</option>
                            <option value="3" {{ $testimonial['rating'] == 3 ? 'selected' : '' }}>★★★☆☆ (3)</option>
                        </select>
                    </div>
                    <button type="button" onclick="removeTestimonial(this)" class="text-red-500 text-xs mt-2 hover:text-red-600">Hapus</button>
                </div>
                @endforeach
            </div>
            <div class="pt-3">
                <button type="submit" class="bg-rose-500 text-white px-5 py-2 rounded-lg font-semibold hover:bg-rose-600 transition-all">
                    Simpan Testimonials
                </button>
            </div>
        </form>
    </div>
    
    <!-- Gallery Section -->
    <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white">
            <h3 class="text-lg font-bold text-gray-800">
                <i class="fas fa-images text-rose-500 mr-2"></i>
                Gallery Images
            </h3>
            <p class="text-xs text-gray-500 mt-1">Masukkan URL gambar dari Unsplash atau upload folder</p>
        </div>
        
        <form method="POST" action="{{ route('admin.landing-page.gallery') }}" class="p-6 space-y-4">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
                @foreach($contents['gallery_images'] as $index => $image)
                <input type="text" name="gallery_images[]" value="{{ $image }}" placeholder="URL Gambar {{ $index+1 }}" 
                       class="rounded-lg px-3 py-2 border border-gray-200 focus:border-rose-500 focus:ring-2 focus:ring-rose-200 transition-all">
                @endforeach
                @for($i = count($contents['gallery_images']); $i < 6; $i++)
                <input type="text" name="gallery_images[]" value="" placeholder="URL Gambar {{ $i+1 }}" 
                       class="rounded-lg px-3 py-2 border border-gray-200 focus:border-rose-500 focus:ring-2 focus:ring-rose-200 transition-all">
                @endfor
            </div>
            <div class="pt-3">
                <button type="submit" class="bg-rose-500 text-white px-5 py-2 rounded-lg font-semibold hover:bg-rose-600 transition-all">
                    Simpan Gallery
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
function addFeature() {
    const container = document.getElementById('featuresContainer');
    const newFeature = document.createElement('div');
    newFeature.className = 'feature-item border border-gray-100 rounded-lg p-4 mb-3 bg-gray-50';
    newFeature.innerHTML = `
        <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
            <input type="text" name="feature_icon[]" placeholder="Icon (fa-camera)" class="rounded-lg px-3 py-2 border border-gray-200">
            <input type="text" name="feature_title[]" placeholder="Judul" class="rounded-lg px-3 py-2 border border-gray-200">
            <input type="text" name="feature_description[]" placeholder="Deskripsi" class="rounded-lg px-3 py-2 border border-gray-200">
        </div>
        <button type="button" onclick="removeFeature(this)" class="text-red-500 text-xs mt-2 hover:text-red-600">Hapus</button>
    `;
    container.appendChild(newFeature);
}

function removeFeature(btn) {
    btn.closest('.feature-item').remove();
}

function addTestimonial() {
    const container = document.getElementById('testimonialsContainer');
    const newTestimonial = document.createElement('div');
    newTestimonial.className = 'testimonial-item border border-gray-100 rounded-lg p-4 mb-3 bg-gray-50';
    newTestimonial.innerHTML = `
        <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
            <input type="text" name="testimonial_name[]" placeholder="Nama" class="rounded-lg px-3 py-2 border border-gray-200">
            <textarea name="testimonial_text[]" placeholder="Testimoni" class="rounded-lg px-3 py-2 border border-gray-200"></textarea>
            <select name="testimonial_rating[]" class="rounded-lg px-3 py-2 border border-gray-200">
                <option value="5">★★★★★ (5)</option>
                <option value="4">★★★★☆ (4)</option>
                <option value="3">★★★☆☆ (3)</option>
            </select>
        </div>
        <button type="button" onclick="removeTestimonial(this)" class="text-red-500 text-xs mt-2 hover:text-red-600">Hapus</button>
    `;
    container.appendChild(newTestimonial);
}

function removeTestimonial(btn) {
    btn.closest('.testimonial-item').remove();
}
</script>
@endpush
@endsection