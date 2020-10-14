<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;
use App\Models\Country;
use App\Models\City;



class Shop extends Model
{
    use HasFactory;
    public function owner(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function country(){
        return $this->belongsTo(Country::class, 'country_id');
    }
    public function city(){
        return $this->belongsTo(City::class, 'city_id');
    }

    public function products(){
        return $this->hasMany(Product::class, 'shop_id');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
