<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    // public function products(){
    //   return $this->hasMany('App\Model\Product')->where('status','approved')->latest();
    // }
    public function fourproducts(){
        return $this->hasMany('App\Models\Product')->where('status','approved')->latest()->limit(4);
      }
      public function electronics(){
        return $this->hasMany('App\Models\Product')->where('status','approved')->latest();
      }
      public function fashion(){
        $total=Product::where('category_id','2')->where('status','approved')->get();
        $count=$total->count();
        return $this->hasMany('App\Models\Product')->where('status','approved')->limit($count/2)->latest();
      }
      public function children(){
          return $this->hasMany('App\Models\Category','parent_id');
      }
      public function products(){
          return $this->hasMany('App\Models\Product');
      }
      public function allProducts(){
          $allProducts = collect([]);
          $mainCategoryProducts = $this->products;
          $allProducts = $allProducts->concat($mainCategoryProducts);
          if($this->children->isNotEmpty()) {
              foreach($this->children as $child) {
                  $allProducts = $allProducts->concat($child->products);
              }
          }
          return $allProducts;
      }

}
