<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Deliverybranch;
use App\Models\City;

use RealRashid\SweetAlert\Facades\Alert;
use Image;

class DeliveryBranchController extends Controller
{
    public function addCategory (Request $request){
        if($request->isMethod('post')){
            $data = $request->all();

            $category = new Deliverybranch;
            $category->name = $data['name'];
            $category->slug = $data['slug'];
            $category->city_id = $data['city_id'];
            $category->charge = $data['charge'];
            $category->save();
            return redirect('/admin/view-delivery/branch')->with('flash_message_success','Deliverybranch Added Successfully!!');
        }
        $levels = City::orderBy('name','asc')->get();
        return view('admin.deliveryBranch.create')->with(compact('levels'));
    }
    public function viewCategories(){
        $categories = Deliverybranch::orderBy('name','asc')->get();
        return view('admin.deliveryBranch.view')->with(compact('categories'));
    }
    public function editCategory(Request $request,$id=null){
        if($request->isMethod('post')){
            $data = $request->all();
            
            Deliverybranch::where(['id'=>$id])->update(['name'=>$data['name'],
            'slug'=>$data['slug'],'city_id'=>$data['city_id']
            ,'charge'=>$data['charge']]);
            return redirect('/admin/view-delivery/branch')->with('flash_message_success','Deliverybranch Updated Successfully!!!');
        }
        $levels = City::orderBy('name','asc')->get();
        $categoryDetails = Deliverybranch::where(['id'=>$id])->first();
        return view('admin.deliveryBranch.edit')->with(compact('levels','categoryDetails'));
    }
    public function deleteCategory($id=null){
        Deliverybranch::where(['id'=>$id])->delete();
        Alert::Success('Deleted','Success Message');
        return redirect()->back()->with('flash_message_error','Deliverybranch Deleted');
    }
    public function updateStatus(Request $request,$id=null){
        $data = $request->all();
        Deliverybranch::where('id',$data['id'])->update(['status'=>$data['status']]);

    }
}
