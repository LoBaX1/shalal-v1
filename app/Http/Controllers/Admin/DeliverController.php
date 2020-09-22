<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DeliverRequest;
use App\Models\Agent;
use App\Models\Deliver;
use App\Models\Order;

class DeliverController extends Controller
{
    ############ Start Index ############
    public function all($type = null){
        if(isset($type)){
            if($type == 0){
                $orders = Order::whereDoesntHave('agents')->select()->where('status',0)->get();
                return view('dashboard.delivers.all',compact('orders','type'));
            }
            elseif($type == 1){
                $orders = Order::select()->where('status',1)->get();
                return view('dashboard.delivers.all',compact('orders','type'));
            }
            else{
                return redirect()->route('deliver.All')->with(['error'=>'هناك خطأ فى البيانات']);
            }
        }
        $type = 2;
        $orders = Order::select()->get();
        return view('dashboard.delivers.all',compact('orders','type'));
    }
    ############ End Index ############

    ############ Start Create Deliver ############
    public function create($id){
        $order = Order::find($id);
        $agents = Agent::select()->get();
        return view('dashboard.delivers.create',compact('order','agents'));
    }
    ############ End Create Deliver ############

    ############ Start Store Deliver ############
    public function store(DeliverRequest $request){
        try{

            $s = new Deliver();
            $s->create([
                'agent_id'=>$request->agent_id,
                'order_id'=>$request->order_id,
                'status'=>$request->status,
                'notes'=>$request->notes,
                'delivered'=>$request->delivered,
            ]);
            return redirect()->route('deliver.All')->with(['success'=>'تم الإضافة بنجاح']);
        }catch (\Exception $exception){
            return redirect()->route('deliver.All')->with(['error'=>'خطأ يرجي المحاولة فيما بعد']);
        }
    }
    ############ End Store Deliver ############

    ############ Start Show ############
    public function show(){
        $orders = Order::whereHas('agents',function ($q){
            $q->where('delivered','1');
        })->select()->where('status',0)->get();
        return view('dashboard.delivers.working',compact('orders'));
    }
    ############ End Show ############

    ############ Start Done ############
    public function done($id){
        try{
            $o = Order::find($id);
            $o->update( ['status'=>1]  );
            return redirect()->route('deliver.show')->with(['success'=>'تم إتمام الطلب بنجاح']);
        }catch (\Exception $exception){
            return redirect()->route('deliver.show')->with(['error'=>'خطأ يرجي المحاولة فيما بعد']);
        }
    }
    ############ End Done ############


}
