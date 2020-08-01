<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telemetry extends Model
{
    protected $fillable=['dateTime','equipment_id','volt','pressure','vibration','rotate'];
}
