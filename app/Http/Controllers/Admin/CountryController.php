<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use RealRashid\SweetAlert\Facades\Alert;
use Image;
class CountryController extends Controller
{
    public function addCategory (Request $request){
        if($request->isMethod('post')){
            $data = $request->all();

            $category = new Country;
            $category->name = $data['name'];
            $category->code = $data['code'];
            if($request->hasfile('image')){
                echo $img_tmp =$request->file('image');
               if($img_tmp->isValid()){
               //image path code
               $extension = $request->file('image')->getClientOriginalExtension();
               $filename = rand(111,99999).'.'.$extension;
               $img_path = 'uploads/country/'.$filename;
               //image resize
               Image::make($img_tmp)->resize(500,500)->save($img_path);
               $category->flag = $filename;
           }
           }
            $category->save();
            return redirect('/admin/view-country')->with('flash_message_success','Country Added Successfully!!');
        }
        return view('admin.country.create');
    }
    public function viewCategories(){
        $categories = Country::get();
        return view('admin.country.view')->with(compact('categories'));
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
                $img_path = 'uploads/country/'.$filename;
                //image resize
                Image::make($img_tmp)->resize(500,500)->save($img_path);
            }
            }else{
                $filename = $data['current_image'];
            }
            if(empty($data['product_description'])){
                $data['product_description'] = '';
            }
            Country::where(['id'=>$id])->update(['name'=>$data['name'],
            'code'=>$data['code'],'flag'=>$filename]);
            return redirect('/admin/view-country')->with('flash_message_success','Country Updated Successfully!!!');
        }
        $categoryDetails = Country::where(['id'=>$id])->first();
        return view('admin.country.edit')->with(compact('categoryDetails'));
    }
    public function deleteCategory($id=null){
        $productImage = Country::where(['id'=>$id])->first();
        $image_path = 'uploads/country/';
        if(file_exists($image_path.$productImage->flag)){
            unlink($image_path.$productImage->flag);
        }
        Country::where(['id'=>$id])->delete();
        Alert::Success('Deleted','Success Message');
        return redirect()->back()->with('flash_message_error','Country Deleted');
    }
    public function updateStatus(Request $request,$id=null){
        $data = $request->all();
        Country::where('id',$data['id'])->update(['status'=>$data['status']]);

    }
}
