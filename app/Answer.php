<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['body', 'votes'];

    public function user()
    {
        return $this->belongsTo("App\User");
    }

    public function forum()
    {
        return $this->belongsTo("App\Forum");
    }

}
