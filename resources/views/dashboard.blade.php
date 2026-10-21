@extends('layout.app')

@section('title', 'Dashboard')

@section('content')

    <h1>Dashboard</h1>

    <p>Selamat Datang di Sistem Informasi Surat</p>

    <h3>Menu Utama</h3>

    <ul>
        <li>
            <a href="{{ route('surat-masuk.index') }}">Surat Masuk</a>
        </li>
        <li>
            <a href="{{ route('surat-keluar.index') }}">Surat Keluar</a>
        </li>
    </ul>

@endsection