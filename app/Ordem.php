<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ordem extends Model
{

    public function insumo()
    {
        return $this->belongsTo('App\Insumo');
    }

    public function status()
    {
        return $this->belongsTo('App\Status', 'statuses_id');
    }
}
