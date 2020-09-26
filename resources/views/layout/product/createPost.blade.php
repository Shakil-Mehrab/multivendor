
@extends('layouts.app')
@section('content')
@php
use App\Model\Shop;
use App\Model\Category;
$countries=Shop::orderBy('id','desc')->where('is_active',1)->get();
$categoris=Category::orderBy('slug','asc')->get();
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
            <div class="col-lg-8 col-md-8 offset-md-2 order-lg-last dashboard-content">
                <h2 class="text-center">Create Your Sample Product</h2>

                <form action="{{URL::to('/user/post/sample/store')}}" method="post">
                	@csrf
                    <div class="row">
                        <div class=" col-md-12 col-sm-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group required-field {{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="name" class="control-label">Product Name</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Product Name" value="{{Request::old('name')}}"  required>
                                        @if ($errors->has('name'))
		                                <span class="help-block">
		                                    <strong style="color:red">{{ $errors->first('name') }}</strong>
		                                </span>
		                                @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group required-field {{ $errors->has('slug') ? ' has-error' : '' }}">
                                        <label for="slug" class="control-label">Slug</label>
                                        <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="{{Request::old('slug')}}" required>
                                        @if ($errors->has('slug'))
		                                <span class="help-block">
		                                    <strong style="color:red">{{ $errors->first('slug') }}</strong>
		                                </span>
		                                @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group required-field {{ $errors->has('brand') ? ' has-error' : '' }}">
                                        <label for="brand" class="control-label">Brand</label>
                                        <input type="text" class="form-control" id="brand" name="brand" placeholder="Brand" value="{{Request::old('brand')}}" required>
                                        @if ($errors->has('brand'))
		                                <span class="help-block">
		                                    <strong style="color:red">{{ $errors->first('brand') }}</strong>
		                                </span>
		                                @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group required-field {{ $errors->has('min_order') ? ' has-error' : '' }}">
                                        <label for="min_order" class="control-label">Minimum Orderable Quantity</label>
                                        <input type="text" class="form-control" id="min_order" name="min_order" placeholder="Minimum Order" value="{{Request::old('min_order')}}" required>
                                        @if ($errors->has('min_order'))
		                                <span class="help-block">
		                                    <strong style="color:red">{{ $errors->first('min_order') }}</strong>
		                                </span>
		                                @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group required-field {{ $errors->has('price') ? ' has-error' : '' }}">
                                        <label for="price" class="control-label">Price</label>
                                        <input type="text" class="form-control" id="price" name="price" placeholder="Price" value="{{Request::old('price')}}" required>
                                        @if ($errors->has('price'))
		                                <span class="help-block">
		                                    <strong style="color:red">{{ $errors->first('price') }}</strong>
		                                </span>
		                                @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group required-field {{ $errors->has('weight') ? ' has-error' : '' }}">
                                        <label for="weight" class="control-label">Weight (kg)</label>
                                        <input type="text" class="form-control" id="weight" name="weight" placeholder="Weight" value="{{Request::old('weight')}}" required>
                                        @if ($errors->has('weight'))
		                                <span class="help-block">
		                                    <strong style="color:red">{{ $errors->first('weight') }}</strong>
		                                </span>
		                                @endif
                                    </div>
                                </div>
	                            <div class="form-group{{ $errors->has('shop_id') ? ' has-error' : '' }} col-md-6">
                                    <label for="shop_id" class="control-label">Shop Owner</label>
                                    <div class="select-custom">
                                        <select class="form-control" name="shop_id" required>
                                            <option value="">Select One</option>
                                            @forelse($countries as $ct)
                                            <option value="{{$ct->id}}">{{$ct->name}}</option>
                                            @empty
                                            <option value="">No Shop</option>
                                            @endforelse
                                        </select>
                                    </div>
                                    @if ($errors->has('shop_id'))
                                    <span class="help-block">
                                        <strong style="color:red">{{ $errors->first('shop_id') }}</strong>
                                    </span>
                                    @endif
                            	</div>
                                <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }} col-md-6">
                                    <label for="category_id" class="control-label">Categroy</label>
                                    <div class="select-custom">
                                        <select class="form-control" name="category_id" required>
                                            <option value="">Select One</option>
                                            @forelse($categoris as $ct)
                                            <option value="{{$ct->id}}">{{$ct->name}}</option>
                                            @empty
                                            <option value="">No Category</option>
                                            @endforelse
                                        </select>
                                    </div>
                                    @if ($errors->has('category_id'))
                                    <span class="help-block">
                                        <strong style="color:red">{{ $errors->first('category_id') }}</strong>
                                    </span>
                                    @endif
                            	</div>
                                <div class="col-md-12">
                                    <div class="form-group required-field {{ $errors->has('cover_img') ? ' has-error' : '' }}">
                                        <label for="cover_img" class="control-label">Image Upload</label>
                                        <input type="file" class="form-control" id="cover_img" name="cover_img">
                                        @if ($errors->has('cover_img'))
                                        <span class="help-block">
                                            <strong style="color:red">{{ $errors->first('cover_img') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div><!-- End .row -->
                        </div><!-- End .col-sm-11 -->
                    </div><!-- End .row -->

                    {{-- <div class="form-group required-field  {{ $errors->has('address') ? ' has-error' : '' }}">
                        <label for="address" class="control-label">Address</label>
                        <input type="text" class="form-control" id="address" value="{{Request::old('address')}}" placeholder="Address" name="address">
                         @if ($errors->has('address'))
	                    <span class="help-block">
	                        <strong style="color:red">{{ $errors->first('address') }}</strong>
	                    </span>
	                    @endif
                    </div>
                   	<div class="form-group required-field  {{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="description" class="control-label">Description</label>
                        <textarea type="text" class="form-control" id="description" name="description" placeholder="Description">{{Request::old('description')}}</textarea>
                         @if ($errors->has('description'))
	                    <span class="help-block">
	                        <strong style="color:red">{{ $errors->first('description') }}</strong>
	                    </span>
	                    @endif
                    </div> --}}

                    <div class="mb-2"></div><!-- margin -->


                    <div class="row">
                        <div class="text-center col-md-12 col-sm-12">
                            <button type="submit" class="btn btn-primary form-control">Save</button>
                        </div>
                    </div>
                </form>
            </div>


        </div><!-- End .row -->
    </div><!-- End .container -->

    <div class="mb-5"></div><!-- margin -->
</main>
@endsection
