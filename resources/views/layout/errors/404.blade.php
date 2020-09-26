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
    <script src="https://kit.fontawesome.com/bb2f33706c.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="page-wrapper">
        @include('layout.includes.nav')
        <main class="main">
            <div class="home-slider-container">
                <div class="row">
                	<div class="col-md-8 col-md-offset-2" style="margin-left: 30%"> <h1>404 Not Found</h1></div>
               	</div>
                @include('layout.includes.footer')
            </div>
        </main>
    </div>

    <div class="mobile-menu-overlay"></div>

    <div class="mobile-menu-container">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="icon-cancel"></i></span>
            <nav class="mobile-nav">
                <ul class="mobile-menu">
                    <li class="active"><a href="/home">Home</a></li>
                    <li>
                        <a href="#">Categories</a>
                        <ul>
                        @php
                            use App\Models\Category;
                            $categories=Category::whereNull('parent_id')->get();
                        @endphp
                        @forelse($categories as $category)    
                            <li>
                                <a href="/user/category/{{$category->id}}">{{ $category->name}}</a>
                                <ul>
                                @if($category->children)
                                    @foreach($category->children as $child)
                                        <li><a href="/user/category/{{$child->id}}">-{{$child->name}}</a></li>
                                    @endforeach
                                @endif
                                </ul>
                            </li>
                        @empty
                        @endforelse
                        </ul>
                    </li>
                    <li>
                        <a href="#">Products</a>
                        <!-- <ul>
                            <li>
                                <a href="#">Variations</a>
                                <ul>
                                    <li><a href="product.html">Horizontal Thumbnails</a></li>
                                    <li><a href="product-full-width.html">Vertical Thumbnails<span class="tip tip-hot">Hot!</span></a></li>
                                    <li><a href="product.html">Inner Zoom</a></li>
                                    <li><a href="product-addcart-sticky.html">Addtocart Sticky</a></li>
                                    <li><a href="product-sidebar-left.html">Accordion Tabs</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Variations</a>
                                <ul>
                                    <li><a href="product-sticky-tab.html">Sticky Tabs</a></li>
                                    <li><a href="product-simple.html">Simple Product</a></li>
                                    <li><a href="product-sidebar-left.html">With Left Sidebar</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Product Layout Types</a>
                                <ul>
                                    <li><a href="product.html">Default Layout</a></li>
                                    <li><a href="product-extended-layout.html">Extended Layout</a></li>
                                    <li><a href="product-full-width.html">Full Width Layout</a></li>
                                    <li><a href="product-grid-layout.html">Grid Images Layout</a></li>
                                    <li><a href="product-sticky-both.html">Sticky Both Side Info<span class="tip tip-hot">Hot!</span></a></li>
                                    <li><a href="product-sticky-info.html">Sticky Right Side Info</a></li>
                                </ul>
                            </li>
                        </ul> -->
                    </li>
                    <li>
                        <a href="#">Pages<span class="tip tip-hot">Hot!</span></a>
                        <!-- <ul>
                            <li><a href="cart.html">Shopping Cart</a></li>
                            <li>
                                <a href="#">Checkout</a>
                                <ul>
                                    <li><a href="checkout-shipping.html">Checkout Shipping</a></li>
                                    <li><a href="checkout-shipping-2.html">Checkout Shipping 2</a></li>
                                    <li><a href="checkout-review.html">Checkout Review</a></li>
                                </ul>
                            </li>
                            <li><a href="about.html">About</a></li>
                            <li><a href="#" class="login-link">Login</a></li>
                            <li><a href="forgot-password.html">Forgot Password</a></li>
                        </ul> -->
                    </li>
                    <li><a href="#">Blog</a>
                        <ul>
                            <li><a href="#">Blog Post</a></li>
                        </ul>
                    </li>
                    <li><a href="/contact/us">Contact Us</a></li>
                    @guest
                    <li><a href="/register">Register</a></li>
                    <li><a href="/login">Login</a></li>
                    @else
                    <li><a href="/admin">My Account</a></li>
                    <li>
                        <a class="login-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li> 
                    @endguest
                    <li>
                        <div class="fb-messengermessageus" 
                          messenger_app_id="451585265723432" 
                          page_id="105488687708483"
                          color="blue"
                          size="large" >
                        </div> 
                    </li>
                    @php
                    use App\Models\Shop;
                    if(Auth::check()){
                        $shop=Shop::where('user_id',auth()->user()->id)->first();
                        if($shop){
                        if($shop->is_active==1){
                             echo '<li class="float-right"><a href="/admin"><i class="fas fa-plus-square"></i> Create Product</a></li>';
                        }else{
                        echo '<li class="float-right"><a href="#" style="color: red"><i class="fas fa-envelope-square"></i> Wait for Shop Confirmation</a></li>';
                        }
                        }else{
                        echo '<li class="float-right"><a href="/user/shops/create"><i class="fas fa-plus-square"></i> Create Shop</a></li>';
                        }
                    }
                    @endphp
                </ul>
            </nav><!-- End .mobile-nav -->

            <!-- <div class="social-icons">
                <a href="#" class="social-icon" target="_blank"><i class="icon-facebook"></i></a>
                <a href="#" class="social-icon" target="_blank"><i class="icon-twitter"></i></a>
                <a href="#" class="social-icon" target="_blank"><i class="icon-instagram"></i></a>
            </div> -->
        </div>
    </div>

    <div class="newsletter-popup mfp-hide" id="newsletter-popup-form" style="background-image: url(assets/images/newsletter_popup_bg.jpg)">
        <div class="newsletter-popup-content">
            <img src="assets/images/logo-black.png" alt="Logo" class="logo-newsletter">
            <h2>BE THE FIRST TO KNOW</h2>
            <p>Subscribe to the Porto eCommerce newsletter to receive timely updates from your favorite products.</p>
            <form action="#">
                <div class="input-group">
                    <input type="email" class="form-control" id="newsletter-email" name="newsletter-email" placeholder="Email address" required>
                    <input type="submit" class="btn" value="Go!">
                </div><!-- End .from-group -->
            </form>
            <div class="newsletter-subscribe">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="1">
                        Don't show this popup again
                    </label>
                </div>
            </div>
        </div><!-- End .newsletter-popup-content -->
    </div>

    <a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>

    <!-- Plugins JS File -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script> -->
    <script src="{{asset('porto/js/jquery.min.js')}}"></script>
    <script src="{{asset('porto/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('porto/js/plugins.min.js')}}"></script>
    @yield('js')
    <!-- Main JS File -->
    <script src="{{asset('porto/js/main.min.js')}}"></script>
    <script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '451585265723432',
      xfbml      : true,
      version    : 'v2.8'
    });
    FB.AppEvents.logPageView();
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script> 
</body>

<!-- Mirrored from portotheme.com/html/porto/demo-5/ by , Thu, 11 Apr 2019 15:15:00 GMT -->
</html>