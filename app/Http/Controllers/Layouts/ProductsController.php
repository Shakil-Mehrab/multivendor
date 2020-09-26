<?php

namespace App\Http\Controllers\Layouts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use RealRashid\SweetAlert\Facades\Alert;
use Image;
use App\Models\Product;
use App\Models\Category;
use App\Models\Product_attribute;
use App\Models\Product_image;
use App\Models\Coupons;
use App\Models\Discount;
use App\Models\Shop;


use DB;
use Session;
class ProductsController extends Controller
{
    public function addProduct(Request $request){
        if($request->ismethod('post')){
            $data = $request->all();
            // dd($data);
            $product = new Product;
            $product->category_id = $data['category_id'];
            $product->shop_id = $data['shop_id'];
            $product->name = $data['name'];
            $product->slug = $data['slug'];
            $product->brand = $data['brand'];
            $product->code = $data['code'];
            $product->color = $data['color'];
            $product->price = $data['price'];
            $product->quantity = $data['quantity'];
            $product->min_order = $data['min_order'];
            $product->weight = $data['weight'];
            $product->description = $data['description'];
            // addmin section

            //Upload image
            if($request->hasfile('image')){
                 echo $img_tmp =$request->file('image');
                if($img_tmp->isValid()){
                //image path code
                $extension = $request->file('image')->getClientOriginalExtension();
                $filename = rand(111,99999).'.'.$extension;
                $img_path = 'uploads/products/'.$filename;
                //image resize
                Image::make($img_tmp)->resize(500,500)->save($img_path);
                $product->image = $filename;
            }
            }
            $product->save();
            return redirect('/admin/view-products')->with('flash_message_success','Product has been added successfully!!');

        }
        //Categories Dropdown menu Code
        $categories = Category::where(['parent_id'=>0])->get();
        $shops=Shop::orderBy('name','asc')->where('is_active',1)->get();
        $discounts=Discount::orderBy('name','asc')->get();
        return view('layouts.products.create')->with(compact('categories','discounts','shops'));
    }
    public function viewProducts(){
        $products = Product::get();
        if(auth()->user()->role_id==1){
            $products = Product::get();
        }else{
            $products = Product::where('shop_id',auth()->user()->shop->id)->get();
        }
        return view('layouts.products.view')->with(compact('products'));
    }
    public function editProduct(Request $request,$id=null){
        if($request->isMethod('post')){
             $data = $request->all();
             //Upload image
            if($request->hasfile('image')){
                echo $img_tmp =$request->file('image');
                if($img_tmp->isValid()){

                //image path code
                $extension = $img_tmp->getClientOriginalExtension();
                $filename = rand(111,99999).'.'.$extension;
                $img_path = 'uploads/products/'.$filename;

                //image resize
                Image::make($img_tmp)->resize(500,500)->save($img_path);

            }
            }else{
                $filename = $data['current_image'];
            }
            Product::where(['id'=>$id])->update([
            'category_id'=>$data['category_id'],'shop_id'=>$data['shop_id'],'name'=>$data['name'],'slug'=>$data['slug'],'brand'=>$data['brand'],'code'=>$data['code'],'color'=>$data['color'],
            'price'=>$data['price'],'quantity'=>$data['quantity'],'weight'=>$data['weight'],'min_order'=>$data['min_order'],'description'=>$data['description'],
            'image'=>$filename]);
            return redirect('/admin/view-products')->with('flash_message_success','Product has been updated!!');
        }
        $productDetails = Product::where(['id'=>$id])->first();

        //Category dropdown code
        $categories = Category::where(['parent_id'=>0])->get();
        // $categories_dropdown = "<option value='' selected disabled>Select</option>";
        $shops=Shop::orderBy('name','asc')->where('is_active',1)->get();
        $discounts=Discount::orderBy('name','asc')->get();
        return view('layouts.products.edit')->with(compact('productDetails','categories','discounts','shops'));
    }
    public function deleteProduct($id=null){
        Product::where(['id'=>$id])->delete();
        Alert::success('Deleted Successfully', 'Success Message');
        return redirect()->back()->with('flash_message_error','Product Deleted');
    }
    public function updateStatus(Request $request,$id=null){
        $data = $request->all();
        Product::where('id',$data['id'])->update(['status'=>$data['status']]);

    }
    public function products($id=null){
        $productDetails = Product::with('attributes')->where('id',$id)->first();
        $ProductsAltImages = Product_image::where('product_id',$id)->get();
        $featuredProducts = Product::where(['featured_products'=>1])->get();
        // echo $productDetails;die;
        return view('wayshop.product_details')->with(compact('productDetails','ProductsAltImages','featuredProducts'));
    }
    public function addAttributes(Request $request,$id=null){
        $productDetails = Product::with('attributes')->where(['id'=>$id])->first();
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>";print_r($data);die;
            foreach($data['sku'] as $key =>$val){
                if(!empty($val)){
                    //Prevent duplicate SKU Record
                    $attrCountSKU = Product_attribute::where('sku',$val)->count();
                    if($attrCountSKU>0){
                        return redirect('/admin/add-attributes/'.$id)->with('flash_message_error','SKU is already exist please select another sku');
                    }
                    //Prevent duplicate Size Record
                    $attrCountSizes = Product_attribute::where(['product_id'=>$id,'size'=>$data['size']
                    [$key]])->count();
                    if($attrCountSizes>0){
                    return redirect('/admin/add-attributes/'.$id)->with('flash_message_error',''.$data['size'][$key].'Size is already exist please select another size');
                    }
                    $attribute = new Product_attribute;
                    $attribute->product_id = $id;
                    $attribute->sku = $val;
                    $attribute->size = $data['size'][$key];
                    $attribute->price = $data['price'][$key];
                    $attribute->stock = $data['stock'][$key];
                    $attribute->save();
                }

            }
            return redirect('/admin/add-attributes/'.$id)->with('flash_message_success','Products attributes added successfully!');

        }
        return view('layouts.products.attribute.create')->with(compact('productDetails'));
    }
    public function deleteAttribute($id=null){
        Product_attribute::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_error','Product Attribute is deleted!');

    }
    public function editAttributes(Request $request,$id=null){
        if($request->isMethod('post')){
            $data = $request->all();
            foreach($data['attr'] as $key=>$attr){
                Product_attribute::where(['id'=>$data['attr'][$key]])->update(['sku'=>$data['sku'][$key],
                'size'=>$data['size'][$key],'price'=>$data['price'][$key],'stock'=>$data['stock'][$key]]);
            }
            return redirect()->back()->with('flash_message_success','Products Attributes Updated!!!');
        }
    }
    public function addImages(Request $request,$id=null){
        $productDetails = Product::where(['id'=>$id])->first();
        if($request->isMethod('post')){
            $data = $request->all();
            if($request->hasfile('image')){
                $files = $request->file('image');
                foreach($files as $file){
                    $image = new Product_image;
                    $extension = $file->getClientOriginalExtension();
                    $filename = rand(111,9999).'.'.$extension;
                    $image_path = 'uploads/products/'.$filename;
                    Image::make($file)->save($image_path);
                    $image->image = $filename;
                    $image->product_id = $data['product_id'];
                    $image->save();
                }
            }
            return redirect('/admin/add-images/'.$id)->with('flash_message_success','Image has been updated');
        }
        $productImages = Product_image::where(['product_id'=>$id])->get();
        return view('layouts.products.image.create')->with(compact('productDetails','productImages'));
    }
    public function deleteAltImage($id=null){
        $productImage = Product_image::where(['id'=>$id])->first();

        $image_path = 'uploads/products/';
        if(file_exists($image_path.$productImage->image)){
            unlink($image_path.$productImage->image);
        }
        Product_image::where(['id'=>$id])->delete();
        Alert::success('Deleted','Success Message');
        return redirect()->back()->with('flash_message_error','Image has been Deleted');
    }
    public function updateFeatured(Request $request,$id=null){
        $data = $request->all();
        Product::where('id',$data['id'])->update(['featured'=>$data['status']]);

    }
    public function getprice(Request $request){
         $data = $request->all();
        //  echo "<pre>";print_r($data);die;
        $proArr = explode("-",$data['idSize']);
        $proAttr = Product_attribute::where(['product_id'=>$proArr[0],'size'=>$proArr[1]])->first();
        echo $proAttr->price;
    }
    public function addtoCart(Request $request){
        Session::forget('CouponAmount');
        Session::forget('CouponCode');
        $data = $request->all();
        // echo "<pre>";print_r($data);die;
        if(empty($data['user_email'])){
            $data['user_email'] = '';
        }
        $session_id = Session::get('session_id');
        if(empty($session_id)){
        $session_id = str_random(40);
        Session::put('session_id',$session_id);
        }

        $sizeArr = explode('-',$data['size']);
        $countProducts = DB::table('cart')->where(['product_id'=>$data['product_id'],'product_color'=>$data['color'],'price'=>$data['price'],
        'size'=>$sizeArr[1],'session_id'=>$session_id])->count();
        if($countProducts>0){
            return redirect()->back()->with('flash_message_error','Product already exists in cart');
        }else{
            DB::table('cart')->insert(['product_id'=>$data['product_id'],'product_name'=>$data['product_name'],
            'product_code'=>$data['product_code'],'product_color'=>$data['color'],'price'=>$data['price'],
            'size'=>$sizeArr[1],'quantity'=>$data['quantity'],'user_email'=>$data['user_email'],
            'session_id'=>$session_id]);
        }
        return redirect('/cart')->with('flash_message_success','Product has been added in cart');
    }
    public function cart(Request $request){
        $session_id = Session::get('session_id');
        $userCart = DB::table('cart')->where(['session_id'=>$session_id])->get();
        foreach($userCart as $key=>$products){
            $productDetails = Product::where(['id'=>$products->product_id])->first();
            $userCart[$key]->image = $productDetails->image;
        }
        // echo "<pre>";print_r($userCart);die;
        return view('wayshop.products.cart')->with(compact('userCart'));
    }
    public function deleteCartProduct($id=null){
        Session::forget('CouponAmount');
        Session::forget('CouponCode');
        DB::table('cart')->where('id',$id)->delete();
        return redirect('/cart')->with('flash_message_error','Product has been deleted!');
    }
    public function updateCartQuantity($id=null,$quantity=null){
        Session::forget('CouponAmount');
        Session::forget('CouponCode');
        DB::table('cart')->where('id',$id)->increment('quantity',$quantity);
        return redirect('/cart')->with('flash_message_success','Product Quantity has been updated Successfully');
    }
    public function applyCoupon(Request $request){
        Session::forget('CouponAmount');
        Session::forget('CouponCode');
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>";print_r($data);die;
            $couponCount = Coupons::where('coupon_code',$data['coupon_code'])->count();
            if($couponCount == 0){
                return redirect()->back()->with('flash_message_error','Coupon code does not exists');
            }else{
                // echo "Success";die;
                $couponDetails = Coupons::where('coupon_code',$data['coupon_code'])->first();
                //Coupon code status
                if($couponDetails->status==0){
                    return redirect()->back()->with('flash_message_error','Coupon code is not active');
                }
                //Check coupon expiry date
                $expiry_date = $couponDetails->expiry_date;
                $current_date = date('Y-m-d');
                if($expiry_date < $current_date){
                    return redirect()->back()->with('flash_message_error','Coupon Code is Expired');
                }
                //Coupon is ready for discount
                $session_id = Session::get('session_id');
                $userCart = DB::table('cart')->where(['session_id'=>$session_id])->get();
                $total_amount = 0;
                foreach($userCart as $item){
                    $total_amount = $total_amount + ($item->price*$item->quantity);
                }
                //Check if coupon amount is fixed or percentage
                if($couponDetails->amount_type=="Fixed"){
                    $couponAmount = $couponDetails->amount;
                }else{
                    $couponAmount = $total_amount * ($couponDetails->amount/100);
                }
                //Add Coupon code in session
                Session::put('CouponAmount',$couponAmount);
                Session::put('CouponCode',$data['coupon_code']);
                return redirect()->back()->with('flash_message_success','Coupon Code is Successffully Applied.You are Availing Discount');
            }
        }
    }
}
