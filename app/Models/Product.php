<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Shop;
// use App\Models\User_product_view;
use App\Models\Category;
// use App\Models\Attribute;
use App\Models\Discount;
use App\Models\Review;
use App\Models\User;

class Product extends Model
{
    use HasFactory;
    public function category(){
		return $this->belongsTo('App\Models\Category');
	}
    public function attributes(){
        return $this->hasMany('App\Models\Product_attribute','product_id');
    }
    public function productImages(){
        return $this->hasMany('App\Models\Product_image','product_id');
    }
    public function shop(){
    return $this->belongsTo(Shop::class, 'shop_id');
    }
    public function productCategories(){
    return $this->belongsToMany(Category::class,'product_categories');
    }
    // public function product_attributes(){
    // return $this->belongsToMany(Attribute::class,'product_attributes');
    // }
    // public function productViews(){
    // return $this->hasMany(User_product_view::class);
    // }
    // public function viewedUsers(){
    // return $this->belongsToMany(User::class ,'user_product_views')->withTimestamps()->withPivot(['count']);
    // }
    // public function views(){
    // return $this->viewedUsers()->sum('count');

    // }
    public function reviews(){
    return $this->hasMany(Review::class);

    }
    public function discount(){
    return $this->belongsTo(Discount::class);
    }

}
