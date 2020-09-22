<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deliver extends Model
{
    ### Select Table ###
    protected $table ='order_agents';

    ### Select Fields in table ###
    protected $fillable = [
        'agent_id','order_id','status','note','delivered','created_at','updated_at'
    ];

    ### Start Relations ###

    ### End Relations ###
}
