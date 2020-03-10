<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    protected $fillable = [
        'code', 'location', 'phone', 'storage_capacity'
    ];

    public function users()
    {
        return $this->hasMany("App\User");
    }

    public function equipments()
    {
        return $this->hasMany("App\Equipment");
    }
}
