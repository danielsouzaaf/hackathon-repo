<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{

    public function ordens()
    {
        return $this->hasMany('App\Ordem');
    }
}
