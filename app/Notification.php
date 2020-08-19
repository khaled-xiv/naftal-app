<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable=['user_id','link','is_read','content','sender','user_photo'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
