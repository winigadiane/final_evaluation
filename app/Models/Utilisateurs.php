<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Utilisateurs extends Authenticatable 

{
    protected $guarded = [];
    public function experiences()
    {
        return $this->hasMany(Experiences::class);
    }
}
