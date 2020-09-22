<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StateRequest;
use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    ############ Start Create New State ############
    public function create(){
        return view('dashboard.address.states.create');
    }
    ############ End Create New State ############


    ############ Start Store New State ############
    public function store(StateRequest $request){
        try{
            $s = new State();
            $s->create(['name'=>$request->name]);
            return redirect()->route('address.All')->with(['success'=>'تم الإضافة بنجاح']);
        }catch (\Exception $exception){
            return redirect()->route('address.All')->with(['error'=>'خطأ يرجي المحاولة فيما بعد']);
        }
    }
    ############ End Store New State ############

    ############ Start Edit State ############
    public function edit($id){
        $state = State::find($id);
        return view('dashboard.address.states.edit',compact('state'));
    }
    ############ End Edit State ############

    ############ Start Update State ############
    public function update(StateRequest $request,$id){
        try{
            $state = State::find($id);
            $state->update(['name'=>$request->name]);
            return redirect()->route('address.All')->with(['success'=>'تم التعديل بنجاح']);
        }catch (\Exception $exception){
            return redirect()->route('address.All')->with(['error'=>'خطأ يرجي المحاولة فيما بعد']);
        }
    }
    ############ End Update State ############

    ############ Start Destroy State ############
    public function destroy($id){
        $state = State::find($id);
        try{
            if (!$state){
                return redirect()->route('address.All',$id)->with(['error'=>'هذه المحافظة غير موجود']);
            }
            $state->delete();

            return redirect()->route('address.All')->with(['success'=>'تم الحذف بنجاح']);
        }catch (\Exception $exception){
            return redirect()->route('address.All')->with(['error'=>' هناك خطأ ما']);
        }
    }
    ############ End Destroy State ############
}
