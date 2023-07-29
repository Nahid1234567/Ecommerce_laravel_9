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



Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin.home');
Route::get('/admin-login', [App\Http\Controllers\Auth\LoginController::class, 'adminLogin'])->name('admin.login');
Route::get('/admin/logout', [App\Http\Controllers\Admin\AdminController::class, 'logout'])->name('admin.logout');
Route::get('/admin/password/change', [App\Http\Controllers\Admin\AdminController::class, 'passwordchange'])->name('admin.password.change');
Route::post('/admin/password/update', [App\Http\Controllers\Admin\AdminController::class, 'passwordupdate'])->name('admin.password.update');
 


Route::get('/category-index',[App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('category.index');
Route::post('/Category/store',[App\Http\Controllers\Admin\CategoryController::class, 'Catstore'])->name('cat.store');
Route::post('/category/update',[App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('category.update');
Route::get('/category/edit/{id}',[App\Http\Controllers\Admin\CategoryController::class, 'edit']);
Route::get('/catdelete/{id}',[App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('category.delete');


Route::get('/subcategory',[App\Http\Controllers\Admin\SubCategoryController::class, 'index'])->name('subcategory.index');
Route::post('/subcategory/store',[App\Http\Controllers\Admin\SubCategoryController::class, 'store'])->name('subcategory.store');
Route::get('/subcatdelete/{id}',[App\Http\Controllers\Admin\SubCategoryController::class, 'destroy'])->name('subcategory.delete');
Route::post('/subcatupdate',[App\Http\Controllers\Admin\SubCategoryController::class, 'update'])->name('subcategory.update');

Route::get('/subcategory/edit/{id}',[App\Http\Controllers\Admin\SubCategoryController::class, 'edit']);

Route::get('/childcategory',[App\Http\Controllers\Admin\ChildCategoryController::class, 'index'])->name('childcategory.index');
Route::post('/childcategory/store',[App\Http\Controllers\Admin\ChildCategoryController::class, 'store'])->name('childcategory.store');
Route::get('/childcatdelete/{id}',[App\Http\Controllers\Admin\ChildCategoryController::class, 'destroy'])->name('childcategory.delete');
Route::get('childcat/edit/{id}',[App\Http\Controllers\Admin\ChildCategoryController::class, 'edit']);
Route::post('/childcat/update',[App\Http\Controllers\Admin\ChildCategoryController::class, 'update'])->name('childcategory.update');

Route::get('/brand-index',[App\Http\Controllers\Admin\BrandController::class, 'index'])->name('brand.index');
Route::post('/brand_store',[App\Http\Controllers\Admin\BrandController::class, 'store'])->name('brand.store');
Route::get('/brand/edit/{id}',[App\Http\Controllers\Admin\BrandController::class, 'edit'])->name('brand.edit');;
Route::get('/brand/delete/{id}',[App\Http\Controllers\Admin\BrandController::class, 'destroy'])->name('brand.delete');
Route::post('/brand/update',[App\Http\Controllers\Admin\BrandController::class, 'update'])->name('brand.update');

Route::get('/seo',[App\Http\Controllers\Admin\SettingController::class, 'index'])->name('seo.index');
Route::post('/seo/update/{id}',[App\Http\Controllers\Admin\SettingController::class, 'seoupdate'])->name('seo.setting.update');
Route::get('/smtp',[App\Http\Controllers\Admin\SettingController::class, 'smtp'])->name('smtp.index');
Route::post('/sptp/update/{id}',[App\Http\Controllers\Admin\SettingController::class, 'smtpupdate'])->name('smtp.setting.update');


Route::get('/page',[App\Http\Controllers\Admin\PageController::class, 'index'])->name('page.index');
Route::get('/create',[App\Http\Controllers\Admin\PageController::class, 'create'])->name('create.page');
Route::post('/page/store',[App\Http\Controllers\Admin\PageController::class, 'store'])->name('page.store');
Route::get('/page/delete/{id}',[App\Http\Controllers\Admin\PageController::class, 'destroy'])->name('page.delete');
Route::get('/edit/{id}',[App\Http\Controllers\Admin\PageController::class, 'edit'])->name('page.edit');
Route::post('/page/update/{id}',[App\Http\Controllers\Admin\PageController::class, 'update'])->name('page.update');

Route::get('/website',[App\Http\Controllers\Admin\SettingController::class, 'website'])->name('website.setting');
Route::post('/website/update/{id}',[App\Http\Controllers\Admin\SettingController::class, 'webupdate'])->name('website.update');

Route::get('/warehouse',[App\Http\Controllers\Admin\WarehouseController::class, 'warehouse'])->name('warehouse.index');
Route::post('/warehouse/store',[App\Http\Controllers\Admin\WarehouseController::class, 'store'])->name('warehouse.store');
Route::get('/warehouse/delete/{id}',[App\Http\Controllers\Admin\WarehouseController::class, 'destroy'])->name('warehouse.delete');
Route::get('/warehouse/edit/{id}',[App\Http\Controllers\Admin\WarehouseController::class, 'edit']);
Route::post('/warehouse/update/',[App\Http\Controllers\Admin\WarehouseController::class, 'update'])->name('warehouse.update');

Route::get('/coupon',[App\Http\Controllers\Admin\CouponController::class, 'coupon'])->name('coupon.index');
Route::post('/coupon/store',[App\Http\Controllers\Admin\CouponController::class, 'store'])->name('coupon.store');
Route::get('/coupon/delete/{id}',[App\Http\Controllers\Admin\CouponController::class, 'destroy'])->name('coupon.delete');

Route::get('/pickuppoint',[App\Http\Controllers\Admin\PickUpPointController::class, 'pickup_point'])->name('pickup_point.index');
Route::post('/pickuppoint/store',[App\Http\Controllers\Admin\PickUpPointController::class, 'store'])->name('pickup_point.store');
Route::get('/pickuppoint/delete/{id}',[App\Http\Controllers\Admin\PickUpPointController::class, 'destroy'])->name('pickup_point.delete');
Route::get('/pickup_point/edit/{id}',[App\Http\Controllers\Admin\PickUpPointController::class, 'edit']);
Route::get('/pickup_point/edit/{id}',[App\Http\Controllers\Admin\PickUpPointController::class, 'edit']);
Route::post('/pickup_point/update',[App\Http\Controllers\Admin\PickUpPointController::class, 'update'])->name('pickup_point.update');
Route::get('/product/create',[App\Http\Controllers\Admin\ProductController::class, 'create'])->name('product.create');
Route::get('/product/delete/{id}',[App\Http\Controllers\Admin\ProductController::class, 'destroy'])->name('product.delete');

Route::get('/product/index',[App\Http\Controllers\Admin\ProductController::class, 'index'])->name('product.index');

Route::post('/product/store',[App\Http\Controllers\Admin\ProductController::class, 'store'])->name('product.store');
Route::get('/campaign-index',[App\Http\Controllers\Admin\CampaignController::class, 'index'])->name('campaign.index');
Route::post('/campaign/store',[App\Http\Controllers\Admin\CampaignController::class, 'store'])->name('campaign.store');
Route::get('/campaign/delete/{id}',[App\Http\Controllers\Admin\CampaignController::class, 'destroy'])->name('campaign.delete');
Route::get('/campaign/edit/{id}',[App\Http\Controllers\Admin\CampaignController::class, 'edit']);

Route::post('/campaign/update',[App\Http\Controllers\Admin\CampaignController::class, 'update'])->name('campaign.update');



Route::get('/product/edit/{id}',[App\Http\Controllers\Admin\ProductController::class, 'edit'])->name('product.edit');

Route::get('/product/not-featured/{id}',[App\Http\Controllers\Admin\ProductController::class, 'notfeatured']);
Route::get('/product/active-featured/{id}',[App\Http\Controllers\Admin\ProductController::class, 'featured']);

Route::get('/product/active-status/{id}',[App\Http\Controllers\Admin\ProductController::class, 'active_status']);

Route::get('/product/not-status/{id}',[App\Http\Controllers\Admin\ProductController::class, 'not_status']);

Route::get('/product/active-deal/{id}',[App\Http\Controllers\Admin\ProductController::class, 'active_deal']);

Route::get('/product/not-deal/{id}',[App\Http\Controllers\Admin\ProductController::class, 'not_deal']);


Route::get('/get-child-category/{id}',[App\Http\Controllers\Admin\CategoryController::class, 'GetChildCategory']);

Route::get('/ticket',[App\Http\Controllers\Admin\TicketController::class,'index'])->name('ticket.index');
Route::get('/ticket/show/{id}',[App\Http\Controllers\Admin\TicketController::class,'show'])->name('admin.ticket.show');
Route::post('/ticket/reply',[App\Http\Controllers\Admin\TicketController::class,'ReplyTicket'])->name('admin.store.reply');
Route::get('/ticket/close/{id}',[App\Http\Controllers\Admin\TicketController::class,'CloseTicket'])->name('admin.close.ticket');
Route::delete('/ticket/delete/{id}',[App\Http\Controllers\Admin\TicketController::class,'destroy'])->name('admin.ticket.delete');

Route::get('/payment-gateway',[App\Http\Controllers\Admin\SettingController::class,'PaymentGateway'])->name('payment.gateway');
Route::post('/update-aamarp',[App\Http\Controllers\Admin\SettingController::class,'AamarpayUpdate'])->name('update.aamarpay');
Route::post('/update-surjopay',[App\Http\Controllers\Admin\SettingController::class,'SurjopayUpdate'])->name('update.surjopay');
Route::get('/order',[App\Http\Controllers\Admin\OrderController::class,'index'])->name('admin.order.index');
Route::get('/admin/edit/{id}',[App\Http\Controllers\Admin\OrderController::class,'Editorder']);
Route::post('/update/order/status',[App\Http\Controllers\Admin\OrderController::class,'updateStatus'])->name('update.order.status');
Route::get('/view/admin/{id}',[App\Http\Controllers\Admin\OrderController::class,'ViewOrder']);
Route::get('/delete/{id}',[App\Http\Controllers\Admin\OrderController::class,'delete'])->name('order.delete');

Route::get('/blog',[App\Http\Controllers\Admin\BlogController::class,'index'])->name('admin.blog.category');
Route::post('/store',[App\Http\Controllers\Admin\BlogController::class,'store'])->name('blog.category.store');
Route::get('/delete/{id}',[App\Http\Controllers\Admin\BlogController::class,'destroy'])->name('blog.category.delete');
Route::get('/edit/{id}',[App\Http\Controllers\Admin\BlogController::class,'edit']);
Route::post('/update',[App\Http\Controllers\Admin\BlogController::class,'update'])->name('blog.category.update');
Route::get('/show_contact',[App\Http\Controllers\Admin\BlogController::class,'show_contact'])->name('admin.contact.message');
Route::get('/order',[App\Http\Controllers\Admin\OrderController::class,'Reportindex'])->name('report.order.index');

Route::get('/order/print',[App\Http\Controllers\Admin\OrderController::class,'ReportOrderPrint'])->name('report.order.print');

Route::get('/contact/reply/{id}',[App\Http\Controllers\Admin\BlogController::class,'contact_edit']);

Route::get('/contact/{id}',[App\Http\Controllers\Admin\BlogController::class, 'contact_destroy'])->name('contact.delete');

Route::post('/product/update',[App\Http\Controllers\Admin\ProductController::class,'update'])->name('product.update');
	
Route::get('/role',[App\Http\Controllers\Admin\RollController::class,'index'])->name('manage.role');
Route::get('/create/role',[App\Http\Controllers\Admin\RollController::class,'create'])->name('create.role');
Route::post('/store/role',[App\Http\Controllers\Admin\RollController::class, 'store'])->name('store.role');
Route::get('/delete/role/{id}',[App\Http\Controllers\Admin\RollController::class, 'destroy'])->name('role.delete');
Route::get('/edit/role/{id}',[App\Http\Controllers\Admin\RollController::class,'edit'])->name('role.edit');
Route::post('/update/role',[App\Http\Controllers\Admin\RollController::class, 'update'])->name('update.role');

Route::get('/{campaign_id}',[App\Http\Controllers\Admin\CampaignController::class,'campaignProduct'])->name('campaign.product');
Route::get('/add/{id}/{campaign_id}',[App\Http\Controllers\Admin\CampaignController::class,'ProductAddToCampaign'])->name('add.product.to.campaign');
Route::get('/list/{campaign_id}',[App\Http\Controllers\Admin\CampaignController::class,'ProductListCampaign'])->name('campaign.product.list');
Route::get('/remove/{id}',[App\Http\Controllers\Admin\CampaignController::class,'RemoveProduct'])->name('product.remove.campaign');
















