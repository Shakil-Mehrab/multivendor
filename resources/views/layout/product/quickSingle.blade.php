<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from portotheme.com/html/porto/demo-5/ by , Thu, 11 Apr 2019 15:14:22 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hatirpal.com : Online Wholesale Marketplace In Bangladesh</title>
    <meta name="keywords" content="hatirpal.com,hatirpal,shopping" />
    <meta name="description" content="Hatirpal.com is the largest online wholesale marketplace in Bangladesh.Hatirpal.com has been experimenting with and out to win the trust of buyers" />
    <meta name="author" content="SW-THEMES"> 
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('porto/images/icons/favicon.png')}}">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{asset('porto/css/bootstrap.min.css')}}">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{asset('porto/css/style.min.css')}}">
</head>
<body>
<div class="page-wrapper">
@php
use App\Model\Product;
$sameProducts=Product::orderBy('id','desc')->where('slug',$product->slug)->limit('3')->get();
$relatedProducts=Product::orderBy('id','desc')->get();
$oldProducts=Product::orderBy('id','asc')->get();
@endphp
    <div class="product-single-container product-single-default product-quick-view container">
                    <div class="row">
                        <div class="col-lg-7 col-md-6 product-single-gallery">
                            <div class="product-slider-container product-item">
                                <div class="product-single-carousel owl-carousel owl-theme">
                                	<div class="product-item">
                                        <img class="product-single-image" src="{{asset('storage/app/public')}}/{{$product->cover_img}}" data-zoom-image="{{asset('storage')}}/{{$product->cover_img}}"/>
                                    </div>
                                    @forelse($sameProducts as $same)
                                    <div class="product-item">
                                        <img class="product-single-image" src="{{asset('storage/app/public')}}/{{$same->cover_img}}" data-zoom-image="{{asset('storage')}}/{{$same->cover_img}}"/>
                                    </div>
                                    @empty
                                	@endforelse
                                </div>
                                <!-- End .product-single-carousel -->
                                <span class="prod-full-screen">
                                    <i class="icon-plus"></i>
                                </span>
                            </div>
                            <div class="prod-thumbnail row owl-dots" id='carousel-custom-dots'>
                            	<div class="col-3 owl-dot">
                                    <img src="{{asset('storage/app/public')}}/{{$product->cover_img}}"/>
                                    <p><a href="/user/product/show/{{$product->id}}">Click to order</a></p>
                                </div>
                                @forelse($sameProducts as $same)
                                <div class="col-3 owl-dot">
                                    <img src="{{asset('storage/app/public')}}/{{$same->cover_img}}"/>
                                    <p><a href="/user/product/show/{{$same->id}}">Click to order</a></p>
                                </div>
                                @empty
                                @endforelse
                            </div>
                        </div><!-- End .col-lg-7 -->

                        <div class="col-lg-5 col-md-6">
                            <div class="product-single-details">
                                <h1 class="product-title">{{$product->name}}</h1>

                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:{{100/5*$product->rating}}%"></span><!-- End .ratings -->
                                    </div><!-- End .product-ratings -->

                                    <a href="#" class="rating-link">({{$product->reviews->count()}} Reviews)</a>
                                </div><!-- End .product-container -->
                                @php
                                    use App\Model\Product_discount;
                                    $productDiscount=Product_discount::where('product_id',$product->id)->first();
                                @endphp
                                <div class="price-box">
                                    @if(!empty($productDiscount))
                                        <span class="old-price">৳ {{$product->sale_price*$productDiscount->discount->discount}}</span>
                                    @else
                                        <span class="product-price">৳ {{$product->sale_price}}</span>
                                    @endif
                                </div>

                                <div class="product-desc" style="text-align:justify;">
                                    <p>@php echo substr($product->description,0,700) @endphp</p>
                                </div><!-- End .product-desc -->
                                
                                <div class="product-filters-container">
                                    <div class="product-single-filter">
                                        <label>Color : </label>
                                        @forelse($product->product_attributes as $attribute)
                                        @if($attribute->code=='color')
                                        <span>{{$attribute->name}}&nbsp; </span>
                                        @endif
                                        @empty
                                		@endforelse
                                    </div>
                                    <div class="product-single-filter">
                                        <label>Size : </label>
                                        @forelse($product->product_attributes as $attribute)
                                        @if($attribute->code=='size')
                                        <span>{{$attribute->name}}&nbsp; &nbsp;</span>
                                        @endif
                                        @empty
                                		@endforelse
                                    </div>
                                </div>
                               

                                <div class="product-action product-all-icons">
                                    <div class="product-single-qty">
                                        <input class="horizontal-quantity form-control" type="text">
                                    </div><!-- End .product-single-qty -->

                                    <a href="#" class="paction add-cart" title="Add to Cart">
                                        <span>Add to Cart</span>
                                    </a>
                                    <a href="#" class="paction add-wishlist" title="Add to Wishlist">
                                        <span>Add to Wishlist</span>
                                    </a>
                                    <a href="#" class="paction add-compare" title="Add to Compare">
                                        <span>Add to Compare</span>
                                    </a>
                                </div><!-- End .product-action -->

                                <!-- <div class="product-single-share">
                                    <label>Share:</label>
                                    <div class="addthis_inline_share_toolbox"></div>
                                </div> -->
                            </div>
                        </div><!-- End .col-lg-5 -->
                    </div><!-- End .row -->
                </div>                                                                                               
</div>
<script src="{{asset('porto/js/jquery.min.js')}}"></script>
<script src="{{asset('porto/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('porto/js/plugins.min.js')}}"></script>

<!-- Main JS File -->
<script src="{{asset('porto/js/main.min.js')}}"></script>
</body>

<!-- Mirrored from portotheme.com/html/porto/demo-5/ by , Thu, 11 Apr 2019 15:15:00 GMT -->
</html>                                                            