<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['nama'];

    // Relasi ke Surat Masuk
    public function incommingLetters()
    {
        return $this->hasMany(IncommingLetter::class, 'category_id');
    }

    // Relasi ke Surat Keluar
    public function outgoingLetters()
    {
        return $this->hasMany(OutgoingLetter::class, 'category_id');
    }
}
