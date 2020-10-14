<?php

namespace App\Http\Controllers\Layout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Discount;
// use App\Jobs\UserViwedProduct;
use App\Models\Product_discount;
use App\Models\Review;
class PublicController extends Controller
{
    public function show(Request $request,$id){
        $product=Product::orderBy('id','desc')->where('id',$id)->first();
        // if($request->user()){dispatch(new UserViwedProduct($request->user(),$product));}
        $product->view=$product->view+1;
        $product->update();
          return view('layout.product.single',compact(['product']));
      }
      public function quickShow(Request $request,$id){
      $product=Product::orderBy('id','desc')->where('id',$id)->first();
        // if($request->user()){dispatch(new UserViwedProduct($request->user(),$product));}
        $product->view=$product->view+1;
        $product->update();
          return view('layouts.product.quickSingle',compact(['product']));
      }
      public function sameProduct($id){
        $product=Product::find($id);
        $categories=Product::orderBy('id','desc')->with('productCategories','product_attributes')->where('slug',$product->sku)->limit(3)->get();
        return response()->json(['sameProduct'=>$categories],200);
       }
        public function review(Request $request,$id){
          // dd($request->all());
        $request->validate([
                'rating' => 'required',
                'review' => 'required',
            ]);
        $review=new Review();
        $review->review=$request['review'];
        $review->rating=$request['rating'];
        $review->user_id=auth()->user()->id;
        $review->product_id=$id;
        $review->save();

        $product=Product::find($id);
        $product->rating=($product->rating+$request['rating'])/2;
        $product->update();

          return back()->withSuccess('Thank You for your review');
      }
      public function search(Request $request){
        $query=$request['query'];
        $catId=$request['cat_id'];
        if($catId==null){
            $products=Product::orderBy('id','desc')->where('name', 'like','%'.$query.'%')->get();
        }else{
            $products=Product::orderBy('id','desc')->where('name','like','%'.$query.'%')->where('category_id',$catId)->get();
        }
            return view('layout.product.searchProduct',compact(['products']));
        }
        public function categoryIndex($id){
            $recentProducts=Product::orderBy('id','desc')->get();
            return view('layout.category.category',compact('id','recentProducts'));
        }
        public function gridIndex($id){
            $category=Category::find($id);
            $products=collect([]);
            $products=$category->allProducts();
            $recentProducts=Product::orderBy('id','desc')->get();
            return view('layout.category.categoryGrid',compact('products','id','recentProducts'));
        }
        public function listIndex($id){
            $category=Category::find($id);
            $products=collect([]);
            $products=$category->allProducts();
            $recentProducts=Product::orderBy('id','desc')->get();
            return view('layout.category.categoryList',compact('products','id','recentProducts'));
        }

        public function store(Request $request){
            $request->validate([
                'name' => 'required',
                'slug' => 'required',
                'brand' => 'required',
                'min_order' => 'required|integer',
                'price' => 'required',
                'weight' => 'required',
                'shop_id' => 'required|integer',
                'category_id' => 'required|integer',

            ]);
            dd($request->all());

          $review=new Review();
          $review->review=$request['review'];
          $review->rating=$request['rating'];
          $review->user_id=auth()->user()->id;
          $review->save();
            return back()->withSuccess('Thank You for your review');
        }



}
