@extends('layouts.master')
@section('title','View Order Item')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <div class="header-icon">
          <i class="fa fa-eye"></i>
       </div>
       <div class="header-title">
          <h1>View Order Item</h1>
          <small>Order Item List</small>
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
                         <h4>View Order Item</h4>
                      </a>
                   </div>
                </div>
                <div class="panel-body">
                <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                   <div class="btn-group">
                      <div class="buttonexport" id="buttonlist">
                      {{-- <a class="btn btn-add" href="{{url('admin/add-category')}}"> <i class="fa fa-plus"></i> Add Category
                         </a> --}}
                      </div>

                   </div>
                   <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                   <div class="table-responsive">
                      <table id="table_id" class="table table-bordered table-striped table-hover">
                         <thead>
                            <tr class="info">
                               <th>ID</th>
                               <th>Order ID</th>
                               <th>Product Name</th>
                               <th>Product Price</th>
                               <th>Quantity</th>
                               <th>Image</th>
                               <th>Action</th>
                            </tr>
                         </thead>
                         <tbody>
                            @forelse($category->orderItems as $cat)
                            <tr>
                                <td>{{$cat->id}}</td>
                                <td>{{$cat->order->id}}</td>
                                <td><a href="{{url('/user/product/show',$cat->product_image->product->id)}}">{{$cat->product_image->product->name}}</a></td>
                                <td>{{$cat->price}}</td>
                                <td>{{$cat->quantity}}</td>
                                <td>
                                    @if(!empty($cat->product_image->image))
                                        <img src="{{asset('/uploads/products/'.$cat->product_image->image)}}" alt="{{$cat->product_image->image}}" style="width:100px;">
                                    @endif
                                </td>
                                <td>
                                <a href="{{url('/admin/edit-category/'.$cat->id)}}" class="btn btn-add btn-sm"><i class="fa fa-pencil"></i></button>
                                <a href="{{url('/admin/delete-order/item/'.$cat->id)}}" class="btn btn-danger btn-sm orderItemDelete"><i class="fa fa-trash-o"></i> </button>
                                </td>
                            </tr>
                            @empty
                            @endforelse
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
 // delete
   $(document).ready( function () {
    $(".orderItemDelete").click(function(e){
        e.preventDefault();
        var link=$(this).attr("href");
        bootbox.confirm("Are you sure to delete",function(confirmed){
        if(confirmed){
            // alert(link)
        window.location.href=link;
        };
        });
    });
   });
</script>
@endsection
