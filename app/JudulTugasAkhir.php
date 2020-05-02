<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JudulTugasAkhir extends Model
{
    protected $table = 'judul_tugas_akhir';
    protected $guarded = [];
    public $timestamps = true;

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim');
    }
}
