<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    ### Select Table ###
    protected $table ='orders';

    ### Select Fields in table ###
    protected $fillable = [
        'client_id','tank_capacity','delay','delay_date','price','status','notes','created_at','updated_at'
    ];
    protected $hidden =['pivot'];

    ### Start Relations ###
    public function clients(){
        return $this->belongsTo('App\Models\Client','client_id','id');
    }

    public function payments(){
        return $this->hasMany('App\Models\Payment','order_id','id');
    }
    public function agents(){
        return $this->belongsToMany('App\Models\Agent','order_agents','order_id','agent_id','id','id');
    }
    ### End Relations ###

    public function status(){
       return $this->status == 1 ?'تمت' : 'جاري العمل';
    }

}

