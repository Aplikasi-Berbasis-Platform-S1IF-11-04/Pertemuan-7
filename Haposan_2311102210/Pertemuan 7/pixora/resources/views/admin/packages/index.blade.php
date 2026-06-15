{{-- resources/views/admin/packages/index.blade.php --}}
@extends('admin.layouts.app')

@section('title', 'Manajemen Paket')
@section('subtitle', 'Kelola paket fotografi yang tersedia')

@section('content')
<div class="bg-white rounded-2xl shadow-xl overflow-hidden">
    <div class="px-6 py-5 border-b border-gray-100 flex justify-between items-center">
        <h3 class="text-lg font-extrabold text-gray-800">Daftar Paket Fotografi</h3>
        <button onclick="openModal()" class="bg-gradient-to-r from-rose-500 to-pink-600 text-white px-5 py-2.5 rounded-xl text-sm font-bold shadow-lg hover:shadow-xl transition-all inline-flex items-center gap-2">
            <i class="fas fa-plus text-sm"></i>
            <span>Tambah Paket</span>
        </button>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-extrabold text-gray-500">No</th>
                    <th class="px-6 py-4 text-left text-xs font-extrabold text-gray-500">Nama Paket</th>
                    <th class="px-6 py-4 text-left text-xs font-extrabold text-gray-500">Harga</th>
                    <th class="px-6 py-4 text-left text-xs font-extrabold text-gray-500">Durasi</th>
                    <th class="px-6 py-4 text-left text-xs font-extrabold text-gray-500">Status</th>
                    <th class="px-6 py-4 text-left text-xs font-extrabold text-gray-500">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($packages as $index => $package)
                <tr class="border-t border-gray-100 hover:bg-gray-50 transition">
                    <td class="px-6 py-4 text-sm">{{ $index + 1 }}</td>
                    <td class="px-6 py-4">
                        <div class="font-semibold text-gray-800">{{ $package->name }}</div>
                        <div class="text-xs text-gray-400 mt-0.5">{{ Str::limit($package->description, 50) }}</div>
                    </td>
                    <td class="px-6 py-4 text-sm font-bold text-rose-600">Rp {{ number_format($package->price, 0, ',', '.') }}</td>
                    <td class="px-6 py-4 text-sm">{{ $package->duration_hours }} jam</td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center gap-1 px-2 py-1 rounded-full text-xs font-bold 
                            {{ $package->is_active ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-500' }}">
                            <i class="fas {{ $package->is_active ? 'fa-check-circle' : 'fa-clock' }} text-xs"></i>
                            {{ $package->is_active ? 'Aktif' : 'Nonaktif' }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-2">
                            <button onclick="editPackage({{ $package->id }})" 
                                    class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 transition-all flex items-center justify-center">
                                <i class="fas fa-edit text-sm"></i>
                            </button>
                            <button onclick="confirmDeletePackage({{ $package->id }}, '{{ $package->name }}')" 
                                    class="w-8 h-8 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 transition-all flex items-center justify-center">
                                <i class="fas fa-trash text-sm"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center">
                        <div class="flex flex-col items-center">
                            <i class="fas fa-box-open text-5xl text-gray-300 mb-3"></i>
                            <p class="text-gray-400 font-medium">Belum ada paket</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- MODAL TAMBAH/EDIT PAKET -->
<div id="packageModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 backdrop-blur-sm transition-all duration-300">
    <div class="bg-white rounded-2xl w-full max-w-md mx-4 shadow-2xl">
        <div class="bg-gradient-to-r from-rose-500 to-pink-600 px-5 py-4 rounded-t-2xl">
            <div class="flex justify-between items-center">
                <h3 id="modalTitle" class="text-lg font-bold text-white">Tambah Paket</h3>
                <button onclick="closeModal()" class="text-white/80 hover:text-white">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
        </div>
        
        <form id="packageForm" class="p-5 space-y-4">
            @csrf
            <input type="hidden" id="package_id" name="package_id">
            <input type="hidden" id="form_method" name="_method" value="POST">
            
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Paket</label>
                <input type="text" id="name" name="name" required
                       class="w-full rounded-lg px-4 py-2 border border-gray-200 focus:border-rose-500 focus:ring-2 focus:ring-rose-200 transition-all">
            </div>
            
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Deskripsi</label>
                <textarea id="description" name="description" rows="2" required
                          class="w-full rounded-lg px-4 py-2 border border-gray-200 focus:border-rose-500 focus:ring-2 focus:ring-rose-200 transition-all resize-none"></textarea>
            </div>
            
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Harga</label>
                    <input type="number" id="price" name="price" required
                           class="w-full rounded-lg px-4 py-2 border border-gray-200 focus:border-rose-500 focus:ring-2 focus:ring-rose-200 transition-all">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">DP</label>
                    <input type="number" id="down_payment" name="down_payment"
                           class="w-full rounded-lg px-4 py-2 border border-gray-200 focus:border-rose-500 focus:ring-2 focus:ring-rose-200 transition-all">
                </div>
            </div>
            
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Durasi (Jam)</label>
                    <input type="number" id="duration_hours" name="duration_hours" required
                           class="w-full rounded-lg px-4 py-2 border border-gray-200 focus:border-rose-500 focus:ring-2 focus:ring-rose-200 transition-all">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Foto Edit</label>
                    <input type="number" id="edited_photos" name="edited_photos" required
                           class="w-full rounded-lg px-4 py-2 border border-gray-200 focus:border-rose-500 focus:ring-2 focus:ring-rose-200 transition-all">
                </div>
            </div>
            
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Lokasi</label>
                    <select id="location_type" name="location_type"
                            class="w-full rounded-lg px-4 py-2 border border-gray-200 focus:border-rose-500 focus:ring-2 focus:ring-rose-200 transition-all">
                        <option value="studio">Studio</option>
                        <option value="outdoor">Outdoor</option>
                        <option value="both">Studio & Outdoor</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Status</label>
                    <select id="is_active" name="is_active"
                            class="w-full rounded-lg px-4 py-2 border border-gray-200 focus:border-rose-500 focus:ring-2 focus:ring-rose-200 transition-all">
                        <option value="1">Aktif</option>
                        <option value="0">Nonaktif</option>
                    </select>
                </div>
            </div>
            
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Yang Termasuk</label>
                <input type="text" id="inclusions" name="inclusions"
                       class="w-full rounded-lg px-4 py-2 border border-gray-200 focus:border-rose-500 focus:ring-2 focus:ring-rose-200 transition-all"
                       placeholder="Pisahkan dengan koma">
            </div>
            
            <div class="flex justify-end gap-3 pt-3">
                <button type="button" onclick="closeModal()" 
                        class="px-4 py-2 rounded-lg border border-gray-300 text-gray-600 font-medium hover:bg-gray-50 transition-all">
                    Batal
                </button>
                <button type="submit" 
                        class="px-4 py-2 rounded-lg bg-gradient-to-r from-rose-500 to-pink-600 text-white font-medium hover:shadow-md transition-all">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<form id="delete-package-form" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>

@push('scripts')
<script>
const modal = document.getElementById('packageModal');
const form = document.getElementById('packageForm');
const modalTitle = document.getElementById('modalTitle');
let isEditMode = false;

function openModal() {
    isEditMode = false;
    modalTitle.innerText = 'Tambah Paket';
    form.reset();
    document.getElementById('package_id').value = '';
    document.getElementById('form_method').value = 'POST';
    form.action = '{{ route("admin.packages.store") }}';
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeModal() {
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

function editPackage(id) {
    isEditMode = true;
    modalTitle.innerText = 'Edit Paket';
    
    fetch(`/admin/packages/${id}/edit`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('package_id').value = data.id;
            document.getElementById('name').value = data.name;
            document.getElementById('description').value = data.description;
            document.getElementById('price').value = data.price;
            document.getElementById('down_payment').value = data.down_payment || '';
            document.getElementById('duration_hours').value = data.duration_hours;
            document.getElementById('edited_photos').value = data.edited_photos;
            document.getElementById('location_type').value = data.location_type;
            document.getElementById('is_active').value = data.is_active ? '1' : '0';
            
            let inclusions = data.inclusions ? JSON.parse(data.inclusions).join(', ') : '';
            document.getElementById('inclusions').value = inclusions;
            
            form.action = `/admin/packages/${data.id}`;
            document.getElementById('form_method').value = 'PUT';
            
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        });
}

function confirmDeletePackage(id, name) {
    Swal.fire({
        title: 'Yakin ingin menghapus?',
        html: `Paket <strong class="text-rose-600">${name}</strong> akan dihapus permanen.`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#e11d48',
        cancelButtonColor: '#6b7280',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            const deleteForm = document.getElementById('delete-package-form');
            deleteForm.action = `/admin/packages/${id}`;
            deleteForm.submit();
        }
    });
}

form.addEventListener('submit', function(e) {
    e.preventDefault();
    
    let formData = new FormData(this);
    let inclusions = document.getElementById('inclusions').value.split(',').map(item => item.trim()).filter(item => item);
    formData.set('inclusions', JSON.stringify(inclusions));
    
    let url = this.action;
    let method = document.getElementById('form_method').value;
    
    fetch(url, {
        method: method,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Accept': 'application/json'
        },
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Swal.fire({
                title: 'Berhasil!',
                text: data.message,
                icon: 'success',
                confirmButtonColor: '#e11d48',
                timer: 1500,
                showConfirmButton: true
            }).then(() => {
                location.reload();
            });
        } else {
            let errorMsg = data.message || 'Terjadi kesalahan';
            if (data.errors) {
                errorMsg = Object.values(data.errors).flat().join('\n');
            }
            Swal.fire('Gagal!', errorMsg, 'error');
        }
    })
    .catch(error => {
        Swal.fire('Error!', 'Terjadi kesalahan server', 'error');
    });
});
</script>
@endpush
@endsection