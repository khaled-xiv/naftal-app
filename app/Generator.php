<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Generator extends Model
{

    protected function equipment(){

        return $this->belongsTo('App\Equipment');

    }

}
