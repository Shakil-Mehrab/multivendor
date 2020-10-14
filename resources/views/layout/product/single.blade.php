@extends('layout.app')
@section('title','Product Details - ')
@section('css')
    <link href="{{asset('porto/normalrating/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('porto/normalrating/css/rating.css')}}" rel="stylesheet">
@endsection
@section('content')
@php
use App\Models\Product;
$sameProducts=Product::orderBy('id','desc')->get();
$relatedProducts=Product::orderBy('id','desc')->where('category_id',$product->category_id)->get();
$oldProducts=Product::orderBy('id','asc')->where('shop_id',$product->shop_id)->get();
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
                                    @forelse($product->productImages as $same)
                                    <div class="product-item">
                                        <img class="product-single-image" src="{{asset('/uploads/products/'.$same->image)}}"/>
                                        <span style="font-size:16px;color:white;border-radius:6px;background:#a96262;padding:2px 6px;position: absolute;
                                        bottom: 0px;left:50%">{{$i=$i+1}}/{{$product->productImages->count()}}</span>

                                        <input type="hidden" id="imgId" value="{{$same->id}}">
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

                                <div class="price-box">
                                    @if($product->discount==null)
                                         <span class="product-price">৳ {{$product->sale_price}}</span>
                                    @else
                                        <span class="old-price">৳ {{$product->sale_price}}</span>
                                        @if($product_discount->type=='percentage')
                                        <span class="product-price">৳ {{$product->sale_price-$product->sale_price*$product->discount->discount}}</span>
                                        @else
                                        <span class="product-price">৳ {{$price=$product->sale_price-$product->discount->discount}}</span>
                                        @endif
                                    @endif
                                </div>

                                <div class="product-desc" style="text-align:justify;">
                                    <p>@php echo substr($product->description,0,700) @endphp</p>
                                </div>

                                <div class="product-filters-container">
                                     <div>
                                        <p>Views : {{$product->view}}</p>
                                        <p>Sale Count : {{$product->sale_count==0?'1':$product->sale_count}}</p>
                                        <p>Minimum Order : {{$product->min_order}} pieces</p>
                                        <p>Product Code : {{$product->code}}</p>
                                    </div>
                                    <div class="product-single-filter">
                                        <label>Size</label>
                                        <select class="form-control" name="size" id='size' required>
                                            <option value="">Select One</option>
                                            @forelse($product->attributes as $ct)
                                            <option value="{{$ct->id}}">{{$ct->size}}</option>
                                            @empty
                                            <option value="">No Size</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="product-action product-all-icons">
                                    <div class="product-single-qty">
                                        <input class="form-control" value="{{$product->min_order}}" min='12' type="number">
                                    </div>

                                    <a href="#" class="paction add-cart" title="Add to Cart">
                                            <span>Add to Cart</span>
                                    </a>
                                    <a href="#" class="paction add-wishlist" title="Add to Wishlist">
                                        <span>Add to Wishlist</span>
                                    </a>
                                    <a href="#" class="paction add-compare" title="Add to Compare">
                                        <span>Add to Compare</span>
                                    </a>
                                </div>
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
                            <a class="nav-link active" id="product-tab-tags" data-toggle="tab" href="#product-tags-content" role="tab" aria-controls="product-tags-content" aria-selected="false">Tags</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="product-tab-reviews" data-toggle="tab" href="#product-reviews-content" role="tab" aria-controls="product-reviews-content" aria-selected="false">Reviews</a>
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
                                <div class="add-product-review">
                                    <h3 class="text-uppercase heading-text-color font-weight-semibold">WRITE YOUR OWN REVIEW</h3>
                                    <form action="{{route('review.product',$product->id)}}" method="post">
                                    	@csrf
                                        <div class="container" style="marigin-top:35px">
                                            <div class="ratings">
                                              <input type="radio" name="rating" id="rating" value="1" required/>
                                              <input type="radio" name="rating" id="rating" value="2"/>
                                              <input type="radio" name="rating" id="rating" value="3"/>
                                              <input type="radio" name="rating" id="rating" value="4"/>
                                              <input type="radio" name="rating" id="rating" value="5"/>
                                            </div>
                                            <span class="info"></span>
                                         </div>
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
                                <img src="{{asset('porto/images/banners/banner-sidebar.jpg')}}" alt="Banner Desc">
                            </a>
                        </div><!-- End .banner -->
                    </div><!-- End .widget -->

                    <div class="widget widget-featured">
                        <h3 class="widget-title">Recent Products</h3>

                        <div class="widget-body">
                            <div class="owl-carousel widget-featured-products">
                            	@forelse($oldProducts as $old)
                                <div class="featured-col">
                                    <div class="product product-sm">
                                        <figure class="product-image-container">
                                            <a href="/user/product/show/{{$old->id}}" class="product-image">
                                                <img src="{{asset('/uploads/products/'.$old->image)}}" alt="product">
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <h2 class="product-title">
                                                <a href="/user/product/show/{{$old->id}}">{{$old->name}}</a>
                                            </h2>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:{{100/5*$old->rating}}%"></span>
                                                </div>
                                            </div>
                                            <div class="price-box">
                                                <span class="product-price">৳ {{$old->sale_price}}</span>
                                            </div>
                                        </div>
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
            	@forelse($relatedProducts as $rlt)
                    @if($rlt->id==$product->id)
                    @else
                    <div class="product">
                    <figure class="product-image-container">
                        <a href="/user/product/show/{{$rlt->id}}" class="product-image">
                            <img src="{{asset('/uploads/products/'.$rlt->image)}}" alt="product">
                        </a>
                        <a href="/user/product/quick/show/{{$rlt->id}}" class="btn-quickview">Quick View</a>
                    </figure>
                    <div class="product-details">
                        <div class="ratings-container">
                            <div class="product-ratings">
                                <span class="ratings" style="width:{{100/5*$rlt->rating}}%"></span><!-- End .ratings -->
                            </div><!-- End .product-ratings -->
                        </div><!-- End .product-container -->
                        <h2 class="product-title">
                            <a href="/user/product/show/{{$rlt->id}}">{{$rlt->name}}</a>
                        </h2>
                        <div class="price-box">
                            <span class="product-price">৳ {{$rlt->sale_price}}</span>
                        </div><!-- End .price-box -->

                        <!--<div class="product-action">-->
                        <!--    <a href="#" class="paction add-wishlist" title="Add to Wishlist">-->
                        <!--        <span>Add to Wishlist</span>-->
                        <!--    </a>-->

                        <!--    <a href="/user/cart/add/{{$rlt->id}}" class="paction add-cart" title="Add to Cart">-->
                        <!--        <span>Add to Cart</span>-->
                        <!--    </a>-->

                        <!--    <a href="#" class="paction add-compare" title="Add to Compare">-->
                        <!--        <span>Add to Compare</span>-->
                        <!--    </a>-->
                        <!--</div>-->
                    </div><!-- End .product-details -->
                </div>
                @endif
                @empty
                @endforelse

            </div><!-- End .featured-proucts -->
        </div><!-- End .container -->
    </div><!-- End .featured-section -->
</main>
    <!-- <script src="../../../../s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5b927288a03dbde6"></script> -->

@endsection
@section('js')
    <script src="{{asset('porto/normalrating/js/bootstrap.js')}}"></script>
    <script src="{{asset('porto/normalrating/js/jquery.min.js')}}"></script>
    <script src="{{asset('porto/normalrating/js/rating.js')}}"></script>
    <script>
    $('.ratings').rating(function(vote,event){
      $.ajax({
        method:"POST",
        url:'/rating/show',
        data:{vote:vote}
      }).done(function(info){
        $('.info').html("your rating: <b>"+info+"<b>")
      })
    })
  </script>
@endsection

