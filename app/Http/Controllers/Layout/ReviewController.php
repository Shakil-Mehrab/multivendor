<?php

namespace App\Http\Controllers\Layout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Review;

class ReviewController extends Controller
{
    public function show(){
        return view('layout.rating.index');
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
}
