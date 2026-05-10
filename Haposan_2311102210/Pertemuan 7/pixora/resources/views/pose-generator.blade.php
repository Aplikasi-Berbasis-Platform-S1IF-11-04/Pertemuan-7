{{-- resources/views/pose-generator.blade.php --}}
@extends('layouts.app')

@section('title', 'AI Pose Generator - Pixora')

@section('content')
<section class="relative py-16 bg-gradient-to-r from-purple-600 to-pink-600">
    <div class="container mx-auto px-4 text-center relative z-10">
        <h1 class="text-5xl md:text-6xl font-display font-bold text-white mb-4" data-aos="fade-up">
            AI Pose <span class="text-yellow-300">Generator</span>
        </h1>
        <p class="text-xl text-white/90 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="100">
            Dapatkan ide pose foto terbaik dengan kecerdasan buatan. Gratis & unlimited!
        </p>
    </div>
</section>

<section class="py-12 container mx-auto px-4">
    <div class="grid md:grid-cols-2 gap-8">
        <!-- Left: Generator Form -->
        <div class="glass-card rounded-2xl p-6" data-aos="fade-right">
            <h2 class="text-2xl font-bold mb-6">Generate Pose</h2>
            
            <div class="mb-6">
                <label class="block text-gray-700 mb-2 font-semibold">Pilih Tema</label>
                <select id="poseTheme" class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-rose-500">
                    <option value="wedding">💒 Wedding</option>
                    <option value="prewedding">💍 Prewedding</option>
                    <option value="family">👨‍👩‍👧‍👦 Keluarga</option>
                    <option value="portrait">🎭 Portrait</option>
                    <option value="maternity">🤰 Maternity</option>
                    <option value="graduation">🎓 Graduation</option>
                </select>
            </div>
            
            <div class="mb-6">
                <label class="block text-gray-700 mb-2 font-semibold">Deskripsi Tambahan (Opsional)</label>
                <textarea id="posePrompt" rows="3" class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-rose-500" 
                          placeholder="Contoh: romantic sunset, candid laugh, outdoor garden"></textarea>
            </div>
            
            <div class="mb-6">
                <label class="block text-gray-700 mb-2 font-semibold">Jumlah Hasil</label>
                <div class="flex gap-3">
                    <button class="pose-count-btn w-12 h-12 rounded-xl border-2 border-gray-200 hover:border-rose-500 transition selected" data-count="2">2</button>
                    <button class="pose-count-btn w-12 h-12 rounded-xl border-2 border-gray-200 hover:border-rose-500 transition" data-count="4">4</button>
                </div>
                <input type="hidden" id="poseCount" value="2">
            </div>
            
            <button id="generatePoseBtn" class="w-full bg-gradient-to-r from-rose-500 to-pink-600 text-white py-3 rounded-xl font-semibold hover:shadow-xl transition-all">
                <i class="fas fa-magic mr-2"></i> Generate Pose
            </button>
            
            <div id="poseLoading" class="hidden text-center py-8">
                <div class="loading-spinner w-8 h-8 mx-auto"></div>
                <p class="mt-2 text-gray-500">AI sedang membuatkan referensi pose...</p>
            </div>
        </div>
        
        <!-- Right: Results -->
        <div class="glass-card rounded-2xl p-6" data-aos="fade-left">
            <h2 class="text-2xl font-bold mb-6">Hasil Referensi</h2>
            <div id="poseResults" class="grid grid-cols-2 gap-4 min-h-[400px]">
                <div class="col-span-2 text-center text-gray-400 py-20">
                    <i class="fas fa-images text-5xl mb-3"></i>
                    <p>Pilih tema dan klik Generate untuk melihat referensi pose</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Pose Library Section -->
<section class="py-12 bg-gray-100">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-display font-bold text-center mb-8">Koleksi Pose Populer</h2>
        <div class="overflow-x-auto pb-4">
            <div class="flex gap-4 min-w-max">
                @foreach($poses as $pose)
                <div class="w-64 glass-card rounded-xl overflow-hidden flex-shrink-0">
                    <img src="{{ $pose->image_url }}" alt="{{ $pose->title }}" class="w-full h-48 object-cover">
                    <div class="p-3">
                        <p class="font-semibold text-sm">{{ $pose->title }}</p>
                        <p class="text-xs text-gray-500">{{ ucfirst($pose->category) }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
    document.querySelectorAll('.pose-count-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.pose-count-btn').forEach(b => b.classList.remove('selected', 'border-rose-500', 'bg-rose-50'));
            this.classList.add('selected', 'border-rose-500', 'bg-rose-50');
            document.getElementById('poseCount').value = this.dataset.count;
        });
    });
    
    document.getElementById('generatePoseBtn')?.addEventListener('click', async function() {
        const theme = document.getElementById('poseTheme').value;
        const prompt = document.getElementById('posePrompt').value;
        const count = document.getElementById('poseCount').value;
        
        const loadingDiv = document.getElementById('poseLoading');
        const resultsDiv = document.getElementById('poseResults');
        
        loadingDiv.classList.remove('hidden');
        resultsDiv.innerHTML = '';
        
        try {
            const response = await fetch('{{ route("ai.generate-pose") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ theme: theme, prompt: prompt, count: count })
            });
            
            const data = await response.json();
            loadingDiv.classList.add('hidden');
            
            if (data.images && data.images.length > 0) {
                let html = '';
                data.images.forEach(img => {
                    html += `
                        <div class="glass-card rounded-xl overflow-hidden">
                            <img src="${img.url}" alt="Pose Reference" class="w-full h-48 object-cover">
                            <div class="p-2 text-center">
                                <button class="text-xs text-rose-600 copy-prompt" data-prompt="${img.prompt || ''}">
                                    <i class="fas fa-copy"></i> Gunakan Prompt Ini
                                </button>
                            </div>
                        </div>
                    `;
                });
                resultsDiv.innerHTML = html;
                
                if (data.source === 'local_library') {
                    resultsDiv.innerHTML += `<div class="col-span-2 text-center text-yellow-600 text-sm mt-2">⚠️ ${data.message}</div>`;
                }
            } else {
                resultsDiv.innerHTML = '<div class="col-span-2 text-center text-red-500">Gagal generate pose. Silakan coba lagi.</div>';
            }
        } catch (error) {
            loadingDiv.classList.add('hidden');
            resultsDiv.innerHTML = '<div class="col-span-2 text-center text-red-500">Terjadi kesalahan. Silakan coba lagi nanti.</div>';
        }
    });
    
    document.addEventListener('click', function(e) {
        if (e.target.closest('.copy-prompt')) {
            const prompt = e.target.closest('.copy-prompt').dataset.prompt;
            if (prompt) {
                navigator.clipboard.writeText(prompt);
                alert('Prompt disalin ke clipboard!');
            }
        }
    });
</script>
@endpush
@endsection