<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Mahasiswa extends Authenticatable
{
    protected $table = 'mahasiswa';

    protected $primaryKey = 'nim';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $guarded = ['remember_token'];
    protected $guard = 'mahasiswa';

    public function judul_tugas_akhir()
    {
        return $this->hasOne(JudulTugasAkhir::class, 'nim');
    }

    public function pembimbing()
    {
        return $this->hasMany(Pembimbing::class, 'nim');
    }
}
