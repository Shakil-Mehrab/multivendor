@extends('layouts.master')
@section('title','Edit User')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <div class="header-icon">
          <i class="fa fa-pencil"></i>
       </div>
       <div class="header-title">
          <h1>Edit User</h1>
          <small>Edit User</small>
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
                      <a class="btn btn-add " href="{{url('admin/view-user')}}">
                      <i class="fa fa-eye"></i>  View User </a>
                   </div>
                </div>
                <div class="panel-body">
                <form class="col-sm-6" action="{{url('/admin/edit-user/'.$categoryDetails->id)}}" method="post" enctype="multipart/form-data"> {{csrf_field()}}
                      <div class="form-group">
                         <label>User Name</label>
                      <input type="text" class="form-control" value="{{$categoryDetails->name}}" name="name" id="name" required>
                      </div>
                      <div class="form-group">
                         <label>Role</label>
                         <select name="role_id" id="role_id" class="form-control">
                            <option value="">Select One</option>
                            <option value="1" @if($categoryDetails->role_id==1) selected @endif>Admin</option>
                            <option value="2" @if($categoryDetails->role_id==2) selected @endif>Member</option>
                            <option value="3" @if($categoryDetails->role_id==3) selected @endif>User</option>
                         </select>
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" value="{{$categoryDetails->email}}" name="email" id="email" required>
                      </div>
                      <div class="form-group">
                        <label>Country</label>
                        <input type="text" class="form-control" value="{{$categoryDetails->country_name}}" name="country_name" id="country_name" required>
                      </div>
                      <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" value="{{$categoryDetails->city_name}}" name="city_name" id="city_name" required>
                      </div>
                      <div class="reset-button">
                         <input type="submit" class="btn btn-success" value="Edit User">
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
