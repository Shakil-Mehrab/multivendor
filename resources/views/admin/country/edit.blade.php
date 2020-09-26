@extends('layouts.master')
@section('title','Edit Country')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <div class="header-icon">
          <i class="fa fa-pencil"></i>
       </div>
       <div class="header-title">
          <h1>Edit Country</h1>
          <small>Edit Country</small>
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
                      <a class="btn btn-add " href="{{url('admin/view-country')}}">
                      <i class="fa fa-eye"></i>  View Country </a>
                   </div>
                </div>
                <div class="panel-body">
                <form class="col-sm-6" action="{{url('/admin/edit-country/'.$categoryDetails->id)}}" method="post" enctype="multipart/form-data"> {{csrf_field()}}
                      <div class="form-group">
                         <label>Country Name</label>
                      <input type="text" class="form-control" value="{{$categoryDetails->name}}" name="name" id="name" required>
                      </div>
                      <div class="form-group">
                         <label>Code</label>
                      <input type="text" class="form-control" value="{{$categoryDetails->code}}" name="code" id="code" required>
                      </div>
                      <div class="form-group">
                        <label>Flag upload</label>
                        <input type="file" name="image">
                           <input type="hidden" name="current_image" value="{{$categoryDetails->flag}}">
                        @if(!empty($categoryDetails->flag))
                        <img style="width:100px;margin-top:10px;" src="{{asset('/uploads/country/'.$categoryDetails->flag)}}">
                        @endif
                     </div>
                      <div class="reset-button">
                         <input type="submit" class="btn btn-success" value="Edit Country">
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
