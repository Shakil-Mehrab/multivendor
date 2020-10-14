@extends('layouts.master')
@section('title','View Order')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <div class="header-icon">
          <i class="fa fa-eye"></i>
       </div>
       <div class="header-title">
          <h1>View Order</h1>
          <small>Order List</small>
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
                         <h4>View Order</h4>
                      </a>
                   </div>
                </div>
                <div class="panel-body">
                <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                   {{-- <div class="btn-group">
                      <div class="buttonexport" id="buttonlist">
                      <a class="btn btn-add" href="{{url('admin/add-order')}}"> <i class="fa fa-plus"></i> Add Order
                         </a>
                      </div>
                   </div> --}}
                   <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                   <div class="table-responsive">
                      <table id="table_id" class="table table-bordered table-striped table-hover">
                         <thead>
                            <tr class="info">
                               <th>ID</th>
                               <th>Orde Number</th>
                               <th>Status</th>
                               <th>Grand Total</th>
                               <th>Item Count</th>
                               <th>Is Paid</th>
                               <th>Payment Method</th>
                               <th>Shipping Full Name</th>
                               <th>Shipping Country</th>
                               <th>Shipping City</th>
                               <th>Shipping Address</th>
                               <th>Delivery Branch</th>
                               <th>Shipping Phone</th>
                               <th>Action</th>

                            </tr>
                         </thead>
                         <tbody>
                             @foreach($categories as $category)
                            <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->order_number}}</td>
                            <td>{{$category->status}}</td>
                            <td>{{$category->grand_total}}</td>
                            <td>{{$category->item_count}}</td>
                            <td>
                              <input type="checkbox" id="toggle-demo" class="PaidStatus btn btn-success" rel="{{$category->id}}"
                              data-toggle="toggle" data-on="Enabled" data-of="Disabled" data-onstyle="success" data-offstyle="danger"
                              @if($category['is_paid']=="1") checked @endif>
                              <div id="myElem" style="display:none;" class="alert alert-success">Paid</div>
                           </td>
                            <td>{{$category->payment_method}}</td>
                            <td>{{$category->shipping_fullname}}</td>
                            <td>{{$category->country->name}}</td>
                            <td>{{$category->city->name}}</td>
                            <td>{{$category->shipping_address}}</td>
                            <td>{{$category->deliverybranch->name}}</td>
                            <td>{{$category->shipping_phone}}</td>
                           <td>
                               <a href="{{url('/admin/edit-order/'.$category->id)}}" class="btn btn-add btn-sm"><i class="fa fa-pencil"></i></button>
                               <a href="{{url('/admin/delete-order/'.$category->id)}}" class="btn btn-danger btn-sm orderDelete"><i class="fa fa-trash-o"></i> </button>
                               <a href="{{url('/admin/view-order/item/'.$category->id)}}" class="btn btn-add btn-sm"> <i class="fa fa-eye"></i> </button>
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
@section('js')
<script>
   $(document).ready( function () {
    $(".orderDelete").click(function(e){
        e.preventDefault();
        var link=$(this).attr("href");
        bootbox.confirm("Are you sure to delete",function(confirmed){
        if(confirmed){
            // alert(link)
        window.location.href=link;
        };
        });
    });
   $(".PaidStatus").change(function(){
          var id = $(this).attr('rel');
          if($(this).prop("checked")==true){
             $.ajax({
                headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type : 'post',
                url : '/admin/update-paid-status',
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
                url : '/admin/update-paid-status',
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
