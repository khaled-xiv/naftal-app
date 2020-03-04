<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FuelMeter extends Model
{

    protected $fillable = [
        'category'
    ];

    protected function equipment(){

        return $this->belongsTo('App\Equipment');

    }

}
