<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Slide;
use RealRashid\SweetAlert\Facades\Alert;
use Image;
class SlideController extends Controller
{
    public function addCategory (Request $request){
        if($request->isMethod('post')){
            $data = $request->all();

            $category = new Slide;
            $category->name = $data['name'];
            $category->slug = $data['slug'];
            $category->position = $data['position'];
            if($request->hasfile('image')){
                echo $img_tmp =$request->file('image');
               if($img_tmp->isValid()){
               //image path code
               $extension = $request->file('image')->getClientOriginalExtension();
               $filename = rand(111,99999).'.'.$extension;
               $img_path = 'uploads/slider/'.$filename;
               //image resize
               Image::make($img_tmp)->resize(1970,500)->save($img_path);
               $category->image = $filename;
           }
           }
            $category->save();
            return redirect('/admin/view-slide')->with('flash_message_success','Slide Added Successfully!!');
        }
        return view('admin.slider.create');
    }
    public function viewCategories(){
        $products = Slide::orderby('id','desc')->get();
        return view('admin.slider.view')->with(compact('products'));
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
                $img_path = 'uploads/slider/'.$filename;

                //image resize
                Image::make($img_tmp)->resize(1970,500)->save($img_path);

            }
            }else{
                $filename = $data['current_image'];
            }

            Slide::where(['id'=>$id])->update(['name'=>$data['name']
            ,'slug'=>$data['slug'],'position'=>$data['position'],'image'=>$filename]);
            return redirect('/admin/view-slide')->with('flash_message_success','Slide Updated Successfully!!!');
        }
        $productDetails = Slide::where(['id'=>$id])->first();
        return view('admin.slider.edit')->with(compact('productDetails'));
    }
    public function deleteCategory($id=null){
        $productImage = Slide::where(['id'=>$id])->first();
        $image_path = 'uploads/slider/';
        if(file_exists($image_path.$productImage->image)){
            unlink($image_path.$productImage->image);
        }
        Slide::where(['id'=>$id])->delete();
        Alert::Success('Deleted','Success Message');
        return redirect()->back()->with('flash_message_error','Slide Deleted');
    }

}
