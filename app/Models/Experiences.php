<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experiences extends Model
{
    protected $guarded = [];
    public function utilisateur()
    {
        return $this->belongsTo(Utilisateurs::class);
    }
}
