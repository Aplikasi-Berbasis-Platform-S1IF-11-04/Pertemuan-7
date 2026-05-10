<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                📸 Manajemen Paket Pixora
            </h2>
            <a href="{{ route('packages.create') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-gradient-to-r from-purple-600 to-indigo-500 rounded-xl text-white font-medium shadow-xl hover:scale-105">
                Tambah Paket
            </a>
        </div>
    </x-slot>
    <div class="py-8 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100">
            <table class="min-w-full divide-y divide-gray-100">
                <thead class="bg-gray-50/50">
                    <tr>
                        <th>NAMA PAKET</th>
                        <th>HARGA</th>
                        <th>STATUS</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-50">
                    @forelse ($packages as $p)
                        <tr class="hover:bg-purple-50/30">
                            <td>{{ $p->name }} <br> <small>{{ Str::limit($p->description, 50) }}</small></td>
                            <td>Rp {{ number_format($p->price, 0, ',', '.') }}</td>
                            <td><span class="text-indigo-600">{{ $p->is_active ? 'Aktif' : 'Non-Aktif' }}</span></td>
                            <td>
                                <a href="{{ route('packages.edit', $p->id) }}">Edit</a>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="text-center">Belum ada paket.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
