<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class State extends Model
{
    ### If i want to send Notifications <trait> ###
    use Notifiable;

    ### Select Table ###
    protected $table ='states';

    ### Select Fields in table ###
    protected $fillable = [
        'name','created_at','updated_at'
    ];

    ### Start Relations ###
    public function cities(){
        //here the one which has many
        return $this->hasMany('App\Models\City','states_id','id');
    }
    ### End Relations ###

}
