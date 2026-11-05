@extends('layout.app')

@section('title', 'Tambah Surat Masuk')

@section('content')

<h1>Tambah Surat Masuk</h1>

@if ($errors->any())
    <ul style="color: red;">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('surat-masuk.store') }}" method="POST">
    @csrf

    <label>Nomor Surat</label><br>
    <input type="text" name="nomor_surat" value="{{ old('nomor_surat') }}">
    <br><br>

    <label>Tanggal</label><br>
    <input type="date" name="tanggal" value="{{ old('tanggal') }}">
    <br><br>

    <label>Pengirim</label><br>
    <input type="text" name="pengirim" value="{{ old('pengirim') }}">
    <br><br>

    <label>Perihal</label><br>
    <input type="text" name="perihal" value="{{ old('perihal') }}">
    <br><br>

    <label>Keterangan</label><br>
    <textarea name="keterangan">{{ old('keterangan') }}</textarea>
    <br><br>

    <button type="submit">Simpan</button>
    <a href="{{ route('surat-masuk.index') }}">Kembali</a>
</form>

@endsection
