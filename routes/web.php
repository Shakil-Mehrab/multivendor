<?php

use Illuminate\Support\Facades\Route;
// admin
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BannersController;
use App\Http\Controllers\Admin\CouponsController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\ShopController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\DeliveryBranchController;
use App\Http\Controllers\Admin\AdminCartController;
use App\Http\Controllers\Admin\AdminUserController;


// User
use App\Http\Controllers\Layouts\ProductsController;


// public
use App\Http\Controllers\Layout\AboutController;
use App\Http\Controllers\Layout\Cart\CartController;
use App\Http\Controllers\Layout\PublicController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('home');
})->name('dashboard');


Route::get('/search',[ShopController::class,'addCategory'])->name('search');


// paypal
Route::get('paypal/checkout/{order}', 'Layout\Cart\PayPalController@getExpressCheckout')->name('paypal.checkout')->middleware('auth');
Route::get('paypal/checkout-success/{order}', 'Layout\Cart\PayPalController@getExpressCheckoutSuccess')->name('paypal.success')->middleware('auth');
Route::get('paypal/checkout-cancel', 'Layout\Cart\PayPalController@cancelPage')->name('paypal.cancel')->middleware('auth');
// Route::get('/products/search', 'Layouts\ProductController@search')->name('products.search');
// Route::get('/paypal/checkout/{order}', 'Layout\Cart\PayPalController@index')->name('paypal.checkout');
Route::get('/paypal/button', 'Layout\Cart\PayPalController@button');
Route::get('/execute-payment', 'Layout\Cart\PayPalController@execute');
Route::post('/create-payment', 'Layout\Cart\PayPalController@create')->name('create-payment');
Route::get('/creat-payment', 'Layout\Cart\PayPalController@create')->name('creat-payment');
Route::post('/cancel', 'Layout\Cart\PayPalController@calcel');
//pop,renent,cat,abt,contact
Route::get('/about/us',[AboutController::class,'about']);
Route::get('/contact/us',[AboutController::class,'contact']);
Route::get('/terms/condition',[AboutController::class,'condition']);
Route::get('/moneyback',[AboutController::class,'moneyback']);
Route::get('/how/to/order',[AboutController::class,'howToOrder']);
// cart
Route::get('/user/show/cart',[CartController::class,'index']);
Route::middleware('ajax.check')->group(function(){
Route::get('/user/cart/basket',[CartController::class,'basket']);
Route::get('/user/cart/remove/{id}',[CartController::class,'destroy']);
Route::get('/user/cart/table',[CartController::class,'cartTable']);
Route::post('/user/cart/update/{id}',[CartController::class,'update'])->name('user.cart.update');
Route::post('/user/cart/add/{id}',[CartController::class,'addItem'])->name('cart.add');
});
//single product
Route::get('/user/product/show/{id}',[PublicController::class,'show']);
Route::get('/user/product/quick/show/{id}',[PublicController::class,'quickShow']);
Route::get('/user/same/products/show/{id}',[PublicController::class,'sameProduct']);
Route::get('/user/related/product/{id}',[PublicController::class,'relatedProduct']);
// country cascade
Route::get('/cities',[CartController::class,'show']);
Route::get('/codes',[CartController::class,'codeShow']);
Route::get('/delivery/branch',[CartController::class,'deliveryBranch']);
Route::get('/districts',[CartController::class,'districtShow']);
Route::get('/areas',[CartController::class,'areasShow']);








