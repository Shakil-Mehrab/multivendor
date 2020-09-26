@extends('layouts.master')
@section('title','Add Discount')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <div class="header-icon">
          <i class="fa fa-product-hunt"></i>
       </div>
       <div class="header-title">
          <h1>Add Discount</h1>
          <small>Add Discount</small>
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
                      <i class="fa fa-eye"></i>  View Discount </a>
                   </div>
                </div>
                <div class="panel-body">
                <form class="col-sm-6" enctype="multipart/form-data" action="{{url('/admin/add-discount')}}" method="post"> {{csrf_field()}}
                      <div class="form-group">
                         <label>Discont Name</label>
                         <input type="text" class="form-control" placeholder="Enter Discont Name" name="name" id="name" required>
                      </div>
                      <div class="form-group">
                        <label>Discont Slug</label>
                        <input type="text" class="form-control" placeholder="Enter Discont Slug" name="slug" id="slug" required>
                     </div>
                     <div class="form-group">
                        <label>Discont</label>
                        <input type="text" class="form-control" placeholder="Enter Discont" name="discount" id="discount" required>
                     </div>
                     <div class="form-group">
                        <label>Discount Type</label>
                        <select name="discount_type" id="discount_type" class="form-control" required>
                           <option value=''>Select One</option>
                           <option value='fixed'>Fixed</option>
                           <option value='percentage'>Percentage</option>
                        </select>
                     </div>
                      <div class="form-group">
                        <label>Picture upload</label>
                        <input type="file" name="image">
                     </div>
                      <div class="reset-button">
                         <input type="submit" class="btn btn-success" value="Add Discount">
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
