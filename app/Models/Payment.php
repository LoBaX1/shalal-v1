<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    ### Select Table ###
    protected $table ='payments';

    ### Select Fields in table ###
    protected $fillable = [
        'order_agent_id','order_id','admin_id','amount','notes','created_at','updated_at'
    ];

    ### Start Relations ###
    public function orders(){
        return $this->belongsTo('App\Models\Order','order_id','id');
    }
    public function admins(){
        return $this->belongsTo('App\Models\Admin','admin_id','id');
    }

    ### End Relations ###
}
