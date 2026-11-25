@extends('layout.app')

@section('title', 'Detail Surat Keluar')

@section('content')

<div class="max-w-3xl mx-auto">

    {{-- Judul Halaman --}}
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-blue-900">
            Detail Surat Keluar
        </h1>

        <p class="text-gray-500 mt-2">
            Informasi lengkap surat keluar.
        </p>
    </div>

    @if ($surat)

        <div class="bg-white border border-blue-200 rounded-xl shadow-sm overflow-hidden">

            {{-- Header --}}
            <div class="bg-blue-800 px-6 py-4">
                <h2 class="text-lg font-semibold text-white">
                    Informasi Surat
                </h2>
            </div>

            <div class="p-6 space-y-5">

                {{-- Nomor Surat --}}
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">
                        Nomor Surat
                    </p>

                    <p class="text-gray-900 font-semibold">
                        {{ $surat->nomor_surat }}
                    </p>
                </div>

                {{-- Tanggal --}}
                <div class="border-t border-gray-100 pt-4">
                    <p class="text-sm font-medium text-gray-500 mb-1">
                        Tanggal
                    </p>

                    <p class="text-gray-900">
                        {{ \Carbon\Carbon::parse($surat->tanggal)->format('Y-m-d') }}
                    </p>
                </div>

                {{-- Tujuan --}}
                <div class="border-t border-gray-100 pt-4">
                    <p class="text-sm font-medium text-gray-500 mb-1">
                        Tujuan
                    </p>

                    <p class="text-gray-900">
                        {{ $surat->tujuan }}
                    </p>
                </div>

                {{-- Perihal --}}
                <div class="border-t border-gray-100 pt-4">
                    <p class="text-sm font-medium text-gray-500 mb-1">
                        Perihal
                    </p>

                    <p class="text-gray-900">
                        {{ $surat->perihal }}
                    </p>
                </div>

                {{-- Kategori --}}
                <div class="border-t border-gray-100 pt-4">
                    <p class="text-sm font-medium text-gray-500 mb-1">
                        Kategori Surat
                    </p>

                    <p class="text-gray-900">
                        {{ $surat->category->nama ?? '-' }}
                    </p>
                </div>

                {{-- Keterangan --}}
                <div class="border-t border-gray-100 pt-4">
                    <p class="text-sm font-medium text-gray-500 mb-1">
                        Keterangan
                    </p>

                    <p class="text-gray-900">
                        {{ $surat->keterangan ?? '-' }}
                    </p>
                </div>

                {{-- Lampiran --}}
                <div class="border-t border-gray-100 pt-4">
                    <p class="text-sm font-medium text-gray-500 mb-2">
                        Lampiran
                    </p>

                    @if ($surat->lampiran)

                        <a href="{{ asset('storage/' . $surat->lampiran) }}"
                           target="_blank"
                           class="inline-block bg-blue-100 hover:bg-blue-200 text-blue-700 px-4 py-2 rounded-lg font-semibold transition">
                            Lihat / Download Lampiran
                        </a>

                    @else

                        <p class="text-gray-500">
                            Tidak ada lampiran.
                        </p>

                    @endif
                </div>

            </div>
        </div>

    @else

        <div class="bg-red-50 border border-red-200 rounded-lg p-4">
            <p class="text-red-700">
                Surat tidak ditemukan.
            </p>
        </div>

    @endif

    {{-- Tombol Kembali --}}
    <div class="mt-6">
        <a href="{{ route('surat-keluar.index') }}"
           class="inline-block bg-blue-700 hover:bg-blue-800 text-white font-semibold px-5 py-2.5 rounded-lg transition">
            ← Kembali ke Daftar Surat Keluar
        </a>
    </div>

</div>

@endsection
