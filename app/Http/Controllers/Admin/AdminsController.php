<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminsRequest;
use App\Http\Requests\AdminsUpdateRequest;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    ############ Start Show All Admins ############
    public function index(){
        $admins = Admin::select()->paginate(PAGINATION_COUNT);
        return view('dashboard.admins.showAllAdmins' ,compact('admins'));
    }
    ############ End Show All Admins ############

    ############ Start Create New Admins ############
    public function create(){
        return view('dashboard.admins.create');
    }
    ############ End Create New Admins ############


    ############ Start Create New Admins ############
    public function store(AdminsRequest $request){
        try{
            //store every thing except token
            Admin::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => bcrypt($request->password),
                'permissions' => $request->permissions,
            ]);
            return redirect()->route('admin.showAdmins')->with(['success'=>'تم الإضافة بنجاح']);
        }catch (\Exception $exception){
            return redirect()->route('admin.showAdmins')->with(['error'=>'خطأ يرجي المحاولة فيما بعد']);
        }
    }
    ############ End Create New Admins ############

    ############ Start Edit Admins ############
    public function edit($id){
        $admin = Admin::select()->find($id);

        if (!$admin){
            return redirect()->route('admin.showAdmins')->with(['error'=>'هذا المستخدم غير موجود']);
        }
        return view('dashboard.admins.edit',compact('admin'));
    }
    ############ End Edit Admins ############


    ############ Start Update Admins ############
    public function update(AdminsUpdateRequest $request ,$id){
        $admin = Admin::find($id);
        try{
            if (!$admin){
                return redirect()->route('admin.editAdmin',$id)->with(['error'=>'هذا المستخدم غير موجود']);
            }

            $admin->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => bcrypt($request->password),
                'permissions' => $request->permissions,
            ]);
            return redirect()->route('admin.showAdmins')->with(['success'=>'تم التحديث بنجاح']);
        }catch (\Exception $exception){
            return redirect()->route('admin.showAdmins')->with(['error'=>' هناك خطأ ما']);
        }
    }
    ############ End Update Admins ############

    ############ Start Destroy Admins ############
    public function destroy($id){

        $admin = Admin::find($id);
        try{
            if (!$admin){
                return redirect()->route('admin.showAdmins',$id)->with(['error'=>'هذا المستخدم غير موجود']);
            }
            $admin->delete();

            return redirect()->route('admin.showAdmins')->with(['success'=>'تم الحذف بنجاح']);
        }catch (\Exception $exception){
            return redirect()->route('admin.showAdmins')->with(['error'=>' هناك خطأ ما']);
        }
    }
    ############ End Destroy Admins ############

}
