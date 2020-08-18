<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tank extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'product','height','diameter', 'capacity'
    ];

    public function equipment(){

        return $this->belongsTo('App\Equipment');

    }

}
