
@extends('layout.app')

@section('title', 'Tambah Surat Keluar')

@section('content')
    <h1>Tambah Surat Keluar</h1>

    <form action="{{ route('surat-keluar.store') }}" method="POST">
        @csrf

        <label for="nomor_surat">Nomor Surat</label>
        <input
            type="text"
            id="nomor_surat"
            name="nomor_surat"
            value="{{ old('nomor_surat') }}"
            required
        >

        <label for="tanggal">Tanggal Surat</label>
        <input
            type="date"
            id="tanggal"
            name="tanggal"
            value="{{ old('tanggal') }}"
            required
        >

        <label for="tujuan">Tujuan Surat</label>
        <input
            type="text"
            id="tujuan"
            name="tujuan"
            value="{{ old('tujuan') }}"
            required
        >

        <label for="perihal">Perihal</label>
        <input
            type="text"
            id="perihal"
            name="perihal"
            value="{{ old('perihal') }}"
            required
        >

        <button type="submit" class="btn">Simpan Surat</button>

        <a href="{{ route('surat-keluar.index') }}" class="btn btn-danger">
            Batal
        </a>
    </form>
@endsection
