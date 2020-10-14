@extends('layout.app')
@section('title','Product Cart')
@section('content')
@php
    $carts=Cart::getContent();
@endphp
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index-2.html"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
            </ol>
            <ul class="checkout-progress-bar">
                <li>
                    <span>Cart</span>
                </li>
                <li>
                    <span>Shipping</span>
                </li>
            </ul>
        </div><!-- End .container -->
    </nav>

    <div class="container" id="cartTable">


    </div>
    <div class="mb-6"></div><!-- margin -->
</main>
@endsection
@section('js')
    <script type="text/javascript">
        $(document).ready(function(){
             $.get('{{URL::to("user/cart/table")}}',function(data){
                $('#cartTable').empty().append(data);
            });
            $('#cartTable').on('click','.cartRowRemove',function(e){
                var id=$(this).data('id');
                if(id){
                    $.get("{{URL::to('/user/cart/remove')}}/"+id,function(data){
                        $('#cartBasket').empty().append(data);
                        $.get('{{URL::to("user/cart/table")}}',function(data){
                            $('#cartTable').empty().append(data);
                        });
                        const Toast = Swal.mixin({
                          toast: true,
                          position: 'top-end',
                          showConfirmButton: false,
                          timer: 3000,
                        })
                        if($.isEmptyObject(data.error)){
                            Toast.fire({
                                icon: 'success',
                                title: 'Product Removed from Cart!'
                            })
                        }

                    });
                }
            });
            $('#cartTable').on('click','#updateCart',function(e){
                e.preventDefault();
                var id=$(this).data('id');
                var qty=$('#qty').val();
                var size_id=$('#size_id').val();

                if(size_id){
                $.post("{{URL::to('/user/cart/update/')}}/"+id,{'qty':qty,'size_id':size_id},function(data){
                    $('#cartTable').empty().append(data);
                    $.get('{{URL::to("user/cart/basket")}}',function(data){
                        $('#cartBasket').empty().append(data);
                    });
                    const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      showConfirmButton: false,
                      timer: 3000,
                    })
                    if($.isEmptyObject(data.error)){
                        Toast.fire({
                            icon: 'success',
                            title: 'Cart Updated!'
                        })
                    }
                });
                }else{
                    alert('Please Select a Size')
                }
            });
        });

    </script>
@endsection
