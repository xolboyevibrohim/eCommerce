<?php

use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\FrontController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\UserController;

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
Route::get('/',[FrontendController::class, 'index']);
Route::get('category',[FrontendController::class, 'category']);
Route::get('view-category/{slug}',[FrontendController::class, 'viewcategory']);
Route::get('category/{cate_slug}/{prod_slug}',[FrontendController::class, 'productview']);

Route::post('add-to-cart',[CartController::class, 'addProduct']);
Route::post('delete-cart-item',[CartController::class, 'deleteproduct']);
Route::post('update-cart',[CartController::class, 'updatecart']);

Route::middleware(['auth'])->group(function () {
    Route::get('cart',[CartController::class, 'viewcart']);
    Route::get('checkout',[CheckoutController::class, 'index']);
    Route::post('place-order',[CheckoutController::class, 'placeorder']);
    Route::get('my-orders',[UserController::class, 'index']);
    Route::get('view-order/{id}',[UserController::class, 'view']);
});
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::middleware(['auth', 'isAdmin'])->group(function () {
    
    Route::get('dashboard',[FrontController::class, 'index']);

    // category
    Route::get('categories',[CategoryController::class, 'index']);
    Route::get('add-category',[CategoryController::class, 'add']);
    Route::post('insert-category',[CategoryController::class, 'insert']);
    Route::get('edit-category/{id}',[CategoryController::class, 'edit']);
    Route::put('update-category/{id}',[CategoryController::class, 'update']);
    Route::get('delete-category/{id}',[CategoryController::class, 'destroy']);
    
    // product
    Route::get('products',[ProductController::class, 'index']);
    Route::get('add-products',[ProductController::class, 'add']);
    Route::post('insert-product',[ProductController::class, 'insert']);
    Route::get('edit-product/{id}',[ProductController::class, 'edit']);
    Route::put('update-product/{id}',[ProductController::class, 'update']);
    Route::get('delete-product/{id}',[ProductController::class, 'destroy']);

    Route::get('orders',[OrderController::class, 'index']);
    Route::get('admin/view-order/{id}',[OrderController::class, 'view']);
    Route::put('update-order/{id}',[OrderController::class, 'updateorder']);
    Route::get('users',[DashboardController::class, 'users']);

    

});
