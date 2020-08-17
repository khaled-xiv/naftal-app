<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Req_inter extends Model
{


    // Define all of the valid options in an array as a protected property that
    //    starts with 'enum' followed by the plural studly cased field name

    public $timestamps = false;

    protected $fillable = [
        'equipment_id', 'equipment_name','description', 'component_id[]','number', 'degree_urgency', 'created_at','intervention_date', 'description_2',
        'intervention_date_2', 'description_3', 'need_district', 'valide','error_code'
    ];


    public function equipment(){

        return $this->belongsTo('App\Equipment')->withTrashed();

    }

    public function components()
    {
        return $this->belongsToMany('App\Component','component_req_inter',
            'req_inter_id','component_id')->withTimestamps();
    }


}
