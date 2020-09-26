@extends('layouts.app')
@section('content')
@extends('layouts.app')
@section('content')
@php
use App\Model\Country;
use App\Model\City;
$countries=Country::orderBy('name','asc')->get();
$cities=City::orderBy('name','asc')->get();
@endphp
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index-2.html"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </div><!-- End .container -->
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-lg-9 order-lg-last dashboard-content">
                <h2>Create Your Shop</h2>
                
                <form action="{{route('shop.store')}}" method="post">
                	@csrf
                    <div class="row">
                        <div class="col-sm-11">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group required-field {{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="name" class="control-label">Company Name</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Company Name" value="{{Request::old('name')}}">
                                        @if ($errors->has('name'))
		                                <span class="help-block">
		                                    <strong style="color:red">{{ $errors->first('name') }}</strong>
		                                </span>
		                                @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group required-field {{ $errors->has('phone') ? ' has-error' : '' }}">
                                        <label for="phone" class="control-label">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" value="{{Request::old('phone')}}">
                                        @if ($errors->has('phone'))
		                                <span class="help-block">
		                                    <strong style="color:red">{{ $errors->first('phone') }}</strong>
		                                </span>
		                                @endif
                                    </div>
	                            </div>
	                            <div class="form-group{{ $errors->has('country_id') ? ' has-error' : '' }} col-md-6">
                                <label for="country_id" class="control-label">Country</label>
                                <div class="select-custom">
                                    <select class="form-control" name="country_id">
                                        <optgroup label="Select One"> 
                                            @forelse($countries as $ct)
                                            <option value="{{$ct->id}}">{{$ct->name}}</option>
                                            @empty
                                             <option value="">No Category</option>
                                            @endforelse
                                        </optgroup>
                                    </select>
                                </div>
                                @if ($errors->has('country_id'))
                                <span class="help-block">
                                    <strong style="color:red">{{ $errors->first('country_id') }}</strong>
                                </span>
                                @endif
                            	</div>
                            	<div class="form-group{{ $errors->has('city_id') ? ' has-error' : '' }} col-md-6">
                                <label for="city_id" class="control-label">City</label>
                                <div class="select-custom">
                                    <select class="form-control" name="city_id">
                                        <optgroup label="Select One"> 
                                            @forelse($cities as $ct)
                                            <option value="{{$ct->id}}">{{$ct->name}}</option>
                                            @empty
                                             <option value="">No Category</option>
                                            @endforelse
                                        </optgroup>
                                    </select>
                                </div>
                                @if ($errors->has('city_id'))
                                <span class="help-block">
                                    <strong style="color:red">{{ $errors->first('city_id') }}</strong>
                                </span>
                                @endif
                            </div>
                            </div><!-- End .row -->
                        </div><!-- End .col-sm-11 -->
                    </div><!-- End .row -->

                    <div class="form-group required-field  {{ $errors->has('address') ? ' has-error' : '' }} col-md-6">
                        <label for="address" class="control-label">Address</label>
                        <input type="text" class="form-control" id="address" value="{{Request::old('address')}}" placeholder="Address" name="address">
                         @if ($errors->has('address'))
	                    <span class="help-block">
	                        <strong style="color:red">{{ $errors->first('address') }}</strong>
	                    </span>
	                    @endif
                    </div>
                    <div class="form-group col-md-6">
                        <label>Picture upload</label>
                        <input type="file" name="image">
                     </div>
                   	<div class="form-group required-field  {{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="description" class="control-label">Description</label>
                        <textarea type="text" class="form-control" id="description" name="description" placeholder="Description">{{Request::old('description')}}</textarea>
                         @if ($errors->has('description'))
	                    <span class="help-block">
	                        <strong style="color:red">{{ $errors->first('description') }}</strong>
	                    </span>
	                    @endif
                    </div>
                    
                    <div class="mb-2"></div><!-- margin -->

                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" id="change-pass-checkbox" value="1">
                    </div>
                    <div class="form-footer">
                        <div class="form-footer-right">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>

            <aside class="sidebar col-lg-3">
                <div class="widget widget-dashboard">
                    <h3 class="widget-title">My Account</h3>

                    <ul class="list">
                        <li class="active"><a href="#">Account Dashboard</a></li>
                        <li><a href="#">Account Information</a></li>
                        <li><a href="#">Address Book</a></li>
                        <li><a href="#">My Orders</a></li>
                        <li><a href="#">Billing Agreements</a></li>
                        <li><a href="#">Recurring Profiles</a></li>
                        <li><a href="#">My Product Reviews</a></li>
                        <li><a href="#">My Tags</a></li>
                        <li><a href="#">My Wishlist</a></li>
                        <li><a href="#">My Applications</a></li>
                        <li><a href="#">Newsletter Subscriptions</a></li>
                        <li><a href="#">My Downloadable Products</a></li>
                    </ul>
                </div><!-- End .widget -->
            </aside><!-- End .col-lg-3 -->
        </div><!-- End .row -->
    </div><!-- End .container -->

    <div class="mb-5"></div><!-- margin -->
</main>
@endsection
       