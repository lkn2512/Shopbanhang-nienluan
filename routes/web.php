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

// Route::get('/', function () {
//     return view('layout');
// });

//frontend
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/trang-chu', 'HomeController@index');

// all-product-home
Route::get('/all-productss', 'App\Http\Controllers\HomeController@all_productss');

//about_us
Route::get('/contact-us', 'App\Http\Controllers\AboutController@contact_us');

//search
Route::post('/search-items', 'App\Http\Controllers\HomeController@search_items');

//Danh muc san pham trang chu
Route::get('/danh-muc-san-pham/{category_id}', 'App\Http\Controllers\CategoryProduct@show_category_home');
Route::get('/thuong-hieu-san-pham/{brand_id}', 'App\Http\Controllers\BrandProduct@show_brand_home');
Route::get('/chi-tiet-san-pham/{product_id}', 'App\Http\Controllers\ProductController@details_product');
//backend
Route::get('/admin-login', 'App\Http\Controllers\Admincontroller@index');
Route::get('/dashboard', 'App\Http\Controllers\Admincontroller@show_dashboard');
Route::get('/logout', 'App\Http\Controllers\Admincontroller@logout');
Route::post('/admin-dashboard', 'App\Http\Controllers\Admincontroller@dashboard');

//Category Product
Route::get('/add-category-product', 'App\Http\Controllers\CategoryProduct@add_category_product');
Route::get('/edit-category-product/{category_product_id}', 'App\Http\Controllers\CategoryProduct@edit_category_product');
Route::get('/delete-category-product/{category_product_id}', 'App\Http\Controllers\CategoryProduct@delete_category_product');
Route::get('/all-category-product', 'App\Http\Controllers\CategoryProduct@all_category_product');

Route::get('/unactive-category-product/{category_product_id}', 'App\Http\Controllers\CategoryProduct@unactive_category_product');
Route::get('/active-category-product/{category_product_id}', 'App\Http\Controllers\CategoryProduct@active_category_product');

Route::post('/save-category-product', 'App\Http\Controllers\CategoryProduct@save_category_product');
Route::post('/update-category-product/{category_product_id}', 'App\Http\Controllers\CategoryProduct@update_category_product');

//Brand Product
Route::get('/add-brand-product', 'App\Http\Controllers\BrandProduct@add_brand_product');
Route::get('/edit-brand-product/{brand_product_id}', 'App\Http\Controllers\BrandProduct@edit_brand_product');
Route::get('/delete-brand-product/{brand_product_id}', 'App\Http\Controllers\BrandProduct@delete_brand_product');
Route::get('/all-brand-product', 'App\Http\Controllers\BrandProduct@all_brand_product');

Route::get('/unactive-brand-product/{brand_product_id}', 'App\Http\Controllers\BrandProduct@unactive_brand_product');
Route::get('/active-brand-product/{brand_product_id}', 'App\Http\Controllers\BrandProduct@active_brand_product');

Route::post('/save-brand-product', 'App\Http\Controllers\BrandProduct@save_brand_product');
Route::post('/update-brand-product/{brand_product_id}', 'App\Http\Controllers\BrandProduct@update_brand_product');

//Product
Route::get('/add-product', 'App\Http\Controllers\ProductController@add_product');
Route::get('/edit-product/{product_id}', 'App\Http\Controllers\ProductController@edit_product');
Route::get('/delete-product/{product_id}', 'App\Http\Controllers\ProductController@delete_product');
Route::get('/all-product', 'App\Http\Controllers\ProductController@all_product');

Route::get('/unactive-product/{product_id}', 'App\Http\Controllers\ProductController@unactive_product');
Route::get('/active-product/{product_id}', 'App\Http\Controllers\ProductController@active_product');

Route::post('/save-product', 'App\Http\Controllers\ProductController@save_product');
Route::post('/update-product/{product_id}', 'App\Http\Controllers\ProductController@update_product');

//cart
Route::post('/save-cart', 'App\Http\Controllers\CartController@save_cart');
Route::get('/show-cart', 'App\Http\Controllers\CartController@show_cart');
Route::get('/delete-cart/{rowId}', 'App\Http\Controllers\CartController@delete_cart');
Route::post('/update-cart', 'App\Http\Controllers\CartController@update_cart');


//checkout
Route::get('/login-checkout', 'App\Http\Controllers\CheckoutController@login_checkout');
Route::post('/login-customer', 'App\Http\Controllers\CheckoutController@login_customer');
Route::get('/logout-checkout', 'App\Http\Controllers\CheckoutController@logout_checkout');
Route::get('/register-checkout', 'App\Http\Controllers\CheckoutController@register_checkout');
Route::post('/add-customer', 'App\Http\Controllers\CheckoutController@add_customer');
Route::get('/checkout', 'App\Http\Controllers\CheckoutController@checkout');
Route::get('/payment', 'App\Http\Controllers\CheckoutController@payment');
Route::post('/save-checkout-customer', 'App\Http\Controllers\CheckoutController@save_checkout_customer');

//order
Route::get('/manage-order', 'App\Http\Controllers\OrderController@manage_orders');
Route::get('/view-order/{orderId}', 'App\Http\Controllers\OrderController@view_orders');
Route::get('/delete-order/{orderId}', 'App\Http\Controllers\OrderController@delete_order');
