@extends('layouts.master')
@section('title','Edit Order')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <div class="header-icon">
          <i class="fa fa-pencil"></i>
       </div>
       <div class="header-title">
          <h1>Edit Order</h1>
          <small>Edit Order</small>
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
                      <a class="btn btn-add " href="{{url('admin/view-order')}}">
                      <i class="fa fa-eye"></i>  View Order </a>
                   </div>
                </div>
                <div class="panel-body">
                <form class="col-sm-6" action="{{url('/admin/edit-order/'.$categoryDetails->id)}}" method="post" enctype="multipart/form-data"> {{csrf_field()}}
                     <div class="form-group">
                        <label>User Name</label>
                        <input type="text" class="form-control" value="{{$categoryDetails->user->name}}" disabled required>
                     </div>
                     <div class="form-group">
                        <label>Shipping Name</label>
                        <input type="text" class="form-control" value="{{$categoryDetails->shipping_fullname}}" name="shipping_fullname" id="shipping_fullname" required>
                     </div>
                     <div class="form-group">
                        <label>Shipping Phone</label>
                        <input type="text" class="form-control" value="{{$categoryDetails->shipping_phone}}" name="shipping_phone" id="shipping_fullname" required>
                     </div>
                     <div class="form-group">
                        <label>Shipping Address</label>
                        <input type="text" class="form-control" value="{{$categoryDetails->shipping_address}}" name="shipping_address" id="shipping_fuladdress" required>
                     </div>
                     <div class="form-group">
                        <label>Branch</label>
                        <select name="deliverybranch_id" id="deliverybranch_id" class="form-control">
                            <option value="">Select One</option>
                            @foreach($branches as $val)
                             <option value="{{$val->id}}" @if($val->id==$categoryDetails->deliverybranch_id) selected @endif>{{$val->name}}</option>
                            @endforeach
                        </select>
                     </div>
                     <div class="form-group">
                        <label>Status</label>
                        <select name="stauus" id="stauus" class="form-control">
                            <option value="">Select One</option>
                             <option value="pending" @if($categoryDetails->status=='pending') selected @endif>Pending</option>
                             <option value="processing" @if($categoryDetails->status=='processing') selected @endif>Processing</option>
                             <option value="decline" @if($categoryDetails->status=='decline') selected @endif>Decline</option>
                             <option value="completed" @if($categoryDetails->status=='completed') selected @endif>Completed</option>
                        </select>
                     </div>
                      <div class="form-group">
                         <label>Country</label>
                         <select name="country_id" id="country_id" class="form-control">
                             <option value="">Select One</option>
                             @foreach($countries as $val)
                              <option value="{{$val->id}}" @if($val->id==$categoryDetails->country_id) selected @endif>{{$val->name}}</option>
                             @endforeach
                         </select>
                      </div>
                      <div class="form-group">
                        <label>City</label>
                        <select name="city_id" id="city_id" class="form-control">
                            <option value="">Select One</option>
                            @foreach($cities as $val)
                             <option value="{{$val->id}}" @if($val->id==$categoryDetails->city_id) selected @endif>{{$val->name}}</option>
                            @endforeach
                        </select>
                     </div>
                      <div class="reset-button">
                         <input type="submit" class="btn btn-success" value="Edit Order">
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
