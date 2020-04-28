<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    protected $fillable = [
        'content'
    ];

    public function forums()
    {
        return $this->belongsToMany('App\Forum', 'forum_tag');
    }
}
