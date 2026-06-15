{{-- resources/views/admin/customers/index.blade.php --}}
@extends('admin.layouts.app')

@section('title', 'Manajemen Customer')
@section('subtitle', 'Kelola data customer dan blokir akses')

@section('content')
<div class="space-y-6">
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="glass-card rounded-2xl p-5">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Total Customer</p>
                    <p class="text-2xl font-bold">{{ $stats['total'] }}</p>
                </div>
                <i class="fas fa-users text-2xl text-rose-400"></i>
            </div>
        </div>
        <div class="glass-card rounded-2xl p-5">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Customer Aktif</p>
                    <p class="text-2xl font-bold text-green-600">{{ $stats['active'] }}</p>
                </div>
                <i class="fas fa-user-check text-2xl text-green-400"></i>
            </div>
        </div>
        <div class="glass-card rounded-2xl p-5">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Customer Diblokir</p>
                    <p class="text-2xl font-bold text-red-600">{{ $stats['blocked'] }}</p>
                </div>
                <i class="fas fa-user-slash text-2xl text-red-400"></i>
            </div>
        </div>
    </div>
    
    <!-- Filter & Search -->
    <div class="bg-white rounded-xl shadow-sm p-4">
        <form method="GET" class="flex flex-wrap gap-3">
            <input type="text" name="search" placeholder="Cari nama, email, atau no HP..." value="{{ request('search') }}" class="flex-1 border rounded-lg px-4 py-2 text-sm">
            <select name="status" class="border rounded-lg px-4 py-2 text-sm">
                <option value="all">Semua Customer</option>
                <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Aktif</option>
                <option value="blocked" {{ request('status') == 'blocked' ? 'selected' : '' }}>Diblokir</option>
            </select>
            <button type="submit" class="bg-rose-500 text-white px-4 py-2 rounded-lg text-sm">Filter</button>
        </form>
    </div>
    
    <!-- Customer Table -->
    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-500">No</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-500">Customer</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-500">Kontak</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-500">Bergabung</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-500">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-500">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($customers as $index => $customer)
                <tr class="border-t hover:bg-gray-50 transition">
                    <td class="px-6 py-4 text-sm">{{ $index + 1 }}</td>
                    <td class="px-6 py-4">
                        <div class="font-semibold">{{ $customer->name }}</div>
                        <div class="text-xs text-gray-500">{{ $customer->email }}</div>
                    </td>
                    <td class="px-6 py-4 text-sm">{{ $customer->phone ?? '-' }}</td>
                    <td class="px-6 py-4 text-sm">{{ $customer->created_at->format('d/m/Y') }}</td>
                    <td class="px-6 py-4">
                        @if($customer->is_blocked)
                            <span class="inline-flex items-center gap-1 px-2 py-1 rounded-full text-xs font-bold bg-red-100 text-red-700">
                                <i class="fas fa-ban text-xs"></i> Diblokir
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1 px-2 py-1 rounded-full text-xs font-bold bg-green-100 text-green-700">
                                <i class="fas fa-check-circle text-xs"></i> Aktif
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-2">
                            <a href="{{ route('admin.customers.show', $customer->id) }}" class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 flex items-center justify-center">
                                <i class="fas fa-eye text-sm"></i>
                            </a>
                            <button onclick="toggleBlock({{ $customer->id }}, '{{ $customer->name }}', {{ $customer->is_blocked ? 'true' : 'false' }})" class="w-8 h-8 rounded-lg bg-yellow-50 text-yellow-600 hover:bg-yellow-100 flex items-center justify-center">
                                <i class="fas {{ $customer->is_blocked ? 'fa-user-check' : 'fa-user-slash' }} text-sm"></i>
                            </button>
                            <button onclick="confirmDelete({{ $customer->id }}, '{{ $customer->name }}')" class="w-8 h-8 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 flex items-center justify-center">
                                <i class="fas fa-trash text-sm"></i>
                            </button>
                        </div>
                    </td>
                </table>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center text-gray-500">Tidak ada data customer</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <div class="mt-4">
        {{ $customers->links() }}
    </div>
</div>

@push('scripts')
<script>
function toggleBlock(id, name, isBlocked) {
    let title = isBlocked ? 'Unblock Customer?' : 'Blokir Customer?';
    let text = isBlocked ? `Yakin ingin mengaktifkan kembali ${name}?` : `Yakin ingin memblokir ${name}? Customer tidak bisa login dan booking.`;
    let confirmText = isBlocked ? 'Ya, Unblock!' : 'Ya, Blokir!';
    
    Swal.fire({
        title: title,
        html: text,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#e11d48',
        cancelButtonColor: '#6b7280',
        confirmButtonText: confirmText,
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            fetch(`/admin/customers/${id}/toggle-block`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                Swal.fire('Berhasil!', data.message, 'success').then(() => {
                    location.reload();
                });
            });
        }
    });
}

function confirmDelete(id, name) {
    Swal.fire({
        title: 'Hapus Customer?',
        html: `Customer <strong>${name}</strong> akan dihapus permanen beserta semua bookingnya.`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#e11d48',
        cancelButtonColor: '#6b7280',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            fetch(`/admin/customers/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                Swal.fire('Terhapus!', data.message, 'success').then(() => {
                    location.reload();
                });
            });
        }
    });
}
</script>
@endpush
@endsection