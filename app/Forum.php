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

    public function answers()
    {
        return $this->hasMany("App\Answer")->orderBy("votes", "DESC")->orderBy("updated_at", "DESC");
    }

    public function users()
    {
        return $this->morphToMany('App\User', 'likable');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'forum_tag');
    }

}
