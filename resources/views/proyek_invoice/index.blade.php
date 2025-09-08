@extends('layouts.app')

@section('title', 'Daftar Invoice')

@section('content')
<div class="bg-white shadow rounded-lg p-6">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-lg font-semibold text-gray-700">Daftar Invoice</h2>
        <a href="{{ route('proyek_invoice.create') }}" 
           class="bg-teal-600 hover:bg-teal-700 text-white px-4 py-2 rounded shadow">
           + Tambah Invoice
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full border border-gray-200 rounded-lg">
            <thead class="bg-gray-100 text-gray-600 uppercase text-sm">
                <tr>
                    <th class="py-3 px-4 text-left">No</th>
                    <th class="py-3 px-4 text-left">Nomor Invoice</th>
                    <th class="py-3 px-4 text-left">Judul</th>
                    <th class="py-3 px-4 text-left">Jumlah</th>
                    <th class="py-3 px-4 text-left">Tanggal</th>
                    <th class="py-3 px-4 text-left">Status</th>
                    <th class="py-3 px-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($invoices as $invoice)
                <tr>
                    <td class="py-2 px-4">{{ $loop->iteration }}</td>
                    <td class="py-2 px-4">{{ $invoice->nomor_invoice }}</td>
                    <td class="py-2 px-4">{{ $invoice->judul_invoice }}</td>
                    <td class="py-2 px-4">Rp {{ number_format($invoice->jumlah, 0, ',', '.') }}</td>
                    <td class="py-2 px-4">{{ \Carbon\Carbon::parse($invoice->tanggal_invoice)->format('d/m/Y') }}</td>
                    <td class="py-2 px-4">
                        @if($invoice->status == 'belum_dibayar')
                            <span class="bg-red-100 text-red-700 px-2 py-1 rounded text-xs">Belum Dibayar</span>
                        @elseif($invoice->status == 'diproses')
                            <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded text-xs">Diproses</span>
                        @else
                            <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs">Dibayar</span>
                        @endif
                    </td>
                    <td class="py-2 px-4 text-center space-x-2">
                        <a href="{{ route('proyek_invoice.edit', $invoice->id) }}" 
                           class="text-blue-600 hover:underline">Edit</a>
                        <form action="{{ route('proyek_invoice.destroy', $invoice->id) }}" 
                              method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Yakin hapus invoice?')" 
                                    class="text-red-600 hover:underline">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center py-4 text-gray-500">Belum ada invoice</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
