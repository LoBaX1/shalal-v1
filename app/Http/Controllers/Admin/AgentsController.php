<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AgentRequest;
use App\Http\Requests\AgentUpdateRequest;
use App\Models\Agent;

class AgentsController extends Controller
{


    ############ Start Create New Agent ############
    public function index(){
        $agents = Agent::select('id','name','phone')->get();
        return view('dashboard.agents.showAll',compact('agents'));
    }
    ############ End Create New Agent ############

    ############ Start Create New Agent ############
    public function create(){
        return view('dashboard.agents.create');
    }
    ############ End Create New Agent ############


    ############ Start Store New Agent ############
    public function store(AgentRequest $request){
        try{
            $agent = new Agent();
            $agent->create([
                'name'=>$request->name,
                'phone' => $request->phone
            ]);
            return redirect()->route('agent.All')->with(['success'=>'تم الإضافة بنجاح']);
        }catch (\Exception $exception){
            return redirect()->route('agent.All')->with(['error'=>'خطأ يرجي المحاولة فيما بعد']);
        }
    }
    ############ End Store New Agent ############

    ############ Start Edit Agent ############
    public function edit($id){
        $agent = Agent::find($id);
        return view('dashboard.agents.edit',compact('agent'));
    }
    ############ End Edit Agent ############

    ############ Start Update Agent ############
    public function update(AgentUpdateRequest $request,$id){
        try{
            $agent = Agent::find($id);
            $agent->update([
                'name'=>$request->name,
                'phone'=>$request->phone
            ]);
            return redirect()->route('agent.All')->with(['success'=>'تم التعديل بنجاح']);
        }catch (\Exception $exception){
            return redirect()->route('agent.All')->with(['error'=>'خطأ يرجي المحاولة فيما بعد']);
        }
    }
    ############ End Update Agent ############

    ############ Start Destroy Agent ############
    public function destroy($id){
        $agent = Agent::find($id);
        try{
            if (!$agent){
                return redirect()->route('agent.All',$id)->with(['error'=>'هذا المندوب غير موجود']);
            }
            $agent->delete();

            return redirect()->route('agent.All')->with(['success'=>'تم الحذف بنجاح']);
        }catch (\Exception $exception){
            return redirect()->route('agent.All')->with(['error'=>' هناك خطأ ما']);
        }
    }
    ############ End Destroy Agent ############
}
