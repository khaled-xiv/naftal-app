<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tank extends Model
{

    protected $fillable = [
        'product','height','diameter', 'capacity'
    ];

    protected function equipment(){

        return $this->belongsTo('App/Equipment');

    }

}
