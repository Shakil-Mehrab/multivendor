@extends('layouts.master')
@section('title','Edit Product')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <div class="header-icon">
          <i class="fa fa-product-hunt"></i>
       </div>
       <div class="header-title">
          <h1>Edit Product</h1>
          <small>Edit Products</small>
       </div>
    </section>
    @if(Session::has('flash_message_error'))
   <div class="alert alert-sm alert-danger alert-block" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      <strong>{!! session('flash_message_error') !!}</strong>
   </div>
   @endif

   @if(Session::has('flash_message_success'))
   <div class="alert alert-sm alert-success alert-block" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      <strong>{!! session('flash_message_success') !!}</strong>
   </div>
   @endif
    <!-- Main content -->
    <section class="content">
       <div class="row">
          <!-- Form controls -->
          <div class="col-sm-12">
             <div class="panel panel-bd lobidrag">
                <div class="panel-heading">
                   <div class="btn-group" id="buttonlist">
                      <a class="btn btn-add " href="{{url('admin/view-products')}}">
                      <i class="fa fa-eye"></i>  View Products </a>
                   </div>
                </div>
                <div class="panel-body">
                <form enctype="multipart/form-data" action="{{url('/admin/edit-product/'.$productDetails->id)}}" method="post"> {{csrf_field()}}
                    <div class="col-sm-6">
                    <div class="form-group">
                        <label>Under Category</label>
                        <select name="category_id" id="category_id" class="form-control" required>
                            <option value="">Select One</option>
                            @forelse($categories as $cat)
                                <option value="{{$cat->id}}"{{$cat->id==$productDetails->category_id?'selected':''}}>{{$cat->name}}</option>
                            @empty
                            @endforelse
                        </select>
                     </div>
                     <div class="form-group">
                        <label>Under Shop</label>
                        <select name="shop_id" id="shop_id" class="form-control" required>
                            <option value="">Select One</option>
                            @forelse($shops as $shop)
                                <option value="{{$shop->id}}" {{$shop->id==$productDetails->shop_id?'selected':''}}>{{$shop->name}}</option>
                            @empty
                            @endforelse
                            <option value="{{auth()->user()->id}}">{{auth()->user()->name}}</option>
                        </select>
                     </div>
                      <div class="form-group">
                         <label>Product Name</label>
                      <input type="text" class="form-control" value="{{$productDetails->name}}" name="name" id="name" required>
                      </div>
                      <div class="form-group">
                        <label>Slug</label>
                        <input type="text" class="form-control" placeholder="Enter Product Slug"  value="{{$productDetails->slug}}" name="slug" id="slug" required>
                     </div>
                     <div class="form-group">
                        <label>Product Brand</label>
                        <input type="text" class="form-control" placeholder="Enter Product Brand"  value="{{$productDetails->brand}}" name="brand" id="brand" required>
                     </div>
                      <div class="form-group">
                         <label>Product Code</label>
                         <input type="text" class="form-control" value="{{$productDetails->code}}" name="code" id="code" required>
                      </div>
                      <div class="form-group">
                         <label>Product Color</label>
                         <input type="text" class="form-control" value="{{$productDetails->color}}" name="color" id="color" required>
                      </div>
                      <div class="form-group">
                        <label>Product Price (Taka)</label>
                        <input type="text" class="form-control" placeholder="Enter Price" value="{{$productDetails->price}}" name="price" id="price" required>
                     </div>
                      <div class="form-group">
                        <label>Product Quantity</label>
                        <input type="text" class="form-control" placeholder="Enter Product Quantity" value="{{$productDetails->quantity}}" name="quantity" id="quantity" required>
                     </div>
                     <div class="form-group">
                        <label>Minimum Order</label>
                        <input type="text" class="form-control" placeholder="Enter Minimum Order" value="{{$productDetails->min_order}}" name="min_order" id="min_order" required>
                     </div>
                     <div class="form-group">
                        <label>Product Weight (kg)</label>
                        <input type="text" class="form-control" placeholder="Enter Product Weight" value="{{$productDetails->weight}}" name="weight" id="weight" required>
                     </div>
                      <div class="form-group">
                         <label>Product Description</label>
                         <textarea name="description" id="description" class="form-control" required>
                              {{$productDetails->description}}
                         </textarea>
                      </div>


                      <div class="form-group">
                        <label>Picture upload</label>
                        <input type="file" name="image">
                        <input type="hidden" name="current_image" value="{{$productDetails->image}}">
                        @if(!empty($productDetails->image))
                        <img style="width:100px;margin-top:10px;" src="{{asset('/uploads/products/'.$productDetails->image)}}">
                        @endif
                     </div>
                    </div>
                     {{-- admin section --}}
                    <div class="col-sm-6">
                        <div class="form-group">
                        <label>Under Discount</label>
                        <select name="discount_id" id="discount_id" class="form-control">
                            <option value="">Select One</option>
                            @forelse ($discounts as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @empty
                            @endforelse
                        </select>
                        </div>
                        <div class="form-group">
                        <label>Under position</label>
                        <select name="position" id="position" class="form-control">
                            <option value="">Select One</option>
                            <option value="top" {{$productDetails->position=='top'?'selected':''}}>Top</option>
                        </select>
                        </div>
                        <div class="form-group">
                        <label>Sale Price (Taka)</label>
                        <input type="text" class="form-control" placeholder="Sale Price" value="{{$productDetails->sale_price}}" name="sale_price" id="sale_price">
                        </div>
                        <div class="form-group">
                        <label>View</label>
                        <input type="text" class="form-control" placeholder="Product View" value="{{$productDetails->view}}" name="view" id="view">
                        </div>
                        <div class="form-group">
                        <label>Sale Count</label>
                        <input type="text" class="form-control" placeholder="Sale Count" value="{{$productDetails->sale_count}}" name="sale_count" id="sale_count">
                        </div>
                        <div class="form-group">
                        <label>Rating</label>
                        <input type="text" class="form-control" placeholder="Rating" value="{{$productDetails->rating}}" name="rating" id="rating">
                        </div>
                    </div>
                    {{-- end admin section --}}
                    <div class="col-sm-12">
                      <div class="reset-button">
                         <input type="submit" class="btn btn-success" value="Edit Product">
                      </div>
                    </div>
                   </form>
                </div>
             </div>
          </div>
       </div>
    </section>
    <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->

@endsection
