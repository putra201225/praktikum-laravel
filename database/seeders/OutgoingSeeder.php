<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OutgoingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('outgoing_letters')->insert([
            [
                'nomor_surat' => '001/FT/x/2026',
                'tanggal' => '2026-10-08',
                'tujuan' => 'Fakultas Teknik',
                'perihal' => 'Undangan Rapat',
                'keterangan' => 'Rapat koordinasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nomor_surat' => '002/FT/x/2026',
                'tanggal' => '2026-10-09',
                'tujuan' => 'Universitas',
                'perihal' => 'Permohonan Kerja Sama',
                'keterangan' => 'Kerja sama akademik',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nomor_surat' => '003/FT/x/2026',
                'tanggal' => '2026-10-10',
                'tujuan' => 'Dosen',
                'perihal' => 'Pemberitahuan',
                'keterangan' => 'Informasi kegiatan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
