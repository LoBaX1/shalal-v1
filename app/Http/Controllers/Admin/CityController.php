<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StateRequest;
use App\Models\City;
use App\Models\State;

class CityController extends Controller
{
    ############ Start Create New City ############
    public function create(){
        $states = State::select('id','name')->get();
        return view('dashboard.address.city.create',compact('states'));
    }
    ############ End Create New City ############


    ############ Start Store New City ############
    public function store(StateRequest $request){
        try{
            $s = new City();
            $s->create([
                'name'=>$request->name,
                'states_id'=>$request->state_id,
            ]);
            return redirect()->route('address.All')->with(['success'=>'تم الإضافة بنجاح']);
        }catch (\Exception $exception){
            return redirect()->route('address.All')->with(['error'=>'خطأ يرجي المحاولة فيما بعد']);
        }
    }
    ############ End Store New City ############

    ############ Start Edit City ############
    public function edit($id){
        $states_id = City::select('states_id')->where('id',$id)->get();

        $states = State::select('id','name')->get();
        $current_state =State::find($states_id);
        $city = City::find($id);
        return view('dashboard.address.city.edit',compact('city','states','current_state'));
    }
    ############ End Edit City ############

    ############ Start Update City ############
    public function update(StateRequest $request,$id){
        try{
            $state = City::find($id);
            $state->update([
                'name'=>$request->name,
                'states_id'=>$request->state_id]);
            return redirect()->route('address.All')->with(['success'=>'تم التعديل بنجاح']);
        }catch (\Exception $exception){
            return redirect()->route('address.All')->with(['error'=>'خطأ يرجي المحاولة فيما بعد']);
        }
    }
    ############ End Update City ############

    ############ Start Destroy City ############
    public function destroy($id){
        $city = City::find($id);
        try{
            if (!$city){
                return redirect()->route('address.All',$id)->with(['error'=>'هذه المدينة غير موجود']);
            }
            $city->delete();

            return redirect()->route('address.All')->with(['success'=>'تم الحذف بنجاح']);
        }catch (\Exception $exception){
            return redirect()->route('address.All')->with(['error'=>' هناك خطأ ما']);
        }
    }
    ############ End Destroy City ############
}
