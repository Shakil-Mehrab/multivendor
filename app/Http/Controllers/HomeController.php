<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        // dd(auth()->user()->role_id);
        if(auth()->user()->role_id==1){
            return view('home');
        }elseif(auth()->user()->role_id==2){
            return redirect('user/account');
        }else{
            return redirect('/');

        }
    }
    public function accont(){
        return view('layouts.user.userProfile');
    }
}
