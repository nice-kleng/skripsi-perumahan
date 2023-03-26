<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spesifikasi extends Model
{
    use HasFactory;

    protected $table = 'spesifikasi';
    protected $fillable = ['perumahan_id', 'tipe', 'harga', 'l_bangunan', 'l_lahan', 'k_tidur', 'k_mandi', 'atap', 'dinding', 'lantai_pondasi', 'f_depan', 'f_denah'];

    public function perumahan()
    {
        return $this->belongsTo(Perumahan::class, 'perumahan_id');
    }
    public function rumah()
    {
        return $this->hasMany(Rumah::class);
    }
}
