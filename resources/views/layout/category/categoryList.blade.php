<nav class="toolbox">
    <div class="toolbox-left">
        <div class="toolbox-item toolbox-sort">
            <div class="select-custom">
                <select name="orderby" class="form-control">
                    <option value="menu_order" selected="selected">Default sorting</option>
                    <option value="popularity">Sort by popularity</option>
                    <option value="rating">Sort by average rating</option>
                    <option value="date">Sort by newness</option>
                    <option value="price">Sort by price: low to high</option>
                    <option value="price-desc">Sort by price: high to low</option>
                </select>
            </div><!-- End .select-custom -->

            <a href="#" class="sorter-btn" title="Set Ascending Direction"><span class="sr-only">Set Ascending Direction</span></a>
        </div><!-- End .toolbox-item -->
    </div><!-- End .toolbox-left -->

    <div class="toolbox-item toolbox-show">
        <label>Showing 1–9 of 60 results</label>
    </div><!-- End .toolbox-item -->

    <div class="layout-modes">
        <a href="#" id="gridList" class="layout-btn btn-grid" title="Grid">
            <i class="icon-mode-grid"></i>
        </a>
        <a href="#" class="layout-btn btn-list active" title="List">
            <i class="icon-mode-list"></i>
        </a>
    </div><!-- End .layout-modes -->
</nav>
@forelse($products as $product)
<div class="product product-list-wrapper">
    <figure class="product-image-container">
        <a href="/user/product/show/{{$product->id}}" class="product-image">
            <img src="{{asset('/uploads/products/'.$product->image)}}" alt="product">
        </a>
        <a href="/user/product/quick/show/{{$product->id}}" class="btn-quickview">Quickview</a>
    </figure>
    <div class="product-details">
        <h2 class="product-title">
            <a href="/user/product/show/{{$product->id}}">Felt Hat</a>
        </h2>
        <div class="ratings-container">
            <div class="product-ratings">
                <span class="ratings" style="width:{{100/5*$product->rating}}%"></span><!-- End .ratings -->
            </div><!-- End .product-ratings -->
        </div><!-- End .product-container -->
        <div class="product-desc">
            <p>@php echo substr($product->description,0,250) @endphp<!-- <a href="https://www.portotheme.com/html/porto/demo-5/prorduct.html">Learn More --></a></p>
        </div><!-- End .product-desc -->
        <div class="price-box">
            <span class="product-price">৳ {{$product->sale_price}}</span>
        </div><!-- End .price-box -->

        {{-- <div class="product-action">
            <a href="#" class="paction add-wishlist" title="Add to Wishlist">
                <span>Add to Wishlist</span>
            </a>

            <a href="/user/cart/add/{{$product->id}}" class="paction add-cart" title="Add to Cart">
                <span>Add to Cart</span>
            </a>

            <a href="#" class="paction add-compare" title="Add to Compare">
                <span>Add to Compare</span>
            </a>
        </div> --}}
    </div><!-- End .product-details -->
</div>
@empty
@endforelse
<nav class="toolbox toolbox-pagination">
    <div class="toolbox-item toolbox-show">
        <label>Showing 1–9 of 60 results</label>
    </div><!-- End .toolbox-item -->

    <ul class="pagination">
        <li class="page-item disabled">
            <a class="page-link page-link-btn" href="#"><i class="icon-angle-left"></i></a>
        </li>
        <li class="page-item active">
            <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
        </li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">4</a></li>
        <li class="page-item"><span>...</span></li>
        <li class="page-item"><a class="page-link" href="#">15</a></li>
        <li class="page-item">
            <a class="page-link page-link-btn" href="#"><i class="icon-angle-right"></i></a>
        </li>
    </ul>
</nav>
