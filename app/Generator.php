<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Generator extends Model
{

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function equipment(){

        return $this->belongsTo('App\Equipment');

    }

}
