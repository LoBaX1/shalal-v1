<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    ### Select Table ###
    protected $table ='districts';

    ### Select Fields in table ###
    protected $fillable = [
        'name','city_id','created_at','updated_at'
    ];

    ### Start Relations ###
    public function cities(){
        return $this->belongsTo('App\Models\City','city_id','id');
    }
    public function clients(){
        //here the one which has many
        return $this->hasMany('App\Models\Client','district_id','id');
    }
    ### End Relations ###
}
