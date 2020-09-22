<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrdersRequest;
use App\Http\Requests\OrdersUpdateRequest;
use App\Models\Client;
use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    ############ Start Show All ############
    public function index(){
        $orders = Order::select()->get();
        return view('dashboard.orders.showAll',compact('orders'));
    }
    ############ End Show All ############

    ############ Start Create New Order ############
    public function create(){
        $clients = Client::select('id','name')->get();
        return view('dashboard.orders.createOrder',compact('clients'));
    }
    ############ End Create New Order ############


    ############ Start Store New Order ############
    public function store(OrdersRequest $request){
        try{
            $order = new Order();

            $order->create([
                'client_id'=>$request->client_id,
                'tank_capacity' => $request->tank_capacity,
                'delay' => $request->delay,
                'delay_date' =>date('Y-m-d H:i:s'),
                'price' => $request->price,
                'notes' => $request->notes,
                'status' => $request->status,
            ]);
            return redirect()->route('order.All')->with(['success'=>'تم الإضافة بنجاح']);
        }catch (\Exception $exception){
            return $exception;
        }
    }
    ############ End Store New Order ############

    ############ Start Edit Order ############
    public function edit($id){
        $order = Order::find($id);
        $clients = Client::select('id','name')->get();

        return view('dashboard.orders.edit',compact('order','clients'));
    }
    ############ End Edit Order ############

    ############ Start Update Order ############
    public function update(OrdersUpdateRequest $request,$id){
        try{
            $order = Order::find($id);
            $order->update([
                'client_id'=>$request->client_id,
                'tank_capacity' => $request->tank_capacity,
                'delay' => $request->delay,
                'price' => $request->price,
                'notes' => $request->notes,
                'status' => $request->status,]);
            return redirect()->route('order.All')->with(['success'=>'تم التعديل بنجاح']);
        }catch (\Exception $exception){
            return redirect()->route('order.All')->with(['error'=>'خطأ يرجي المحاولة فيما بعد']);
        }
    }
    ############ End Update Order ############

    ############ Start Destroy Order ############
    public function destroy($id){
        $order = Order::find($id);
        try{
            if (!$order){
                return redirect()->route('order.All',$id)->with(['error'=>'هذا الطلب غير موجود']);
            }
            $order->delete();

            return redirect()->route('order.All')->with(['success'=>'تم الحذف بنجاح']);
        }catch (\Exception $exception){
            return redirect()->route('order.All')->with(['error'=>' هناك خطأ ما']);
        }
    }
    ############ End Destroy Order ############
}
