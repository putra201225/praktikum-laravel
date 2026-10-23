<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('incomming_letters', 'nomor_surat')) {
            Schema::table('incomming_letters', function (Blueprint $table) {
                $table->string('nomor_surat')->nullable();
            });
        }

        if (!Schema::hasColumn('incomming_letters', 'tanggal')) {
            Schema::table('incomming_letters', function (Blueprint $table) {
                $table->date('tanggal')->nullable();
            });
        }

        if (!Schema::hasColumn('incomming_letters', 'pengirim')) {
            Schema::table('incomming_letters', function (Blueprint $table) {
                $table->string('pengirim')->nullable();
            });
        }

        if (!Schema::hasColumn('incomming_letters', 'perihal')) {
            Schema::table('incomming_letters', function (Blueprint $table) {
                $table->string('perihal')->nullable();
            });
        }
    }

    public function down(): void
    {
        Schema::table('incomming_letters', function (Blueprint $table) {
            $table->dropColumn([
                'nomor_surat',
                'tanggal',
                'pengirim',
                'perihal',
            ]);
        });
    }
};
