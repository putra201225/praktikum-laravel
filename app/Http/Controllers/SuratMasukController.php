<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuratMasukController extends Controller
{
    public function index(){
        $SuratMasuk = [
            [
                'id'         => 1,
                'nomor_surat'=>'200',
                'tanggal'    =>'10-10-2006',
                'pengirim'   =>'pepew',
                'perihal'    =>'perang'
            ],
            [
                'id'         => 2,
                'nomor_surat'=>'100',
                'tanggal'    =>'11-10-2006',
                'pengirim'   =>'pecu',
                'perihal'    =>'pembelian'
            ],
            [
                'id'         => 3,
                'nomor_surat'=>'400',
                'tanggal'    =>'1-10-2006',
                'pengirim'   =>'peri',
                'perihal'    =>'upacara'
            ]
        ];
        return view ('surat-masuk.index', compact('SuratMasuk'));
    }
    public function show($id){
        return 'dtail surat masuk dengan ID '.$id;
    }
}