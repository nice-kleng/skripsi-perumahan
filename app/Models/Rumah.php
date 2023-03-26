<?php

namespace App\Models;

use Alfa6661\AutoNumber\AutoNumberTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Rumah extends Model
{
    use HasFactory, AutoNumberTrait;

    protected $table = 'rumah';
    protected $fillable = ['perumahan_id', 'blok_id', 'spesifikasi_id', 'nomor_rumah', 'kode_rumah', 'status'];
    protected $with = ['spesifikasi', 'blok', 'perumahan'];

    public function perumahan()
    {
        return $this->belongsTo(Perumahan::class, 'perumahan_id');
    }

    public function blok()
    {
        return $this->belongsTo(Blok::class, 'blok_id');
    }

    public function spesifikasi()
    {
        return $this->belongsTo(Spesifikasi::class, 'spesifikasi_id');
    }

    public function penjualan()
    {
        return $this->hasOne(Penjualan::class);
    }

    public function getAutoNumberOptions()
    {
        $blok = Blok::find($this->blok_id);
        $perumahan = Perumahan::find($this->perumahan_id);

        if (Str::wordCount($perumahan->nama_perumahan) > 1) {
            $arr = explode(' ', $perumahan->nama_perumahan);
            $singkatan = "";
            foreach ($arr as $kata) {
                $singkatan .= substr($kata, 0, 1);
            }
        } else {
            $char = str_split($perumahan->nama_perumahan);
            $singkatan = $char[0] . end($char);
        }

        return [
            'nomor_rumah' => [
                'format' => $blok->nama_blok . '-' . '?',
                'length' => 3,
            ],
            'kode_rumah' => [
                'format' => function () use ($singkatan) {
                    return $singkatan . date('YmdHis') . $this->blok->nama_blok . '?';
                },
                'length' => 3,
            ],
        ];
    }
}
