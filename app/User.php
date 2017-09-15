<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'contact', 'address','department','designation','pin','office','officeaddress', 'role', 'status', 'branch_id','user_id','remember_token'
    ];

    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function branch()
    {
        return $this->belongsTo('App\Branch');
    }
    public function createdBy()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    public function profile()
    {
        return $this->hasOne('App\UserProfile', 'id');
    }
}
