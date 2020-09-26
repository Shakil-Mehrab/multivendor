@extends('layout.app')
@section('content')
@php
use App\Models\Product;
$sameProducts=Product::orderBy('id','desc')->get();
$relatedProducts=Product::orderBy('id','desc')->where('slug',$product->slug)->get();
$oldProducts=Product::orderBy('id','asc')->get();
$i=0;
@endphp
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">{{$product->category->name}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
            </ol>
        </div><!-- End .container -->
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <form method="post" action="#">
                <div class="product-single-container product-single-default">
                    <div class="row">
                        <div class="col-lg-7 col-md-6 product-single-gallery">
                            <div class="product-slider-container product-item">
                                <div class="product-single-carousel owl-carousel owl-theme">
                                	{{-- <div class="product-item">
                                        <img class="product-single-image" src="{{asset('uploads/products')}}/{{$product->image}}" data-zoom-image="{{asset('uploads/products')}}/{{$product->image}}"/>
                                         <span style="font-size:16px;color:white;border-radius:6px;background:#a96262;padding:2px 6px;position: absolute;
                                                bottom: 0px;right:50%">{{$i=$i+1}}/{{$sameProducts->count()}}</span>
                                    </div> --}}
                                    @forelse($product->productImages as $same)
                                    <div class="product-item">
                                        <img class="product-single-image" src="{{asset('/uploads/products/'.$same->image)}}"/>
                                        <span style="font-size:16px;color:white;border-radius:6px;background:#a96262;padding:2px 6px;position: absolute;
                                        bottom: 0px;left:0%">{{$i=$i+1}}/{{$product->productImages->count()}}</span>
                                        <a href="#" class="paction add-cart" title="Add to Cart" data-id="{{$same->id}}" style="border:2px solid black;position: absolute;
                                            bottom: 0px;right:0%">
                                            <span>Add to Cart</span>
                                        </a>
                                    </div>
                                    
                                    @empty
                                	@endforelse
                                </div>
                                <!-- End .product-single-carousel -->
                                {{-- <span class="prod-full-screen">
                                    <i class="icon-plus"></i>
                                </span> --}}
                            </div>
                            <div class="prod-thumbnail row owl-dots" id='carousel-custom-dots' style="display:none">
                                @forelse($product->productImages as $same)
                                <div class="col-3 owl-dot">
                                    <img src="{{asset('/uploads/products/'.$same->image)}}"/>
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
                                </div>
                                {{-- @php
                                    use App\Models\Product_discount;
                                    $productDiscount=Product_discount::where('product_id',$product->id)->first();
                                @endphp
                                <div class="price-box">
                                    @if($productDiscount=='')
                                         <span class="product-price">৳ {{$product->sale_price}}</span>
                                    @else
                                        <span class="old-price">৳ {{$product->sale_price}}</span>
                                        <span class="product-price">৳ {{$product->sale_price-$product->sale_price*$productDiscount->discount->discount}}</span>
                                       
                                    @endif
                                </div> --}}

                                <div class="product-desc" style="text-align:justify;">
                                    <p>@php echo substr($product->description,0,700) @endphp</p>
                                </div>
                                
                                <div class="product-filters-container">
                                    {{-- <div class="product-single-filter">
                                        <label>Color : </label>
                                        @forelse($product->product_attributes as $attribute)
                                        @if($attribute->code=='color')
                                        <span>{{$attribute->name}}&nbsp; </span>
                                        @endif
                                        @empty
                                		@endforelse
                                    </div> --}}
                                    <div class="product-single-filter">
                                        <label>Size</label>
                                        <select class="form-control" name="size" id='size' required>
                                            @forelse($product->attributes as $ct)
                                            <option value="{{$ct->id}}">{{$ct->size}}</option>
                                            @empty
                                            <option value="">No Size</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                {{-- <div class="product-action product-all-icons">
                                    <div class="product-single-qty">
                                        <input class="horizontal-quantity form-control" type="text">
                                    </div>

                                    <button class="paction add-cart" title="Add to Cart" data-id="{{$product->id}}">
                                        <span>Add to Cart</span>
                                    </button>
                                    <a href="#" class="paction add-wishlist" title="Add to Wishlist">
                                        <span>Add to Wishlist</span>
                                    </a>
                                    <a href="#" class="paction add-compare" title="Add to Compare">
                                        <span>Add to Compare</span>
                                    </a>
                                </div> --}}
                                <!-- <div class="product-single-share">
                                    <label>Share:</label>
                                    <div class="addthis_inline_share_toolbox"></div>
                                </div> -->
                            </div>
                        </div><!-- End .col-lg-5 -->
                    </div><!-- End .row -->
                </div><!-- End .product-single-container -->
                </form>
                <div class="product-single-tabs">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" id="product-tab-desc" data-toggle="tab" href="#product-desc-content" role="tab" aria-controls="product-desc-content" aria-selected="true">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="product-tab-tags" data-toggle="tab" href="#product-tags-content" role="tab" aria-controls="product-tags-content" aria-selected="false">Tags</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" id="product-tab-reviews" data-toggle="tab" href="#product-reviews-content" role="tab" aria-controls="product-reviews-content" aria-selected="false">Reviews</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade" id="product-desc-content" role="tabpanel" aria-labelledby="product-tab-desc">
                            <div class="product-desc-content">
                                <p>{{$product->description}}</p>
                            </div><!-- End .product-desc-content -->
                        </div><!-- End .tab-pane -->

                        <div class="tab-pane fade" id="product-tags-content" role="tabpanel" aria-labelledby="product-tab-tags">
                            <div class="product-tags-content">
                                <form action="#">
                                    <h4>Add Your Tags:</h4>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-sm" required>
                                        <input type="submit" class="btn btn-primary" value="Add Tags">
                                    </div><!-- End .form-group -->
                                </form>
                                <p class="note">Use spaces to separate tags. Use single quotes (') for phrases.</p>
                            </div><!-- End .product-tags-content -->
                        </div><!-- End .tab-pane -->

                        <div class="tab-pane fade show active" id="product-reviews-content" role="tabpanel" aria-labelledby="product-tab-reviews">
                            <div class="product-reviews-content">
                                <div class="collateral-box">
                                    <ul>
                                        <li>Be the first to review this product</li>
                                    </ul>
                                </div><!-- End .collateral-box -->

                                <div class="add-product-review">
                                    <h3 class="text-uppercase heading-text-color font-weight-semibold">WRITE YOUR OWN REVIEW</h3>
                                    <p>How do you rate this product? *</p>

                                    <form action="{{route('review.product',$product->id)}}" method="post">
                                    	@csrf
                                        <table class="ratings-table">
                                            <thead>
                                                <tr>
                                                    <th>&nbsp;</th>
                                                    <th>1 star</th>
                                                    <th>2 stars</th>
                                                    <th>3 stars</th>
                                                    <th>4 stars</th>
                                                    <th>5 stars</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Quality</td>
                                                    <td>
                                                        <input type="radio" name="rating" id="Quality_1" value="1" class="radio">
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="rating" id="Quality_2" value="2" class="radio">
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="rating" id="Quality_3" value="3" class="radio">
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="rating" id="Quality_4" value="4" class="radio">
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="rating" id="Quality_5" value="5" class="radio">
                                                    </td>
                                                    @if ($errors->has('rating'))
					                                <span class="help-block">
					                                    <strong style="color:red">{{ $errors->first('rating') }}</strong>
					                                </span>
					                                @endif
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="form-group mb-2">
                                            <label>Review <span class="required">*</span></label>
                                            <textarea name="review" cols="5" rows="6" class="form-control form-control-sm"></textarea>
                                            @if ($errors->has('review'))
			                                <span class="help-block">
			                                    <strong style="color:red">{{ $errors->first('review') }}</strong>
			                                </span>
			                                @endif
                                        </div>
                                        <input type="submit" class="btn btn-primary" value="Submit Review">
                                    </form>
                                </div><!-- End .add-product-review -->
                            </div><!-- End .product-reviews-content -->
                        </div><!-- End .tab-pane -->
                    </div><!-- End .tab-content -->
                </div><!-- End .product-single-tabs -->
            </div><!-- End .col-lg-9 -->

            <div class="sidebar-overlay"></div>
            <div class="sidebar-toggle"><i class="icon-sliders"></i></div>
            <aside class="sidebar-product col-lg-3 padding-left-lg mobile-sidebar">
                <div class="sidebar-wrapper">
                    <div class="widget widget-brand">
                        <a href="#">
                            <img src="{{asset('porto/images/product-brand.png')}}" alt="brand name">
                        </a>
                    </div><!-- End .widget -->

                    <div class="widget widget-info">
                        <ul>
                            <li>
                                <i class="icon-shipping"></i>
                                <h4>FREE<br>SHIPPING</h4>
                            </li>
                            <li>
                                <i class="icon-us-dollar"></i>
                                <h4>100% MONEY<br>BACK GUARANTEE</h4>
                            </li>
                            <li>
                                <i class="icon-online-support"></i>
                                <h4>ONLINE<br>SUPPORT 24/24</h4>
                            </li>
                        </ul>
                    </div><!-- End .widget -->

                    <div class="widget widget-banner">
                        <div class="banner banner-image">
                            <a href="#">
                                <img src="assets/images/banners/banner-sidebar.jpg" alt="Banner Desc">
                            </a>
                        </div><!-- End .banner -->
                    </div><!-- End .widget -->

                    <div class="widget widget-featured">
                        <h3 class="widget-title">Featured Products</h3>
                        
                        <div class="widget-body">
                            <div class="owl-carousel widget-featured-products">
                            	@forelse($oldProducts as $old)
                                <div class="featured-col">
                                    <div class="product product-sm">
                                        <figure class="product-image-container">
                                            <a href="/user/product/show/{{$old->id}}" class="product-image">
                                                <img src="{{asset('storage/app/public')}}/{{$old->cover_img}}" alt="product">
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <h2 class="product-title">
                                                <a href="/user/product/show/{{$old->id}}">{{$old->name}}</a>
                                            </h2>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:{{100/5*$old->rating}}%"></span><!-- End .ratings -->
                                                </div><!-- End .product-ratings -->
                                            </div><!-- End .product-container -->
                                            <div class="price-box">
                                                <span class="product-price">৳ {{$old->sale_price}}</span>
                                            </div><!-- End .price-box -->
                                        </div><!-- End .product-details -->
                                    </div>
                                </div>
                                @empty
                                @endforelse
                            </div><!-- End .widget-featured-slider -->
                        </div><!-- End .widget-body -->
                    </div><!-- End .widget -->
                </div>
            </aside><!-- End .col-md-3 -->
        </div><!-- End .row -->
    </div><!-- End .container -->

    <div class="featured-section">
        <div class="container">
            <h2 class="carousel-title">Related Products</h2>

            <div class="featured-products owl-carousel owl-theme owl-dots-top">
            	@forelse($relatedProducts as $product)
                <div class="product">
                    <figure class="product-image-container">
                        <a href="/user/product/show/{{$product->id}}" class="product-image">
                            <img src="{{asset('storage/app/public')}}/{{$product->cover_img}}" alt="product">
                        </a>
                        <a href="/user/product/quick/show/{{$product->id}}" class="btn-quickview">Quick View</a>
                    </figure>
                    <div class="product-details">
                        <div class="ratings-container">
                            <div class="product-ratings">
                                <span class="ratings" style="width:{{100/5*$product->rating}}%"></span><!-- End .ratings -->
                            </div><!-- End .product-ratings -->
                        </div><!-- End .product-container -->
                        <h2 class="product-title">
                            <a href="/user/product/show/{{$product->id}}">{{$product->name}}</a>
                        </h2>
                        <div class="price-box">
                            <span class="product-price">৳ {{$product->sale_price}}</span>
                        </div><!-- End .price-box -->

                        <div class="product-action">
                            <a href="#" class="paction add-wishlist" title="Add to Wishlist">
                                <span>Add to Wishlist</span>
                            </a>

                            <a href="/user/cart/add/{{$product->id}}" class="paction add-cart" title="Add to Cart">
                                <span>Add to Cart</span>
                            </a>

                            <a href="#" class="paction add-compare" title="Add to Compare">
                                <span>Add to Compare</span>
                            </a>
                        </div><!-- End .product-action -->
                    </div><!-- End .product-details -->
                </div>
                @empty
                @endforelse
                
            </div><!-- End .featured-proucts -->
        </div><!-- End .container -->
    </div><!-- End .featured-section -->
</main>
    <!-- <script src="../../../../s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5b927288a03dbde6"></script> -->

@endsection

