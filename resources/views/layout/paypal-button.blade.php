@extends('public.master')
@section('content')
<div class="electro-product-wrapper wrapper-padding pt-95 pb-45" style="padding: 2px">
    <div class="container-fluid">
        <div class="top-product-style">
            <div class="tab-content">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4"><br><br><br><br>
                        {{-- <a href="{{route('creat-payment')}}" class="btn btn-primary">payment by Paypal by get Method</a> --}}
                        <form action="{{route('create-payment')}}" method='post'>
                            @csrf
                            <input type="submit" class="btn btn-primary" value="Payment by Paypal">
                        </form>
                    </div>
                </div><br><br><br><br>

            </div>
        </div>
    </div>
</div>
@endsection
