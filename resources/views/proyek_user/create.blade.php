@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-6">
    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-xl font-semibold mb-4">Tambah Proyek User</h2>

        <form action="{{ route('proyek_user.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block mb-1 font-medium">Proyek</label>
                <select name="proyek_id" class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-300" required>
                    <option value="">-- Pilih Proyek --</option>
                    @foreach($proyek as $p)
                        <option value="{{ $p->id }}">{{ $p->nama_proyek }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block mb-1 font-medium">User</label>
                <select name="user_id" class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-300" required>
                    <option value="">-- Pilih User --</option>
                    @foreach($users as $u)
                        <option value="{{ $u->id }}">{{ $u->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block mb-1 font-medium">Sebagai</label>
                <select name="sebagai" class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-300" required>
                    <option value="manajer proyek">Manajer Proyek</option>
                    <option value="programmer">Programmer</option>
                    <option value="tester">Tester</option>
                </select>
            </div>

            <div>
                <label class="block mb-1 font-medium">Keterangan</label>
                <textarea name="keterangan" class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-300"></textarea>
            </div>

            <div class="flex gap-2">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700">
                    Simpan
                </button>
                <a href="{{ route('proyek_user.index') }}"
                   class="px-4 py-2 bg-gray-500 text-white rounded-lg shadow hover:bg-gray-600">
                   Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
