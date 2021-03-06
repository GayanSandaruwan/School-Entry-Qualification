<?php

namespace App;

use App\Notifications\ApplicantResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Applicant extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ApplicantResetPassword($token));
    }
    public function phone()
    {
        return $this->hasMany('App\Phone','applicant_id','id');
    }
    public function adress()
    {
        return $this->hasMany('App\Adress','applicant_id','id');
    }

    public function child()
    {
        return $this->hasMany('App\Child','applicant_id','id');
    }
}
