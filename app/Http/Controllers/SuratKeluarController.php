<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuratKeluarController extends Controller
{
    public function index()
    {
        $suratKeluar = [
            [
                'id' => 1,
                'nomor_surat' => '001/FT/X/2026',
                'tanggal' => '08-10-2026',
                'pengirim' => 'Kampus',
                'perihal' => 'Rapat'
            ],
            [
                'id' => 2,
                'nomor_surat' => '002/FT/X/2026',
                'tanggal' => '08-10-2026',
                'pengirim' => 'Intelejen',
                'perihal' => 'Diskusi'
            ],
            [
                'id' => 3,
                'nomor_surat' => '003/FT/X/2026',
                'tanggal' => '08-10-2026',
                'pengirim' => 'Fakultas Teknik',
                'perihal' => 'Sharing'
            ]
        ];

        return view('surat-keluar.index', compact('suratKeluar'));
    }

    public function show($id)
    {
        $suratKeluarDetail = [
            1 => [
                'id' => 1,
                'nomor_surat' => '001/FT/X/2026',
                'tanggal' => '08-10-2026',
                'pengirim' => 'Kampus',
                'perihal' => 'Rapat'
            ],
            2 => [
                'id' => 2,
                'nomor_surat' => '002/FT/X/2026',
                'tanggal' => '08-10-2026',
                'pengirim' => 'Intelejen',
                'perihal' => 'Diskusi'
            ],
            3 => [
                'id' => 3,
                'nomor_surat' => '003/FT/X/2026',
                'tanggal' => '08-10-2026',
                'pengirim' => 'Fakultas Teknik',
                'perihal' => 'Sharing'
            ]
        ];

        $surat = $suratKeluarDetail[$id] ?? null;

        if (!$surat) {
            abort(404);
        }

        return view('surat-keluar.show', compact('surat'));
    }
}