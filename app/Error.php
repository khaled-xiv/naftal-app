<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Error extends Model
{
    protected $fillable=['dateTime','equipment_id','error_code'];
}
