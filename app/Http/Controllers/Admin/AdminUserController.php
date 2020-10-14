<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Image;

class AdminUserController extends Controller
{

    public function viewCategories(){
        $categories = User::orderBy('name','asc')->get();
        return view('admin.user.view')->with(compact('categories'));
    }
    public function editCategory(Request $request,$id=null){
        if($request->isMethod('post')){
            $data = $request->all();
            User::where(['id'=>$id])->update(['name'=>$data['name'],
            'role_id'=>$data['role_id'],'email'=>$data['email']
            ,'country_name'=>$data['country_name'],'city_name'=>$data['city_name']]);
            return redirect('/admin/view-user')->with('flash_message_success','User Updated Successfully!!!');
        }
        $categoryDetails = User::where(['id'=>$id])->first();
        return view('admin.user.edit')->with(compact('categoryDetails'));
    }
    public function deleteCategory($id=null){
        User::where(['id'=>$id])->delete();
        Alert::Success('Deleted','Success Message');
        return redirect()->back()->with('flash_message_error','User Deleted');
    }
    public function updateStatus(Request $request,$id=null){
        $data = $request->all();
        User::where('id',$data['id'])->update(['status'=>$data['status']]);

    }
}
