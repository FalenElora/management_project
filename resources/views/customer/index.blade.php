@extends('layouts.app')

@section('title', 'Manajemen Customer')

@section('content')
<div class="max-w-6xl mx-auto mt-6">
    <h2 class="text-2xl font-bold mb-4">Manajemen Customer</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('customer.create') }}" 
       class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        + Tambah Customer
    </a>

    <div class="mt-4 bg-white shadow rounded">
        <table class="min-w-full border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border">ID</th>
                    <th class="px-4 py-2 border">Nama</th>
                    <th class="px-4 py-2 border">Alamat</th>
                    <th class="px-4 py-2 border">Nomor Telepon</th>
                    <th class="px-4 py-2 border">Email</th>
                    <th class="px-4 py-2 border">Catatan</th>
                    <th class="px-4 py-2 border">Status</th>
                    <th class="px-4 py-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($customers as $c)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border">{{ $c->id }}</td>
                        <td class="px-4 py-2 border">{{ $c->nama }}</td>
                        <td class="px-4 py-2 border">{{ $c->alamat }}</td>
                        <td class="px-4 py-2 border">{{ $c->nomor_telepon }}</td>
                        <td class="px-4 py-2 border">{{ $c->email ?? '-' }}</td>
                         <td class="px-4 py-2 border">{{ $c->catatan }}</td>
                        <td class="px-4 py-2 border">
                            <span class="px-2 py-1 text-sm rounded 
                                {{ $c->status == 'aktif' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                {{ ucfirst($c->status) }}
                            </span>
                        </td>
                        <td class="px-4 py-2 border">
                            <a href="{{ route('customer.edit', $c->id) }}" 
                               class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 text-sm">Edit</a>
                            <form action="{{ route('customer.destroy', $c->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                    onclick="return confirm('Yakin hapus customer ini?')"
                                    class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 text-sm">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-4">Belum ada data customer</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
