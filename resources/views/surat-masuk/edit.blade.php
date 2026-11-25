@extends('layout.app')

@section('title', 'Edit Surat Masuk')

@section('content')

<div class="max-w-2xl bg-white rounded-xl shadow-md border border-blue-200 overflow-hidden">

    <!-- Header Form -->
    <div class="bg-blue-700 px-6 py-5">
        <h1 class="text-2xl font-bold text-white">
            Edit Surat Masuk
        </h1>

        <p class="text-blue-100 text-sm mt-2">
            Perbarui informasi surat masuk melalui formulir berikut.
        </p>
    </div>

    <!-- Isi Form -->
    <div class="p-6 md:p-8">

        @if ($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 rounded-lg p-4 mb-6">
                <p class="font-semibold mb-2">
                    Periksa kembali data berikut:
                </p>

                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('surat-masuk.update', $surat->id) }}"
              method="POST"
              enctype="multipart/form-data"
              class="space-y-5">

            @csrf
            @method('PUT')

            <!-- Nomor Surat -->
            <div>
                <label for="nomor_surat" class="block text-sm font-semibold text-blue-900 mb-2">
                    Nomor Surat
                </label>

                <input
                    type="text"
                    id="nomor_surat"
                    name="nomor_surat"
                    value="{{ old('nomor_surat', $surat->nomor_surat) }}"
                    required
                    class="w-full rounded-lg border border-blue-200 bg-blue-50 px-4 py-3 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                >
            </div>

            <!-- Tanggal -->
            <div>
                <label for="tanggal" class="block text-sm font-semibold text-blue-900 mb-2">
                    Tanggal Surat
                </label>

                <input
                    type="date"
                    id="tanggal"
                    name="tanggal"
                    value="{{ old('tanggal', \Illuminate\Support\Carbon::parse($surat->tanggal)->format('Y-m-d')) }}"
                    required
                    class="w-full rounded-lg border border-blue-200 bg-blue-50 px-4 py-3 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                >
            </div>

            <!-- Pengirim -->
            <div>
                <label for="pengirim" class="block text-sm font-semibold text-blue-900 mb-2">
                    Pengirim
                </label>

                <input
                    type="text"
                    id="pengirim"
                    name="pengirim"
                    value="{{ old('pengirim', $surat->pengirim) }}"
                    required
                    class="w-full rounded-lg border border-blue-200 bg-blue-50 px-4 py-3 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                >
            </div>

            <!-- Perihal -->
            <div>
                <label for="perihal" class="block text-sm font-semibold text-blue-900 mb-2">
                    Perihal
                </label>

                <input
                    type="text"
                    id="perihal"
                    name="perihal"
                    value="{{ old('perihal', $surat->perihal) }}"
                    required
                    class="w-full rounded-lg border border-blue-200 bg-blue-50 px-4 py-3 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                >
            </div>

            <!-- Kategori -->
            <div>
                <label for="category_id" class="block text-sm font-semibold text-blue-900 mb-2">
                    Kategori
                </label>

                <select
                    id="category_id"
                    name="category_id"
                    class="w-full rounded-lg border border-blue-200 bg-blue-50 px-4 py-3 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                >
                    <option value="">-- Pilih Kategori --</option>

                    @foreach ($categories as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id', $surat->category_id) == $category->id ? 'selected' : '' }}
                        >
                            {{ $category->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Keterangan -->
            <div>
                <label for="keterangan" class="block text-sm font-semibold text-blue-900 mb-2">
                    Keterangan
                </label>

                <textarea
                    id="keterangan"
                    name="keterangan"
                    rows="3"
                    class="w-full rounded-lg border border-blue-200 bg-blue-50 px-4 py-3 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                >{{ old('keterangan', $surat->keterangan) }}</textarea>
            </div>

            <!-- Lampiran Lama -->
            @if ($surat->lampiran)
                <div>
                    <label class="block text-sm font-semibold text-blue-900 mb-2">
                        Lampiran Saat Ini
                    </label>

                    <a
                        href="{{ asset('storage/' . $surat->lampiran) }}"
                        target="_blank"
                        class="text-blue-600 hover:text-blue-800 underline"
                    >
                        Lihat lampiran saat ini
                    </a>
                </div>
            @endif

            <!-- Upload Lampiran -->
            <div>
                <label for="lampiran" class="block text-sm font-semibold text-blue-900 mb-2">
                    Ganti Lampiran Surat
                </label>

                <input
                    type="file"
                    id="lampiran"
                    name="lampiran"
                    accept=".pdf,.jpg,.jpeg,.png"
                    class="w-full rounded-lg border border-blue-200 bg-blue-50 px-4 py-3 text-gray-800"
                >

                <p class="text-sm text-gray-500 mt-2">
                    Format PDF, JPG, JPEG, PNG. Maksimal 2 MB.
                    Kosongkan jika tidak ingin mengganti lampiran.
                </p>
            </div>

            <!-- Tombol -->
            <div class="flex items-center gap-3 border-t border-blue-100 pt-5">

                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-lg shadow-sm transition"
                >
                    Update Surat
                </button>

                <a
                    href="{{ route('surat-masuk.index') }}"
                    class="bg-blue-50 hover:bg-blue-100 text-blue-700 font-semibold px-6 py-3 rounded-lg border border-blue-200 transition"
                >
                    Batal
                </a>

            </div>

        </form>

    </div>

</div>

@endsection
