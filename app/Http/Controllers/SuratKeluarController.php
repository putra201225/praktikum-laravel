<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\OutgoingLetter;
use App\Models\Category;

class SuratKeluarController extends Controller
{
    // Menampilkan daftar surat keluar
    public function index(Request $request)
    {
        $query = OutgoingLetter::with('category');

        // Pencarian surat
        if ($request->filled('q')) {
            $q = $request->input('q');

            $query->where(function ($builder) use ($q) {
                $builder->where('nomor_surat', 'like', "%{$q}%")
                    ->orWhere('tujuan', 'like', "%{$q}%")
                    ->orWhere('perihal', 'like', "%{$q}%");
            });
        }

        // Filter kategori
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->input('category_id'));
        }

        // Urutkan nomor surat dari kecil ke besar
        // Pagination 5 data per halaman
        $suratKeluar = $query
            ->orderBy('nomor_surat', 'asc')
            ->orderBy('id', 'asc')
            ->paginate(5)
            ->withQueryString();

        $categories = Category::orderBy('nama')->get();

        return view('surat-keluar.index', compact(
            'suratKeluar',
            'categories'
        ));
    }

    // Form tambah surat
    public function create()
    {
        $categories = Category::orderBy('nama')->get();

        return view('surat-keluar.create', compact('categories'));
    }

    // Menyimpan surat keluar
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_surat' => 'required|max:255',
            'tanggal' => 'required|date',
            'tujuan' => 'required|max:255',
            'perihal' => 'required|max:255',
            'keterangan' => 'nullable|string',
            'category_id' => 'nullable|exists:categories,id',
            'lampiran' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        // Upload lampiran
        if ($request->hasFile('lampiran')) {
            $validated['lampiran'] = $request->file('lampiran')
                ->store('lampiran-surat-keluar', 'public');
        }

        OutgoingLetter::create($validated);

        return redirect()->route('surat-keluar.index')
            ->with('success', 'Surat keluar berhasil ditambahkan.');
    }

    // Menampilkan detail surat
    public function show($id)
    {
        $surat = OutgoingLetter::with('category')->findOrFail($id);

        return view('surat-keluar.show', compact('surat'));
    }

    // Form edit surat
    public function edit($id)
    {
        $surat = OutgoingLetter::findOrFail($id);
        $categories = Category::orderBy('nama')->get();

        return view('surat-keluar.edit', compact(
            'surat',
            'categories'
        ));
    }

    // Memperbarui surat keluar
    public function update(Request $request, $id)
    {
        $surat = OutgoingLetter::findOrFail($id);

        $validated = $request->validate([
            'nomor_surat' => 'required|max:255',
            'tanggal' => 'required|date',
            'tujuan' => 'required|max:255',
            'perihal' => 'required|max:255',
            'keterangan' => 'nullable|string',
            'category_id' => 'nullable|exists:categories,id',
            'lampiran' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        // Jika ada lampiran baru
        if ($request->hasFile('lampiran')) {
            $pathLama = $surat->lampiran;

            $validated['lampiran'] = $request->file('lampiran')
                ->store('lampiran-surat-keluar', 'public');

            $surat->update($validated);

            // Hapus lampiran lama
            if ($pathLama) {
                Storage::disk('public')->delete($pathLama);
            }
        } else {
            // Pertahankan lampiran lama
            unset($validated['lampiran']);

            $surat->update($validated);
        }

        return redirect()->route('surat-keluar.index')
            ->with('success', 'Surat keluar berhasil diperbarui.');
    }

    // Menghapus surat keluar
    public function destroy($id)
    {
        $surat = OutgoingLetter::findOrFail($id);

        $path = $surat->lampiran;

        $surat->delete();

        // Hapus file lampiran
        if ($path) {
            Storage::disk('public')->delete($path);
        }

        return redirect()->route('surat-keluar.index')
            ->with('success', 'Surat keluar berhasil dihapus.');
    }
}
