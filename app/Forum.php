<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{

    protected $fillable = ['title', 'body', 'votes'];

    public function user()
    {
        return $this->belongsTo("App\User");
    }

}
