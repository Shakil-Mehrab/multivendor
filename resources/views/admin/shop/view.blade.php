@extends('layouts.master')
@section('title','View Shop')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <div class="header-icon">
          <i class="fa fa-product-hunt"></i>
       </div>
       <div class="header-title">
          <h1>View Shop</h1>
          <small>Shop List</small>
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
                         <h4>View Shop</h4>
                      </a>
                   </div>
                </div>
                <div class="panel-body">
                <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                   <div class="btn-group">
                      {{-- <div class="buttonexport" id="buttonlist">
                      <a class="btn btn-add" href="{{url('admin/add-product')}}"> <i class="fa fa-plus"></i> Add Shop
                         </a>
                      </div> --}}

                   </div>
                   <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                   <div class="table-responsive">
                      <table id="table_id" class="table table-bordered table-striped table-hover">
                         <thead>
                            <tr class="info">
                               <th>ID</th>
                               <th>User Name</th>
                               <th>Country Name</th>
                               <th>City Name</th>
                               <th>Shop Name</th>
                               <th>Phone</th>
                               <th>Address</th>
                               <th>Description</th>
                               <th>Image</th>
                                @if(auth()->user()->role_id==1)
                               <th>Raring</th>
                               <th>Active</th>
                               <th>Action</th>
                               @endif
                            </tr>
                         </thead>
                         <tbody>
                            @foreach($products as $product)
                            <tr>
                              <td>{{$product->id}}</td>
                              <td>{{$product->owner->name}}</td>
                              <td>{{$product->country->name}}</td>
                              <td>{{$product->city->name}}</td>
                              <td>{{$product->name}}</td>
                              <td>{{$product->phone}}</td>
                              <td>{{$product->address}}</td>
                              <td>{{$product->description}}</td>
                              <td>
                                 @if(!empty($product->image))
                                 <img src="{{ asset('/uploads/shop/'.$product->image) }}" style="width:100px;">
                                 @endif
                               </td>
                               @if(auth()->user()->role_id==1)
                              <td>{{$product->rating}}</td>
                              <td>
                               <input type="checkbox" class="ShopStatus btn btn-success" rel="{{$product->id}}"
                               data-toggle="toggle" data-on="Enabled" data-of="Disabled" data-onstyle="success" data-offstyle="danger"
                               @if($product['is_active']=="1") checked @endif>
                               <div id="myElem" style="display:none;" class="alert alert-success">Active</div>
                              </td>
                               <td>
                              {{-- <a href="{{url('/admin/add-images/'.$product->id)}}" class="btn btn-info btn-sm" title="Add Images"><i class="fa fa-image"></i></button>
                              <a href="{{url('/admin/add-attributes/'.$product->id)}}" class="btn btn-warning btn-sm" title="Add Attributes"><i class="fa fa-list"></i></button> --}}
                               <a href="{{url('/admin/edit-shop/'.$product->id)}}" class="btn btn-add btn-sm" title="Edit Product"><i class="fa fa-pencil"></i></button>
                               <a href="{{url('/admin/delete-shop/'.$product->id)}}" class="btn btn-danger btn-sm" title="Delete Product"><i class="fa fa-trash-o"></i> </button>
                               </td>
                               @endif
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
@section('js')
<script>
   $(document).ready( function () {
   $(".ShopStatus").change(function(){
          var id = $(this).attr('rel');
          if($(this).prop("checked")==true){
             $.ajax({
                headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type : 'post',
                url : '/admin/update-shop-status',
                data : {status:'1',id:id},
                success:function(data){
                   $("#message_success").show();
                   setTimeout(function() { $("#message_success").fadeOut('slow'); }, 2000);
                },error:function(){
                   alert("Error");
                }
             });

          }else{
            $.ajax({
                headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type : 'post',
                url : '/admin/update-shop-status',
                data : {status:'0',id:id},
                success:function(resp){
                   $("#message_error").show();
                   setTimeout(function() { $("#message_error").fadeOut('slow'); }, 2000);
                },error:function(){
                   alert("Error");
                }
             });
          }
         });
      });

</script>
@endsection