@extends('layout.app')
@section('content')
@php
use App\Models\Country;
use App\Models\City;
$countries=Country::orderBy('name','asc')->get();
$cities=City::orderBy('name','asc')->get();
@endphp
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index-2.html"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
        </div><!-- End .container -->
    </nav>

    <div class="container">
        <form action="{{route('orders.store')}}" method="post">
        @csrf
        <ul class="checkout-progress-bar">
            <li class="active">
                <span>Cart</span>
            </li>
            <li>
                <span>Shipping</span>
            </li>
        </ul>
        <div class="row">
            <div class="col-lg-8">
                <ul class="checkout-steps">
                    <li>
                        <h2 class="step-title">Shipping Address</h2>

                        <!-- <form action="#">
                            <div class="form-group required-field">
                                <label>Email Address </label>
                                <div class="form-control-tooltip">
                                    <input type="email" class="form-control" required>
                                    <span class="input-tooltip" data-toggle="tooltip" title="We'll send your order confirmation here." data-placement="right"><i class="icon-question-circle"></i></span>
                                </div>
                            </div>

                            <div class="form-group required-field">
                                <label>Password </label>
                                <input type="password" class="form-control" required>
                            </div>
                            
                            <p>You already have an account with us. Sign in or continue as guest.</p>
                            <div class="form-footer">
                                <button type="submit" class="btn btn-primary">LOGIN</button>
                                <a href="forgot-password.html" class="forget-pass"> Forgot your password?</a>
                            </div>
                        </form> -->

                        
                            <div class="form-group{{ $errors->has('shipping_fullname') ? ' has-error' : '' }} col-md-12 required-field">
                                <label for="shipping_fullname" class="control-label">Fullname</label>
                                <input type="text" placeholder="Full Name" name="shipping_fullname" value="{{Request::old('shipping_fullname')}}" class="form-control" required>
                                @if ($errors->has('shipping_fullname'))
                                <span class="help-block">
                                    <strong style="color:red">{{ $errors->first('shipping_fullname') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('country_id') ? ' has-error' : '' }} col-md-8">
                                <label for="country_id" class="control-label">Country</label>
                                <div class="select-custom">
                                    <select class="form-control" name="country_id" required>
                                        <option value="">Select One</option>
                                            @forelse($countries as $ct)
                                            <option value="{{$ct->id}}">{{$ct->name}}</option>
                                            @empty
                                             <option value="">No Country</option>
                                            @endforelse
                                    </select>
                                </div>
                                @if ($errors->has('country_id'))
                                <span class="help-block">
                                    <strong style="color:red">{{ $errors->first('country_id') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('city_id') ? ' has-error' : '' }} col-md-8">
                                <label for="city_id" class="control-label">City</label>
                                <div class="select-custom">
                                    <select class="form-control" name="city_id" required>
                                        <option value="">Select Country</option>
                                    </select>
                                </div>
                                @if ($errors->has('city_id'))
                                <span class="help-block">
                                    <strong style="color:red">{{ $errors->first('city_id') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('shipping_address') ? ' has-error' : '' }} col-md-12 required-field">
                                <label for="shipping_address" class="control-label">Address</label>
                                <input type="text" placeholder="Address" name="shipping_address" value="{{Request::old('shipping_address')}}" class="form-control" required>
                                @if ($errors->has('shipping_address'))
                                <span class="help-block">
                                    <strong style="color:red">{{ $errors->first('shipping_address') }}</strong>
                                </span>
                                @endif
                            </div>

                                <div class="form-group{{ $errors->has('shipping_phone') ? ' has-error' : '' }} col-md-12 required-field">
                                    <label for="shipping_phone" class="control-label">Phone</label>
                                    <input type="text" placeholder="Phone" name="shipping_phone" value="{{Request::old('shipping_phone')}}" class="form-control" required>
                                    @if ($errors->has('shipping_phone'))
                                    <span class="help-block">
                                        <strong style="color:red">{{ $errors->first('shipping_phone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('shipping_zipcode') ? ' has-error' : '' }} col-md-12 required-field">
                                    <label for="shipping_zipcode" class="control-label">Zip Code</label>
                                    <input type="text" placeholder="Zip Code" name="shipping_zipcode" value="{{Request::old('shipping_phone')}}" class="form-control" required>
                                    @if ($errors->has('shipping_zipcode'))
                                    <span class="help-block">
                                        <strong style="color:red">{{ $errors->first('shipping_zipcode') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            <div class="form-group col-md-8">
                                <label>Order Notes</label>
                                    <textarea  v-model="form.notes" class="form-control" placeholder="Notes about your order, e.g. special notes for delivery." ></textarea>
                            </div>
                        
                    </li>
                </ul>
            </div>
                    @php 
                        $carts=Cart::getContent();
                    @endphp   
            <div class="col-lg-4">
                <div class="order-summary">
                    <h3>Summary</h3>
                    <h4>
                        <a data-toggle="collapse" href="#order-cart-section" class="collapsed" role="button" aria-expanded="false" aria-controls="order-cart-section">{{count($carts)}} products added</a>
                    </h4>
                    <div class="collapse" id="order-cart-section">
                        <table class="table table-mini-cart">
                            <tbody>
                                @forelse($carts as $cart)
                                    <tr>
                                        <td class="product-col">
                                            <figure class="product-image-container">
                                                <a href="/user/product/show/{{$cart->id}}" class="product-image">
                                                    <img src="{{asset('/uploads/products/'.$cart->attributes->image)}}" alt="product">
                                                </a>
                                            </figure>
                                            <div>
                                                <h2 class="product-title">
                                                    <a href="/user/product/show/{{$cart->id}}">{{$cart->name}}</a>
                                                </h2>

                                                <span class="product-qty">Qty: {{$cart->quantity}}</span>
                                            </div>
                                        </td>
                                        <td class="price-col">${{$cart->price*$cart->quantity}}</td>
                                    </tr>
                                @empty
                                @endforelse 
                            </tbody>    
                        </table>
                    </div><!-- End #order-cart-section -->
                </div>
                <div class="form-group{{ $errors->has('deliverybranch_id') ? ' has-error' : '' }} col-md-12">
                    <label for="deliverybranch_id" class="control-label">Delivary Place<span style="color:red"> (Extra Charge Will Add)</span></label>
                    <div class="select-custom">
                        <select class="form-control" name="deliverybranch_id" required>
                            <optgroup label="Select One"> 
                                <option value="">Select City</option>
                            </optgroup>
                        </select>
                    </div>
                    @if ($errors->has('deliverybranch_id'))
                    <span class="help-block">
                        <strong style="color:red">{{ $errors->first('deliverybranch_id') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="checkout-step-shipping">
                    <h2 class="step-title">Payment Method</h2>
                    <table class="table table-step-shipping">
                        <tbody>
                            <tr>
                                <td><input type="radio" name="payment_method" value="cash_on_delivery" required> Cash On Delivery</td>
                                <!-- <td><strong>$20.00</strong></td>
                                <td>Fixed</td>
                                <td>Flat Rate</td> -->
                            </tr>
                            <tr>
                                <td><input type="radio" name="payment_method" value="card"> Card</td>
                                <!-- <td><strong>$20.00</strong></td>
                                <td>Fixed</td>
                                <td>Flat Rate</td> -->
                            </tr>
                            <tr>
                                <td><input type="radio" name="payment_method" value="paypal"> Paypal</td>
                               <!--  <td><strong>$15.00</strong></td>
                                <td>Table Rate</td>
                                <td>Best Way</td> -->
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="checkout-step-shipping">
                    <table class="table table-step-shipping">
                        <tbody>
                            <tr>
                                <td><input type="checkbox" name="payment_method" value="condition" required> <a href="/terms/condition" target="_blank">Condition</a> & <a href="/moneyback" target="_blank">Returns</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="submit" class="form-control btn btn-success" value="Place Order" style="background: green;color:white">
                    </div>
                </div>
            </div>

        </div>
        </form>
    </div>

    <div class="mb-6"></div><!-- margin -->
</main>
@endsection
@section('js')

<script>
   $(function(){
    var country=$('select[name="country_id"]');
    var city=$('select[name="city_id"]');
    var deliveryBranch=$('select[name="deliverybranch_id"]');

    city.attr('disabled','disabled')
    deliveryBranch.attr('disabled','disabled')

    country.change(function(){
      var id=$(this).val();
      if(id==''){
       city.attr('disabled','disabled')

       s='<option value=""></option>'
       city.html(s);
     }})
    country.change(function(){
      var id=$(this).val();
      if(id){
       city.attr('disabled','disabled')
       $.get('{{url('/cities?country_id=')}}'+id)
        .success(function(data){
          var s='<option value="">Select One</option>';
          data.forEach(function(row){
            s +='<option value="'+row.id+'">'+row.name+'</option>'
          })
          city.removeAttr('disabled')
         city.html(s);

        })

        city.change(function(){
          var id=$(this).val();
          if(id==''){
           deliveryBranch.attr('disabled','disabled')
           s='<option value=""></option>'
           deliveryBranch.html(s);
         }})
        city.change(function(){
          var id=$(this).val();
          if(id){
           deliveryBranch.attr('disabled','disabled')
           $.get('{{url('/delivery/branch?city_id=')}}'+id)
            .success(function(data){
              var s='<option value="">Select One</option>';
              data.forEach(function(row){
                s +='<option value="'+row.id+'">'+row.name+' &nbsp;(৳ '+row.charge+')</option>'
              })
              deliveryBranch.removeAttr('disabled')
              deliveryBranch.html(s);
            })
          }
        })

       
      }
    })
  })
</script>
@endsection
