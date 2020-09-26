<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Country;
use App\Models\City;
use App\Models\Deliverybranch;
use App\Models\Order_item;
use App\Models\User;
class Order extends Model
{
    use HasFactory;
    public function items()
    {
        return $this->belongsToMany(Product::class, 'order_items','order_id','product_id')->withPivot('quantity','price');
    }
    public function orderItems(){
        return $this->hasMany(Order_item::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function deliverybranch()
    {
        return $this->belongsTo(Deliverybranch::class);
    }
}
