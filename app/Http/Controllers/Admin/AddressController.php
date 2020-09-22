<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    ############ Start Show All Address Without District ############
    public function index($id=null){
        $states = State::select('id','name')->get();
        if(isset($id)){

            $cities = State::find($id)->cities;
            return view('dashboard.address.index',compact('states','cities'));
        }
        return view('dashboard.address.index',compact('states'));
    }
    ############ End Show All Address Without District  ############


    ############ Start Show All Address With District ############
    public function indexDistrict($id=null){
        $states = State::select('id','name')->get();
        $cities = City::select('id','name')->get();
        if(isset($id)){
            $current_district =City::find($id);
            $districts = City::find($id)->districts;
            return view('dashboard.address.index',compact('states','districts','current_district','cities'));
        }
        return view('dashboard.address.index',compact('states','cities'));
    }
    ############ End Show All Address With District  ############

}

