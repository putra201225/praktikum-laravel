@extends('layout.app')

@section('title', 'Halaman Detail Surat')

@section('content')

    <h1>Detail Surat Keluar</h1>

    @if ($surat)

        <p>
            <strong>Nomor Surat:</strong>
            {{ $surat->nomor_surat }}
        </p>

        <p>
            <strong>Tanggal:</strong>
            {{ \Carbon\Carbon::parse($surat->tanggal)->format('Y-m-d') }}
        </p>

        <p>
            <strong>Tujuan:</strong>
            {{ $surat->tujuan }}
        </p>

        <p>
            <strong>Perihal:</strong>
            {{ $surat->perihal }}
        </p>

    @else

        <p>Surat tidak ditemukan.</p>

    @endif

    <a href="{{ route('surat-keluar.index') }}">Kembali ke Daftar Surat Keluar</a>

@endsection
