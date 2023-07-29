<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/login',function(){
    return redirect->to('/');
})->name('login');
Route::get('/register',function(){
    return redirect->to('/');
})->name('register');
Route::get('/',[App\Http\Controllers\Front\IndexController::class, 'index']);
Route::get('/product-details/{slug}',[App\Http\Controllers\Front\IndexController::class, 'productDetails'])->name('product.details');

Auth::routes();
Route::get('/product-quick-view/{id}',[App\Http\Controllers\Front\IndexController::class, 'ProductQuickView']);
Route::post('/addtocart',[App\Http\Controllers\Front\CartController::class,'AddToCartQV'])->name('add.to.cart.quickview');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/customer/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('customer.logout');
Route::post('/store/review', [App\Http\Controllers\Front\ReviewController::class, 'store'])->name('store.review');
Route::get ('/add/wishlist/{id}',[App\Http\Controllers\Front\ReviewController::class, 'AddWishList'])->name('add.wishlist');
Route::get('/all-cart',[App\Http\Controllers\Front\CartController::class, 'AllCart'])->name('all.cart'); //ajax request for subtotal
Route::get('/my-cart',[App\Http\Controllers\Front\CartController::class, 'MyCart'])->name('cart'); //ajax request for subtotal
Route::get('/cartproduct/remove/{rowId}',[App\Http\Controllers\Front\CartController::class, 'RemoveProduct']); //ajax request for subtotal
Route::get('/cartproduct/updateqty/{rowId}/{qty}',[App\Http\Controllers\Front\CartController::class,'UpdateQty']);
Route::get('/cartproduct/updatecolor/{rowId}/{color}',[App\Http\Controllers\Front\CartController::class,'UpdateColor']);
Route::get('/cartproduct/updatesize/{rowId}/{size}',[App\Http\Controllers\Front\CartController::class,'UpdateSize']);
Route::get('/cart/empty',[App\Http\Controllers\Front\CartController::class,'EmptyCart'])->name('cart.empty');

Route::get('/wishlist',[App\Http\Controllers\Front\CartController::class,'wishlist'])->name('wishlist');
Route::get('/clear/wishlist',[App\Http\Controllers\Front\CartController::class,'Clearwishlist'])->name('clear.wishlist');
Route::get('/add/wishlist/{id}',[App\Http\Controllers\Front\CartController::class,'AddWishlist'])->name('add.wishlist');
Route::get('/wishlist/product/delete/{id}',[App\Http\Controllers\Front\CartController::class,'WishlistProductdelete'])->name('wishlistproduct.delete');
Route::get('/childcategory/product/{id}',[App\Http\Controllers\Front\IndexController::class,])->name('childcategorywise.product');
Route::get('/category/product/{id}',[App\Http\Controllers\Front\IndexController::class,'categoryWiseProduct'])->name('categorywise.product');
Route::get('/subcategory/product/{id}',[App\Http\Controllers\Front\IndexController::class,'SubcategoryWiseProduct'])->name('subcategorywise.product');
Route::get('/brandwise/product/{id}',[App\Http\Controllers\Front\IndexController::class,'BrandWiseProduct'])->name('brandwise.product');
Route::post('/store/review',[App\Http\Controllers\Front\ReviewController::class,'store'])->name('store.review');
//this review for website not product
Route::get('/write/review',[App\Http\Controllers\Front\ReviewController::class,'write'])->name('write.review');
Route::post('/store/website/review',[App\Http\Controllers\Front\ReviewController::class,'StoreWebsiteReview'])->name('store.website.review');
Route::get('/home/setting',[App\Http\Controllers\Front\ProfileController::class,'setting'])->name('customer.setting'); 
Route::get('/my/order',[App\Http\Controllers\Front\ProfileController::class,'MyOrder'])->name('my.order'); 
Route::post('/home/password/update',[App\Http\Controllers\Front\ProfileController::class,'PasswordChange'])->name('customer.password.change');
Route::get('/page/{page_slug}',[App\Http\Controllers\Front\IndexController::class,'ViewPage'])->name('view.page');
Route::post('/store/newsletter',[App\Http\Controllers\Front\IndexController::class,'storeNewsletter'])->name('store.newsletter');
Route::get('/checkout',[App\Http\Controllers\Front\CheckoutController::class,'Checkout'])->name('checkout');
Route::post('/apply/coupon',[App\Http\Controllers\Front\CheckoutController::class,'ApplyCoupon'])->name('apply.coupon');
Route::get('/remove/coupon',[App\Http\Controllers\Front\CheckoutController::class,'RemoveCoupon'])->name('coupon.remove');
Route::post('/order/place',[App\Http\Controllers\Front\CheckoutController::class,'OrderPlace'])->name('order.place');

Route::get('/open/ticket',[App\Http\Controllers\Front\ProfileController::class,'ticket'])->name('open.ticket');
Route::get('/new/ticket',[App\Http\Controllers\Front\ProfileController::class, 'NewTicket'])->name('new.ticket');
Route::post('/store/ticket',[App\Http\Controllers\Front\ProfileController::class,'StoreTicket'])->name('store.ticket');
Route::get('/show/ticket/{id}',[App\Http\Controllers\Front\ProfileController::class,'ticketShow'])->name('show.ticket');
Route::post('/reply/ticket',[App\Http\Controllers\Front\ProfileController::class,'ReplyTicket'])->name('reply.ticket');

Route::get('/order/tracking',[App\Http\Controllers\Front\IndexController::class,])->name('order.tracking');
Route::post('/check/order',[App\Http\Controllers\Front\IndexController::class,'CheckOrder'])->name('check.order');

Route::post('/success',[App\Http\Controllers\Front\CheckoutController::class,'success'])->name('success');
Route::post('/fail',[App\Http\Controllers\Front\CheckoutController::class,'fail'])->name('fail');
Route::get('/success',function(){
    return redirect()->to('/');
})->name('cancel');

Route::get('oauth/{driver}', [App\Http\Controllers\Auth\LoginController::class, 'redirectToProvider'])->name('social.oauth');
Route::get('oauth/{driver}/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleProviderCallback'])->name('social.callback');

Route::get('/contact-us',[App\Http\Controllers\Front\IndexController::class,'Contact'])->name('contact');
Route::post('/contact_store',[App\Http\Controllers\Front\IndexController::class,'Show_contact'])->name('contact.store');
Route::get('/our-blog',[App\Http\Controllers\Front\IndexController::class,'Blog'])->name('blog');

Route::get('/campain/products/{id}',[App\Http\Controllers\Front\IndexController::class,'CampaignProduct'])->name('frontend.campaign.product');   
Route::get('/camapign-product-details/{slug}',[App\Http\Controllers\Front\IndexController::class,'CampaignProductDetails'])->name('campaign.product.details');