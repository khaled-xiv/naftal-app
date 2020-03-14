<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LoadingArm extends Model
{

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'product','rate'
    ];

    protected function equipment(){

        return $this->belongsTo('App\Equipment');

    }

}
