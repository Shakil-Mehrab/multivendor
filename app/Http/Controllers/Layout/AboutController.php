<?php

namespace App\Http\Controllers\Layout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Slide;
class AboutController extends Controller
{
   
    public function contact()
    {
        $products=Product::orderBy('created_at','desc')->paginate(8);
        return view("layout.about.contactUs",compact('products'));
    }
    
    public function about()
    {
        // $members=Membership::orderBy('created_at','desc')->get();
        $slides=Slide::orderBy('created_at','desc')->where('name','about')->get();
        return view("layout.about.aboutUs",compact('slides'));
    }
    public function condition(){
        return view('layout.about.termsCondition');
    }
    public function moneyback(){
        return view('layout.about.moneyback');
    }
    public function howToOrder(){
        return view('layout.about.howtoorder');
    }
}
