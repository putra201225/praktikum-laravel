<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IncommingLetter;

class SuratMasukController extends Controller
{
    public function index()
    {
        $suratMasuk = IncommingLetter::all();

        return view('surat-masuk.index', compact('suratMasuk'));
    }

    public function create()
    {
        return view('surat-masuk.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_surat' => 'required',
            'tanggal' => 'required|date',
            'pengirim' => 'required',
            'perihal' => 'required',
            'keterangan' => 'nullable',
        ], [
            'nomor_surat.required' => 'Nomor surat wajib diisi.',
            'tanggal.required' => 'Tanggal surat wajib diisi.',
            'tanggal.date' => 'Format tanggal tidak valid.',
            'pengirim.required' => 'Nama pengirim wajib diisi.',
            'perihal.required' => 'Perihal surat wajib diisi.',
        ]);

        IncommingLetter::create($validated);

        return redirect()->route('surat-masuk.index')
            ->with('success', 'Surat masuk berhasil ditambahkan.');
    }

    public function show($id)
    {
        $surat = IncommingLetter::findOrFail($id);

        return view('surat-masuk.show', compact('surat'));
    }

    public function edit($id)
    {
        $surat = IncommingLetter::findOrFail($id);

        return view('surat-masuk.edit', compact('surat'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nomor_surat' => 'required',
            'tanggal' => 'required|date',
            'pengirim' => 'required',
            'perihal' => 'required',
            'keterangan' => 'nullable',
        ], [
            'nomor_surat.required' => 'Nomor surat wajib diisi.',
            'tanggal.required' => 'Tanggal surat wajib diisi.',
            'tanggal.date' => 'Format tanggal tidak valid.',
            'pengirim.required' => 'Nama pengirim wajib diisi.',
            'perihal.required' => 'Perihal surat wajib diisi.',
        ]);

        $surat = IncommingLetter::findOrFail($id);
        $surat->update($validated);

        return redirect()->route('surat-masuk.index')
            ->with('success', 'Surat masuk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $surat = IncommingLetter::findOrFail($id);
        $surat->delete();

        return redirect()->route('surat-masuk.index')
            ->with('success', 'Surat masuk berhasil dihapus.');
    }
}
