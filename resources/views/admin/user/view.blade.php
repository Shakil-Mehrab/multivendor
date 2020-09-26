@extends('layouts.master')
@section('title','View User')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <div class="header-icon">
          <i class="fa fa-eye"></i>
       </div>
       <div class="header-title">
          <h1>View User</h1>
          <small>User List</small>
       </div>
    </section>
    @if(Session::has('flash_message_error'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
        </button>
    <strong>{{ session('flash_message_error') }}</strong>
    </div>
    @endif
    @if(Session::has('flash_message_success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
        </button>
    <strong>{{ session('flash_message_success') }}</strong>
    </div>
    @endif

    <div id="message_success" style="display:none;" class="alert alert-sm alert-success">Status Enabled</div>
    <div id="message_error" style="display:none;" class="alert alert-sm alert-danger">Status Disabled</div>
    <!-- Main content -->
    <section class="content">
       <div class="row">
          <div class="col-sm-12">
             <div class="panel panel-bd lobidrag">
                <div class="panel-heading">
                   <div class="btn-group" id="buttonexport">
                      <a href="#">
                         <h4>View User</h4>
                      </a>
                   </div>
                </div>
                <div class="panel-body">
                <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                   <div class="btn-group">
                      <div class="buttonexport" id="buttonlist">
                      <a class="btn btn-add" href="{{url('admin/add-category')}}"> <i class="fa fa-plus"></i> Add User
                         </a>
                      </div>

                   </div>
                   <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                   <div class="table-responsive">
                      <table id="table_id" class="table table-bordered table-striped table-hover">
                         <thead>
                            <tr class="info">
                               <th>ID</th>
                               <th>User Name</th>
                               <th>User Email</th>
                               <th>User Phone</th>
                               <th>User Country</th>
                               <th>User City</th>
                               <th>User Role</th>
                               <th>Image</th>
                               <th>Action</th>
                            </tr>
                         </thead>
                         <tbody>
                             @foreach($categories as $category)
                            <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->email}}</td>
                            <td>{{$category->phone}}</td>
                            <td>{{$category->country_name}}</td>
                            <td>{{$category->city_name}}</td>
                            <td>{{$category->role_id}}</td>
                              <td>
                                @if(!empty($category->profile_photo_path))
                                    <img src="{{asset($category->profile_photo_path)}}" alt="" style="width:100px;">
                                @endif
                                </td>
                               <td>
                               <a href="{{url('/admin/edit-user/'.$category->id)}}" class="btn btn-add btn-sm"><i class="fa fa-pencil"></i></button>
                               <a href="{{url('/admin/delete-user/'.$category->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> </button>
                               </td>
                            </tr>
                             @endforeach
                         </tbody>
                      </table>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </section>
    <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->
@endsection