Route::group(['middleware' =>['auth']],function(){
    Route::match(['get','post'],'/admin/dashboard','AdminController@dashboard');
    //Shop Route
    Route::match(['get','post'],'/admin/view-user',[AdminUserController::class,'viewCategories']);
    Route::match(['get','post'],'/admin/edit-user/{id}',[AdminUserController::class,'editCategory']);
    Route::match(['get','post'],'/admin/delete-user/{id}',[AdminUserController::class,'deleteCategory']);
    //Discount Route
    //Cart Route
    Route::match(['get','post'],'/admin/add-order',[AdminCartController::class,'addCategory']);
    Route::match(['get','post'],'/admin/view-order',[AdminCartController::class,'viewCategories']);
    Route::match(['get','post'],'/admin/view-order/item/{id}',[AdminCartController::class,'viewCategoriesItem']);
    Route::match(['get','post'],'/admin/delete-order/item/{id}',[AdminCartController::class,'viewCategoriesItemDelete']);
    Route::match(['get','post'],'/admin/edit-order/{id}',[AdminCartController::class,'editCategory']);
    Route::match(['get','post'],'/admin/delete-order/{id}',[AdminCartController::class,'deleteCategory']);
    Route::post('/admin/update-paid-status',[AdminCartController::class,'updateStatus']);

     //Delivery Route
     Route::match(['get','post'],'/admin/add-delivery/branch',[DeliveryBranchController::class,'addCategory']);
     Route::match(['get','post'],'/admin/view-delivery/branch',[DeliveryBranchController::class,'viewCategories']);
     Route::match(['get','post'],'/admin/edit-delivery/branch/{id}',[DeliveryBranchController::class,'editCategory']);
     Route::match(['get','post'],'/admin/delete-delivery/branch/{id}',[DeliveryBranchController::class,'deleteCategory']);
    //City Route
    Route::match(['get','post'],'/admin/add-city',[CityController::class,'addCategory']);
    Route::match(['get','post'],'/admin/view-city',[CityController::class,'viewCategories']);
    Route::match(['get','post'],'/admin/edit-city/{id}',[CityController::class,'editCategory']);
    Route::match(['get','post'],'/admin/delete-city/{id}',[CityController::class,'deleteCategory']);
    //Country Route
    Route::match(['get','post'],'/admin/add-country',[CountryController::class,'addCategory']);
    Route::match(['get','post'],'/admin/view-country',[CountryController::class,'viewCategories']);
    Route::match(['get','post'],'/admin/edit-country/{id}',[CountryController::class,'editCategory']);
    Route::match(['get','post'],'/admin/delete-country/{id}',[CountryController::class,'deleteCategory']);
    //Shop Route
    Route::match(['get','post'],'/admin/add-shop',[ShopController::class,'addCategory']);
    Route::match(['get','post'],'/admin/view-shop',[ShopController::class,'viewCategories']);
    Route::match(['get','post'],'/admin/edit-shop/{id}',[ShopController::class,'editCategory']);
    Route::match(['get','post'],'/admin/delete-shop/{id}',[ShopController::class,'deleteCategory']);
    Route::post('/admin/update-shop-status',[ShopController::class,'updateStatus']);
    //Discount Route
    Route::match(['get','post'],'/admin/add-discount',[DiscountController::class,'addCategory']);
    Route::match(['get','post'],'/admin/view-discount',[DiscountController::class,'viewCategories']);
    Route::match(['get','post'],'/admin/edit-discount/{id}',[DiscountController::class,'editCategory']);
    Route::match(['get','post'],'/admin/delete-discount/{id}',[DiscountController::class,'deleteCategory']);
    Route::post('/admin/update-discount-status',[DiscountController::class,'updateStatus']);
    //Category Route
    Route::match(['get','post'],'/admin/add-category',[CategoryController::class,'addCategory']);
    Route::match(['get','post'],'/admin/view-categories',[CategoryController::class,'viewCategories']);
    Route::match(['get','post'],'/admin/edit-category/{id}',[CategoryController::class,'editCategory']);
    Route::match(['get','post'],'/admin/delete-category/{id}',[CategoryController::class,'deleteCategory']);
    Route::post('/admin/update-category-status',[CategoryController::class,'updateStatus']);
    //Product Route
    Route::match(['get','post'],'/admin/add-product',[ProductsController::class,'addProduct']);
    Route::match(['get','post'],'/admin/view-products',[ProductsController::class,'viewProducts']);
    Route::match(['get','post'],'/admin/edit-product/{id}',[ProductsController::class,'editProduct']);
    Route::match(['get','post'],'/admin/delete-product/{id}',[ProductsController::class,'DeleteProduct']);
    Route::post('/admin/update-product-status',[ProductsController::class,'updateStatus']);
    Route::post('/admin/update-featured-product-status',[ProductsController::class,'updateFeatured']);

    //Products Attributes
    Route::match(['get','post'],'/admin/add-attributes/{id}',[ProductsController::class,'addAttributes']);
    Route::get('/admin/delete-attribute/{id}', [ProductsController::class,'deleteAttribute']);
    Route::match(['get','post'],'/admin/edit-attributes/{id}',[ProductsController::class,'editAttributes']);
    Route::match(['get','post'],'/admin/add-images/{id}',[ProductsController::class,'addImages']);
    Route::get('/admin/delete-alt-image/{id}',[ProductsController::class,'deleteAltImage']);

    //Banners Route
    Route::match(['get','post'],'/admin/banners',[BannersController::class,'banners']);
    Route::match(['get','post'],'/admin/add-banner',[BannersController::class,'addBanner']);
    Route::match(['get','post'],'/admin/edit-banner/{id}',[BannersController::class,'editBanner']);
    Route::match(['get','post'],'/admin/delete-banner/{id}',[BannersController::class,'deleteBanner']);
    Route::post('/admin/update-banner-status',[BannersController::class,'updateStatus']);

    //Coupons Route
    Route::match(['get','post'],'/admin/add-coupon',[CouponsController::class,'addCoupon']);
    Route::match(['get','post'],'/admin/view-coupons',[CouponsController::class,'viewCoupons']);
    Route::match(['get','post'],'/admin/edit-coupon/{id}',[CouponsController::class,'editCoupon']);
    Route::get('/admin/delete-coupon/{id}',[CouponsController::class,'deleteCoupon']);
    Route::post('/admin/update-coupon-status',[CouponsController::class,'updateStatus']);
    //product review
    Route::post('/user/review/products/{id}',[PublicController::class,'review'])->name('review.product');
    // checkout
    Route::get('/user/checkout', [CartController::class,'checkout']);
    Route::post('/orders/store',[CartController::class,'store'])->name('orders.store');
    //////shop page

    });
