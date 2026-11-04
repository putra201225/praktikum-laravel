@extends('layout.app')

@section('title', 'Edit Surat Masuk')

@section('content')

    <h1>Edit Surat Masuk</h1>

    <form action="{{ route('surat-masuk.update', $surat->id) }}" method="POST">
        @csrf
        @method('PUT')

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
        <input
            type="text"
            id="nomor_surat"
            name="nomor_surat"
            value="{{ old('nomor_surat', $surat->nomor_surat) }}"
            required
        >

        <br><br>

        <label for="tanggal">Tanggal Surat</label>
        <input
            type="date"
            id="tanggal"
            name="tanggal"
            value="{{ old('tanggal', $surat->tanggal) }}"
            required
        >

        <br><br>

        <label for="pengirim">Pengirim</label>
        <input
            type="text"
            id="pengirim"
            name="pengirim"
            value="{{ old('pengirim', $surat->pengirim) }}"
            required
        >

        <br><br>

        <label for="perihal">Perihal</label>
        <input
            type="text"
            id="perihal"
            name="perihal"
            value="{{ old('perihal', $surat->perihal) }}"
            required
        >

        <br><br>

        <label for="keterangan">Keterangan</label>
        <textarea id="keterangan" name="keterangan">{{ old('keterangan', $surat->keterangan) }}</textarea>

        <br><br>

        <button type="submit">Update Surat</button>

        <a href="{{ route('surat-masuk.index') }}">Batal</a>
    </form>

@endsection
