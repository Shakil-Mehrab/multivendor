<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use RealRashid\SweetAlert\Facades\Alert;
use App\Mail\ShopActivationRequest;
use App\Models\Category;
use App\Models\Country;
use App\Models\City;
use App\Models\Shop;
use Session;
use Image;
use DB;
use Auth;
use Mail;

class ShopController extends Controller
{
    public function addCategory (Request $request){
        if($request->isMethod('post')){

            $data = $request->all();
            $shop=new Shop();
            $shop->name= $data['name'];
            $shop->phone =$data['phone'];
            $shop->country_id =$data['country_id'];
            $shop->city_id =$data['city_id'];
            $shop->address =$data['address'];
            $shop->description =$data['description'];
            $shop->user_id=auth()->user()->id;
            if($request->hasfile('image')){

                echo $img_tmp =$request->file('image');
               if($img_tmp->isValid()){
               //image path code
               $extension = $request->file('image')->getClientOriginalExtension();
               $filename = rand(111,99999).'.'.$extension;
               $img_path = 'uploads/shop/'.$filename;
               //image resize
               Image::make($img_tmp)->resize(500,500)->save($img_path);
               $shop->image = $filename;
           }
           }
            //send mail to admin
            // $admins = User::whereHas('role', function ($q) {
            //     $q->where('name', 'admin');
            // })->get();
            // Mail::to('mehrabhoussainshakil4@gmail.com')->send(new ShopActivationRequest($shop));
            $shop->save();
            return redirect('/')->withSuccess('Shop Created Succesfully!!! Wait For Confirmation');
        }
        return view('admin.shop.create');
    }
    public function viewCategories(){
        if(auth()->user()->role_id==1){
            $products = Shop::get();
        }else{
            $products = Shop::where('user_id',auth()->user()->id)->get();
        }
        return view('admin.shop.view')->with(compact('products'));
    }
    public function editCategory(Request $request,$id=null){
        if($request->isMethod('post')){
            $data = $request->all();
            if($request->hasfile('image')){
                echo $img_tmp =$request->file('image');
                if($img_tmp->isValid()){
                //image path code
                $extension = $img_tmp->getClientOriginalExtension();
                $filename = rand(111,99999).'.'.$extension;
                $img_path = 'uploads/shop/'.$filename;
                //image resize
                Image::make($img_tmp)->resize(500,500)->save($img_path);

            }
            }else{
                $filename = $data['current_image'];
            }

            Shop::where(['id'=>$id])->update(['name'=>$data['name'],
            'phone'=>$data['phone'],'country_id'=>$data['country_id']
            ,'city_id'=>$data['city_id'],'address'=>$data['address'],'description'=>$data['description'],'rating'=>$data['rating'],'image'=>$filename]);
            return redirect('/admin/view-shop')->with('flash_message_success','Shop Updated Successfully!!!');
        }
        $productDetails = Shop::where(['id'=>$id])->first();
        $shops= Shop::orderBy('name','asc')->get();
        $countries = Country::orderBy('name','asc')->get();
        $cities = City::orderBy('name','asc')->get();
        return view('admin.shop.edit')->with(compact('countries','cities','productDetails'));
    }
    public function deleteCategory($id=null){
        $productImage = Shop::where(['id'=>$id])->first();
        $image_path = 'uploads/shop/';
        if(file_exists($image_path.$productImage->image)){
            unlink($image_path.$productImage->image);
        }
        Shop::where(['id'=>$id])->delete();
        Alert::Success('Deleted','Success Message');
        return redirect()->back()->with('flash_message_error','Shop Deleted');
    }
    public function updateStatus(Request $request,$id=null){
        $data = $request->all();
        // return $data;
        $shop=Shop::where('id',$data['id'])->first();
        $user=$shop->owner;
        Shop::where('id',$data['id'])->update(['is_active'=>$data['status']]);
        if($data['status']=='1'){
            $user->role_id=2;
            $user->update();
        }else{
            $user->role_id=3;
            $user->update();
        }

    }
}
