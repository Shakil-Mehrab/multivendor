<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Order;
use App\Models\Country;
use App\Models\Deliverybranch;
use App\Models\City;
use App\Models\Order_item;

use Image;

class AdminCartController extends Controller
{
    public function addCategory (Request $request){
        if($request->isMethod('post')){
            $data = $request->all();

            $category = new Order;
            $category->name = $data['category_name'];
            $category->slug = $data['category_slug'];
            $category->parent_id = $data['parent_id'];
            $category->url = $data['category_url'];
            $category->description = $data['category_description'];
            $category->save();
            return redirect('/admin/view-cart')->with('flash_message_success','Order Added Successfully!!');
        }
        $levels = Order::orderBy('id','desc')->get();
        return view('admin.order.create')->with(compact('levels'));
    }
    public function viewCategories(){
        $categories = Order::orderBy('id','desc')->get();
        return view('admin.order.view')->with(compact('categories'));
    }
    public function editCategory(Request $request,$id=null){
        if($request->isMethod('post')){
            $data = $request->all();
            Order::where(['id'=>$id])->update(['shipping_fullname'=>$data['shipping_fullname'],
            'shipping_phone'=>$data['shipping_phone'],'shipping_address'=>$data['shipping_address']
            ,'deliverybranch_id'=>$data['deliverybranch_id'],'country_id'=>$data['country_id'],'city_id'=>$data['city_id']]);
            return redirect('/admin/view-order')->with('flash_message_success','Order Updated Successfully!!!');
        }
        $countries = Country::orderBy('name','asc')->get();
        $cities = City::orderBy('name','asc')->get();
        $branches = Deliverybranch::orderBy('name','asc')->get();

        $categoryDetails = Order::where(['id'=>$id])->first();
        return view('admin.order.edit')->with(compact('countries','cities','branches','categoryDetails'));
    }
    public function deleteCategory($id=null){
        Order::where(['id'=>$id])->delete();
        Alert::Success('Deleted','Success Message');
        return redirect()->back()->with('flash_message_error','Order Deleted');
    }
    public function updateStatus(Request $request,$id=null){
        $data = $request->all();
        Order::where('id',$data['id'])->update(['is_paid'=>$data['status']]);

    }
    public function viewCategoriesItem($id=null){
        $category = Order::find($id);
        return view('admin.order.viewOrderItem')->with(compact('category'));
    }
    public function viewCategoriesItemDelete($id=null){
        Order_item::where(['id'=>$id])->delete();
        Alert::Success('Deleted','Success Message');
        return redirect()->back()->with('flash_message_error','Order Item Deleted');
    }
}
