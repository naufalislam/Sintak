<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Dosen extends Authenticatable
{
    protected $table = 'dosen';

    protected $guarded = [];
    protected $guard = 'dosen';

    public function bimbing()
    {
        return $this->hasMany(Pembimbing::class);
    }
}
