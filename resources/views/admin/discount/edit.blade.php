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
                <form class="col-sm-6" enctype="multipart/form-data" action="{{url('/admin/edit-discount/'.$productDetails->id)}}" method="post"> {{csrf_field()}}
                  <div class="form-group">
                     <label>Discont Name</label>
                     <input type="text" class="form-control" placeholder="Enter Discont Name" value="{{$productDetails->name}}" name="name" id="name" required>
                  </div>
                  <div class="form-group">
                    <label>Discont Slug</label>
                    <input type="text" class="form-control" placeholder="Enter Discont Slug" value="{{$productDetails->slug}}" name="slug" id="slug" required>
                 </div>
                 <div class="form-group">
                    <label>Discont</label>
                    <input type="text" class="form-control" placeholder="Enter Discont" value="{{$productDetails->discount}}" name="discount" id="discount" required>
                 </div>
                 <div class="form-group">
                    <label>Discount Type</label>
                    <select name="discount_type" id="discount_type" class="form-control" required>
                       <option value=''>Select One</option>
                       <option value='fixed' {{$productDetails->discount_type=='fixed'?'selected':''}}>Fixed</option>
                       <option value='percentage' {{$productDetails->discount_type=='percentage'?'selected':''}}>Percentage</option>
                    </select>
                 </div>
                 <div class="form-group">
                  <label>Picture upload</label>
                     <input type="file" name="image">
                     <input type="hidden" name="current_image" value="{{$productDetails->image}}">
                     @if(!empty($productDetails->image))
                     <img style="width:100px;margin-top:10px;" src="{{asset('/uploads/discount/'.$productDetails->image)}}">
                     @endif
                  </div>
                     <div class="reset-button">
                        <input type="submit" class="btn btn-success" value="Edit Discount">
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
