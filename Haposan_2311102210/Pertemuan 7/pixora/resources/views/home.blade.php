{{-- resources/views/home.blade.php --}}
@extends('layouts.app')

@section('title', 'Pixora Studio - Abadikan Momen Terbaik dengan Gaya Modern')

@section('content')
<!-- Hero Section -->
<section class="relative h-screen min-h-[600px] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img src="{{ $hero_bg_image }}" 
             alt="Photography Studio Hero" 
             class="w-full h-full object-cover">
        <div class="absolute inset-0 hero-gradient"></div>
    </div>
    
    <div class="container mx-auto px-4 relative z-10 text-center" data-aos="fade-up">
        <h1 class="text-5xl md:text-7xl font-display font-bold text-white mb-6 leading-tight">
            {{ $hero_title }}
        </h1>
        <p class="text-xl md:text-2xl text-gray-200 mb-8 max-w-2xl mx-auto">
            {{ $hero_subtitle }}
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ $hero_button_link }}" 
               class="group bg-gradient-to-r from-rose-500 to-pink-600 text-white px-8 py-4 rounded-full font-semibold hover:shadow-2xl transition-all inline-flex items-center gap-2">
                <i class="fas fa-camera"></i>
                <span>{{ $hero_button_text }}</span>
                <i class="fas fa-arrow-right group-hover:translate-x-1 transition"></i>
            </a>
            <a href="{{ route('calendar') }}" 
               class="glass text-white px-8 py-4 rounded-full font-semibold hover:bg-white/20 transition-all inline-flex items-center gap-2">
                <i class="fas fa-calendar-alt"></i>
                <span>Booking Sekarang</span>
            </a>
        </div>
        
        <!-- Stats Cards -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-5 mt-16 pt-8">
            <div class="stats-card rounded-2xl p-5 text-center" data-aos="fade-up" data-aos-delay="100" style="background: rgba(0,0,0,0.5); backdrop-filter: blur(10px);">
                <i class="fas fa-smile text-3xl text-rose-400 mb-2"></i>
                <div class="text-3xl font-bold text-white">500+</div>
                <div class="text-gray-300 text-sm">Klien Puas</div>
            </div>
            <div class="stats-card rounded-2xl p-5 text-center" data-aos="fade-up" data-aos-delay="200" style="background: rgba(0,0,0,0.5); backdrop-filter: blur(10px);">
                <i class="fas fa-camera-retro text-3xl text-rose-400 mb-2"></i>
                <div class="text-3xl font-bold text-white">1000+</div>
                <div class="text-gray-300 text-sm">Sesi Foto</div>
            </div>
            <div class="stats-card rounded-2xl p-5 text-center" data-aos="fade-up" data-aos-delay="300" style="background: rgba(0,0,0,0.5); backdrop-filter: blur(10px);">
                <i class="fas fa-images text-3xl text-rose-400 mb-2"></i>
                <div class="text-3xl font-bold text-white">50+</div>
                <div class="text-gray-300 text-sm">Portofolio</div>
            </div>
            <div class="stats-card rounded-2xl p-5 text-center" data-aos="fade-up" data-aos-delay="400" style="background: rgba(0,0,0,0.5); backdrop-filter: blur(10px);">
                <i class="fas fa-star text-3xl text-yellow-400 mb-2"></i>
                <div class="text-3xl font-bold text-white">4.9</div>
                <div class="text-gray-300 text-sm">Rating</div>
            </div>
        </div>
    </div>
    
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
        <i class="fas fa-chevron-down text-white text-2xl"></i>
    </div>
</section>

