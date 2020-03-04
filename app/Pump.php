<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pump extends Model
{
    protected $fillable = [
        'product','rate'
    ];

    protected function equipment(){

        return $this->belongsTo('App\Equipment');

    }

}
