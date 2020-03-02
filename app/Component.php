<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    protected $fillable = [
        'designation', 'mark', 'reference', 'commissioned_on'
    ];
}
