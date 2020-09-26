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
        $products=Product::orderBy('id','desc')->where('name', 'like', '%'.$query.'%')->get();
        return view('layouts.product.searchProduct',compact(['products']));
      }
        public function create(){
            return view('layouts.product.createPost');
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
    
    
       public function relatedProduct($id){
        $categories=Product::orderBy('id','desc')->with('productCategories')->get();
        return response()->json(['relatedProduct'=>$categories],200);
       }
      public function bestProduct(){
        $categories=Product::orderBy('sku','desc')->with('productCategories','product_attributes')->paginate(7);
        return response()->json(['bestProducts'=>$categories],200);
      }
      public function recentProduct(){
        $categories=Product::orderBy('id','desc')->with('productCategories','product_attributes')->paginate(7);
        return response()->json(['recentProducts'=>$categories],200);
      }
      public function popularProduct(){
        $categories=Product::orderBy('view','desc')->with('productViews')->paginate(7);
        // $categories=User_product_view::orderBy('count','desc')->with('viewProduct')->paginate(8);
        // $allProducts = collect([]);
    
        // foreach($categories as $category){
        //     $mainCategoryProducts=Product::where('id',$category->product_id)->get();
        //     $allProducts = $allProducts->concat($mainCategoryProducts);
        // }
    
        return response()->json(['popularProducts'=>$categories],200);
      }
      public function bestSale(){
        $categories=Product::orderBy('sale_count','desc')->with('productCategories','product_attributes')->paginate(8);
        return response()->json(['bestSale'=>$categories],200);
      }
      public function topRatedProduct(){
        $categories=Product::orderBy('rating','desc')->with('productCategories','product_attributes')->paginate(8);
        return response()->json(['allTopRated'=>$categories],200);
      }
      public function discount(){
        $categories=Discount::orderBy('id','desc')->limit(3)->get();
        return response()->json(['discount'=>$categories],200);
      }
      public function discountProduct($id){
        $discount=Discount::find($id);
        $products = $discount->allProducts();
        return response()->json(['discountProduct'=>$products],200);
      }
      public function discountAllProduct(){
        $discounts=Discount::orderBy('id','desc')->get();
        $products=collect([]);
        foreach($discounts as $discount){
            $products = $products->concat($discount->allProducts());
        }
        return response()->json(['discountAllProduct'=>$products],200);
      }
      public function searchDiscountProduct($id){
        $query = request('s');
        $discount=Discount::find($id);
        if($query==null){
            $products = $discount->allProducts();
            return response()->json(['searchProductByDiscountId'=>$products],200);
          }
        $categories=Product::orderBy('id','desc')->where('name','LIKE',"%$query%")->get();
        return response()->json(['searchProductByDiscountId'=>$categories],200);
      }
      ///search page
        public function allProduct(){
            $products = Product::orderBy('id','desc')->with('productCategories','product_attributes')->paginate(12);
            return response()->json(['allProduct'=>$products],200);
        }
        public function realSearch(){
        //$query = $request->input('price');
        // dd($query);
        $query = request('s');
          if($query==null){
            $products = Product::orderBy('id','desc')->with('productCategories','product_attributes')->paginate(12);
            return response()->json(['searchRealSearch'=>$products],200);
          }
          $products = Product::orderBy('id','desc')->where('name','LIKE',"%$query%")->with('productCategories','product_attributes')->paginate(20);
          return response()->json(['searchRealSearch'=>$products],200);
        }
    
    /////nav
      public function searcByNav(Request $request){
          $query = request('s');
        //   dd($query);
          if($query==null){
            $products = Product::orderBy('id','desc')->with('productCategories','product_attributes')->paginate(12);
            return response()->json(['navSearchProduct'=>$products],200);
          }
          $products = Product::orderBy('id','desc')->where('name','LIKE',"%$query%")->with('productCategories','product_attributes')->paginate(20);
          return response()->json(['navSearchProduct'=>$products],200);
      }
    /////single
}
