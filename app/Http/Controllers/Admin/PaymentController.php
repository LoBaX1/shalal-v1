<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Agent;
use App\Models\Deliver;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    ############ Start Payments ############
    public function index(){

        $payments = Payment::with('orders','admins')->select()->orderBy('id','desc')->get();

        return view('dashboard.payments.index',compact('payments'));
    }
    ############ End Payments ############

    ############ Start Payments ############
    public function all(){

        $orders = Order::whereDoesntHave('payments')->select()->where('status',1)->orderBy('id','desc')->get();
        return view('dashboard.payments.all',compact('orders'));
    }
    ############ End Payments ############

    ############ Start Create Payments ############
    public function create($id){
        $order = Order::find($id);
        $order_agent_id=Deliver::select()->where(['order_id'=>$id])->get();

        $admin_id = Auth::id();
        $admin = Admin::find($admin_id);
        return view('dashboard.payments.create',compact('order','order_agent_id','admin'));
    }
    ############ End Create Payments ############

    ############ Start Store Payments ############
    public function store(Request $request){
        try{

            $s = new Payment();
            $s->create([
                'order_id'=>$request->order_id,
                'admin_id'=>$request->admin_id,
                'amount'=>$request->amount,
                'notes'=>$request->notes,
                'order_agent_id'=>$request->order_agent_id,
            ]);
            return redirect()->route('payment.index')->with(['success'=>'تم الإضافة بنجاح']);
        }catch (\Exception $exception){
            return redirect()->route('payment.index')->with(['error'=>'خطأ يرجي المحاولة فيما بعد']);
        }
    }
    ############ End Store Payments ############

}