<!-- About Section -->
<section class="py-20 container mx-auto px-4">
    <div class="grid md:grid-cols-2 gap-12 items-center">
        <div data-aos="fade-right">
            <h2 class="text-4xl md:text-5xl font-display font-bold text-gray-800 mb-4">
                {{ $about_title }}
            </h2>
            <p class="text-gray-600 leading-relaxed mb-6">
                {{ $about_description }}
            </p>
            <div class="flex gap-4">
                <div class="text-center">
                    <div class="text-2xl font-bold text-rose-600">2018</div>
                    <div class="text-sm text-gray-500">Berdiri Sejak</div>
                </div>
                <div class="text-center">
                    <div class="text-2xl font-bold text-rose-600">1000+</div>
                    <div class="text-sm text-gray-500">Project Selesai</div>
                </div>
                <div class="text-center">
                    <div class="text-2xl font-bold text-rose-600">500+</div>
                    <div class="text-sm text-gray-500">Klien Bahagia</div>
                </div>
            </div>
        </div>
        <div data-aos="fade-left">
            <div class="relative">
                <div class="absolute -top-4 -left-4 w-32 h-32 bg-rose-200 rounded-full opacity-50"></div>
                <div class="absolute -bottom-4 -right-4 w-40 h-40 bg-pink-200 rounded-full opacity-50"></div>
                <img src="{{ $about_image }}" 
                     alt="About Pixora" 
                     class="relative z-10 rounded-2xl shadow-xl w-full">
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-20 bg-gray-100">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-4xl md:text-5xl font-display font-bold text-gray-800 mb-4">
                Kenapa <span class="bg-gradient-to-r from-rose-500 to-pink-600 bg-clip-text text-transparent">Memilih Kami</span>
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Kami memberikan pelayanan terbaik untuk momen spesial Anda
            </p>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            @foreach($features as $feature)
            <div class="glass-card rounded-2xl p-6 text-center" data-aos="fade-up">
                <div class="w-16 h-16 bg-rose-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas {{ $feature['icon'] }} text-2xl text-rose-500"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $feature['title'] }}</h3>
                <p class="text-gray-600">{{ $feature['description'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Featured Packages Section -->
<section class="py-20 container mx-auto px-4">
    <div class="text-center mb-12" data-aos="fade-up">
        <h2 class="text-4xl md:text-5xl font-display font-bold text-gray-800 mb-4">
            Paket <span class="bg-gradient-to-r from-rose-500 to-pink-600 bg-clip-text text-transparent">Unggulan</span>
        </h2>
        <p class="text-gray-600 max-w-2xl mx-auto">
            Pilih paket sesuai kebutuhan Anda, dengan kualitas terbaik dan harga terjangkau
        </p>
    </div>
    
    <div class="grid md:grid-cols-3 gap-8">
        @foreach($packages as $index => $package)
        <div class="glass-card rounded-2xl overflow-hidden package-card" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
            @php
                $packageImages = [
                    'https://images.unsplash.com/photo-1519741497674-611481863552?w=600&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=600&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1511895426328-dc8714191300?w=600&h=400&fit=crop'
                ];
            @endphp
            <img src="{{ $packageImages[$index % count($packageImages)] }}" 
                 alt="{{ $package->name }}" 
                 class="w-full h-56 object-cover">
            <div class="p-6">
                <div class="flex justify-between items-start mb-2">
                    <h3 class="text-xl font-bold text-gray-800">{{ $package->name }}</h3>
                    <span class="bg-rose-100 text-rose-600 text-xs px-2 py-1 rounded-full">
                        <i class="fas fa-fire"></i> Popular
                    </span>
                </div>
                <p class="text-gray-600 text-sm mb-4">{{ Str::limit($package->description, 80) }}</p>
                <div class="flex items-baseline gap-1 mb-4">
                    <span class="text-2xl font-bold text-rose-600">Rp {{ number_format($package->price, 0, ',', '.') }}</span>
                    <span class="text-gray-400 text-sm">/sesi</span>
                </div>
                <div class="flex items-center gap-3 text-sm text-gray-500 mb-4">
                    <span><i class="fas fa-clock mr-1"></i> {{ $package->duration_hours }} jam</span>
                    <span><i class="fas fa-image mr-1"></i> {{ $package->edited_photos }} foto</span>
                </div>
                <a href="{{ route('package.detail', $package->slug) }}" 
                   class="block text-center bg-gradient-to-r from-gray-100 to-gray-200 text-gray-700 py-3 rounded-xl font-semibold hover:from-rose-500 hover:to-pink-600 hover:text-white transition-all">
                    <i class="fas fa-info-circle mr-1"></i> Detail Paket
                </a>
            </div>
        </div>
        @endforeach
    </div>
    
    <div class="text-center mt-10">
        <a href="{{ route('packages') }}" class="inline-flex items-center gap-2 text-rose-600 font-semibold hover:gap-3 transition-all">
            Lihat Semua Paket <i class="fas fa-arrow-right"></i>
        </a>
    </div>
</section>

<!-- AI Pose Generator Promo -->
<section class="py-20 bg-gradient-to-r from-rose-600 to-pink-700 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <img src="https://images.unsplash.com/photo-1492691527719-9d1e07e534b4?w=1920&fit=crop" 
             alt="Background" 
             class="w-full h-full object-cover">
    </div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="flex flex-col md:flex-row items-center justify-between gap-12">
            <div class="flex-1 text-white" data-aos="fade-right">
                <div class="flex items-center gap-2 mb-4">
                    <i class="fas fa-robot text-3xl"></i>
                    <span class="text-sm uppercase tracking-wider">AI Powered</span>
                </div>
                <h2 class="text-4xl md:text-5xl font-display font-bold mb-4">
                    Bingung Pilih Pose?
                </h2>
                <p class="text-lg text-white/90 mb-6">
                    Gunakan AI Pose Generator kami! Dapatkan referensi pose sesuai tema yang Anda inginkan secara instan.
                </p>
                <ul class="space-y-2 mb-8">
                    <li class="flex items-center gap-2"><i class="fas fa-check-circle text-yellow-300"></i> 50+ tema tersedia</li>
                    <li class="flex items-center gap-2"><i class="fas fa-check-circle text-yellow-300"></i> Hasil custom sesuai permintaan</li>
                    <li class="flex items-center gap-2"><i class="fas fa-check-circle text-yellow-300"></i> Gratis unlimited</li>
                </ul>
                <a href="{{ route('pose.generator') }}" 
                   class="inline-flex items-center gap-2 bg-white text-rose-600 px-8 py-3 rounded-full font-semibold hover:shadow-xl transition">
                    <i class="fas fa-magic"></i> Coba Sekarang
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            
            <div class="flex-1" data-aos="fade-left">
                <div class="glass rounded-2xl p-4 floating">
                    <img src="https://images.unsplash.com/photo-1542038784456-1ea8e935640e?w=500&h=400&fit=crop" 
                         alt="AI Pose Generator Preview" 
                         class="rounded-xl w-full h-64 object-cover">
                    <div class="flex gap-2 mt-3">
                        <div class="h-1 flex-1 bg-white/30 rounded-full"><div class="w-3/4 h-full bg-white rounded-full"></div></div>
                        <div class="h-1 flex-1 bg-white/30 rounded-full"><div class="w-1/2 h-full bg-white rounded-full"></div></div>
                        <div class="h-1 flex-1 bg-white/30 rounded-full"><div class="w-full h-full bg-white rounded-full"></div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Preview Section -->
<section class="py-20 container mx-auto px-4">
    <div class="text-center mb-12" data-aos="fade-up">
        <h2 class="text-4xl md:text-5xl font-display font-bold text-gray-800 mb-4">
            Galeri <span class="bg-gradient-to-r from-rose-500 to-pink-600 bg-clip-text text-transparent">Karya Kami</span>
        </h2>
        <p class="text-gray-600 max-w-2xl mx-auto">
            Lihat hasil karya terbaik dari para klien kami
        </p>
    </div>
    
    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
        @foreach($gallery_images as $index => $img)
        @if($img)
        <div class="group relative overflow-hidden rounded-xl cursor-pointer" data-aos="fade-up" data-aos-delay="{{ $index * 50 }}">
            <img src="{{ $img }}" 
                 alt="Gallery {{ $index+1 }}" 
                 class="w-full h-64 object-cover transition group-hover:scale-110 duration-500">
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition flex items-end p-4">
                <i class="fas fa-search-plus text-white text-2xl ml-auto"></i>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-20 bg-gray-100">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-4xl md:text-5xl font-display font-bold text-gray-800 mb-4">
                Apa Kata <span class="bg-gradient-to-r from-rose-500 to-pink-600 bg-clip-text text-transparent">Mereka</span>
            </h2>
            <p class="text-gray-600">Pengalaman nyata dari klien kami</p>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            @foreach($testimonials as $index => $testi)
            <div class="glass-card rounded-2xl p-6" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                <div class="flex text-yellow-500 mb-3">
                    @for($i=0; $i<$testi['rating']; $i++) <i class="fas fa-star"></i> @endfor
                </div>
                <p class="text-gray-600 mb-4">"{!! nl2br(e($testi['text'])) !!}"</p>
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-gradient-to-r from-rose-400 to-pink-500 rounded-full flex items-center justify-center text-white font-bold">
                        {{ substr($testi['name'], 0, 1) }}
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-800">{{ $testi['name'] }}</h4>
                        <p class="text-xs text-gray-500"><i class="fas fa-camera mr-1"></i> Customer</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 relative overflow-hidden">
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1492691527719-9d1e07e534b4?w=1920&fit=crop" 
             alt="CTA Background" 
             class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-black/70"></div>
    </div>
    
    <div class="container mx-auto px-4 relative z-10 text-center" data-aos="fade-up">
        <h2 class="text-4xl md:text-5xl font-display font-bold text-white mb-4">
            Siap Mengabadikan Momen Anda?
        </h2>
        <p class="text-xl text-gray-300 mb-8 max-w-2xl mx-auto">
            Booking sekarang dan dapatkan pengalaman fotografi terbaik bersama Pixora
        </p>
        <a href="{{ route('calendar') }}" 
           class="inline-flex items-center gap-2 bg-gradient-to-r from-rose-500 to-pink-600 text-white px-10 py-4 rounded-full text-lg font-semibold hover:shadow-2xl transition-all hover:scale-105">
            <i class="fas fa-calendar-check"></i> Booking Sekarang
        </a>
    </div>
</section>
@endsection