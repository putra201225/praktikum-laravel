<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IncommingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('incomming_letters')->insert([
            [
                'nomor_surat' => '001/FT/x/2026',
                'tanggal' => '2026-10-08',
                'pengirim' => 'Kampus',
                'perihal' => 'Rapat',
                'keterangan' => 'Rapat',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nomor_surat' => '002/FT/x/2026',
                'tanggal' => '2026-10-08',
                'pengirim' => 'Intelejen',
                'perihal' => 'Diskusi',
                'keterangan' => 'Rapat',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nomor_surat' => '003/FT/x/2026',
                'tanggal' => '2026-10-08',
                'pengirim' => 'Fakultas Teknik',
                'perihal' => 'Sharing',
                'keterangan' => 'Rapat',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
