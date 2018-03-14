<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marea extends Model
{
    public function pref()
    {
        return $this->belongsTo(Pref::class);
    }
}
