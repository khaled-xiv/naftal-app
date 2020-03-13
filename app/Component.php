<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Component extends Model
{

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'designation', 'mark', 'reference', 'commissioned_on'
    ];

    public function equipment(){

        return $this->belongsTo('App\Equipment');

    }

}
