<?php

namespace App;

use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail,CanResetPassword
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'center_id', 'is_active', 'phone', 'isVerified', 'address', 'email_verified_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function unverify()
    {
        $this->email_verified_at = null;

        $this->save();
    }
    public function role()
    {
        return $this->belongsTo("App\Role");
    }

    public function center()
    {
        return $this->belongsTo("App\Center");
    }

    public function is_district_chief()
    {
        if($this->role->name=='district_chief' && $this->is_active==1){
            return true;
        }
        return false;
    }

    public function forums()
    {
        return $this->hasMany("App\Forum");
    }

    public function answers()
    {
        return $this->hasMany("App\Answer");
    }

    public function liked_forums()
    {
        return $this->morphedByMany('App\Forum', 'likable')->withPivot('up');
    }

    public function liked_answers()
    {
        return $this->morphedByMany('App\Answer', 'likable')->withPivot('up');
    }

}

