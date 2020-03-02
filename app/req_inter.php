<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class req_inter extends Model
{

    use Enums;

    // Define all of the valid options in an array as a protected property that
    //    starts with 'enum' followed by the plural studly cased field name
    protected $degree_urgency = [
        '1','2','3'
    ];


    public $timestamps = false;

    protected $fillable = [
        'equipement_id', 'description', 'number', 'degree_urgency', 'created_at','received_at_1', 'description_2',
        'received_at_2', 'description_3', 'need_district', 'valide'
    ];


    public function equipement()
    {
        return $this->belongsTo("App\Equipement");
    }
}
