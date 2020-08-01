<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Failure extends Model
{
    protected $fillable=['dateTime','equipment_id','comp'];
}
