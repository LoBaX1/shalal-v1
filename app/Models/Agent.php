<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    ### Select Table ###
    protected $table ='agents';

    ### Select Fields in table ###
    protected $fillable = [
        'name','phone','created_at','updated_at'
    ];
    protected $hidden = [
        'pivot'
    ];

    ### Start Relations ###
    public function orders(){
        return $this->belongsToMany('App\Models\Order','order_agents','agent_id','order_id','id','id');
    }
    ### End Relations ###

}
