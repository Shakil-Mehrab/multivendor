@extends('layouts.master')
@section('title','Add Slide')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <div class="header-icon">
          <i class="fa fa-product-hunt"></i>
       </div>
       <div class="header-title">
          <h1>Add Slide</h1>
          <small>Add Slide</small>
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
                      <a class="btn btn-add " href="{{url('admin/view-slide')}}">
                      <i class="fa fa-eye"></i>  View Slide </a>
                   </div>
                </div>
                <div class="panel-body">
                <form class="col-sm-6" enctype="multipart/form-data" action="{{url('/admin/add-slide')}}" method="post"> {{csrf_field()}}
                     <div class="form-group">
                        <label>Slide Name</label>
                        <input type="text" class="form-control" placeholder="Enter Name" name="name" id="name" required>
                     </div>
                      <div class="form-group">
                        <label>Slide Slug</label>
                        <input type="text" class="form-control" placeholder="Enter Slug" name="slug" id="slug" required>
                     </div>
                     <div class="form-group">
                        <label>Position</label>
                        <select name="position" id="position" class="form-control" required>
                            <option value="">Select One</option>
                            <option value="left">Left</option>
                            <option value="right">Right</option>
                        </select>
                     </div>
                      <div class="form-group">
                        <label>Picture upload</label>
                        <input type="file" name="image">
                     </div>
                      <div class="reset-button">
                         <input type="submit" class="btn btn-success" value="Add Slide">
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
