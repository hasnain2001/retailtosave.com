<?php

use App\Http\Controllers\admin\CouponController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\Localization;
use App\Http\Middleware\RoleMiddleware;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {return view('welcome');})->name('welcome');
Route::get('/login', function () {return view('auth.login');})->middleware('guest')->name('login');
Route::get('/register', function () {return view('auth.register');})->middleware('guest')->name('register');


  Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');

    });
  Route::middleware([Localization::class])->group(function () {
    Route::controller(HomeController::class)->group(function () {
        Route::get('/{lang?}', 'index')->name('home');
        Route::get('/{lang?}/stores', 'stores')->name('stores');
        Route::get('store/{slug}', function($slug) {return app(HomeController::class)->StoreDetails('en', $slug, request());})->name('store.detail');
        Route::get('/{lang}/store/{slug}', [HomeController::class, 'StoreDetails'])->name('store_details.withLang');
        Route::get('{lang?}/category', 'category')->name('category');
        Route::get('/category/{slug}',function($slug) {return app(HomeController::class)->category_detail('en', $slug, request());})->name('blog.detail.withlang');
        Route::get('{lang?}/category/{slug}', 'category_detail')->name('category.detail');
        Route::get('{lang?}/coupon', 'coupons')->name('coupons');
        // Route::get('{lang?}/coupon', 'coupon')->name('coupons.index');
        Route::get('{lang?}/coupon/{slug}', 'coupon_detail')->name('coupon.detail');
        Route::get('{lang?}/blog', 'blog')->name('blog');
        Route::get('/blog/{slug}',function($slug) {return app(HomeController::class)->blog_detail('en', $slug, request());})->name('blog.detail');
        Route::get('/{lang}/blog/{slug}', 'blog_detail')->name('blog-details.withLang');
       });
      });
    Route::controller(CouponController::class)->group(function () {
        Route::post('/update-clicks', 'updateClicks')->name('update.clicks');
        Route::get('/clicks/{couponId}',  'openCoupon')->name('open.coupon');
     });
    Route::middleware([RoleMiddleware::class])->group( function(){
        Route::get('/user/dashboard', function () {  return view('dashboard');})->name('dashboard');

    });

    Route::get('/user/chat', function () { $users = User::where('id', '!=', Auth::id())->get();return view('chat-list', compact('users'));})->middleware('auth')->name('chat-list');

    Route::get('/user/chat/{id}', function ($id) {$receiver = User::findOrFail($id);return view('chat', compact('receiver'));})->middleware('auth')->name('chat');

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
require __DIR__.'/employee.php';

