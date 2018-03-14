<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pref extends Model
{
    public function mareas()
    {
        return $this->hasMany(Marea::class);
    }
}
