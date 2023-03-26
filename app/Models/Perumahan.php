<?php

namespace App\Models;

use Alfa6661\AutoNumber\AutoNumberTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perumahan extends Model
{
    use HasFactory, AutoNumberTrait;

    protected $table = 'perumahan';
    protected $fillable = ['kode_lokasi', 'nama_perumahan', 'slug', 'jenis_perumahan', 'nomor_kolektif', 'tanggal_terbit', 'pdf_imb', 'siteplan', 'rt_rw', 'dusun', 'desa', 'kecamatan', 'kabupaten', 'propinsi', 'gmap', 'f_gerbang', 'f_posisi_tengah', 'f_rumah'];

    public function spesifikasi()
    {
        return $this->hasOne(Spesifikasi::class);
    }

    public function blok()
    {
        return $this->hasMany(Blok::class);
    }

    public function rumah()
    {
        return $this->hasMany(Rumah::class);
    }

    public function penjualan()
    {
        return $this->hasMany(Penjualan::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getAutoNumberOptions()
    {
        $arr = explode(' ', $this->nama_perumahan);
        $singkatan = "";
        foreach ($arr as $kata) {
            $singkatan .= substr($kata, 0, 1);
        }
        return [
            'kode_lokasi' => [
                'format' => function () use ($singkatan) {
                    return $singkatan . date('YmdHis') . '?';
                },
                'length' => 3,
            ]
        ];
    }
}
