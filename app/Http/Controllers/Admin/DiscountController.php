<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Discount;
use RealRashid\SweetAlert\Facades\Alert;
use Image;
class DiscountController extends Controller
{
    public function addCategory (Request $request){
        if($request->isMethod('post')){
            $data = $request->all();

            $category = new Discount;
            $category->name = $data['name'];
            $category->slug = $data['slug'];
            $category->discount = $data['discount'];
            $category->discount_type = $data['discount_type'];
            if($request->hasfile('image')){
                echo $img_tmp =$request->file('image');
               if($img_tmp->isValid()){
               //image path code
               $extension = $request->file('image')->getClientOriginalExtension();
               $filename = rand(111,99999).'.'.$extension;
               $img_path = 'uploads/discount/'.$filename;
               //image resize
               Image::make($img_tmp)->resize(500,500)->save($img_path);
               $category->image = $filename;
           }
           }
            $category->save();
            return redirect('/admin/view-discount')->with('flash_message_success','Discount Added Successfully!!');
        }
        return view('admin.discount.create');
    }
    public function viewCategories(){
        $products = Discount::orderby('name','asc')->get();
        return view('admin.discount.view')->with(compact('products'));
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
                $img_path = 'uploads/discount/'.$filename;

                //image resize
                Image::make($img_tmp)->resize(500,500)->save($img_path);

            }
            }else{
                $filename = $data['current_image'];
            }
            
            Discount::where(['id'=>$id])->update(['name'=>$data['name'],
            'slug'=>$data['slug'],'discount'=>$data['discount']
            ,'discount_type'=>$data['discount_type'],'image'=>$filename]);
            return redirect('/admin/view-discount')->with('flash_message_success','Discount Updated Successfully!!!');
        }
        $productDetails = Discount::where(['id'=>$id])->first();
        return view('admin.discount.edit')->with(compact('productDetails'));
    }
    public function deleteCategory($id=null){
        $productImage = Discount::where(['id'=>$id])->first();
        $image_path = 'uploads/discount/';
        if(file_exists($image_path.$productImage->image)){
            unlink($image_path.$productImage->image);
        }
        Discount::where(['id'=>$id])->delete();
        Alert::Success('Deleted','Success Message');
        return redirect()->back()->with('flash_message_error','Discount Deleted');
    }
    public function updateStatus(Request $request,$id=null){
        $data = $request->all();
        Discount::where('id',$data['id'])->update(['status'=>$data['status']]);

    }
}
