<?php
// app/Http/Controllers/Admin/LandingPageController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $contents = [
            // Hero Section
            'hero_title' => Setting::get('hero_title', 'Abadikan Momen Terbaik Anda'),
            'hero_subtitle' => Setting::get('hero_subtitle', 'Studio fotografi modern dengan sentuhan AI untuk hasil yang sempurna'),
            'hero_bg_image' => Setting::get('hero_bg_image', '/images/hero-bg.jpg'),
            'hero_button_text' => Setting::get('hero_button_text', 'Lihat Paket'),
            'hero_button_link' => Setting::get('hero_button_link', '/paket'),
            
            // About Section
            'about_title' => Setting::get('about_title', 'Tentang Pixora'),
            'about_description' => Setting::get('about_description', 'Pixora adalah studio fotografi profesional...'),
            'about_image' => Setting::get('about_image', '/images/about.jpg'),
            
            // Features
            'features' => json_decode(Setting::get('features', json_encode([
                ['icon' => 'fa-camera', 'title' => 'Fotografer Profesional', 'description' => 'Tim berpengalaman'],
                ['icon' => 'fa-robot', 'title' => 'AI Powered', 'description' => 'Teknologi canggih'],
                ['icon' => 'fa-clock', 'title' => 'Booking Mudah', 'description' => 'Real-time online']
            ])), true),
            
            // Gallery
            'gallery_images' => json_decode(Setting::get('gallery_images', json_encode([
                '/images/gallery1.jpg',
                '/images/gallery2.jpg',
                '/images/gallery3.jpg',
                '/images/gallery4.jpg',
                '/images/gallery5.jpg',
                '/images/gallery6.jpg'
            ])), true),
            
            // Testimonials
            'testimonials' => json_decode(Setting::get('testimonials', json_encode([
                ['name' => 'Andi & Siska', 'text' => 'Hasil fotonya luar biasa!', 'rating' => 5],
                ['name' => 'Budi', 'text' => 'Booking mudah dan cepat', 'rating' => 5],
                ['name' => 'Citra', 'text' => 'Fotonya aesthetic banget!', 'rating' => 5]
            ])), true),
            
            // Footer
            'footer_text' => Setting::get('footer_text', '© 2024 Pixora Studio. All rights reserved.'),
            'footer_copyright' => Setting::get('footer_copyright', 'Pixora Studio'),
        ];
        
        return view('admin.landing-page.index', compact('contents'));
    }
    
    public function updateHero(Request $request)
    {
        Setting::set('hero_title', $request->hero_title);
        Setting::set('hero_subtitle', $request->hero_subtitle);
        Setting::set('hero_button_text', $request->hero_button_text);
        Setting::set('hero_button_link', $request->hero_button_link);
        
        return redirect()->back()->with('success', 'Hero section berhasil diupdate.');
    }
    
    public function updateAbout(Request $request)
    {
        Setting::set('about_title', $request->about_title);
        Setting::set('about_description', $request->about_description);
        
        return redirect()->back()->with('success', 'About section berhasil diupdate.');
    }
    
    public function updateFeatures(Request $request)
    {
        $features = [];
        if ($request->has('feature_icon')) {
            for ($i = 0; $i < count($request->feature_icon); $i++) {
                $features[] = [
                    'icon' => $request->feature_icon[$i],
                    'title' => $request->feature_title[$i],
                    'description' => $request->feature_description[$i]
                ];
            }
        }
        Setting::set('features', json_encode($features));
        
        return redirect()->back()->with('success', 'Features berhasil diupdate.');
    }
    
    public function updateGallery(Request $request)
    {
        $images = array_filter($request->gallery_images ?? []);
        Setting::set('gallery_images', json_encode($images));
        
        return redirect()->back()->with('success', 'Gallery berhasil diupdate.');
    }
    
    public function updateTestimonials(Request $request)
    {
        $testimonials = [];
        if ($request->has('testimonial_name')) {
            for ($i = 0; $i < count($request->testimonial_name); $i++) {
                $testimonials[] = [
                    'name' => $request->testimonial_name[$i],
                    'text' => $request->testimonial_text[$i],
                    'rating' => $request->testimonial_rating[$i]
                ];
            }
        }
        Setting::set('testimonials', json_encode($testimonials));
        
        return redirect()->back()->with('success', 'Testimonials berhasil diupdate.');
    }
}