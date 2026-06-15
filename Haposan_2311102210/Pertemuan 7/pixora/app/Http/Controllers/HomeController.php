<?php
// app/Http/Controllers/HomeController.php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\PoseReference;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil data dari settings
        $hero_title = Setting::get('hero_title', 'Abadikan Momen Terbaik Anda');
        $hero_subtitle = Setting::get('hero_subtitle', 'Studio fotografi modern dengan sentuhan AI untuk hasil yang sempurna');
        $hero_bg_image = Setting::get('hero_bg_image', 'https://images.unsplash.com/photo-1501281668745-f7f57925c3b4?w=1600&h=900&fit=crop');
        $hero_button_text = Setting::get('hero_button_text', 'Lihat Paket');
        $hero_button_link = Setting::get('hero_button_link', '/paket');
        
        $about_title = Setting::get('about_title', 'Tentang Pixora');
        $about_description = Setting::get('about_description', 'Pixora adalah studio fotografi profesional yang berdedikasi untuk mengabadikan momen-momen berharga dalam hidup Anda.');
        $about_image = Setting::get('about_image', 'https://images.unsplash.com/photo-1492691527719-9d1e07e534b4?w=600');
        
        $features = json_decode(Setting::get('features', json_encode([
            ['icon' => 'fa-camera', 'title' => 'Fotografer Profesional', 'description' => 'Tim berpengalaman dengan portofolio terbaik'],
            ['icon' => 'fa-robot', 'title' => 'AI Powered', 'description' => 'Teknologi AI untuk hasil maksimal'],
            ['icon' => 'fa-clock', 'title' => 'Booking Mudah', 'description' => 'Sistem booking online real-time']
        ])), true);
        
        $gallery_images = json_decode(Setting::get('gallery_images', json_encode([
            'https://images.unsplash.com/photo-1519741497674-611481863552?w=600',
            'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=600',
            'https://images.unsplash.com/photo-1511895426328-dc8714191300?w=600',
            'https://images.unsplash.com/photo-1522673607200-164d1b6ce486?w=600',
            'https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?w=600',
            'https://images.unsplash.com/photo-1504208434309-cb69f4fe52b0?w=600'
        ])), true);
        
        $testimonials = json_decode(Setting::get('testimonials', json_encode([
            ['name' => 'Andi & Siska', 'text' => 'Hasil fotonya luar biasa! Tim Pixora sangat profesional dan ramah. Recomended!', 'rating' => 5],
            ['name' => 'Budi', 'text' => 'Proses booking mudah, AI pose generator-nya sangat membantu kami yang bingung mau pose apa.', 'rating' => 5],
            ['name' => 'Citra', 'text' => 'Fotonya aesthetic banget! Harga terjangkau dengan hasil premium.', 'rating' => 5]
        ])), true);
        
        // Data studio untuk footer
        $studio_name = Setting::get('studio_name', 'Pixora');
        $studio_address = Setting::get('studio_address', 'Jakarta, Indonesia');
        $studio_phone = Setting::get('studio_phone', '+62 812-3456-7890');
        $studio_email = Setting::get('studio_email', 'hello@pixora.com');
        $instagram = Setting::get('instagram', '@pixora.studio');
        $facebook = Setting::get('facebook', 'pixora.studio');
        $tiktok = Setting::get('tiktok', '@pixora');
        $youtube = Setting::get('youtube', 'pixora');
        $open_time = Setting::get('open_time', '08:00');
        $close_time = Setting::get('close_time', '20:00');
        $footer_copyright = Setting::get('footer_copyright', '© 2024 Pixora Studio. All rights reserved.');
        
        $packages = Package::where('is_active', true)->orderBy('sort_order')->take(3)->get();
        $popularPoses = PoseReference::where('is_active', true)->inRandomOrder()->take(8)->get();
        
        return view('home', compact(
            'hero_title', 'hero_subtitle', 'hero_bg_image', 'hero_button_text', 'hero_button_link',
            'about_title', 'about_description', 'about_image', 'features', 'gallery_images',
            'testimonials', 'packages', 'popularPoses',
            'studio_name', 'studio_address', 'studio_phone', 'studio_email',
            'instagram', 'facebook', 'tiktok', 'youtube',
            'open_time', 'close_time', 'footer_copyright'
        ));
    }
    
    public function packages()
    {
        $packages = Package::where('is_active', true)->orderBy('sort_order')->paginate(9);
        return view('packages', compact('packages'));
    }
    
    public function packageDetail($slug)
    {
        $package = Package::where('slug', $slug)->where('is_active', true)->firstOrFail();
        return view('package-detail', compact('package'));
    }
    
    public function poseGenerator()
    {
        $categories = PoseReference::getCategories();
        $poses = PoseReference::where('is_active', true)->orderBy('sort_order')->get();
        return view('pose-generator', compact('categories', 'poses'));
    }
}