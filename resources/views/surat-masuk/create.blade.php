@extends('layout.app')

@section('title', 'Tambah Surat Masuk')

@section('content')

<div class="max-w-3xl mx-auto">

    <div class="mb-6">
        <h1 class="text-3xl font-bold text-blue-900 mb-2">
            Tambah Surat Masuk
        </h1>
        <p class="text-gray-500">
            Silakan isi formulir untuk menambahkan data surat masuk.
        </p>
    </div>

    @if ($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-700 rounded-lg p-4 mb-6">
            <strong>Terdapat kesalahan:</strong>
            <ul class="list-disc pl-5 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6">

        <form action="{{ route('surat-masuk.store') }}"
              method="POST"
              enctype="multipart/form-data"
              class="space-y-5">
            @csrf

            <div>
                <label class="!block font-semibold text-gray-700 mb-2">Nomor Surat</label>
                <input type="text" name="nomor_surat"
                    value="{{ old('nomor_surat') }}"
                    class="!w-full px-4 py-3 border border-gray-300 rounded-lg">
            </div>

            <div>
                <label class="!block font-semibold text-gray-700 mb-2">Tanggal</label>
                <input type="date" name="tanggal"
                    value="{{ old('tanggal') }}"
                    class="!w-full px-4 py-3 border border-gray-300 rounded-lg">
            </div>

            <div>
                <label class="!block font-semibold text-gray-700 mb-2">Pengirim</label>
                <input type="text" name="pengirim"
                    value="{{ old('pengirim') }}"
                    class="!w-full px-4 py-3 border border-gray-300 rounded-lg">
            </div>

            <div>
                <label class="!block font-semibold text-gray-700 mb-2">Perihal</label>
                <input type="text" name="perihal"
                    value="{{ old('perihal') }}"
                    class="!w-full px-4 py-3 border border-gray-300 rounded-lg">
            </div>

            <div>
                <label class="!block font-semibold text-gray-700 mb-2">Kategori Surat</label>
                <select name="category_id"
                    class="!w-full px-4 py-3 border border-gray-300 rounded-lg">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="!block font-semibold text-gray-700 mb-2">Keterangan</label>
                <textarea name="keterangan" rows="4"
                    class="!w-full px-4 py-3 border border-gray-300 rounded-lg">{{ old('keterangan') }}</textarea>
            </div>

            <div>
                <label class="!block font-semibold text-gray-700 mb-2">Lampiran</label>
                <input type="file" name="lampiran" accept=".pdf,.jpg,.jpeg,.png"
                    class="!w-full px-4 py-3 border border-gray-300 rounded-lg">
                <p class="text-sm text-gray-500 mt-1">
                    Format PDF, JPG, JPEG, PNG. Maksimal 2 MB.
                </p>
            </div>

            <div class="flex items-center gap-3 pt-4 border-t border-gray-200">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-lg">
                    Simpan
                </button>

                <a href="{{ route('surat-masuk.index') }}"
                    class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold px-6 py-3 rounded-lg">
                    Kembali
                </a>
            </div>

        </form>
    </div>
</div>

@endsection
