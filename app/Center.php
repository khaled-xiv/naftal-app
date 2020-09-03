<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
	use SoftDeletes;
	use SoftCascadeTrait;
	
	protected $dates = ['deleted_at'];
	
    protected $fillable = [
        'code', 'location', 'phone', 'storage_capacity'
    ];
	
	protected $softCascade = ['equipments', 'users'];

    public function users()
    {
        return $this->hasMany("App\User");
    }

    public function equipments()
    {
        return $this->hasMany("App\Equipment");
    }
}
