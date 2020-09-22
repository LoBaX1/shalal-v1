<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StateRequest;
use App\Models\City;
use App\Models\District;
use App\Models\State;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    ############ Start Create New District ############
    public function create(){

            $cities = City::select('id','name')->get();
            return view('dashboard.address.district.create',compact('cities'));

    }
    ############ End Create New District ############


    ############ Start Store New District ############
    public function store(StateRequest $request){
        try{
            $s = new District();
            $s->create([
                'name'=>$request->name,
                'city_id'=>$request->city_id,
            ]);
            return redirect()->route('address.All')->with(['success'=>'تم الإضافة بنجاح']);
        }catch (\Exception $exception){
            return redirect()->route('address.All')->with(['error'=>'خطأ يرجي المحاولة فيما بعد']);
        }
    }
    ############ End Store New District ############

    ############ Start Edit District ############
    public function edit($id){
        $cities_id = District::select('city_id')->where('id',$id)->get();

        $cities = City::select('id','name')->get();
        $current_city =City::find($cities_id);
        $district = District::find($id);
        return view('dashboard.address.district.edit',compact('cities','district','current_city'));
    }
    ############ End Edit District ############

    ############ Start Update District ############
    public function update(StateRequest $request,$id){
        try{
            $district = District::find($id);
            $district->update([
                'name'=>$request->name,
                'city_id'=>$request->city_id]);
            return redirect()->route('address.All')->with(['success'=>'تم التعديل بنجاح']);
        }catch (\Exception $exception){
            return redirect()->route('address.All')->with(['error'=>'خطأ يرجي المحاولة فيما بعد']);
        }
    }
    ############ End Update District ############

    ############ Start Destroy District ############
    public function destroy($id){
        $district = District::find($id);
        try{
            if (!$district){
                return redirect()->route('address.All',$id)->with(['error'=>'هذه المدينة غير موجود']);
            }
            $district->delete();

            return redirect()->route('address.All')->with(['success'=>'تم الحذف بنجاح']);
        }catch (\Exception $exception){
            return redirect()->route('address.All')->with(['error'=>' هناك خطأ ما']);
        }
    }
    ############ End Destroy District ############
}
