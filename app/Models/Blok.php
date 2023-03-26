<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blok extends Model
{
    use HasFactory;

    protected $table = 'blok';
    protected $fillable = ['perumahan_id', 'nama_blok', 'jlh_rumah'];
    protected $with = ['perumahan'];

    public function perumahan()
    {
        return $this->belongsTo(Perumahan::class, 'perumahan_id');
    }

    public function rumah()
    {
        return $this->hasMany(Rumah::class);
    }
}
