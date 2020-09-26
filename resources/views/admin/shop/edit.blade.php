@extends('layouts.master')
@section('title','Edit Shop')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <div class="header-icon">
          <i class="fa fa-product-hunt"></i>
       </div>
       <div class="header-title">
          <h1>Edit Shop</h1>
          <small>Edit Shop</small>
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
                      <a class="btn btn-add " href="{{url('admin/view-shop')}}">
                      <i class="fa fa-eye"></i>  View Shop </a>
                   </div>
                </div>
                <div class="panel-body">
                  <form class="col-sm-6" enctype="multipart/form-data" action="{{url('/admin/edit-shop/'.$productDetails->id)}}" method="post"> {{csrf_field()}}
                     <div class="form-group">
                        <label>Under Country</label>
                        <select name="country_id" id="country_id" class="form-control" required>
                            <option value="">Select One</option>
                            @forelse($countries as $cat)
                                <option value="{{$cat->id}}"{{$cat->id==$productDetails->country_id?'selected':''}}>{{$cat->name}}</option>
                            @empty
                            @endforelse
                        </select>
                     </div>
                     <div class="form-group">
                        <label>Under City</label>
                        <select name="city_id" id="city_id" class="form-control" required>
                            <option value="">Select One</option>
                            @forelse($cities as $ct)
                                <option value="{{$ct->id}}" {{$ct->id==$productDetails->city_id?'selected':''}}>{{$ct->name}}</option>
                            @empty
                            @endforelse
                        </select>
                     </div>
                      <div class="form-group">
                         <label>User Name</label>
                      <input type="text" class="form-control" value="{{$productDetails->owner->name}}" disabled>
                      </div>
                     <div class="form-group">
                        <label>Shop Nmae</label>
                        <input type="text" class="form-control" placeholder="Enter Shop Name"  value="{{$productDetails->name}}" name="name" id="name" required>
                     </div>
                      <div class="form-group">
                         <label>Phone</label>
                         <input type="text" class="form-control" value="{{$productDetails->phone}}" name="phone" id="phone" required>
                      </div>
                      <div class="form-group">
                         <label>Address</label>
                         <input type="text" class="form-control" value="{{$productDetails->address}}" name="address" id="address" required>
                      </div>
                      <div class="form-group">
                        <label>Rating</label>
                        <input type="text" class="form-control" placeholder="Enter Rating"  value="{{$productDetails->rating}}" name="rating" id="rating">
                     </div>
                      <div class="form-group">
                         <label>Description</label>
                         <textarea name="description" id="description" class="form-control" required>
                              {{$productDetails->description}}
                         </textarea>
                      </div>
                      <div class="form-group">
                        <label>Picture upload</label>
                        <input type="file" name="image">
                        <input type="hidden" name="current_image" value="{{$productDetails->image}}">
                        @if(!empty($productDetails->image))
                        <img style="width:100px;margin-top:10px;" src="{{asset('/uploads/shop/'.$productDetails->image)}}">
                        @endif
                     </div>
                     <div class="reset-button">
                        <input type="submit" class="btn btn-success" value="Edit Product">
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
