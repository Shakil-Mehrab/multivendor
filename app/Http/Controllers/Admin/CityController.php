<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Country;

use RealRashid\SweetAlert\Facades\Alert;
use Image;
class CityController extends Controller
{
    public function addCategory (Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $category = new City;
            $category->name = $data['name'];
            $category->country_id = $data['country_id'];
            $category->save();
            return redirect('/admin/view-city')->with('flash_message_success','City Added Successfully!!');
        }
        $levels = Country::orderBy('name','asc')->get();
        return view('admin.city.create')->with(compact('levels'));
    }
    public function viewCategories(){
        $categories = City::get();
        return view('admin.city.view')->with(compact('categories'));
    }
    public function editCategory(Request $request,$id=null){
        if($request->isMethod('post')){
            $data = $request->all();
            City::where(['id'=>$id])->update(['name'=>$data['name'],
            'country_id'=>$data['country_id']]);
            return redirect('/admin/view-city')->with('flash_message_success','City Updated Successfully!!!');
        }
        $levels = Country::orderBy('name','asc')->get();
        $categoryDetails = City::where(['id'=>$id])->first();
        return view('admin.city.edit')->with(compact('levels','categoryDetails'));
    }
    public function deleteCategory($id=null){
        City::where(['id'=>$id])->delete();
        Alert::Success('Deleted','Success Message');
        return redirect()->back()->with('flash_message_error','City Deleted');
    }
    public function updateStatus(Request $request,$id=null){
        $data = $request->all();
        City::where('id',$data['id'])->update(['status'=>$data['status']]);

    }
}
