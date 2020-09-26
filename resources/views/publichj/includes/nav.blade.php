<header class="header">
    <div class="header-top">
        <div class="container">
            <div class="header-left header-dropdowns">
                <div class="header-dropdown">
                    <a href="#">USD</a>
                    <div class="header-menu">
                        <ul>
                            <li><a href="#">EUR</a></li>
                            <li><a href="#">USD</a></li>
                        </ul>
                    </div><!-- End .header-menu -->
                </div><!-- End .header-dropown -->

                <div class="header-dropdown">
                    <a href="#"><img src="{{asset('porto/images/flags/en.png')}}" alt="England flag">ENGLISH</a>
                    <div class="header-menu">
                        <ul>
                            <li><a href="#"><img src="{{asset('porto/images/flags/en.png')}}" alt="England flag">ENGLISH</a></li>
                            <li><a href="#"><img src="{{asset('porto/images/flags/fr.png')}}" alt="France flag">FRENCH</a></li>
                        </ul>
                    </div><!-- End .header-menu -->
                </div><!-- End .header-dropown -->

                <div class="dropdown compare-dropdown">
                    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                        <i class="icon-retweet"></i> Compare (2)
                    </a>

                    <div class="dropdown-menu" >
                        <div class="dropdownmenu-wrapper">
                            <ul class="compare-products">
                                <li class="product">
                                    <a href="#" class="btn-remove" title="Remove Product"><i class="icon-cancel"></i></a>
                                    <h4 class="product-title"><a href="#">Lady White Top</a></h4>
                                </li>
                                <li class="product">
                                    <a href="#" class="btn-remove" title="Remove Product"><i class="icon-cancel"></i></a>
                                    <h4 class="product-title"><a href="#">Blue Women Shirt</a></h4>
                                </li>
                            </ul>

                            <div class="compare-actions">
                                <a href="#" class="action-link">Clear All</a>
                                <a href="#" class="btn btn-primary">Compare</a>
                            </div>
                        </div><!-- End .dropdownmenu-wrapper -->
                    </div><!-- End .dropdown-menu -->
                </div><!-- End .dropdown -->
            </div><!-- End .header-left -->

            <div class="header-right">
                <p class="welcome-msg">Welcome to Hatirpal.com</p>

                <div class="header-dropdown dropdown-expanded">
                    <a href="#">Links</a>
                    <div class="header-menu">
                        <ul>
                            <li><a href="#">MY ACCOUNT </a></li>
                            <li><a href="#">DAILY DEAL</a></li>
                            <li><a href="#">MY WISHLIST </a></li>
                            <li><a href="#">BLOG</a></li>
                            @guest
                            <li><a href="/register">Register</a></li>
                            <li><a href="/login">Log In</a></li>
                            @else
                            <li>
                            <a class="login-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            </li>
                            @endguest
                        </ul>
                    </div><!-- End .header-menu -->
                </div><!-- End .header-dropown -->
            </div><!-- End .header-right -->
        </div><!-- End .container -->
    </div><!-- End .header-top -->

    <div class="header-middle">
        <div class="container">
            <div class="header-left" style="width: 15%">
                <a href="/home" class="logo">
                    <img src="{{asset('porto/images/logo.png')}}" alt="Porto Logo">
                </a>
            </div><!-- End .header-left -->

            <div class="header-center">
                <div class="header-search">
                    <a href="#" class="search-toggle" role="button"><i class="icon-magnifier"></i></a>
                    <form action="#" method="get">
                        <div class="header-search-wrapper">
                            <input type="search" class="form-control" name="q" id="q" placeholder="Search..." required>
                            <div class="select-custom">
                                <select id="cat" name="cat">
                                    <option value="">All Categories</option>
                                    @php
                                        use App\Model\Category;
                                        $categories=Category::whereNull('parent_id')->get();
                                    @endphp
                                    @forelse($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                        @if($category->children)
                                            @foreach($category->children as $child)
                                                <option value="{{$child->id}}">-{{$child->name}}</option>
                                            @endforeach
                                        @endif
                                    @empty
                                    @endforelse
                                </select>
                            </div><!-- End .select-custom -->
                            <button class="btn" type="submit"><i class="icon-magnifier"></i></button>
                        </div><!-- End .header-search-wrapper -->
                    </form>
                </div><!-- End .header-search -->
            </div><!-- End .headeer-center -->

            <div class="header-right">
                <button class="mobile-menu-toggler" type="button">
                    <i class="icon-menu"></i>
                </button>
                <div class="header-contact">
                    <span>Call us now</span>
                    <a href="tel:#"><strong>+8801400560808</strong></a>
                </div><!-- End .header-contact -->

                <div class="dropdown cart-dropdown">
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
                                            x ${{$cart->price}}
                                        </span>
                                    </div><!-- End .product-details -->

                                    <figure class="product-image-container">
                                        <a href="/user/product/show/{{$cart->id}}" class="product-image">
                                            <img src="{{asset('storage')}}/{{$cart->attributes->image}}" alt="product">
                                        </a>
                                        <a href="/user/cart/remove/{{$cart->id}}" class="btn-remove" title="Remove Product"><i class="icon-cancel"></i></a>
                                    </figure>
                                </div><!-- End .product -->
                            @empty
                            @endforelse  
                            </div><!-- End .cart-product -->

                            <div class="dropdown-cart-total">
                                <span>Total</span>

                                <span class="cart-total-price">${{Cart::getTotal()}}</span>
                            </div><!-- End .dropdown-cart-total -->

                            <div class="dropdown-cart-action">
                                <a href="/user/cart" class="btn">View Cart</a>
                                <a href="/user/cart" class="btn">Checkout</a>
                            </div><!-- End .dropdown-cart-total -->
                        </div><!-- End .dropdownmenu-wrapper -->
                    </div><!-- End .dropdown-menu -->
                </div><!-- End .dropdown -->
            </div><!-- End .header-right -->
        </div><!-- End .container -->
    </div><!-- End .header-middle -->

    <div class="header-bottom sticky-header">
        <div class="container">
            <nav class="main-nav">
                <ul class="menu sf-arrows">
                    <li class="active"><a href="/home">Home</a></li>
                    <li>
                        <a href="#" class="sf-with-ul">Categories</a>
                        <div class="megamenu megamenu-fixed-width">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="menu-title">
                                                <a href="#">All Categories</a>
                                            </div>
                                            <ul>
                                                <!-- <li><a href="category.html">Fullwidth Banner<span class="tip tip-hot">Hot!</span></a></li> -->
                                            @php
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
                                        </div><!-- End .col-lg-6 -->
                                        
                                    </div><!-- End .row -->
                                </div><!-- End .col-lg-8 -->
                                <!-- <div class="col-lg-4">
                                    <div class="banner">
                                        <a href="#">
                                            <img src="assets/images/menu-banner-2.jpg" alt="Menu banner">
                                        </a>
                                    </div>
                                </div> -->
                            </div>
                        </div><!-- End .megamenu -->
                    </li>
                    <li class="megamenu-container">
                        <a href="#" class="sf-with-ul">Products</a>
                        <div class="megamenu">
                            <!-- <div class="row">
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="menu-title">
                                                <a href="#">Variations</a>
                                            </div>
                                            <ul>
                                                <li><a href="product.html">Horizontal Thumbnails</a></li>
                                                <li><a href="product-full-width.html">Vertical Thumbnails<span class="tip tip-hot">Hot!</span></a></li>
                                                <li><a href="product.html">Inner Zoom</a></li>
                                                <li><a href="product-addcart-sticky.html">Addtocart Sticky</a></li>
                                                <li><a href="product-sidebar-left.html">Accordion Tabs</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="menu-title">
                                                <a href="#">Product Layout Types</a>
                                            </div>
                                            <ul>
                                                <li><a href="product.html">Default Layout</a></li>
                                                <li><a href="product-extended-layout.html">Extended Layout</a></li>
                                                <li><a href="product-full-width.html">Full Width Layout</a></li>
                                                <li><a href="product-grid-layout.html">Grid Images Layout</a></li>
                                                <li><a href="product-sticky-both.html">Sticky Both Side Info<span class="tip tip-hot">Hot!</span></a></li>
                                                <li><a href="product-sticky-info.html">Sticky Right Side Info</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="banner">
                                        <a href="#">
                                            <img class="product-promo" src="assets/images/menu-banner.jpg" alt="Menu banner">
                                        </a>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </li>
                    <li>
                        <a href="#" class="sf-with-ul">Pages</a>

                        <!-- <ul>
                            <li><a href="cart.html">Shopping Cart</a></li>
                            <li><a href="#">Checkout</a>
                                <ul>
                                    <li><a href="checkout-shipping.html">Checkout Shipping</a></li>
                                    <li><a href="checkout-shipping-2.html">Checkout Shipping 2</a></li>
                                    <li><a href="checkout-review.html">Checkout Review</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Dashboard</a>
                                <ul>
                                    <li><a href="dashboard.html">Dashboard</a></li>
                                    <li><a href="my-account.html">My Account</a></li>
                                </ul>
                            </li>
                            <li><a href="about.html">About Us</a></li>
                            <li><a href="#">Blog</a>
                                <ul>
                                    <li><a href="blog.html">Blog</a></li>
                                    <li><a href="single.html">Blog Post</a></li>
                                </ul>
                            </li>
                            <li><a href="contact.html">Contact Us</a></li>
                            <li><a href="#" class="login-link">Login</a></li>
                            <li><a href="forgot-password.html">Forgot Password</a></li>
                        </ul> -->
                    </li>
                    <li><a href="#" class="sf-with-ul">Features</a>
                        <!-- <ul>
                            <li><a href="#">Header Types</a></li>
                            <li><a href="#">Footer Types</a></li>
                        </ul> -->
                    </li>
                    <!-- <li class="float-right"><a href="#">Buy Porto!</a></li> -->
                </ul>
            </nav>
        </div><!-- End .header-bottom -->
    </div><!-- End .header-bottom -->
</header><!-- End .header -->
        