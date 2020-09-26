<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class Order_item extends Model
{
    use HasFactory;
    public function product(){
        return $this->belongsTo('App\Models\Product');
     }
     public function order(){
        return $this->belongsTo(Order::class);
    }
}
