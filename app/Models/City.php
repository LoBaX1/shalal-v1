<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{

    ### Select Table ###
    protected $table ='cities';

    ### Select Fields in table ###
    protected $fillable = [
        'name','states_id','created_at','updated_at'
    ];

    ### Start Relations ###
    public function states(){
        return $this->belongsTo('App\Models\State','states_id','id');
    }

    public function districts(){
        //here the one which has many
        return $this->hasMany('App\Models\District','city_id','id');
    }
    ### End Relations ###

}
