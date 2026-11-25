<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\IncommingLetter;
use App\Models\Category;

class SuratMasukController extends Controller
{
    public function index(Request $request)
    {
        $suratMasuk = IncommingLetter::with('category')
            ->when($request->q, function ($query, $q) {
                $query->where(function ($sub) use ($q) {
                    $sub->where('nomor_surat', 'like', "%$q%")
                        ->orWhere('pengirim', 'like', "%$q%")
                        ->orWhere('perihal', 'like', "%$q%");
                });
            })
            ->when($request->category_id, function ($query, $id) {
                $query->where('category_id', $id);
            })
            ->orderBy('nomor_surat', 'asc')
            ->orderBy('id', 'asc')
            ->paginate(5)
            ->withQueryString();

        $categories = Category::orderBy('nama')->get();

        return view('surat-masuk.index', compact(
            'suratMasuk',
            'categories'
        ));
    }

    public function create()
    {
        $categories = Category::all();

        return view('surat-masuk.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_surat' => 'required',
            'tanggal' => 'required|date',
            'pengirim' => 'required',
            'perihal' => 'required',
            'keterangan' => 'nullable',
            'category_id' => 'nullable|exists:categories,id',
            'lampiran' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('lampiran')) {
            $validated['lampiran'] = $request->file('lampiran')
                ->store('lampiran', 'public');
        }

        IncommingLetter::create($validated);

        return redirect()->route('surat-masuk.index')
            ->with('success', 'Surat masuk berhasil ditambahkan.');
    }

    public function show($id)
    {
        $surat = IncommingLetter::with('category')->findOrFail($id);

        return view('surat-masuk.show', compact('surat'));
    }

    public function edit($id)
    {
        $surat = IncommingLetter::findOrFail($id);
        $categories = Category::all();

        return view('surat-masuk.edit', compact('surat', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nomor_surat' => 'required',
            'tanggal' => 'required|date',
            'pengirim' => 'required',
            'perihal' => 'required',
            'keterangan' => 'nullable',
            'category_id' => 'nullable|exists:categories,id',
            'lampiran' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $surat = IncommingLetter::findOrFail($id);

        if ($request->hasFile('lampiran')) {
            if ($surat->lampiran) {
                Storage::disk('public')->delete($surat->lampiran);
            }

            $validated['lampiran'] = $request->file('lampiran')
                ->store('lampiran', 'public');
        }

        $surat->update($validated);

        return redirect()->route('surat-masuk.index')
            ->with('success', 'Surat masuk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $surat = IncommingLetter::findOrFail($id);

        if ($surat->lampiran) {
            Storage::disk('public')->delete($surat->lampiran);
        }

        $surat->delete();

        return redirect()->route('surat-masuk.index')
            ->with('success', 'Surat masuk berhasil dihapus.');
    }
}
