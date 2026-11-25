@extends('layout.app')

@section('title', 'Halaman Surat Masuk')

@section('content')

<div class="max-w-7xl mx-auto">

    <h1 class="text-2xl font-bold text-blue-900 mb-3">
        Halaman Surat Masuk
    </h1>

    {{-- Pesan Berhasil --}}
    @if (session('success'))
        <p class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-4">
            {{ session('success') }}
        </p>
    @endif

    {{-- Tombol Tambah Surat --}}
    @can('manage-letters')
        <a href="{{ route('surat-masuk.create') }}"
           class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-3 rounded-lg shadow-sm hover:shadow transition">
            + Tambah Surat
        </a>
    @endcan

    {{-- Pencarian dan Filter --}}
    <form action="{{ route('surat-masuk.index') }}"
          method="GET"
          class="bg-white border border-blue-100 rounded-xl p-4 mt-5 mb-5 shadow-sm">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-3">

            {{-- Pencarian Surat --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Cari Surat
                </label>

                <input type="text"
                       name="q"
                       value="{{ request('q') }}"
                       placeholder="Nomor surat, pengirim, atau perihal..."
                       class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            {{-- Filter Kategori --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Filter Kategori
                </label>

                <select name="category_id"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:outline-none">

                    <option value="">Semua Kategori</option>

                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->nama }}
                        </option>
                    @endforeach

                </select>
            </div>

            {{-- Tombol Cari dan Reset --}}
            <div class="flex items-end gap-2">

                <button type="submit"
                        class="bg-blue-700 hover:bg-blue-800 text-white font-semibold px-5 py-2.5 rounded-lg transition">
                    Cari
                </button>

                <a href="{{ route('surat-masuk.index') }}"
                   class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold px-5 py-2.5 rounded-lg transition">
                    Reset
                </a>

            </div>

        </div>
    </form>

    {{-- Tabel Surat Masuk --}}
    <div class="overflow-x-auto bg-white rounded-xl shadow-sm">

        <table class="w-full border-collapse text-left">

            <thead>
                <tr class="bg-blue-800 text-white">
                    <th class="px-4 py-4 font-semibold">No</th>
                    <th class="px-4 py-4 font-semibold">Nomor Surat</th>
                    <th class="px-4 py-4 font-semibold">Tanggal</th>
                    <th class="px-4 py-4 font-semibold">Pengirim</th>
                    <th class="px-4 py-4 font-semibold">Perihal</th>
                    <th class="px-4 py-4 font-semibold">Aksi</th>
                </tr>
            </thead>

            <tbody class="text-gray-700">

                @forelse ($suratMasuk as $surat)

                    <tr class="border-b border-gray-200 hover:bg-blue-50 transition">

                        {{-- Nomor Urut --}}
                        <td class="px-4 py-4">
                            {{ $suratMasuk->firstItem() + $loop->index }}
                        </td>

                        {{-- Nomor Surat --}}
                        <td class="px-4 py-4 font-medium text-gray-900">
                            {{ $surat->nomor_surat }}
                        </td>

                        {{-- Tanggal --}}
                        <td class="px-4 py-4">
                            {{ $surat->tanggal }}
                        </td>

                        {{-- Pengirim --}}
                        <td class="px-4 py-4">
                            {{ $surat->pengirim }}
                        </td>

                        {{-- Perihal --}}
                        <td class="px-4 py-4">
                            {{ $surat->perihal }}
                        </td>

                        {{-- Aksi --}}
                        <td class="px-4 py-4 whitespace-nowrap">

                            <a href="{{ route('surat-masuk.show', $surat->id) }}"
                               class="inline-block bg-blue-100 hover:bg-blue-200 text-blue-700 px-3 py-2 rounded-md text-sm font-semibold transition">
                                Detail
                            </a>

                            @can('manage-letters')

                                <a href="{{ route('surat-masuk.edit', $surat->id) }}"
                                   class="inline-block bg-amber-100 hover:bg-amber-200 text-amber-700 px-3 py-2 rounded-md text-sm font-semibold transition ml-1">
                                    Edit
                                </a>

                                <form action="{{ route('surat-masuk.destroy', $surat->id) }}"
                                      method="POST"
                                      class="inline-block ml-1"
                                      onsubmit="return confirm('Yakin ingin menghapus surat ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded-md text-sm font-semibold transition">
                                        Hapus
                                    </button>

                                </form>

                            @endcan

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="6"
                            class="px-4 py-8 text-center text-gray-500">
                            Tidak ada surat yang sesuai dengan pencarian.
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    {{-- Pagination --}}
    <div class="mt-5">
        {{ $suratMasuk->links() }}
    </div>

</div>

@endsection
