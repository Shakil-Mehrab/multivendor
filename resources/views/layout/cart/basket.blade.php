@php
    $carts=Cart::getContent();
@endphp
<a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
    <span class="cart-count">{{count($carts)}}</span>
</a>

<div class="dropdown-menu" >
    <div class="dropdownmenu-wrapper">
        <div class="dropdown-cart-products">

        @forelse($carts as $cart)
            <div class="product">
                <div class="product-details">
                    <h4 class="product-title">
                        <a href="/user/product/show/{{$cart->id}}">{{$cart->name}}</a>
                    </h4>

                    <span class="cart-product-info">
                        <span class="cart-product-qty">{{$cart->quantity}}</span>
                        x  ৳ {{$cart->price}}
                    </span><br>
                     <span class="cart-product-info">
                        <span class="cart-product-qty">{{$cart->attributes->size}}</span>
                    </span>
                </div><!-- End .product-details -->

                <figure class="product-image-container">
                    <a href="/user/product/show/{{$cart->id}}" class="product-image">
                        <img src="{{asset('/uploads/products/'.$cart->attributes->image)}}" alt="product">
                    </a>
                    <a href="#" class="btn-remove cartBasketRemove" title="Remove Product" data-id="{{$cart->id}}"><i class="icon-cancel"></i></a>
                </figure>
            </div><!-- End .product -->
        @empty
        @endforelse
        </div><!-- End .cart-product -->

        <div class="dropdown-cart-total">
            <span>Total</span>
            <span class="cart-total-price"> ৳ {{Cart::getTotal()}}</span>
        </div><!-- End .dropdown-cart-total -->

        <div class="dropdown-cart-action">
             @if($carts->count()==0)
                <a href="/" class="btn">Continue Shopping</a>
            @else
                <a href="/user/show/cart" class="btn">View Cart</a>
                <a href="/user/show/cart" class="btn">Checkout</a>
            @endif
        </div><!-- End .dropdown-cart-total -->
    </div><!-- End .dropdownmenu-wrapper -->
</div>
