<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{

    protected $table = 'equipments';

    protected $fillable = [
        'code', 'mark', 'type', 'model', 'state'
    ];

    protected function center(){

        return $this->belongsTo('App\Center');

    }

    protected function pump(){

        return $this->hasOne('App\Pump');

    }

    protected function loading_arm(){

        return $this->hasOne('App\LoadingArm');

    }

    protected function tank(){

        return $this->hasOne('App\Tank');

    }

    protected function fuel_meter(){

        return $this->hasOne('App\FuelMeter');

    }

    protected function generator(){

        return $this->hasOne('App\Generator');

    }

    protected function components(){

        return $this->hasMany('App\Component');

    }

}
