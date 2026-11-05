<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OutgoingLetter;

class SuratKeluarController extends Controller
{
    // Menampilkan daftar surat keluar
    public function index()
    {
        $suratKeluar = OutgoingLetter::all();

        return view('surat-keluar.index', compact('suratKeluar'));
    }

    // Menampilkan form tambah
    public function create()
    {
        return view('surat-keluar.create');
    }

    // Menyimpan surat keluar
    public function store(Request $request)
    {
        $request->validate([
            'nomor_surat' => 'required|max:255',
            'tanggal' => 'required|date',
            'tujuan' => 'required|max:255',
            'perihal' => 'required|max:255',
            'keterangan' => 'nullable|string',
        ]);

        OutgoingLetter::create([
            'nomor_surat' => $request->nomor_surat,
            'tanggal' => $request->tanggal,
            'tujuan' => $request->tujuan,
            'perihal' => $request->perihal,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('surat-keluar.index')
            ->with('success', 'Surat keluar berhasil ditambahkan.');
    }

    // Menampilkan detail surat
    public function show($id)
    {
        $surat = OutgoingLetter::findOrFail($id);

        return view('surat-keluar.show', compact('surat'));
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $surat = OutgoingLetter::findOrFail($id);

        return view('surat-keluar.edit', compact('surat'));
    }

    // Memperbarui surat keluar
    public function update(Request $request, $id)
    {
        $request->validate([
            'nomor_surat' => 'required|max:255',
            'tanggal' => 'required|date',
            'tujuan' => 'required|max:255',
            'perihal' => 'required|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $surat = OutgoingLetter::findOrFail($id);

        $surat->update([
            'nomor_surat' => $request->nomor_surat,
            'tanggal' => $request->tanggal,
            'tujuan' => $request->tujuan,
            'perihal' => $request->perihal,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('surat-keluar.index')
            ->with('success', 'Surat keluar berhasil diperbarui.');
    }

    // Menghapus surat keluar
    public function destroy($id)
    {
        $surat = OutgoingLetter::findOrFail($id);

        $surat->delete();

        return redirect()->route('surat-keluar.index')
            ->with('success', 'Surat keluar berhasil dihapus.');
    }
}
