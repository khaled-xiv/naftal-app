<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FuelMeter extends Model
{

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'category'
    ];

    protected function equipment(){

        return $this->belongsTo('App\Equipment');

    }

}
