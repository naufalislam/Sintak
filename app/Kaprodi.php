<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Kaprodi extends Authenticatable
{
    protected $table = 'kaprodi';

    protected $guarded = [];
    protected $guard = 'kaprodi';
}
