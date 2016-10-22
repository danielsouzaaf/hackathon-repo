<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function ordens()
    {
        return $this->hasMany('App\Ordem');
    }
}
