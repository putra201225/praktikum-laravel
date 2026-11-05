
@extends('layout.app')

@section('title', 'Edit Surat Keluar')

@section('content')

<h1>Edit Surat Keluar</h1>

@if ($errors->any())
    <ul style="color: red;">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('surat-keluar.update', $surat->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nomor Surat</label><br>
    <input type="text" name="nomor_surat"
        value="{{ old('nomor_surat', $surat->nomor_surat) }}">
    <br><br>

    <label>Tanggal</label><br>
    <input type="date" name="tanggal"
        value="{{ old('tanggal', $surat->tanggal) }}">
    <br><br>

    <label>Tujuan</label><br>
    <input type="text" name="tujuan"
        value="{{ old('tujuan', $surat->tujuan) }}">
    <br><br>

    <label>Perihal</label><br>
    <input type="text" name="perihal"
        value="{{ old('perihal', $surat->perihal) }}">
    <br><br>

    <label>Keterangan</label><br>
    <textarea name="keterangan">{{ old('keterangan', $surat->keterangan) }}</textarea>
    <br><br>

    <button type="submit">Update</button>

    <a href="{{ route('surat-keluar.index') }}">Kembali</a>
</form>

@endsection
