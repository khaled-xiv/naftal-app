<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{

    protected $table = 'equipments';

    protected $fillable = [
        'code', 'mark', 'type', 'model', 'state'
    ];

    public function center(){

        return $this->belongsTo('App\Center');

    }

    public function pump(){

        return $this->hasOne('App\Pump');

    }

    public function loading_arm(){

        return $this->hasOne('App\LoadingArm');

    }

    public function tank(){

        return $this->hasOne('App\Tank');

    }

    public function fuel_meter(){

        return $this->hasOne('App\FuelMeter');

    }

    public function generator(){

        return $this->hasOne('App\Generator');

    }

    public function components(){

        return $this->hasMany('App\Component');

    }

}
