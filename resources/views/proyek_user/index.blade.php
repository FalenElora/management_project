@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-6">
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-2xl font-semibold">Daftar Proyek User</h2>
        <a href="{{ route('proyek_user.create') }}"
           class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700">
           + Tambah Proyek User
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="w-full text-sm text-left border-collapse">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border">No</th>
                    <th class="px-4 py-2 border">Proyek</th>
                    <th class="px-4 py-2 border">User</th>
                    <th class="px-4 py-2 border">Sebagai</th>
                    <th class="px-4 py-2 border">Keterangan</th>
                    <th class="px-4 py-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $index => $item)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border">{{ $index+1 }}</td>
                        <td class="px-4 py-2 border">{{ $item->proyek->nama ?? '-' }}</td>
                        <td class="px-4 py-2 border">{{ $item->user->name ?? '-' }}</td>
                        <td class="px-4 py-2 border capitalize">{{ $item->sebagai }}</td>
                        <td class="px-4 py-2 border">{{ $item->keterangan ?? '-' }}</td>
                        <td class="px-4 py-2 border flex gap-2">
                            <a href="{{ route('proyek_user.edit',$item->id) }}"
                               class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 text-xs">
                               Edit
                            </a>
                            <form action="{{ route('proyek_user.destroy',$item->id) }}" method="POST"
                                  onsubmit="return confirm('Yakin hapus data ini?')">
                                @csrf @method('DELETE')
                                <button type="submit"
                                    class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 text-xs">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-4 text-center text-gray-500">
                            Belum ada Proyek User
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
