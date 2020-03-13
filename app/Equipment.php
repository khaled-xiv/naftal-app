<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

class Equipment extends Model
{
    use SoftDeletes;
    use SoftCascadeTrait;

    protected $dates = ['deleted_at'];

    protected $table = 'equipments';

    protected $fillable = [
        'code', 'mark', 'type', 'model', 'state'
    ];

    protected $softCascade = ['pump', 'loading_arm', 'tank', 'fuel_meter', 'generator', 'components'];

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
