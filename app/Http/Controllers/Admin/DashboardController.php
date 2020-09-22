<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\Client;
use App\Models\Order;
use App\Models\Payment;

class DashboardController extends Controller
{
    public function index(){
        //new clients
        $clients = Client::select()->orderBy('id','desc')->get();
        $clients_c = count($clients);
        if ($clients_c >8){$clients_c = 8;}

        //new payments
        $payments = Payment::with('orders','admins')->select()->orderBy('id','desc')->get();
        $payments_c = count($payments);
        if ($payments_c >8){$payments_c = 8;}

        $agents = Agent::select()->get();
        $orders = Order::select()->get();

        return view('dashboard.index',compact('clients','clients_c','payments','payments_c','agents','orders'));
    }
}
