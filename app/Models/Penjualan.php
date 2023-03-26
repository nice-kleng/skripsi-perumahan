<?php

namespace App\Models;

use Alfa6661\AutoNumber\AutoNumberTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Penjualan extends Model
{
    use HasFactory, AutoNumberTrait;

    protected $table = 'penjualan';
    protected $fillable = ['perumahan_id', 'rumah_id', 'kode_pembelian', 'nik', 'nama', 'ttl', 'alamat', 'pekerjaan', 'dp', 'kurang_bayar', 'status'];
    protected $with = ['perumahan', 'rumah'];

    public function perumahan()
    {
        return $this->belongsTo(Perumahan::class, 'perumahan_id');
    }

    public function rumah()
    {
        return $this->belongsTo(Rumah::class, 'rumah_id');
    }

    public function getAutoNumberOptions()
    {
        $perumahan = Perumahan::find($this->perumahan_id);
        $arr = explode(' ', $perumahan->nama_perumahan);
        $singkatan = "";
        foreach ($arr as $kata) {
            $singkatan .= substr($kata, 0, 1);
        }
        return [
            'kode_pembelian' => [
                'format' => function () use ($singkatan) {
                    return "PJ" . Str::upper($singkatan) . date('YmdHis') . '?';
                },
                'length' => 2,
            ]
        ];
    }
}
