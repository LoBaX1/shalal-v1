<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;
use App\Http\Requests\ClientUpdateRequest;
use App\Models\Client;
use App\Models\District;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    ############ Start Create New Client ############
    public function index(){
        $clients = Client::select('id','name','phone','address','district_id')->get();

        return view('dashboard.clients.showAll',compact('clients'));
    }
    ############ End Create New Client ############

    ############ Start Create New Client ############
    public function create(){
        $districts = District::select('id','name')->get();
        return view('dashboard.clients.create',compact('districts'));
    }
    ############ End Create New Client ############


    ############ Start Store New Client ############
    public function store(ClientRequest $request){
        try{
            $client = new Client();
            $client->create([
                'name'=>$request->name,
                'phone' => $request->phone,
                'address' => $request->address,
                'district_id' => $request->district_id,
            ]);
            return redirect()->route('client.All')->with(['success'=>'تم الإضافة بنجاح']);
        }catch (\Exception $exception){
            return redirect()->route('client.All')->with(['error'=>'خطأ يرجي المحاولة فيما بعد']);
        }
    }
    ############ End Store New Client ############

    ############ Start Edit Client ############
    public function edit($id){
        $client = Client::find($id);
        $districts = District::select('id','name')->get();
        return view('dashboard.clients.edit',compact('client','districts'));
    }
    ############ End Edit Client ############

    ############ Start Update Client ############
    public function update(ClientUpdateRequest $request,$id){
        try{
            $client = Client::find($id);
            $client->update([
                'name'=>$request->name,
                'phone'=>$request->phone,
                'district_id'=>$request->district_id,
                'address'=>$request->address,
            ]);
            return redirect()->route('client.All')->with(['success'=>'تم التعديل بنجاح']);
        }catch (\Exception $exception){
            return redirect()->route('client.All')->with(['error'=>'خطأ يرجي المحاولة فيما بعد']);
        }
    }
    ############ End Update Client ############

    ############ Start Destroy Client ############
    public function destroy($id){
        $client = Client::find($id);
        try{
            if (!$client){
                return redirect()->route('client.All',$id)->with(['error'=>'هذا المندوب غير موجود']);
            }
            $client->delete();

            return redirect()->route('client.All')->with(['success'=>'تم الحذف بنجاح']);
        }catch (\Exception $exception){
            return redirect()->route('client.All')->with(['error'=>' هناك خطأ ما']);
        }
    }
    ############ End Destroy Client ############
}
