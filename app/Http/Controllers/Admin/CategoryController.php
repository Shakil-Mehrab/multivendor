<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use RealRashid\SweetAlert\Facades\Alert;
use Image;

class CategoryController extends Controller
{
    public function addCategory (Request $request){
        if($request->isMethod('post')){
            $data = $request->all();

            $category = new Category;
            $category->name = $data['category_name'];
            $category->slug = $data['category_slug'];
            $category->parent_id = $data['parent_id'];
            $category->url = $data['category_url'];
            $category->description = $data['category_description'];
            if($request->hasfile('image')){
                echo $img_tmp =$request->file('image');
               if($img_tmp->isValid()){
               //image path code
               $extension = $request->file('image')->getClientOriginalExtension();
               $filename = rand(111,99999).'.'.$extension;
               $img_path = 'uploads/categories/'.$filename;
               //image resize
               Image::make($img_tmp)->resize(500,500)->save($img_path);
               $category->image = $filename;
           }
           }
            $category->save();
            return redirect('/admin/view-categories')->with('flash_message_success','Category Added Successfully!!');
        }
        $levels = Category::where(['parent_id'=>0])->get();
        return view('admin.category.create')->with(compact('levels'));
    }
    public function viewCategories(){
        $categories = Category::get();
        return view('admin.category.view')->with(compact('categories'));
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
                $img_path = 'uploads/categories/'.$filename;

                //image resize
                Image::make($img_tmp)->resize(500,500)->save($img_path);

            }
            }else{
                $filename = $data['current_image'];
            }
            if(empty($data['product_description'])){
                $data['product_description'] = '';
            }
            Category::where(['id'=>$id])->update(['name'=>$data['category_name'],
            'parent_id'=>$data['parent_id'],'description'=>$data['category_description']
            ,'url'=>$data['category_url'],'image'=>$filename]);
            return redirect('/admin/view-categories')->with('flash_message_success','Category Updated Successfully!!!');
        }
        $levels = Category::where(['parent_id'=>0])->get();
        $categoryDetails = Category::where(['id'=>$id])->first();
        return view('admin.category.edit')->with(compact('levels','categoryDetails'));
    }
    public function deleteCategory($id=null){
        $productImage = Category::where(['id'=>$id])->first();
        $image_path = 'uploads/categories/';
        if(file_exists($image_path.$productImage->image)){
            unlink($image_path.$productImage->image);
        }
        Category::where(['id'=>$id])->delete();
        Alert::Success('Deleted','Success Message');
        return redirect()->back()->with('flash_message_error','Category Deleted');
    }
    public function updateStatus(Request $request,$id=null){
        $data = $request->all();
        Category::where('id',$data['id'])->update(['status'=>$data['status']]);

    }
}
