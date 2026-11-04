@extends('layout.app')

@section('title', 'Tambah Surat Masuk')

@section('content')
    <h1>Tambah Surat Masuk</h1>

    <form action="{{ route('surat-masuk.store') }}" method="POST">
        @csrf

        @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <label for="nomor_surat">Nomor Surat</label>
        <input type="text" id="nomor_surat" name="nomor_surat"
            value="{{ old('nomor_surat') }}" required>

        <label for="tanggal">Tanggal Surat</label>
        <input type="date" id="tanggal" name="tanggal"
            value="{{ old('tanggal') }}" required>

        <label for="pengirim">Pengirim</label>
        <input type="text" id="pengirim" name="pengirim"
            value="{{ old('pengirim') }}" required>

        <label for="perihal">Perihal</label>
        <input type="text" id="perihal" name="perihal"
            value="{{ old('perihal') }}" required>

        <label for="keterangan">Keterangan</label>
        <textarea id="keterangan" name="keterangan">{{ old('keterangan') }}</textarea>

        <button type="submit" class="btn">Simpan Surat</button>

        <a href="{{ route('surat-masuk.index') }}" class="btn btn-danger">
            Batal
        </a>
    </form>
@endsection
