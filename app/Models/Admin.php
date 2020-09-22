<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    ### If i want to send Notifications <trait> ###
    use Notifiable;

    ### Select Table ###
    protected $table ='admins';

    ### Select Fields in table ###
    protected $fillable = [
        'name', 'email', 'password','avatar','phone','permissions','created_at','updated_at'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    ### when using scope i dont say scope... just word after scope ###
    ### When You use something in many places use scope ###
    public function scopeSelection($query){
        return $query -> select('id','email','name','phone','permissions');
    }

    public function getPermissions(){
        return $this->permissions == 1 ? 'مدير عام' : 'مدير';
    }

    ### Start Relations ###

    public function payments(){
        return $this->hasMany('App\Models\Payment','admin_id','id');
    }

    ### End Relations ###


}
