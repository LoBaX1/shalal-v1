<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    ### Select Table ###
    protected $table ='clients';

    ### Select Fields in table ###
    protected $fillable = [
        'name','phone','district_id','address','created_at','updated_at'
    ];

    ### Start Relations ###
    public function districts(){
        return $this->belongsTo('App\Models\District','district_id','id');
    }

    public function orders(){
        //here the one which has many
        return $this->hasMany('App\Models\Order','client_id','id');
    }
    ### End Relations ###
}
